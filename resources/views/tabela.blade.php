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
                    <th style="width: 10%;" class="col bg-body-secondary border-start border-top border-bottom border-black"></th>
                    <th style="width: 1%;" class="col bg-body-secondary border-start border-end border-black">N°</th>
                    <th class="col bg-body-secondary border-end border-black">Nome</th>
                    <th class="col bg-body-secondary border-end border-black">Usuario</th>
                    <th class="col bg-body-secondary border-end border-black">Email</th>
                    <th class="col bg-body-secondary border-end border-black">Senha</th>
                    <th class="col bg-body-secondary border-end border-black">CPF</th>
                    <th style="width: 6%;" class="col bg-body-secondary border-end border-black">Data Nasc.</th>
                    <th class="col bg-body-secondary border-end border-black">Celular</th>
                    <th class="col bg-body-secondary border-end border-black">Gênero</th>                    
                    <th style="width: 4%;" class="col bg-body-secondary border-end border-black">Permissão</th>
                </tr>
            </thead>
            
            <tbody>
                @if(session("usuario.usuario") == "Administrador")                   
                    @forelse($usuarios as $usuario)
                        <tr class="row-cols-7">
                            <th class="col text-center border-start border-end">
                                <a href="{{ route("update", ["id" => Crypt::encrypt($usuario->id)]) }}" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="editar" class="btn btn-primary btn-sm icon-link icon-link-hover focus-ring focus-ring-primary my-1 me-1" type="button"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>Editar</a>
                                
                                <a href="{{ route("deletar", ["id" => Crypt::encrypt($usuario->id)]) }}" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="excluir" class="btn btn-danger btn-sm icon-link icon-link-hover focus-ring focus-ring-danger" type="button"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg>Excluir</a>
                            </th>
                            <td class="col text-center fw-bold border-end">{{ $loop->iteration }}</td>
                            <td class="col border-end">{{ $usuario->nome_completo }}</td>
                            <td class="col border-end">{{ $usuario->usuario }}</td>
                            <td class="col border-end">{{ $usuario->email }}</td>
                            <td class="col text-center border-end">{{ "*****" }}</td>
                            <td class="col text-center border-end">{{ "***.***.***.**" }}</td>
                            <td class="col text-center border-end">{{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</td>
                            <td class="col text-center border-end">{{ $usuario->celular }}</td>
                            <td class="col text-center border-end">{{ $usuario->genero }}</td>
                            @if($usuario->permissao == 1)
                                <td class="col text-center border-end"><a href="#" id="permissao" class="btn btn-success btn-sm focus-ring focus-ring-success" type="button">SIM</a></td>
                            @else
                                <td class="col text-center border-end"><a href="#" id="permissao" class="btn btn-danger btn-sm focus-ring focus-ring-danger" type="button">NÃO</a></td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center fw-bold border">NENHUM USUÁRIO ENCONTRADO!</td>
                        </tr>
                    @endforelse
                @else
                    @forelse($usuarios as $usuario)
                        <tr class="row-cols-7">
                            <th class="col text-center border-start border-end"></th>
                            <td class="col text-center fw-bold border-end">{{ $loop->iteration }}</td>
                            <td class="col border-end">{{ $usuario->nome_completo }}</td>
                            <td class="col border-end">{{ $usuario->usuario }}</td>
                            <td class="col border-end">{{ $usuario->email }}</td>
                            <td class="col text-center border-end">{{ "*****" }}</td>
                            <td class="col text-center border-end">{{ "***.***.***.**" }}</td>
                            <td class="col text-center border-end">{{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</td>
                            <td class="col text-center border-end">{{ $usuario->celular }}</td>
                            <td class="col text-center border-end">{{ $usuario->genero }}</td>
                            @if($usuario->permissao == 1)
                                <td class="col text-center border-end"><button class="btn btn-success btn-sm" disabled>SIM</button></td>
                            @else
                                <td class="col text-center border-end"><button class="btn btn-danger btn-sm" disabled>NÃO</button></td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center fw-bold border">NENHUM USUÁRIO ENCONTRADO!</td>
                        </tr>
                    @endforelse
                @endif
            </tbody>
        </table>
    </div>
@endsection