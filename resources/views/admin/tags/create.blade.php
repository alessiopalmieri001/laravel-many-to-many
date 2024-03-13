@extends('layouts.app')

@section('page-title', 'Aggiungi tecnologia')

@section('main-content')
    <section class="create-edit-type-tags">
        
        <h1>
        Aggiungi una nuova tecnologia
        </h1>

        <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf
            
            <label for="name" class="form-label">Nome Tecnologia</label>
            <input type="text" class=" @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome della nuova tecnologia"
                maxlength="1024" value="{{ old('name') }}">
            @error('name')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <button type="submit">
                    + Aggiungi
                </button>
            </div>
        </form>
                    
    </section>
@endsection