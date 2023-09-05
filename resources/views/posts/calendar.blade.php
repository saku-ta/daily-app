<x-app-layout>
    <x-slot name="header">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <h1>カレンダー</h1>
        </x-slot>
        <body>
            <h2>あいうえお</h2>
            <div id='calendar'></div>
        </body>
</x-app-layout>