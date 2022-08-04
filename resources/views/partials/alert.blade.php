@if (Session::get('fail'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3 text" role="alert">
        <span hidden><i class="bi bi-exclamation-triangle-fill me-2"></i></span>
        <span class="badge rounded-pill bg-danger py-1 fw-bold">error</span>
        {{ Session::get('fail') }}
        <button id="close" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3" role="alert">
        <span hidden><i class="bi bi-info-circle-fill"></i></span>
        <span class="badge rounded-pill bg-success py-1 fw-bold">success</span>
        {{ Session::get('success') }}
        <button id="close" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::get('info'))
    <div class="alert alert-primary alert-dismissible fade show shadow-sm mb-3" role="alert">
        <span hidden><i class="bi bi-exclamation-triangle-fill me-2"></i></span>
        <span class="badge rounded-pill bg-primary py-1 fw-bold">info</span>
        {{ Session::get('info') }}
        <button id="close" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
