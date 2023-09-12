<x-app-layout>
    <x-slot name="header">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <h1>日記</h1>
        </x-slot>
        <div class="date">
            <h2>今日の日付は
                @php
                    $today = date("Y/m/d");
                    print_r($today);
                @endphp
            です。</h2>
        </div>
        <dev class="weather">
            <h2>今日の天気は
            {{$maindata['weather']['0']['main']}}
            </h2>
        </dev>
        <dev class="daily">
            <h2>日記を書く
                <a href="/posts/create">[create]</a>
            </h2>
            <h2>振り返る<a href="/posts/index">[一覧]</a></h2>
        </dev>
        <div id='calendar'></div>
        
        
</x-app-layout>