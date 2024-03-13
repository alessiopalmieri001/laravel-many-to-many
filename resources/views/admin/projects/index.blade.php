@extends('layouts.app')

@section('page-title', 'Tutti i progetti')

@section('main-content')
    <section id="index-admin">
        <div id="add">
            <a href="{{ route('admin.projects.create') }}" class="add-button mb-5">
                <span>Aggiungi</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="row">
            @foreach ($projects as $project)
                <div class="col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                    <div class="my-card m-1">
                        <div class="my-card-body d-flex flex-column justify-content-between h-100">
                            <h3 class="text-center">
                                {{ $project->title }}
                            </h3>

                            <p>
                                {{ $project->content }}
                            </p>

                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" class="show-button align-self-baseline">
                                Mostra
                            </a>

                            <div class="edit-buttons-container d-flex flex-column align-items-end">
                                <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="edit-button mb-2">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form
                                onsubmit="return confirm('Sicuro di voler eliminare questo elemento ? ...')"
                                action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                method="POST"
                                class="d-inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="erase-button">
                                    <i class="fa-solid fa-eraser"></i>
                                </button>
                                
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection