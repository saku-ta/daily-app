<x-app-layout>
    <x-slot name="header">
        <h1>今日の記録</h1>
    </x-slot>
        <form action="/posts" method="POST">
            @csrf
            <div class="date">
                <h2>Date</h2>
                    @php
                        $today = date("Y/m/d");
                        print_r($today);
                    @endphp
            </div>
            
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も楽しかった。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </x-app-layout>
</html>