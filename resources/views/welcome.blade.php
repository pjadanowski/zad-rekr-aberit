<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gradient-to-br from-[#fdf6e3] to-[#e3e3e0] dark:from-[#161615] dark:to-[#0a0a0a] text-[#1b1b18] flex items-center justify-center min-h-screen">
        <div class="bg-white/80 dark:bg-[#232323]/80 rounded-xl shadow-lg p-10 max-w-md w-full text-center border border-[#e3e3e0] dark:border-[#232323]">
            <h1 class="text-2xl font-semibold mb-4 tracking-tight">Welcome 👋</h1>
            <p class="mb-2 text-base text-[#706f6c]">It is my sample solution for a backend API project.</p>
            <p class="mb-4 text-sm text-[#706f6c]">All API routes are defined in <code class="bg-[#f3f3f3] px-1 rounded text-[#f53003]">routes/api.php</code>.</p>
            <p class="text-xs text-[#a1a09a]">For setup and usage, see <code class="bg-[#f3f3f3] px-1 rounded text-[#f53003]">README.md</code>.</p>
        </div>
    </body>
</html>
