@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")

    @include("layouts.tema")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="mx-2 mx-md-3">
                    <a href="{{ route('limparLogs', ['id' => Crypt::encrypt(session('usuario.id'))]) }}" 
                       id="limparLogs" 
                       class="btn btn-info w-100 w-md-auto fs-5 px-4 py-2 mb-1">
                        LIMPAR LOGS
                    </a>
    
                    <div class="bg-dark border shadow rounded-2 overflow-auto" style="min-height: 750px; max-height: 750px;">
                        <div class="table-responsive">
                            <table class="table table-hover table-dark align-middle mb-0">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-end">N°</th>
                                        <th class="border-end">Página Acessada</th>
                                        <th class="border-end">Data</th>
                                        <th>Hora</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @forelse($logs as $log)
                                        <tr>
                                            <td class="text-center fw-bold border-end">{{ $loop->iteration }}</td>
                                            <td class="text-start border-end">{{ $log["pagina"] }}</td>
                                            <td class="text-center border-end">{{ date("d/m/Y", strtotime($log["data_hora"])) }}</td>
                                            <td class="text-center">{{ date("H:i:s", strtotime($log["data_hora"])) }}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="4" class="bg-secondary">NENHUM LOG EXISTENTE</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection