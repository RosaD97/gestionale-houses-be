@extends('layouts.app')

@section('content')
    <div class="container show my-4">
        <a class="btn" href="{{ url('/admin/affittuari') }}">back</a>

        {{-- dx --}}
        <div class="d-flex flex-column flex-md-row">
            <div class="col-12 col-md-5 p-5">
                <p class="mb-4"> <strong>Nome:</strong> {{ $affittuario->nome }} </p>
                <p class="mb-4"> <strong>Cognome:</strong> {{ $affittuario->cognome }} </p>
            </div>
            <div class="col-12 col-md-7">
                <h4>Casa assegnata:</h4>
                <div class="card">
                    <img src="{{ asset('storage/' . $affittuario->house->img) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $affittuario->house->title }}</h5>
                        <p>{{ $affittuario->house->type }}</p>
                        <a class="btn btn-dark" href="{{ route('houses.show', $affittuario->house->slug) }}">Vedi
                            casa</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- sx --}}
        <div class="my-4">
            <div>
                <h3 class="py-3">Informazioni Contratto</h3>
                <p> <strong>Durata contratto:</strong> {{ $affittuario->durata_contratto }} mesi</p>
                <p> <strong>Canone:</strong> {{ $affittuario->canone }} €</p>
                <p><strong>Inizio contratto:</strong> {{ $formatInizioDate }}</p>
            </div>
            <div>
                <h3 class="py-3">Informazioni Affittuario</h3>
                <p><strong>Tel:</strong> {{ $affittuario->telefono }}</p>
                <p><strong>Email:</strong> {{ $affittuario->email }}</p>
            </div>
            <div>
                <h3 class="py-3">Note contratto</h3>
                <p>{{ $affittuario->note }}</p>
            </div>
        </div>

        <div>
            <h3 class="py-3">Pagamenti effettuati</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pagamenti effettuati</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagamenti as $key => $pagamento)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>Pagamento effettuato il : {{ $format }}</td>
                            <td>icona carina</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form class="d-flex flex-column gap-2 my-4" action="{{ route('affittuari.addPagamenti', $affittuario->id) }}"
                method="POST" enctype="multipart/form-data">
                {{-- token identifica form laravel --}}
                @csrf
                <button class="btn-inserisci" type="submit">Inserisci un nuovo Pagamento</button>
            </form>
        </div>

        <div class="buttons py-3">
            <a class="btn w-100 " href="{{ route('affittuari.edit', $affittuario->id) }}">Edit</a>
            <form action="{{ route('affittuari.destroy', $affittuario->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn w-100 btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
