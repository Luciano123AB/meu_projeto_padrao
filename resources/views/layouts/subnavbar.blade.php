<div class="text-center mb-3">
    <a href="{{ route("trocar.tema") }}" id="tema" class="btn {{ session('tema') == "escuro" ? "btn-dark" : "btn-warning" }} border shadow rounded-circle px-3 py-2">
        <i class="bi {{ session('tema') == "escuro" ? "bi-moon-stars" : "bi-sun" }} fs-4"></i>
    </a>

    <button id="botao_musica" class="btn {{ session('tema') == "escuro" ? "btn-secondary" : "btn-info" }} border shadow rounded-circle px-3 py-2">
        <i id="icone_musica" class="bi bi-volume-mute fs-4"></i>
    </button>

    @include("layouts.partials.audio")
</div>