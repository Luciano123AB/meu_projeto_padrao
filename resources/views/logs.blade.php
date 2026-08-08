@extends("layouts.main_layout")

@section("content")
    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts.opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="mx-2 mx-md-3">
                    @if($logs)
                        <a href="{{ route('limpar.logs', ['id' => Crypt::encrypt(auth()->user()->id)]) }}" id="limparLogs" class="btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} border w-100 w-md-auto fs-5 px-4 py-2 mb-1">
                            LIMPAR LOGS
                        </a>
                    @else
                        <button id="limparLogs" class="btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} border bloqueado w-100 w-md-auto fs-5 px-4 py-2 mb-1" name="limparLogs">
                            LIMPAR LOGS
                        </button>
                    @endif
    
                    <div id="tabela_logs" class="{{ Cache::get('tema') === 'escuro' ? "bg-dark" : "bg-secondary" }} border shadow rounded-2 overflow-auto">
                        <div class="table-responsive">
                            <table class="table table-hover {{ Cache::get('tema') === 'escuro' ? "table-dark" : "table-secondary" }} align-middle mb-0">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-end">N°</th>
                                        <th class="border-end">Página</th>
                                        <th class="border-end">Data</th>
                                        <th class="border-end">Hora</th>
                                        <th style="width: 5%;">Deletar</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @forelse($logs as $log)
                                        <x-logs_component :log="$log" :loop="$loop->index" />
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5" class="{{ Cache::get('tema') === 'escuro' ? "bg-dark" : "bg-secondary" }}">NENHUM LOG EXISTENTE</td>
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