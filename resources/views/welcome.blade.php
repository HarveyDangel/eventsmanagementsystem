<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event MS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans antialiased min-h-screen">
    <div class="bg-gray-50">
        <div
            class="relative min-h-screen max-w-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            @include('home.nav')
            <div class="relative w-full lg:max-w-6xl">
                <main class="lg:mt-6">
                    @include('home.home')

                    @include('home.events')
                    
                    @include('home.about')

                    @include('home.feedback')

                    @include('home.action')
                </main>
            </div>
            @include('home.footer')
        </div>
    </div>
</body>

</html>