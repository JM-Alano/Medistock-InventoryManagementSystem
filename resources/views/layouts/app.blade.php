<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex bg-primary-DEFAULT">
            <!-- Sidebar -->
           <aside class="w-64 h-[calc(100vh-0.5rem)] fixed m-1 z-10 bg-primary-dark shadow rounded-sm">
                @include('layouts.sidebar')
            </aside>


            <!-- Main Content -->
            <div class="flex-1 ml-64 ">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-secondary-light shadow m-3">
                        <div class="max-w-7xl mx-auto p-5 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                        
                  
                </main>
            </div>
        </div>
    </body>
</html>
