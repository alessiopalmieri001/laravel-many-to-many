@extends('layouts.app')

@section('page-title', 'Tutti le tecnologie')

@section('main-content')
    <section id="index-tags-admin">
        <div class="container">
            <div class="row">
                @foreach ($tags as $singleTag)
                    <div class="col-3">
                        <a href="{{ route('admin.tags.edit', ['tag'=>$singleTag->slug]) }}" class="edit-button">
                            <i class="fa-solid fa-pencil"></i>
                        </a>

                        <form
                            onsubmit="return confirm('Sicuro di voler eliminare questo elemento ? ...')"
                            action="{{ route('admin.tags.destroy', ['tag'=>$singleTag->slug]) }}"
                            method="POST"
                            class="d-inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-button">
                                <i class="fa-solid fa-eraser"></i>
                            </button>
                            
                        </form>

                        <a href="{{ route('admin.tags.show', ['tag'=>$singleTag->slug]) }}">

                            <div class="tag">
                                <h3>
                                    {{$singleTag->name}}
                                </h3>
                            </div>
                            
                        </a>
                    </div>
                @endforeach

                    <div class="col-3">
                        
                        <span>
                            Aggiungi
                        </span>

                        <a href="{{ route('admin.tags.create') }}">

                            <div class="add-tecnology">
                                <h3>
                                    +
                                </h3>
                            </div>
                            
                        </a>
                    </div>
            </div>
        </div>
    </section>
@endsection