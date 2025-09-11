@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-nowrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3">
                <div style="height: 750px;" class="bg-dark border mx-3 my-5 shadow overflow-auto">
                    <table class="table table-hover align-middle">
                        <a href="{{ route('limparLogs', ['id' => Crypt::encrypt(session('usuario.id'))]) }}" id="limparLogs" class="btn btn-lg btn-info w-100 w-md-auto fs-5 fs-md-1 p-2 p-md-4" type="button">
                            LIMPAR LOGS
                        </a>

                        <thead class="text-center">
                            <tr class="row-cols-3">
                                <th style="width: 1%;" class="col bg-body-secondary border-start border-top border-bottom border-black">N°</th>
                                <th class="col bg-body-secondary border-start border-end border-black">Página Acessada</th>
                                <th class="col bg-body-secondary border-end border-black">Data</th>
                                <th class="col bg-body-secondary border-end border-black">Hora</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($logs as $log)
                                <tr class="row-cols-3">
                                    <td style="width: 1%;" class="col text-center fw-bold border-start border-end">{{ $loop->iteration }}</td>
                                    <td class="col text-center border-end">{{ $log["pagina"] }}</td>
                                    <td class="col text-center border-end">{{ date("d/m/Y", strtotime($log["data_hora"])) }}</td>
                                    <td class="col text-center border-end">{{ date("H:m:s", strtotime($log["data_hora"])) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection