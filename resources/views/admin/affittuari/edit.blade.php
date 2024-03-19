@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2>Inserisci un affittuario</h2>

        {{-- validazione errori --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="d-flex flex-column gap-2" action="{{ route('affittuari.update', $id) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            {{-- token identifica form laravel --}}
            @csrf

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $affittuario->nome) }}">
            </div>
            <div class="form-group">
                <label for="cognome">Cognome</label>
                <input type="text" id="cognome" name="cognome" value="{{ old('cognome', $affittuario->cognome) }}">
            </div>
            <div class="form-group">
                <label for="note">Note</label>
                <textarea type="textarea" id="note" name="note">{{ old('note', $affittuario->note) }} </textarea>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" id="telefono" name="telefono" value="{{ old('telefono', $affittuario->telefono) }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $affittuario->email) }}">
            </div>

            {{-- Contratto --}}
            <div class="d-flex flex-column gap-4 my-4 flex-md-row justify-content-between px-md-5">
                <div class="type-form">
                    <label for="tipo_contratto">Tipo di contratto</label>
                    <select class="px-2 py-1" id="tipo_contratto" name="tipo_contratto">
                        <option>Contratto Standard</option>
                        <option>Contratto a breve termine</option>
                        <option>Contratto di locazione estivo</option>
                        <option>Contratto di locazione condivisa</option>
                    </select>
                </div>

                <div class="type-form">
                    <label for="durata_contratto">Durata del contratto</label>
                    <select class="px-2 py-1" id="durata_contratto" name="durata_contratto">
                        <option value="3">3 Mesi</option>
                        <option value="6">6 Mesi</option>
                        <option value="12">12 Mesi</option>
                        <option value="1">1 Anno</option>
                        <option value="2">2 Anni</option>
                    </select>
                </div>

                <div>
                    <div class="form-group">
                        <label for="inizio_contratto">Data di inizio contratto</label>
                        <input type="date" id="inizio_contratto" name="inizio_contratto"
                            value="{{ old('inizio_contratto', $affittuario->inizio_contratto) }}">
                    </div>
                    <div class="form-group">
                        <label for="canone">Canone mensile</label>
                        <input type="number" id="canone" name="canone"
                            value="{{ old('canone', $affittuario->canone) }}">
                    </div>
                </div>
            </div>


            <div class="text-center my-5">
                <h5>Assegna la soluzione dell'utente:</h5>
                <div class="type-form">
                    <select class="px-2 py-1" id="house_id" name="house_id">
                        @foreach ($houses as $house)
                            <option value={{ $house->id }}>{{ $house->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="btn-inserisci" type="submit">Inserisci</button>
        </form>
    </div>
@endsection
