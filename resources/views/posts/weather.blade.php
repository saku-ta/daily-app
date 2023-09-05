<x-app-layout>
    <x-slot name="header">
        <h1>天気</h1>
        </x-slot>
        <h2>今の天気</h2>
        <dev class='wether'>
            <h3>東京</h3>
            <h4>天気:</h4>{{$maindata['weather']['0']['main']}}<br>
           
            @php
            $icondata = $maindata['weather']['0']['icon'];
            @endphp
            {{$icondata}}
            <img src= "https://openweathermap.org/img/wn/{{$icondata}}@2x.png">
           
            
            <h4>気温:</h4>{{$maindata['main']['temp']}}
            
        </dev>
        
</x-app-layout>