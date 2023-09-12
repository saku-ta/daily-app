<x-app-layout>
    <x-slot name="header">
        <h1>今日の記録</h1>
    </x-slot>
        <form action="/posts" method="POST">
            @csrf
            <div class="date">
                <h2>今日の日付</h2>
                    @php
                        $today = date("Y/m/d");
                        print_r($today);
                    @endphp
            </div>
            
            <div class="body">
                
                <h2>Start_Date</h2>
                <input type="date" name="post[start_date]" placeholder="" value="{{ old('post.start_date') }}"/>
                <h2>End_Date</h2>
                <input type="date" name="post[end_date]" placeholder="" value="{{ old('post.end_date') }}"/>
                
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も楽しかった。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </x-app-layout>
</html>