<!DOCTYPE html>
<html>
<head >
    <title>KaltaraProv CSIRT - @yield('title')</title>
    
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body background-color="#f1f5f9" color="#333">
    @include('layoutview/header')
    
    <div class="container">
        @yield('content')
    </div>

    @include('layoutview/footer')
</body>
</html>