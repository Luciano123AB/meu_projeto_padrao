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

    <div style="height: 750px;" class="bg-dark border mx-3 my-5 overflow-auto">
        <table class="table table-hover align-middle shadow">
            <thead class="text-center">
                <tr class="row-cols-7">
                    <th style="width: 1%;" class="col bg-body-secondary border-start border-end border-black">N°</th>
                    <th class="col bg-body-secondary border-end border-black">Página Acessada</th>
                    <th class="col bg-body-secondary border-end border-black">Data/Hora</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($logs as $log)
                    <tr class="row-cols-7">
                        <td class="col text-center fw-bold border-end">{{ $loop->iteration }}</td>
                        <td class="col border-end">{{ $log->pagina }}</td>
                        <td class="col text-center border-end">{{ $log->data_hora }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center fw-bold border">NENHUM LOG ENCONTRADO!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection