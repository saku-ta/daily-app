<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Client;

class PostController extends Controller
{
    public function index(Post $post){
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(5)]);
    }
    
    public function home(Post $post){
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        $city = 'Tokyo';

        $url = "$base_url?units=metric&q=$city&APPID=$API_KEY&lang=ja";
        
        // 接続
        $client = new Client();
        $response = $client->request('GET', $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);
        //dd($weather_data);
        
        
        $maindata = $weather_data['list'][0];
        return view('posts/home')->with(['posts' => $post,'maindata' => $maindata]);
    }
    
    public function calendar(Post $post){
        return view('posts/calendar')->with(['posts' => $post]);
    }
    
    
    public function postGet(Request $request)
    {
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
        ]);

        // カレンダー表示期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        // 登録処理
        return Post::query()
            ->select(
                // FullCalendarの形式に合わせる
                'start_date as start',
                'end_date as end',
                'title as title'
            )
            // FullCalendarの表示範囲のみ表示
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }

    
    public function show(Post $post){
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(User $user){
        return view('posts/create')->with(['users' => $user->get()]);
    }
    
    public function store(PostRequest $request, Post $post){
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post){
        return view('posts/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $reqest, Post $post){
        $input_post = $reqest['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/'. $post->id);
    }
     public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
    
    
}
?>