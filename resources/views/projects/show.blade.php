@extends('layouts.guest')

@section('page-title', '{{ $project->title }}')

@section('main-content')
<section id="show-guest">
    <div class="row g-0">
        <div class="col d-flex justify-content-center">
            <div class="my-card">
                <div class="my-card-body">
                    <h1 class="text-center mb-5">
                        {{ $project->title }}
                    </h1>

                    <p class="mb-3">
                        {{ $project->content }}
                    </p>

                    @if ($project->cover_img != null)
                        <div>
                            <div class="cover_img">
                                <img src="{{ asset('storage/'.$project->cover_img) }}">
                            </div>
                        </div>
                    @endif

                    <div class="info">
                        Creato il: 
                        <span>
                            {{ $project->created_at->format('d/m/Y') }}
                        </span>
                        <br>
                        Alle: 
                        <span>
                            {{ $project->created_at->format('H:i')  }}
                        </span>
                    </div>

                    @if ($project['updated_at'] != $project['created_at'])
                        <div>
                            Modificato il: 
                            <span>
                                {{ $project->updated_at->format('d/m/Y') }}
                            </span>
                            <br>
                            Alle: 
                            <span>
                                {{ $project->updated_at->format('H:i')  }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection