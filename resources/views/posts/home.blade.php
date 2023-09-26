<x-app-layout>
    <x-slot name="header">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ホーム
        </h2>
        </x-slot>
        <div class="date">
            <h2 class= "font-semibold text-xl text-sky-100 leading-tight">今日:
                @php
                    $today = date("Y/m/d");
                    print_r($today);
                @endphp
            </h2><br>
        </div>
        <dev class="weather">
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            天気:{{$maindata['weather']['0']['main']}}({{$maindata['weather']['0']['description']}})<br>
            @php
            $icondata = $maindata['weather']['0']['icon'];
            @endphp
            <img src= "https://openweathermap.org/img/wn/{{$icondata}}@2x.png">
            </h2><br>
        </dev>
        <dev class="font-semibold text-xl text-gray-900 leading-tight">
            <h2>日記を書く
                <a href="/posts/create">[create]</a>
            </h2>
        </dev>
        <div id='calendar'></div>
        
        
</x-app-layout>