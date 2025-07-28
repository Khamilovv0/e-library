<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #272C53;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-decoration-none border-0">
        <div class="d-flex align-items-center">
            <img src="{{asset('backend/dist/img/logo.png')}}"
                 alt="{{config('app.name')}}"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8; width: 36px; height: 36px;">
            <span class="brand-text font-weight-light ml-2" style="font-size: 1.1rem;">
        {{config('app.name')}}
      </span>
        </div>
    </a>

    <!-- Divider -->
    <hr class="mt-2 mb-2" style="border-color: rgba(255,255,255,0.1);">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Panel -->
        <div class="user-panel d-flex align-items-center pb-1">
            <div class="image mr-3">
                <img src="{{asset('backend/dist/img/user.png')}}"
                     class="img-circle shadow-sm"
                     alt="User Image"
                     style="width: 40px; height: 40px; object-fit: cover;">
            </div>
            <div class="info">
                <a href="#" class="d-block text-truncate" style="max-width: 160px; color: #fff;">
                    {{ Auth::user()->lastname }} {{ Auth::user()->firstname }}
                </a>
                <small class="d-block text-muted" style="font-size: 0.75rem;">
                    <i class="bi bi-circle-fill text-success mr-1"></i> Онлайн
                </small>
            </div>
        </div>

        <!-- Search Form -->
        <div class="form-inline px-3 pb-2 pt-2">
            <div class="input-group input-group-sm rounded-pill overflow-hidden">
                <input class="form-control form-control-sidebar bg-dark border-0"
                       type="search"
                       placeholder="Поиск..."
                       aria-label="Search"
                       style="color: #eee;">
                <div class="input-group-append">
                    <button class="btn btn-sidebar bg-transparent border-0">
                        <i class="bi bi-search text-muted"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="mt-1 mb-2" style="border-color: rgba(255,255,255,0.1);">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @include('backend.layouts.menu')
        </nav>
    </div>
</aside>
