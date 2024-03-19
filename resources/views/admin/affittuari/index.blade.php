@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center mb-4">
        <div class="d-flex align-items-center gap-3 align-items-center py-4">
            <div class="img-wrapper-icon">
                <img src="{{ Vite::asset('resources/img/png.png') }}" alt="">
            </div>
            <a class="text-dark text-decoration-none hover-text" href="{{ route('affittuari.create') }}">Add new student</a>
            <div class="img-wrapper-icon">
                <img src="{{ Vite::asset('resources/img/png.png') }}" alt="">
            </div>
        </div>
        {{-- Message --}}
        @include('partials.message')

        <div class="houses d-flex flex-wrap gap-5 justify-content-center">
            @foreach ($affittuari as $student)
                <div class="card text-bg-dark mb-3 p-5" style="max-width: 18rem;">
                    <div class="card-header">Affittuario:</div>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase pb-4">{{ $student->nome }}</h5>
                        <div class="d-flex flex-column gap-3">
                        <a class="btn w-100 btn-dark" href="{{ route('affittuari.edit', $student->id) }}">Edit</a>
                        <a class="btn  btn-light w-100" href="{{ route('affittuari.show', $student->id) }}">Show</a>
                        <form action="{{ route('affittuari.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn w-100 btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
