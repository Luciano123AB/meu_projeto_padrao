<div class="text-center mb-5">
    <a href="{{ route("trocarTema") }}" id="tema" class="btn {{ session("tema") == "escuro" ? "btn-dark" : "btn-warning" }} border shadow rounded-circle px-3 py-2">
        <i class="bi {{ session("tema") == "escuro" ? "bi-moon-stars" : "bi-sun" }} fs-4"></i>
    </a>
</div>