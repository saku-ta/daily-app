<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        天気
        </h2>
        </x-slot>
        <h1 class= "font-semibold text-xl text-gray-800 leading-tight">今の天気（東京）</h1>
        <dev class='weather'>
            <h2 class = "text-xl bg-white overflow-hidden shadow-sm sm:rounded-lg">天気:{{$maindata['0']['weather']['0']['main']}}({{$maindata['0']['weather']['0']['description']}})<br>
           
            @php
            $icondata = $maindata['0']['weather']['0']['icon'];
            @endphp
            <img src= "https://openweathermap.org/img/wn/{{$icondata}}@2x.png">
           
            <p>現在の気温:{{$maindata['0']['main']['temp']}}</p>
            
            
            </h2>
            <br>
            <h3 class="font-semibold text-xl text-gray-800 leading-tight">3時間ごとの天気 (*UTC)</h3>
            <dev class= "flex justify-start text-xl text-gray-800 leading-tight">
            @php
            for($i=0; $i<8; $i++){
            @endphp
                <h4 class ="text-xl bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                    <div>
                        {{$maindata[$i]['dt_txt']}}<br>
                        天気:{{$maindata[$i]['weather']['0']['main']}}({{$maindata[$i]['weather']['0']['description']}})<br>
                        @php
                        $icondata = $maindata[$i]['weather']['0']['icon'];
                        @endphp
                        <img src= "https://openweathermap.org/img/wn/{{$icondata}}@2x.png">
                        <br>気温:{{$maindata[$i]['main']['temp']}}
                        <br>
                    </div>
            
            </h4>
            <dev class= "flex justify-start text-2xl text-gray-800 leading-tight">
            @php
            }
            @endphp
             </dev><br>
         
            
            
            
        
</x-app-layout>