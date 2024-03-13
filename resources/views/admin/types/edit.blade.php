@extends('layouts.app')

@section('page-title', 'edit tecnologia')

@section('main-content')
    <section class="create-edit-type-tags">

        <h1>
            Modifica il Settore
        </h1>

        <form action="{{ route('admin.types.update', ['type' => $type->slug])  }}" method="POST">
            
            @method('PUT')

            @csrf

            <label for="name" class="form-label">Nome Tecnologia</label>
            <input type="text" class=" @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del Settore"
                maxlength="1024" value="{{$type->name, old('name') }}">
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