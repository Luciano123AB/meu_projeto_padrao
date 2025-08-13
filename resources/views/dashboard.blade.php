@extends("layouts.main_layout")

@section("content")
    <nav class="navbar bg-primary bg-gradient border-5 border-bottom border-black shadow mb-5">
        <div class="container-fluid">
            <div class="navbar-brand fs-3 fw-bold ms-5">
                <a href="{{ route("home") }}" class="link-offset-2 link-underline link-underline-opacity-0">
                    <svg class="me-1 text-dark" id="logo_efeito" xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="75" height="75" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/><path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/></svg>
                </a>

                Meu Projeto <span class="text-white">Padrão</span>
            </div>

            <div class="me-5">
                <a href="{{ route("home") }}" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="cadastrar" class="btn btn-lg btn-info border icon-link icon-link-hover focus-ring focus-ring-light my-1" type="button"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/></svg>Voltar ao Home</a>
            </div>
        </div>
    </nav>

    <div class="bg-light border border-black p-3 mx-3 mt-5 shadow">
        <div class="card bg-primary-subtle align-items-center text-primary p-2">
            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="48" height="48" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/></svg>
            
            <label>Total de Usuários: {{ $total }}</label>
        </div>

        <div class="d-flex my-3">
            <div class="card bg-success-subtle align-items-center text-success w-50 p-2 me-3">
                <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="48" height="48" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>
            
                <div>
                    <label>Usuários Permitidos: {{ $permitidos }}</label>
                </div>
            </div>

            <div class="card bg-danger-subtle align-items-center text-danger w-50 p-2">
                <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="48" height="48" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708"/></svg>
            
                <div>
                    <label>Usuários Negados: {{ $negados }}</label>
                </div>
            </div>
        </div>

        <div class="card bg-secondary-subtle p-3">
            <div style="height: 35px;" class="progress-stacked border border-black">
                <div class="progress" role="progressbar" aria-label="Success striped example" aria-valuenow="{{ $porcentagemPermitidos }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $porcentagemPermitidos }}%; height: auto;">
                    <div class="progress-bar progress-bar-striped bg-success">{{ $porcentagemPermitidos }}%</div>
                </div>
            
                <div class="progress" role="progressbar" aria-label="Danger striped example" aria-valuenow="{{ $porcentagemNegados }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $porcentagemNegados }}%; height: auto;">
                    <div class="progress-bar progress-bar-striped bg-danger">{{ $porcentagemNegados }}%</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light border border-black d-flex p-3 mx-3 mt-3 mb-5 shadow">
        <div class="card bg-secondary-subtle text-center w-50 p-3 me-3">
            <canvas id="grafico01"></canvas>
        </div>

        <div class="card bg-secondary-subtle text-center w-50 p-3">
            <canvas id="grafico02"></canvas>
        </div>
    </div>

    <script>

        const ctx01 = document.getElementById("grafico01").getContext("2d");

        const grafico01 = new Chart(ctx01, {
            type: "bar",
            data: {
                labels: ["Permitidos / Negados"],
                datasets: [{
                    label: " - Permitidos",
                    data: [{{ $permitidos }}],
                    backgroundColor: ["green"],
                    borderColor: "black",
                    borderWidth: 2
                },
            
                {
                    label: " - Negados",
                    data: [{{ $negados }}],
                    backgroundColor: ["red"],
                    borderColor: "black",
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx02 = document.getElementById("grafico02").getContext("2d");

        const grafico02 = new Chart(ctx02, {
            type: "pie",
            data: {
                labels: [" - Permitidos", " - Negados"],
                datasets: [{
                    label: "Quantidade",
                    data: [{{ $permitidos }}, {{ $negados }}],
                    backgroundColor: ["green", "red"],
                    borderColor: "black",
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection