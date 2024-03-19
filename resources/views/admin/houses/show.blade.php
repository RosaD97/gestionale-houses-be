@extends('layouts.app')

@section('content')
    <div class="container show my-4">
        <a class="btn" href="{{ url('/admin/houses') }}">back</a>
        <div class="d-flex justify-content-between">
            <div class="img-wrapper">
                <img src="{{ asset('storage/' . $house->img) }}" alt="{{ $house->img }}">
            </div>
            <div class="info p-5">
                <p class="mb-4"> <strong>Prezzo:</strong> {{ $house->price }} €</p>
                <p> <strong>Tipo:</strong> {{ $house->type }}</p>
                <p> <strong>Tipo:</strong> {{ $house->affittuario ? 'Affittata' : null }} </p>
                @if ($house->affittuario)
                    <p><strong>Inquilino:</strong> {{ $house->affittuario->nome }}</p>
                    <a class="btn btn-primary" href="{{ route('affittuari.show', $house->affittuario->id) }}">Visualizza info
                        inquilino</a>
                @else
                    <p><strong>Inquilino:</strong> Nessun inquilino</p>
                @endif

            </div>
        </div>

        <div class="row-info py-4">
            <h3>{{ $house->title }}</h3>
            <div> Descrizione: <br /> {{ $house->description }}</div>
        </div>
        <div class="row-info py-4">
            <p>Bagno personale: {{ $house->bagno ? 'Si' : 'No' }}</p>
            <p>Aria Condizionata: {{ $house->ariaCondizionata ? 'Si' : 'No' }}</p>
            <p>Riscaldamento: {{ $house->riscaldamento ? 'Si' : 'No' }}</p>
            <p>Numero di stanze: {{ $house->numeroSTanze ? 'Si' : 'No' }}</p>
            <p>Wifi: {{ $house->wifi ? 'Si' : 'No' }}</p>
            <p>Lavatrice: {{ $house->lavatrice ? 'Si' : 'No' }}</p>
            <p>Parcheggio: {{ $house->parcheggio ? 'Si' : 'No' }}</p>
            <p><strong>In Evidenza: </strong>{{ $house->inEvidenza ? 'Si' : 'No' }}</p>
        </div>
        <div>
            <h3>mappa</h3>
            <p>{{ $house->latitude }}</p>
            <p>{{ $house->longitude }}</p>

             <div id="map"></div>
        </div>
    </div>
@endsection
