@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2>Create new house</h2>

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

        <form id="invia-casa-form" class="d-flex flex-column gap-2" action="{{ route('houses.store') }}" method="POST"
            enctype="multipart/form-data">
            {{-- token identifica form laravel --}}
            @csrf

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" id="title" placeholder="inserisci un titolo" name="title"
                    value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea type="textarea" id="description" name="description">{{ old('description') }} </textarea>
            </div>
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label for="numeroStanze">Numero di stanze</label>
                <input type="number" id="numeroStanze" name="numeroStanze" value="{{ old('numeroStanze') }}">
            </div>
            <div class="form-group">
                {{-- Image Preview Upload --}}
                <div class="preview">
                    <img id="file-image-preview" style="width: 400px">
                </div>
                <label for="img">Immagine</label>
                <input type="file" id="img" name="img">
            </div>

            <div class="type-form">
                <label for="type">Tipologia</label>
                <select class="px-2 py-1" id="type" name="type">
                    <option>appartamento</option>
                    <option>monolocale</option>
                    <option>camera singola</option>
                    <option>camera doppia</option>
                    <option>attico</option>
                    <option>villa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="via">Via</label>
                <input type="text" id="via" placeholder="Via e numero civico" name="via"
                    value="{{ old('via') }}">
            </div>
            <div class="form-group">
                <label for="cap">Cap</label>
                <input type="number" id="cap" name="cap" value="{{ old('cap') }}">
            </div>
            <div class="form-group">
                <label for="citta">Città</label>
                <input type="text" id="citta" placeholder="Inserisci la città" name="citta"
                    value="{{ old('citta') }}">
            </div>
            <div class="form-group">
                <label for="provincia">Provincia</label>
                <input type="text" id="provincia" placeholder="Inserisci la provincia" name="provincia"
                    value="{{ old('provincia') }}">
            </div>

            <div class="form-group">
                <input type="hidden" id="latitude" placeholder="Inserisci latitudine" name="latitude"
                    value="{{ old('latitude') }}">
            </div>
            <div class="form-group">
                <input type="hidden" id="longitude" placeholder="Inserisci longitudine" name="longitude"
                    value="{{ old('longitude') }}">
            </div>

            <div>
                <h4>Servizi</h4>
                <div class="form-check">
                    <input name="bagno" class="form-check-input" type="checkbox" value="1" {{ old('bagno') }}
                        id="bagno">
                    <label class="form-check-label" for="bagno">
                        Bagno personale
                    </label>
                </div>
                <div class="form-check">
                    <input name="wifi" class="form-check-input" type="checkbox" value="1" {{ old('wifi') }}
                        id="wifi">
                    <label class="form-check-label" for="wifi">
                        Wifi
                    </label>
                </div>
                <div class="form-check">
                    <input name="riscaldamento" class="form-check-input" type="checkbox" value="1"
                        {{ old('riscaldamento') }} id="riscaldamento">
                    <label class="form-check-label" for="riscaldamento">
                        Riscaldamento
                    </label>
                </div>
                <div class="form-check">
                    <input name="ariaCondizionata" class="form-check-input" type="checkbox" value="1"
                        {{ old('ariaCondizionata') }} id="ariaCondizionata">
                    <label class="form-check-label" for="ariaCondizionata">
                        Aria condizionata
                    </label>
                </div>
                <div class="form-check">
                    <input name="lavatrice" class="form-check-input" type="checkbox" value="1"
                        {{ old('lavatrice') }} id="lavatrice">
                    <label class="form-check-label" for="lavatrice">
                        Lavatrice
                    </label>
                </div>
                <div class="form-check">
                    <input name="parcheggio" class="form-check-input" type="checkbox" value="1"
                        {{ old('parcheggio') }} id="parcheggio">
                    <label class="form-check-label" for="parcheggio">
                        Parcheggio
                    </label>
                </div>
                <div class="form-check">
                    <input name="inEvidenza" class="form-check-input" type="checkbox" value="1"
                        {{ old('inEvidenza') }} id="inEvidenza">
                    <label class="form-check-label" for="inEvidenza">
                        In Evidenza
                    </label>
                </div>
            </div>

            <button class="btn-inserisci" type="submit">Inserisci</button>

        </form>
    </div>
@endsection
