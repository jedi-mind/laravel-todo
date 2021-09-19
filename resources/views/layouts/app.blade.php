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
</head>

    <body class="bg-gray-800 font-sans">
    
    <div class="container max-w-4xl bg-gray-200 text-gray-800 mx-auto mt-32 pb-5 min-h-0 rounded-lg shadow-2xl">

        @yield('content')

    </div>
</body>
</html>