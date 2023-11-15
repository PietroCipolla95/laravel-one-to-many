@extends('layouts.admin')

@section('content')

    <div class="container">
        <h2 class="fs-2 text-dark my-4">
            Edit <strong class="text-dark">{{ $project->title }}</strong> project
        </h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            {{-- title --}}
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control" name="title" id="title"
                    value="{{ old('title', $project->title) }}">
                <small>Type title</small>
            </div>

            {{-- description --}}
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea class="form-control" name="description" id="description" rows="4">{{ old('description', $project->description) }}</textarea>
                <small>type description (technology used, purpose etc.)</small>
            </div>

            {{-- type --}}
            <div class="mb-3">
                <label for="type_id" class="form-label fw-bold">Project Type</label>
                <select name="type_id" id="type_id" class="form-select">
                    <option selected disabled>Choose category</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- git link --}}
            <div class="mb-3">
                <label for="git_link" class="form-label fw-bold">GitHub</label>
                <input type="text" class="form-control" name="git_link" id="git_link"
                    value="{{ old('git_link', $project->git_link) }}">
                <small>GitHub repo link</small>
            </div>

            {{-- project link --}}
            <div class="mb-3">
                <label for="project_link" class="form-label fw-bold">Project Link</label>
                <input type="text" class="form-control" name="project_link" id="project_link"
                    value="{{ old('project_link', $project->project_link) }}">
                <small>project link if any</small>
            </div>

            {{-- cover image --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label fw-bold">Choose Image</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image"
                    aria-describedby="cover_image_helper">
                <small>Preview image if any</small>
            </div>


            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">
                Edit
            </button>


        </form>


    </div>

@endsection
