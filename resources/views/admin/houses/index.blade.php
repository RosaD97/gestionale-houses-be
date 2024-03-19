@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center mb-4">
        <div class="d-flex align-items-center gap-3 align-items-center py-4">
            <div class="img-wrapper-icon">
                <img src="{{ Vite::asset('resources/img/png.png') }}" alt="">
            </div>
            <a class="text-dark text-decoration-none hover-text" href="{{ route('houses.create') }}">Add new house</a>
            <div class="img-wrapper-icon">
                <img src="{{ Vite::asset('resources/img/png.png') }}" alt="">
            </div>
        </div>
        {{-- Message --}}
        @include('partials.message')

        <div class="houses d-flex flex-wrap gap-5 justify-content-center">
            @foreach ($houses as $house)
                @include('partials.card')
            @endforeach
        </div>
    </div>
@endsection
