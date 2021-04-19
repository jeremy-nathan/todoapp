<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Import Tailwind CSS file --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Todo App</title>
</head>
<body class="bg-gray-100 pt-8">
    @yield('content')
</body>
</html>
