@inject('carbon', 'Carbon\Carbon')

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-body-secondary">&copy; {{ $carbon::now()->year }} - Kerjaan Siapa?</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
                <a href="https://github.com/rikarani/uas-pemweb" target="_blank">
                    <i class="bi bi-github" style="font-size: 28px; color:black"></i>
                </a>
            </li>
        </ul>
    </footer>
</div>
