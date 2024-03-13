@extends('layouts.guest')

@section('main-content')
    <section id="log-in">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <label for="email">
                        Email
                    </label>
                    <input type="email" id="email" name="email">
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" id="password" name="password">

                    <div class="remember">
                        <label for="remember_me">
                            <span>Remember me</span>
                        </label>
                        <input id="remember_me" type="checkbox" name="remember" class="m-0">
                    </div>
                            
                    
                </div>
        
                
        
                <div class="mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
        
                    <button type="submit">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
