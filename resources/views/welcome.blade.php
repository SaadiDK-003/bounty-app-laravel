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
    <section class="bg-white">
        <div class="container mx-auto bg-white py-5 min-h-20">
            <div class="grid sm:grid-cols-3 gap-3 px-3">
                <!-- Box 1 -->
                <div class="box min-h-80 rounded border-4 border-slate-800">
                    <div class="content m-10">
                        <h2 class="bg-gray-800 rounded-md text-center py-2 text-2xl text-white font-bold">Winning
                            Numbers</h2>
                        <h4 class="mt-3 text-black text-2xl text-center font-bold">{{date('D, M d, Y')}}</h4>
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
                        <h4 class="mt-3 text-black text-2xl text-center font-bold">{{date('D, M d, Y')}}</h4>
                        <div id="flipdownDrawing" class="flipdown mt-4"></div>
                    </div>
                </div>
                <!-- Box 3 -->
                <div class="box min-h-80 rounded border-4 border-slate-800">
                    <div class="content m-10">
                        <h2 class="bg-gray-800 rounded-md text-center py-2 text-2xl text-white font-bold">Winners</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset ('js/flipdown.min.js')}}"></script>
    <script type="module">
        $(document).ready(function() {

            new FlipDown(Math.floor(Date.now() / 1000) + 3600, "flipdownDrawing").start().ifEnded(() => {
                console.log("The countdown has ended!");
            });

            // new FlipDown(Math.floor(Date.now() / 1000) + 12, "flipdownWinners").start().ifEnded(() => {
            //     console.log("The countdown has ended!");
            // });
        });
    </script>
</body>

</html>