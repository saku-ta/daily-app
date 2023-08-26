<x-app-layout>
    <x-slot name="header">
        <h1>日記</h1>
    </x-slot>
    <h1 class="date">{{ $post->created_at }}</h1>
    
    <div class="content">
        <div class="content_post">
                <h3><本文></h3>
                <p>{{ $post->body }}</p>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>