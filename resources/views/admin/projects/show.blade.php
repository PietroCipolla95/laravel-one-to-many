@extends('layouts.admin')

@section('content')
    <div class="bg-dark py-4 text-center text-info d-flex justify-content-center align-items-center">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-info mx-5">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <h1>
            {{ $project->title }}
        </h1>

        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-info mx-5">Edit</a>
    </div>
    @include('partials.message')


    <div class="container my-5">
        <div class="row">
            {{-- left col with preview image --}}
            <div class="col-6">
                <img class="img-fluid" src="{{ asset('storage/' . $project->cover_image) }}"
                    alt="{{ $project->title . 'image' }}">
            </div>
            {{-- right column with description and links --}}
            <div class="col">
                <div>
                    <h5 class="py-3">
                        Type:
                        <span class="text-info">
                            {{ $project->type_id == null ? 'no type selected' : $project->type?->name }}
                        </span>
                    </h5>
                    <h4>
                        Description
                    </h4>
                    <p>
                        {{ $project->description }}
                    </p>
                </div>
                {{-- projects links wrapper --}}
                <div>
                    {{-- git hub --}}
                    <div class="pt-5 pb-4">
                        <h5>
                            Git Hub <i class="fa-brands fa-github"></i>
                        </h5>
                        <a href="{{ $project->git_link }}" class="text-decoration-none text-info">
                            {{ $project->git_link }}
                        </a>
                    </div>
                    {{-- project link --}}
                    <div>
                        <h5>
                            Project <i class="fa-solid fa-earth-europe"></i>
                        </h5>
                        <a href="{{ $project->project_link }}" class="text-decoration-none text-info">
                            {{ $project->project_link }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
@endsection
