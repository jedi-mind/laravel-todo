<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tailwind.css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Laravel Todo List</title>

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Livewire --}}
    @livewireStyles
</head>

    <body class="font-sans bg-gray-800">

    <div class="container max-w-4xl min-h-0 pb-5 mx-auto mt-32 text-gray-800 bg-gray-200 rounded-lg shadow-2xl">

        @yield('content')

    </div>

    @livewireScripts
</body>
</html>
