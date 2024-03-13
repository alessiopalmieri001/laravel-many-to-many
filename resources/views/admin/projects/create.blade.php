@extends('layouts.app')

@section('page-title', 'Aggiungi progetto')

@section('main-content')
    <section id="create-project">
        <h1>
            Nuovo Progetto
        </h1>
    
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for="title" class="form-label">Nome Progetto</label>
            <input type="text" class=" @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del nuovo progetto"
                maxlength="1024" value="{{ old('title') }}">
            @error('title')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

            <label for="content" class="form-label">Descrizione</label>
            <input type="text" class=" @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci la descrizione del progetto"
                maxlength="1024" value="{{ old('content') }}">
            @error('content')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

            <label for="cover_img" class="form-label">Immagine di Copertina</label>
            <input type="file" class=" @error('cover_img') is-invalid @enderror" id="cover_img" name="cover_img" placeholder="Inserisci un'immagine del progetto">
            @error('cover_img')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror


            <label for="type_id" class="form-label">Settore</label>
            <select name="type_id" id="type_id" class=" mb-2 ">
                <option
                    value=""
                    {{ old('type_id') == null ? 'selected' : '' }}>
                    Seleziona un settore...
                </option>
                @foreach ($types as $type)
                    <option
                        value="{{ $type->id }}"
                        {{ old('type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
    
            <label class="form-label">Tecnologie</label>
    
            <div>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        <input
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                            type="checkbox"
                            id="tag-{{ $tag->id }}"
                            name="tags[]"
                            value="{{ $tag->id }}">
                    </div>
                @endforeach
            </div>
    
            <div>
                <button type="submit" class="">
                    + Aggiungi
                </button>
            </div>
        </form>
    </section>
                
@endsection