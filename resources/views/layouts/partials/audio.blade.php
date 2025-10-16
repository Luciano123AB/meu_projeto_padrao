<audio id="trilha_sonora" autoplay muted loop>
    <source src="{{ asset("assets/audios/trilha_sonora.mp3") }}" type="audio/mpeg">
</audio>

<a href="{{ route("tocarMusica") }}" id="musica" class="btn {{ session("tema") == "escuro" ? "btn-secondary" : "btn-info" }} border shadow rounded-circle px-3 py-2">
    <i class="bi {{ session("musica") == "desativado" ? "bi-volume-mute" : "bi-volume-up" }} fs-4"></i>
</a>

<script>
    const audio = document.getElementById("trilha_sonora");

    @if(session("musica") === "desativado")
        audio.muted = true;
    @else
        audio.muted = false;
        audio.play().catch(error => {
            console.error("Erro ao reproduzir o áudio:", error);
        });        
    @endif
</script>
