

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
   <link rel="stylesheet" href="style.css">

    {{-- Javascript --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/cc71075486.js" crossorigin="anonymous"></script>
    


    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway+Dots&display=swap" rel="stylesheet">

    {{-- CSS ANIMATION --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- WEGLOT LANGUAGE --}}

    <script class="weglot-language" type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
<script class="weglot-language">
    Weglot.initialize({
        api_key: 'wg_dc76a13eab8b947d2bf194029eaf96cf5'
    });
</script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/js/mode.js','resources/js/welcome.js','resources/css/nav.css','resources/css/mode.css','resources/css/app.css','resources/css/welcome.css','resources/css/projects.css','resources/css/skills.css','resources/css/learning.css','resources/css/contact-me.css','resources/css/admin-nav.css',])
    
    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('{{ asset("personalbackground.png") }}');
            background-size: contain;
            background-position: center;
        }

        .project-body{
            /* width: 100%;
            height: 100%; */
            /* z-index: 9999; */
            background-image: url('{{ asset("personalbackground.png") }}') !important;
            background-size: contain;
            background-position: center;
    }

    

    .learning-body{
            /* z-index: 9999; */
            background-image: url('{{ asset("personalbackground.png") }}') !important;
            background-size: contain;
            background-position: center;  
    }

        body.dark-mode::before {
            background-color: rgba(26, 26, 26, 0.8);
        }

        /* Add this style to your existing CSS */
      .body-background {
       content: "";
       position: fixed;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       z-index: -1;
       background-image: url('{{ asset("personalbackground.png") }}');
       background-size: contain;
       background-position: center;
}

body.dark-mode .contact-container{
    background-image: url('{{ asset("personalbackground.png") }}');
    background-color: rgba(26, 26, 26, 0.8);
}

.body.dark-mode::before {
    background-color: rgba(26, 26, 26, 0.8);
}

    </style>
</head>
<body id="body" class="body light-mode">

    
   
        <div id="app">
            @include('partials.admin-nav')
            @include('partials.error')
    
            <main class="py-4 body">
                @yield('content')
            </main>
    
            @include('partials.error')

            @include('partials.footer')
        </div>


         <!-- Back to Top Button -->
         <div id="backToTopBtn" title="Go to top">
            {{-- <i class="fas fa-arrow-up"></i> --}}
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 256C8 119 119 8 256 8s248 111 248 248-111 248-248 248S8 393 8 256zm143.6 28.9l72.4-75.5V392c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V209.4l72.4 75.5c9.3 9.7 24.8 9.9 34.3.4l10.9-11c9.4-9.4 9.4-24.6 0-33.9L273 107.7c-9.4-9.4-24.6-9.4-33.9 0L106.3 240.4c-9.4 9.4-9.4 24.6 0 33.9l10.9 11c9.6 9.5 25.1 9.3 34.4-.4z"></path></svg>
        </div>
</body>
</html>