@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit house: {{ $house->title }}</h2>
  {{-- errori validazione --}}
@include('error', ['errors' => $errors]);
  
  
  <form action="{{ route('houses.update', $house)}}" method="POST" enctype="multipart/form-data">
    {{-- token identifica form laravel --}}
  @csrf
  @method('PUT')
  
      <div class="form-group">
        <label for="title">title</label>
        <input type="text" id="title" placeholder="inserisci un titolo" name="title" value="{{ old('title', $house->title)}}">
      </div>
      <div class="form-group">
        <label for="description">description</label>
        <textarea type="textarea" id="description" name="description">{{ old('description', $house->description)}} </textarea>
      </div>
      <div class="form-group">
          <label for="price">price</label>
          <input type="number"  id="price" name="price" value="{{ old('price', $house->price)}}">
        </div>
        <div class="form-group">
           {{-- Image Preview Upload --}}
           <div class="preview">
            <img id="file-image-preview" style="width: 400px" @if ($house->img) src="{{ asset('storage/' . $house->img) }}" @endif>
          </div>
          <label for="img">img</label>
          <input type="file"  id="img" name="img">
        </div>
  
        <div >
          <label for="type">type</label>
          <select  id="type" name="type">
            <option>apparramento</option>
            <option>villa</option>
            <option>monolocale</option>
            <option>scantinato</option>
            <option>attico</option>
          </select>
        </div>
  
      <button class="btn-inserisci" type="submit">Edit</button>
  
  </form>
</div>


@endsection