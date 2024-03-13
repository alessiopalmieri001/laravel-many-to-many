<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        {{-- Font-Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            <div class="container">
                
            <nav>
                <ul class="p-0">
                    <li>
                        <a href="/">Home</a>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li>

                            <a href="{{ route('admin.projects.index') }}">I nostri progetti</a>
                            <a href="{{ route('admin.types.index') }}">Il nostro target</a>
                            <a href="{{ route('admin.tags.index') }}">Le nostre tecnologie</a>

                        </li>
                    </li>
                </ul>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="">
                        Log Out
                    </button>
                </form>
                   
            </nav>
            </div>
        </header>


        <main>
            <div class="container">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>
