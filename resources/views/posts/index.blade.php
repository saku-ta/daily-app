<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        日記一覧
        </h2>
        </x-slot>
        
        <div class="">
            <br><h2 class= "font-semibold text-xl text-gray-800 leading-tight">一覧（作成順）</h2>
            @foreach ($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="/posts/{{ $post->id}}"><h2 class="TEXT-XL TEXT-RED-500">作成日->{{$post->created_at}}</a>
                    <p class='date'>{{$post->start_date}}の日記</p>
                    <p class='title'>{{$post->title}}</p>
                    <p class='body'>{{ $post->body }}</p>
                    
                     <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id}})">delete</button>
                    </form><br><hr><br>
                </div>
            @endforeach
        </div>
        
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                        }
            }
        </script>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <div class="create">
        <span class="font-semibold text-1xl text-gray-800 leading-tight">
            日記を書く
        </span>
        <span class="font-semibold text-1xl  underline">
            <a href="/posts/create">[create]</a>
        </span>
        </div>
        
</x-app-layout>