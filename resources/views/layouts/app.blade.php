<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Required form plugin -->
        <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            let inputFile = document.getElementById('inputFile');
            inputFile.addEventListener('change', (event) => {
                const fileList = event.target.files[0];
                document.getElementById('fileName').innerText= String(fileList.name);
                document.getElementById('fileSize').innerText=String(niceBytes(fileList.size));
            });
            function niceBytes(a){let b=0,c=parseInt(a,10)||0;for(;1024<=c&&++b;)c/=1024;return c.toFixed(10>c&&0<b?1:0)+" "+["bytes","KB","MB","GB","TB","PB","EB","ZB","YB"][b]}
        </script>
    </body>
</html>
