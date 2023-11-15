@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> {{ session('message') }} </strong>
    </div>
@endif
