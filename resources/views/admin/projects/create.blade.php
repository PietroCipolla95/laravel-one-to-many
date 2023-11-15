@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-2 text-dark my-4">
            Create new project
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


        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control" name="title" id="title">
                <small>Type title</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                <small>type description (technology used, purpose etc.)</small>
            </div>

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

            <div class="mb-3">
                <label for="git_link" class="form-label fw-bold">GitHub</label>
                <input type="text" class="form-control" name="git_link" id="git_link">
                <small>GitHub repo link</small>
            </div>

            <div class="mb-3">
                <label for="project_link" class="form-label fw-bold">Project Link</label>
                <input type="text" class="form-control" name="project_link" id="project_link">
                <small>project link if any</small>
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label fw-bold">Choose Image</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder=""
                    aria-describedby="cover_image_helper">
                <small>Preview image if any</small>
            </div>


            <button type="submit" class="btn btn-primary">
                Create
            </button>


        </form>


    </div>
@endsection
