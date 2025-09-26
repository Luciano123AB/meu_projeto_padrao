@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")

    @include("layouts.tema")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="bg-light border border-black p-3 mx-3 shadow rounded-3">
                    <div class="card {{ session("tema") == "escuro" ? "bg-secondary-subtle text-black" : "bg-primary-subtle text-primary" }} p-3 mb-3 shadow-sm rounded-3">
                        <div class="d-flex align-items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            </svg>
                            
                            <div class="fs-5 fw-bold">Total de Usuários: {{ $total }}</div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="card {{ session("tema") == "escuro" ? "bg-secondary-subtle text-secondary" : "bg-success-subtle text-success" }} p-3 shadow-sm rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                        
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                    
                                    <div class="fs-5 fw-bold">Permitidos: {{ $permitidos }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card {{ session("tema") == "escuro" ? "bg-secondary-subtle text-dark" : "bg-danger-subtle text-danger" }} p-3 shadow-sm rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                    
                                    <div class="fs-5 fw-bold">Negados: {{ $negados }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-secondary-subtle mt-3 p-3 shadow-sm rounded-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="{{ session("tema") == "escuro" ? "text-secondary" : "text-success" }} fw-bold">Permitidos {{ $porcentagemPermitidos }}%</span>
                            
                            <span class="{{ session("tema") == "escuro" ? "text-dark" : "text-danger" }} fw-bold">Negados {{ $porcentagemNegados }}%</span>
                        </div>

                        <div class="progress-stacked border border-black rounded-3">
                            <div class="progress" role="progressbar" style="width: {{ $porcentagemPermitidos }}%;">
                                <div class="progress-bar progress-bar-striped {{ session("tema") == "escuro" ? "bg-secondary" : "bg-success" }}"></div>
                            </div>

                            <div class="progress" role="progressbar" style="width: {{ $porcentagemNegados }}%;">
                                <div class="progress-bar progress-bar-striped {{ session("tema") == "escuro" ? "bg-dark" : "bg-danger" }}"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-light border border-black p-3 mx-3 mt-3 mb-5 shadow rounded-3">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="card bg-secondary-subtle text-center p-3 shadow-sm rounded-3">
                                <canvas id="grafico01"></canvas>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card bg-secondary-subtle text-center p-3 shadow-sm rounded-3">
                                <canvas id="grafico02"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        const ctx01 = document.getElementById("grafico01").getContext("2d");

        new Chart(ctx01, {
            type: "bar",
            data: {
                labels: ["Usuários"],
                datasets: [
                    { label: "Permitidos", data: [{{ $permitidos }}], backgroundColor: "{{ session("tema") == "escuro" ? "gray" : "green" }}", borderColor: "black", borderWidth: 2 },
                    { label: "Negados", data: [{{ $negados }}], backgroundColor: "{{ session("tema") == "escuro" ? "black" : "red" }}", borderColor: "black", borderWidth: 2 }
                ]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });

        const ctx02 = document.getElementById("grafico02").getContext("2d");

        new Chart(ctx02, {
            type: "pie",
            data: {
                labels: ["Permitidos", "Negados"],
                datasets: [{ data: [{{ $permitidos }}, {{ $negados }}], backgroundColor: ["{{ session("tema") == "escuro" ? "gray" : "green" }}", "{{ session("tema") == "escuro" ? "black" : "red" }}"], borderColor: "black", borderWidth: 2 }]
            },
            options: { responsive: true }
        });
    </script>
@endsection
