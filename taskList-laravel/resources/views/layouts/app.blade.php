<!DOCTYPE html>
<head>
    <title>Task List App</title>
    @yield('styles')
</head>
<body>
    @if(session()->has('success'))
        <div> {{ @session('success') }} </div>
    @endif
    <h1>@yield('title')</h1>
    <div>
        @yield('content')
    </div>
    
</body>
</html>