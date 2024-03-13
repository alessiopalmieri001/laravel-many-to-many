@extends('layouts.app')

@section('page-title', 'Aggiungi settore')

@section('main-content')
    <section class="create-edit-type-tags">

        <h1>
           Aggiungi un nuovo settore
        </h1>

        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            
            <label for="name" class="form-label">Nome Settore</label>
            <input type="text" class=" @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del nuovo settore"
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