<footer class="{{ Cache::get('tema') === 'escuro' ? "bg-dark" : "bg-primary" }} border-top border-5 border-black text-center mt-auto p-3">
    <img id="imagem_direitos" class="border border-black shadow rounded me-1" src="{{ asset("assets/images/foto_proprietario.png") }}">

    <label class="text-white align-middle fs-5">© 2025 - {{ date("Y") }} {{ config("app.name") }} / Todos os direitos reservados: Luciano Eduardo Stefanello da Silva</label>
</footer>