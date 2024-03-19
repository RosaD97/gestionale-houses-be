<div class="py-4 px-3 side">
    <div class="d-flex mb-5">
        <a class="titolo" href="{{ url('/') }}">
            CampusHome
        </a>
    </div>
    @guest
        <ul class="list-unstyled ms-3">
            <li class="my-2"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @if (Route::has('register'))
                <li class="my-2"><a href="{{ route('register') }}">{{ __('Registrati') }}</a></li>
        </ul>
        @endif
    @else
        <ul class="list-unstyled ms-3">
            <li class="my-2"><a href="{{ url('admin') }}">{{ __('Dashboard') }}</a></li>
            <li class="my-2">
                <a href="{{ route('houses.create') }}">Aggiungi proprietà</a>
            </li>
            <li class="my-2">
                <a href="{{ route('affittuari.create') }}">Aggiungi Affittuario</a>
            </li>
            <li class="my-2"> <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>
            <li class="my-2">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    @endguest
</div>
