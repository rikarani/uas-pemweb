@inject('carbon', 'Carbon\Carbon')

<footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container d-flex align-items-center justify-content-between">
        <span class="text-body-secondary">&copy; {{ $carbon::now()->year }} - Kerjaan Siapa?</span>
        <a href="https://github.com/rikarani/uas-pemweb" target="_blank">
            <i class="bi bi-github" style="font-size: 28px; color:black"></i>
        </a>
    </div>
</footer>
