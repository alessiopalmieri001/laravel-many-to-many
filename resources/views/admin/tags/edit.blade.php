@extends('layouts.app')

@section('page-title', 'edit tecnologia')

@section('main-content')
    <section class="create-edit-type-tags">

        <h1>
            Modifica la Tecnologia
        </h1>

        <form action="{{ route('admin.tags.update', ['tag' => $tag->slug])  }}" method="POST">
            
            @method('PUT')

            @csrf

            <label for="name" class="form-label">Nome Tecnologia</label>
            <input type="text" class=" @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome della Tecnologia"
                maxlength="1024" value="{{$tag->name, old('name') }}">
            @error('name')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <button type="submit">
                    + Aggiorna
                </button>
            </div>
        </form>

    </section>            
@endsection