    <div class="card my_card" style="width: 18rem;">
        <img src="{{ asset('storage/' . $house->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $house->title }}</h5>
            <p class="card-text">Tipologia: {{ $house->type }}</p>
            <p class="card-text">Tipologia: {{ $house->inEvidenza }}</p>
            <p class="card-text text-danger">Prezzo: {{ $house->price }} €</p>
            <div class="buttons py-3">
                <a class="btn  btn-dark w-100" href="{{ route('houses.show', $house->slug) }}">Show</a>
                <a class="btn w-100 " href="{{ route('houses.edit', $house->slug) }}">Edit</a>
                <form action="{{ route('houses.destroy', $house->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn w-100 btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

