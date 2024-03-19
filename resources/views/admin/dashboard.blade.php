@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="dashboard my-5 ">
            <h2 class="my-4">
                {{ __('Dashboard') }}
            </h2>
            {{-- Dashboard --}}
            <div class="d-flex flex-column justify-content-center gap-2 text-center">
                <div>Welcome <h4>{{ Auth::user()->name }}</h4>
                </div>
                <a href="{{ url('/admin/houses') }}">Vai alle case</a>
                <a href="{{ url('/admin/affittuari') }}">Vai agli studenti</a>

                <a href="{{ route('houses.create') }}">Aggiungi proprietà</a>
            </div>
        </div>
    </div>
@endsection
