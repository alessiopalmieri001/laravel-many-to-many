@extends('layouts.guest')

@section('page-title', 'Tutti i progetti')

@section('main-content')
    <section id="index-guest">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <a href="{{route('types.index')}}" class="show-button">
                        Guarda tutti i settori in cui abbiamo lavorato
                    </a>
                </div>
            </div>
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-12 col-xs-6 col-sm-4 col-md-3 ">
                        <div class="my-card">
                            <div class="my-card-body d-flex flex-column justify-content-between h-100">
                                <h3 class="text-center">
                                    {{ $project->title }}
                                </h3>
    
                                <p>
                                    {{ $project->content }}
                                </p>

                                @if ($project->type != null)
                                    <a href="{{ route('types.show', ['type'=>$project->type->slug]) }}">
                                        {{ $project->type->name }}
                                    </a>
                                @else
                                    -
                                @endif

                                <div>
                                    @if ($project->tags != null)
                                        @foreach ($project->tags as $singleTag)
                                        <a href="" class="tag">
                                            {{ $singleTag->name }}
                                        </a>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </div>    
    
                                <a href="{{ route('projects.show', ['project' => $project->slug]) }}" class="show-button align-self-baseline">
                                    Mostra
                                </a>
    
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection