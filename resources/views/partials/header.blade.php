<div class="container">
    <div class="container-header">
        {{-- Logo --}}
            <a class="img-wrapper" href="{{url('/') }}">
                <img src="{{ Vite::asset('resources/img/logo-main.png') }}" alt="">
            </a>
        {{-- Lista link --}}
        <div class="nav-list-container">
            <ul class="nav-list">
                <li><a href="{{url('/guest') }}">HOME</a></li>
                <li><a href="{{url('/about-us') }}">ABOUT US</a></li>
                <li><a href="{{url('/contact-us') }}">CONTACT US</a></li>
            </ul>
        </div>
        {{-- Aggiungi proprietà --}}
        <div class="btn-container">
             <!-- Right Side Of Navbar -->
                    <ul>
                        <!-- Authentication Links -->
                        @guest
                        <li>
                            <a href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>
                        {{-- se esiste la rotta register mostra questo --}}
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                        </li>
                        @endif
                        @else
                        <li>

                            <div aria-labelledby="navbarDropdown">
                                <a href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
        </div>
    </div>
</div>