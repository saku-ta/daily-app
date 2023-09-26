<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            日記
        </h2>
        <link rel="stylesheet" href="resources/css/style.css">
    </x-slot>
    <h1 class="date">{{ $post->start_date }}</h1>
    
    <div class="content">
        <div class="content_post">
            <h3>タイトル</h3>
            <p>{{ $post->title}}</p>
            <h3>本文</h3>
            <p>{{ $post->body }}</p>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>