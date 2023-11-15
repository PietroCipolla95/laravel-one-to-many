@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-2 text-dark my-4">
            Your Projects
        </h2>

        @include('partials.message')


        {{ $projects->links('pagination::bootstrap-5') }}

        <div class="table-responsive my-4">
            <table class="table border table-striped table-hover table-light">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>GitHub</th>
                        <th>Project Link</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($projects as $project)
                        <tr>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                <img width="150px" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                            </td>
                            <td>
                                {{ $project->title }}
                            </td>
                            <td>
                                {{ $project->type_id == null ? 'no type selected' : $project->type?->name }}
                            </td>
                            <td>
                                <a href="{{ url($project->git_link) }}" class="text-decoration-none text-info">
                                    {{ $project->git_link }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ $project->project_link }}" class="text-decoration-none text-info">
                                    {{ $project->project_link }}
                                </a>
                            </td>
                            <td>
                                {{ $project->created_at }}
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-secondary">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>


                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Attention! You cannot go back from this
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>

                                                <!-- Delete form -->
                                                <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </td>
                        </tr>
                    @empty
                        <h3 class="py-3">
                            No projects at the moment
                        </h3>
                    @endforelse



                </tbody>
            </table>
        </div>

        {{ $projects->links('pagination::bootstrap-5') }}



    </div>
@endsection
