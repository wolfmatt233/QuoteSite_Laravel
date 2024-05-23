<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="max-w-4xl m-auto h-screen">
            <nav class="flex items-center justify-between h-12">
                <a href="/">QuoteScribe</a>
                <div class="w-28 flex justify-between">
                    <a href="/login">Login</a>
                    <a href="/register">Sign Up</a>
                </div>
            </nav>
            <div class="pt-5 text-center">
                <h1>Welcome to QuoteScribe!</h1>
                <div class="w-2/3 m-auto text-left pt-5">
                    <p>QuoteScribe is the best place to store your favorite quotes!</p>
                    <a href="/register">Sign up today!</a>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script> 
    </body>
</html>
