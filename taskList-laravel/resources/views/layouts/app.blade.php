<!DOCTYPE html>
<head>
    <title>Task List App</title>
    @yield('styles')
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-slate-700 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-500
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-600
        }
    </style>
    {{-- blade-formatter-enable --}}
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    @if(session()->has('success'))
        <div> {{ @session('success') }} </div>
    @endif
    <h1 class="text-2xl mb-4">@yield('title')</h1>
    <div>
        @yield('content')
    </div>
    
</body>
</html>