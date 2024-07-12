<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{-- seccion a compartir --}}
        @yield('title')
    </title>
    {{-- en caso de necesitar tailwind --}}
    {{-- @vite('resources/css/app.css') --}}

    @yield('css')
</head>
<body>
    {{-- Componente Parcial menu --}}
    @include('layouts._partials.menu')
    @yield('content')

    @yield('js')
</body>
</html>
