@extends('layouts.app')

@section('content')
    <div class="section homepage">
        <div class="container">
            <div class="d-flex align-items-center gap-3 text-center">
                <div class="img-wrapper-icon">
                    <img src="{{ Vite::asset('resources/img/png.png') }}" alt="">
                </div>
                <h1 class="my-4">Scopri il Tuo Spazio: Registra e Gestisci le Tue Proprietà con Facilità!</h1>
                <div class="img-wrapper-icon">
                    <img src="{{ Vite::asset('resources/img/png.png') }}" alt="">
                </div>
            </div>
            <p class="text-center my-2">Vendi o affitta le tue proprietà con facilità! La nostra piattaforma semplifica il
                processo,
                offrendoti un
                modo
                rapido e intuitivo per raggiungere potenziali acquirenti o inquilini. Unisciti a noi per un'esperienza
                immobiliare senza complicazioni!</p>
        </div>
    </div>
    <div class="section">
        <div class="container homepage servizi">
            {{-- <h3 class="my-4">Scopri i venditori più votati!</h3>
            <div class="cards-wrapper d-flex gap-3 flex-wrap justify-content-center my-5">
                @foreach ($houses as $house)
                    @include('partials.card', [$mode])
                @endforeach
            </div> --}}
            <div class="d-flex flex-column">
                <h3 class="my-4">E' molto semplice: inzia oggi!</h3>
                <div class="d-flex flex-column flex-lg-row gap-3 justify-content-center align-items-center">
                    <div>
                        <img src="{{ Vite::asset('resources/img/iscriviti.png') }}" />
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/img/posta.png') }}" />
                    </div>
                    <div>
                        <img src="{{ Vite::asset('resources/img/vendi.png') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
