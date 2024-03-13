@extends('layouts.app')

@section('page-title', 'Tutti i settori')

@section('main-content')
    <section id="index-types-admin">
        <div class="container">
            <div class="row">
                @foreach ($types as $singleType)
                    <div class="col-3">
                        <a href="{{ route('admin.types.edit', ['type'=>$singleType->slug]) }}" class="edit-button">
                            <i class="fa-solid fa-pencil"></i>
                        </a>

                        <form
                            onsubmit="return confirm('Sicuro di voler eliminare questo elemento ? ...')"
                            action="{{ route('admin.types.destroy', ['type'=>$singleType->slug]) }}"
                            method="POST"
                            class="d-inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-button">
                                <i class="fa-solid fa-eraser"></i>
                            </button>
                            
                        </form>
                        
                        <a href="{{ route('admin.types.show', ['type'=>$singleType->slug]) }}">

                            <div class="tecnology">
                                <h3>
                                    {{$singleType->name}}
                                </h3>
                            </div>
                            
                        </a>
                    </div>
                @endforeach

                    <div class="col-3">
                        
                        <span>
                            Aggiungi
                        </span>

                        <a href="{{ route('admin.types.create') }}">

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