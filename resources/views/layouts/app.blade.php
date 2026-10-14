<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @fonts

    <!-- Styles / Scripts -->
    @include('layouts.partials.styles')
</head>

<body
    class="bg-slate-950 text-slate-100 flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div class="flex w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex w-full flex-col-reverse lg:flex-row">
            @yield('content')
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
