@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
