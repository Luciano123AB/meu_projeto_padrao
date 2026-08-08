@extends("layouts.main_layout")

@section("content")
    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts.opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="card border-black shadow mx-1 mx-md-3 mb-1">
                    <div class="card-body row row-cols-1 row-cols-md-2 g-3">
                        <div class="col">
                            <form class="mb-3" action="{{ route('pesquisa.usuario') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row">
                                    <label class="input-group-text mb-2 mb-md-0">Digite um nome de usuário:</label>

                                    <input id="usuario" class="form-control w-50" type="text" name="usuario" placeholder="...">
                                    
                                    <button class="botoes_pesquisar btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} mt-2 mt-md-0" type="submit" name="pesquisar">
                                        <i class="bi bi-search"></i>
                                        Pesquisar
                                    </button>
                                </div>
                                
                                @error('usuario')
                                    <div class="alert alert-danger text-center mt-1 mb-0">
                                        {{ $message }}
                                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </div>
                                @enderror
                            </form>

                            <form class="mb-3" action="{{ route('pesquisa.status') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row align-items-center">
                                    <label class="input-group-text mb-2 mb-md-0">Escolha um status:</label>

                                    <div id="pesquisa" class="d-flex gap-3 border mb-2 mb-md-0 px-2">
                                        <div class="form-check">
                                            <input id="permissao01" class="form-check-input" type="radio" name="permissao" value="permitidos">

                                            <label class="form-check-label" for="permissao01">Permitidos</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="permissao02" class="form-check-input" type="radio" name="permissao" value="negados">

                                            <label class="form-check-label" for="permissao02">Negados</label>
                                        </div>
                                    </div>

                                    <button class="botoes_pesquisar btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }}" type="submit" name="pesquisar">
                                        <i class="bi bi-search"></i> Pesquisar
                                    </button>
                                </div>

                                @error('permissao')
                                    <div class="alert alert-danger text-center mt-1 mb-0">
                                        {{ $message }}
                                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </div>
                                @enderror
                            </form>

                            <form action="{{ route('pesquisa.mes') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row">
                                    <label class="input-group-text mb-2 mb-md-0">Digite um mês:</label>

                                    <input id="mes" class="form-control w-50" type="number" name="mes" placeholder="00">

                                    <button class="botoes_pesquisar btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} mt-2 mt-md-0" type="submit">
                                        <i class="bi bi-search"></i>
                                        Pesquisar
                                    </button>
                                </div>

                                @error('mes')
                                    <div class="alert alert-danger text-center mt-1 mb-0">
                                        {{ $message }}
                                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </div>
                                @enderror
                            </form>
                        </div>

                        <div class="col">
                            <form class="mb-3" action="{{ route('pesquisa.data.nascimento') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row">
                                    <label class="input-group-text mb-2 mb-md-0">Digite uma data de nascimento:</label>

                                    <input id="data" class="form-control w-50" type="text" name="data" placeholder="DIA/MÊS/ANO">

                                    <button class="botoes_pesquisar btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} mt-2 mt-md-0" type="submit">
                                        <i class="bi bi-search"></i> Pesquisar
                                    </button>
                                </div>

                                @error('data')
                                    <div class="alert alert-danger text-center mt-1 mb-0">
                                        {{ $message }}
                                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </div>
                                @enderror
                            </form>

                            <form class="mb-2" action="{{ route('pesquisa.data.inicial.final') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row gap-1">
                                    <label class="input-group-text mb-2 mb-md-0">Defina uma data "inicial" e uma "final":</label>

                                    <input style="width: 21%;" id="data_inicial" class="form-control" type="text" name="data_inicial" placeholder="DIA/MÊS/ANO" value="{{ old("data_inicial") }}">

                                    <input style="width: 21%;" id="data_final" class="form-control" type="text" name="data_final" placeholder="DIA/MÊS/ANO" value="{{ old("data_final") }}">

                                    <button class="botoes_pesquisar btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} mt-2 mt-md-0" type="submit">
                                        <i class="bi bi-search"></i>
                                        Pesquisar
                                    </button>
                                </div>

                                <div class="d-flex flex-column flex-md-row gap-1 mt-1">
                                    @error('data_inicial')
                                        <div class="alert alert-danger text-center flex-fill mb-0">
                                            {{ $message }}
                                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </div>
                                    @enderror

                                    @error('data_final')
                                        <div class="alert alert-danger text-center flex-fill mb-0">
                                            {{ $message }}
                                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                            </form>

                            <form style="margin-top: 12px;" action="{{ route('pesquisa.mes.inicial.final') }}" method="post">
                                @csrf
    
                                <div class="input-group flex-column flex-md-row gap-1">
                                    <label class="input-group-text mb-2 mb-md-0">Defina um mês "inicial" e um "final"(Cadastros):</label>
    
                                    <input style="width: 15%;" id="mes_inicial_cadastros" class="form-control" type="number" name="mes_inicial_cadastros" placeholder="00" value="{{ old("mes_inicial_cadastros") }}">
    
                                    <input style="width: 15%;" id="mes_final_cadastros" class="form-control" type="number" name="mes_final_cadastros" placeholder="00" value="{{ old("mes_final_cadastros") }}">
    
                                    <button class="botoes_pesquisar btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} mt-2 mt-md-0" type="submit">
                                        <i class="bi bi-search"></i>
                                        Pesquisar
                                    </button>
                                </div>
    
                                <div class="d-flex flex-column flex-md-row gap-1 mt-1">
                                    @error('mes_inicial_cadastros')
                                        <div class="alert alert-danger text-center flex-fill mb-0">
                                            {{ $message }}
                                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </div>
                                    @enderror
    
                                    @error('mes_final_cadastros')
                                        <div class="alert alert-danger text-center flex-fill mb-0">
                                            {{ $message }}
                                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="pesquisa_tabela" class="rounded-2 {{ Cache::get('tema') === 'escuro' ? "bg-dark" : "bg-secondary" }} border mx-1 mx-md-3 shadow overflow-auto">
                    <div class="table-responsive">
                        <table class="table table-hover {{ Cache::get('tema') === 'escuro' ? "table-dark" : "table-secondary" }} align-middle mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th class="border-end">N°</th>
                                    <th class="border-end">Nome</th>
                                    <th class="border-end">Usuario</th>
                                    <th class="border-end">Email</th>
                                    <th class="border-end">Data Nasc.</th>
                                    <th class="border-end">D/H Cad.</th>
                                    <th class="border-end">Celular</th>
                                    <th class="border-end">Gênero</th>
                                    <th>Permissão</th>
                                </tr>
                            </thead>

                            @if(session()->has("resultado"))                               
                                @forelse(session("resultado") as $usuario)
                                    <x-pesquisa_component :usuario="$usuario" :loop="$loop->index" />
                                @empty
                                    <tr class="text-center">
                                        <td colspan="9" class="{{ Cache::get('tema') === 'escuro' ? "bg-dark" : "bg-secondary" }}">NENHUM USUÁRIO ENCONTRADO</td>
                                    </tr>
                                @endforelse

                                {{ session()->forget("resultado") }}
                            @else
                                <tr class="text-center">
                                    <td colspan="9" class="{{ Cache::get('tema') === 'escuro' ? "bg-dark" : "bg-secondary" }}">REALIZE SUA PESQUISA</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection