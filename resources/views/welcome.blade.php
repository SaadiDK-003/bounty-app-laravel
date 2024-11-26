@php
$time = strtotime(date('01-12-2024 14:00:00'))
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= env('APP_NAME', 'BOUNTY') ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset ('css/flipdown.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/owl.carousel.min.css') }}">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <header class="bg-slate-800 flex items-center justify-center  min-h-20">
        <div class="container mx-auto flex items-center justify-between px-5">
            <h1 id="test" class="text-3xl text-white">LOGO HERE</h1>
            @if (Route::has('login'))
            <nav class="flex gap-4">
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="text-black px-5 py-2 rounded border border-1 bg-white hover:bg-slate-900 hover:text-white">
                    Log in
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="text-black px-5 py-2 rounded border border-1 bg-white hover:bg-slate-900 hover:text-white">
                    Register
                </a>
                @endif
                @endauth
            </nav>
            @endif
        </div>
    </header>
    <section class="banner min-h-[400px] bg-white dark:bg-black">
        <div class="container mx-auto mt-10">
            <div class="banner-wrapper w-100 min-h-[380px] bg-slate-600 rounded-md grid grid-cols-5 overflow-hidden">
                <div class="content col-span-3 relative bg-[#e32e35]">
                    <div class="content absolute top-[50%] translate-y-[-50%] left-20 grid gap-5">
                        <h1 class="text-white text-3xl">Our Biggest Jackpot</h1>
                        <h2 class="text-white text-4xl">US<span class="text-6xl">$480</span>Million</h2>
                    </div>
                </div>
                <div class="img col-span-2">
                    <img src="https://picsum.photos/614/380" alt="banner-img" width="614" height="380">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-black">
        <div class="container mx-auto bg-white dark:bg-black py-5 min-h-20">
            <div class="grid sm:grid-cols-3 gap-3 px-3">
                <!-- Box 1 -->
                <div class="box min-h-80 rounded border-4 border-slate-800">
                    <div class="content m-10">
                        <h2 class="bg-gray-800 rounded-md text-center py-2 text-2xl text-white font-bold">Winning
                            Numbers</h2>
                        <h4 class="mt-3 text-black dark:text-white text-2xl text-center font-bold">{{date('D, M d, Y')}}</h4>
                        <div class="circles-wrapper flex items-center justify-center mt-4 gap-4">
                            <span class="w-12 h-12 flex items-center justify-center text-white bg-slate-500 rounded-full">12</span>
                            <span class="w-12 h-12 flex items-center justify-center text-white bg-slate-500 rounded-full">13</span>
                            <span class="w-12 h-12 flex items-center justify-center text-white bg-slate-500 rounded-full">34</span>
                            <span class="w-12 h-12 flex items-center justify-center text-white bg-slate-500 rounded-full">44</span>
                            <span class="w-12 h-12 flex items-center justify-center text-white bg-slate-500 rounded-full">67</span>
                            <span class="w-12 h-12 flex items-center justify-center text-white rounded-full bg-red-600">8</span>
                        </div>
                        <a href="#!" class="text-white py-2 px-3 block w-40 text-center rounded-md mx-auto mt-5 bg-slate-900 hover:bg-slate-700">View Results</a>
                    </div>
                </div>
                <!-- Box 2 -->
                <div class="box min-h-80 rounded border-4 border-slate-800">
                    <div class="content m-10">
                        <h2 class="bg-gray-800 rounded-md text-center py-2 text-2xl text-white font-bold">Next Drawing
                        </h2>
                        <h4 class="mt-3 text-black dark:text-white text-2xl text-center font-bold">{{date('D, M d, Y')}}</h4>
                        <div id="flipDownDrawing" data-time="{{$time}}" class="flipdown mt-4 flex justify-center"></div>
                    </div>
                </div>
                <!-- Box 3 -->
                <div class="box min-h-80 rounded border-4 border-slate-800">
                    <div class="content m-10">
                        <h2 class="bg-gray-800 rounded-md text-center py-2 text-2xl text-white font-bold">Winners</h2>
                        <h4 class="mt-3 text-black dark:text-white text-2xl text-center font-bold">{{date('D, M d, Y')}}</h4>
                        <div class="winners-wrapper mt-3">
                            <h5 class="text-center text-white w-52 mx-auto rounded-md bg-red-600 font-bold">POWER BALL</h5>
                            <h3 class="text-center text-black dark:text-white font-extrabold text-2xl">JACKPOT WINNER</h3>
                            <ul class="flex items-center justify-center flex-col">
                                <li><a class="text-black dark:text-white" href="#!">User Abc</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bonds-section">
        <div class="container max-w-7xl mx-auto min-h-[300px] w-full mb-5 grid grid-cols-2">
            <div class="col p-5">
                <div class="content-wrapper border-[3px] border-slate-700 dark:border-white rounded-md h-full bg-white dark:bg-slate-800">
                    <h2 class="text-center my-3 text-4xl uppercase font-bold"><span class="text-red-700">$50</span> Prize Bond</h2>
                    <hr class="h-1 bg-slate-500 dark:bg-white border-none">
                    <div class="grid grid-cols-5 gap-3 p-3 px-6 justify-items-center">
                        <a href="#!" class="flex items-center justify-center rounded-full text-white dark:text-black text-2xl bg-slate-400 dark:bg-white w-14 h-14 hover:bg-slate-700 dark:hover:bg-slate-400 active active:bg-red-700 dark:active:text-white active:pointer-events-none">1</a>
                        <a href="#!" class="flex items-center justify-center rounded-full text-white dark:text-black text-2xl bg-slate-400 dark:bg-white w-14 h-14 hover:bg-slate-700 dark:hover:bg-slate-400 active:bg-red-700 dark:active:text-white active:pointer-events-none">2</a>
                        <a href="#!" class="flex items-center justify-center rounded-full text-white dark:text-black text-2xl bg-slate-400 dark:bg-white w-14 h-14 hover:bg-slate-700 dark:hover:bg-slate-400 active:bg-red-700 dark:active:text-white active:pointer-events-none">3</a>
                        <a href="#!" class="flex items-center justify-center rounded-full text-white dark:text-black text-2xl bg-slate-400 dark:bg-white w-14 h-14 hover:bg-slate-700 dark:hover:bg-slate-400 active:bg-red-700 dark:active:text-white active:pointer-events-none">4</a>
                        <a href="#!" class="flex items-center justify-center rounded-full text-white dark:text-black text-2xl bg-slate-400 dark:bg-white w-14 h-14 hover:bg-slate-700 dark:hover:bg-slate-400 active:bg-red-700 dark:active:text-white active:pointer-events-none">5</a>
                    </div>

                </div>
            </div>
            <div class="col"></div>
        </div>
    </section>

    <script src="{{asset ('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset ('js/flipdown.min.js')}}"></script>
    <script src="{{asset ('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset ('js/custom.js')}}"></script>
    <script>
        $(document).ready(function() {
            // $('.owl-carousel').owlCarousel();
        });
    </script>
</body>

</html>