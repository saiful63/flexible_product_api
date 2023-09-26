{{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif --}}
{{-- @if(Route::has('login'))
@auth
    <a href="{{ url('/home') }}">Home</a>
    <a href="{{ route('logout') }}">Logout</a>
    @else
    <a href="{{ route('login') }}">Login</a>
    @if (Route::has('register'))
    <a href="{{ route('register') }}">Register</a>
    @endif
@endauth
@endif --}}
