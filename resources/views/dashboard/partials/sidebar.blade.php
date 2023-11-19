<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md h-100 offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu">
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 text-dark" href="/posts">
                        <i class="bi bi-house-fill"></i> Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 {{ Request::is('dashboard') ? '' : 'text-dark' }}"
                        href="/dashboard">
                        <i class="bi bi-graph-down"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 {{ Request::is('dashboard/posts') ? '' : 'text-dark' }}"
                        href="/dashboard/posts">
                        <i class="bi bi-file-text"></i> Postingan Saya
                    </a>
                </li>
            </ul>

            @can('admin')
                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>bagian atmin</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2 {{ Request::is('dashboard/categories') ? '' : 'text-dark' }}"
                            href="/dashboard/categories">
                            <i class="bi bi-pin-angle"></i> Kategori
                        </a>
                    </li>
                </ul>
            @endcan

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="nav-link d-flex gap-2 text-dark" type="submit">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
