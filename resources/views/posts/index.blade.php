<x-app-layout>
    <x-slot name="header">
        <h1>日記</h1>
        </x-slot>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href="/posts/{{ $post->id}}"><h2 class='date'>{{$post->created_at}}</a>
                    <p class='body'>{{ $post->body }}</p>
                    
                     <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id}})">delete</button>
                    </form>
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
        
</x-app-layout>