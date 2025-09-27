<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @include('partials.style')
</head>

<body>
    <header>
        @include('partials.header')
    </header>
    <main>
        <div class="@container">
            <div class="mx-auto max-w-7xl overflow-hidden rounded-md bg-white shadow-md md:max-w-7xl px-4">
                @yield('content')
            </div>
        </div>
    </main>
    <footer>
        @include('partials.footer')
    </footer>
</body>

</html
