<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome!</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,line-clamp,aspect-ratio"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    @livewireStyles
</head>
<body class="antialiased min-h-screen flex flex-col w-full overflow-x-hidden bg-gray-900 text-gray-200">
<div class="flex flex-col flex-1 h-full">
    <header class="px-6 lg:px-12 py-9 flex justify-between items-center text-white">
        <a aria-current="page" href="/" class="text-lg">House Helper</a>
        <nav class="flex" aria-label="Main">
            <a
                href="https://github.com/BThero/house-helper-php"
                class="text-d-p-sm mx-2 sm:mx-4 last:mr-0 opacity-80 hover:opacity-100 font-semibold hidden sm:block">
                GitHub
            </a>
        </nav>
    </header>
    <main class="flex flex-col flex-1">
        <section class="pt-12 px-6 sm:px-8 flex w-full lg:items-center justify-between gap-12">
            <div class="w-1/2 max-w-2xl mb-10 mx-auto text-center flex flex-col items-center">
                <h2 class="text-white text-[length:64px] leading-[56px] font-bold mb-4">
                    House Helper
                </h2>
                <p class="text-xl mb-12">
                    The house management app you always wanted.
                </p>
                @auth
                    <a
                        class="inline-flex items-center justify-center h-14 box-border px-8 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-transparent font-semibold bg-blue-700 text-white hover:bg-blue-600 focus:ring-blue-200 transition-colors duration-200 w-full xl:w-60 xl:order-1"
                        href="{{ url('/dashboard') }}"
                    >Dashboard
                    </a>
                @else
                    <livewire:auth/>
                @endauth
            </div>
        </section>
    </main>
</div>

@livewireScripts
</body>
</html>
