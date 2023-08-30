<x-app-layout>
    <x-slot name="header">
        <h1>天気</h1>
        </x-slot>
        <h2>今日の天気</h2>
        <dev class='wether'>
            {{ $weather_data }}
        </dev>
        
</x-app-layout>