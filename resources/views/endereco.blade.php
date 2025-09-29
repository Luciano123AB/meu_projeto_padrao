@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")
    
    @include("layouts/tema")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3 mb-5">
                <div style="height: 535px;">
                    <div class="card border-black shadow mx-1 mx-md-3 mb-3">
                        <div class="card-body row row-cols-1 g-3">
                            <div class="col">
                                <form id="formEndereco">
                                    <div class="input-group flex-column flex-md-row">
                                        <label class="input-group-text mb-2 mb-md-0"><i class="bi bi-geo-alt"></i>Digite o CEP:</label>
    
                                        <input id="cep" class="form-control w-50" type="text" name="cep" placeholder="00000-000">
    
                                        <button class="btn {{ session("tema") == "escuro" ? "btn-secondary" : "btn-info" }} mt-2 mt-md-0" type="button" id="buscar">
                                            <i class="bi bi-search"></i> Buscar
                                        </button>
                                    </div>
                                </form>
    
                                <div id="erroCep" class="alert alert-danger text-center mt-1 mb-0 d-none">CEP inválido ou não encontrado<svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg></div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card border-black shadow mx-1 mx-md-3">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <i class="bi bi-signpost-2"></i>
    
                                    <label for="logradouro" class="form-label">Rua:</label>
    
                                    <input type="text" id="logradouro" class="form-control" readonly disabled>
                                </div>
    
                                <div class="col-md-6">
                                    <i class="bi bi-signpost"></i>
    
                                    <label for="bairro" class="form-label">Bairro:</label>
    
                                    <input type="text" id="bairro" class="form-control" readonly disabled>
                                </div>
    
                                <div class="col-md-6">
                                    <i class="bi bi-building"></i>
    
                                    <label for="cidade" class="form-label">Cidade:</label>
    
                                    <input type="text" id="cidade" class="form-control" readonly disabled>
                                </div>
    
                                <div class="col-md-6">
                                    <i class="bi bi-flag"></i>
    
                                    <label for="estado" class="form-label">Estado:</label>
    
                                    <input type="text" id="estado" class="form-control" readonly disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#cep").mask("00000-000");

        $(document).ready(function () {           
            $("#buscar").on("click", function () {

                let cep = $("#cep").val().replace(/\D/g, "");

                if (cep.length === 8) {
                    fetch(`/cep/${cep}`)
                        .then(response => response.json())
                        .then(data => {
                            if (!data.error) {
                                $("#erroCep").addClass("d-none");
                                $("#logradouro").val(data.logradouro ?? "");
                                $("#bairro").val(data.bairro ?? "");
                                $("#cidade").val(data.localidade ?? "");
                                $("#estado").val(data.uf ?? "");
                            } else {
                                $("#erroCep").removeClass("d-none");
                                $("#logradouro, #bairro, #cidade, #estado").val("");
                            }
                        })
                        .catch(() => {
                            $("#erroCep").removeClass("d-none");
                        });
                } else {
                    $("#erroCep").removeClass("d-none");
                }
            });
        });
    </script>
@endsection
