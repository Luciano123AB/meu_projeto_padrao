<div id="cards_efeito" class="col mt-3 mb-1">
    <div class="card h-100 border-2 border-black shadow">
        <div class="row g-0">
            <div class="col-md-4 bg-light d-flex justify-content-center align-items-center p-2 border-end rounded-1">
                <img src="data:image/png;base64,{{ $usuario->foto }}" alt="Foto de {{ $usuario->nome_completo }}" class="usuarios_fotos img-fluid rounded-circle border border-black">
            </div>

            <div class="col-md-8">
                <div class="card-body p-2">
                    <h5 class="card-title text-center mb-3">Informações</h5>
                    
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-person me-1"></i>Nome:
                            </strong>
                            {{ $usuario->nome_completo }}
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-person-circle me-1"></i>Login:
                            </strong>
                            {{ $usuario->usuario }}
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-envelope-at me-1"></i>Email:
                            </strong>
                            {{ $usuario->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-key me-1"></i>Senha:
                            </strong>
                            *****
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-file-earmark-medical me-1"></i>CPF:
                            </strong>
                            ***.***.***-**
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-calendar-date me-1"></i>Nascimento:
                            </strong>
                            {{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-telephone me-1"></i>Celular:
                            </strong>
                            {{ $usuario->celular }}
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-gender-ambiguous me-1"></i>Gênero:
                            </strong>
                            {{ $usuario->genero }}
                        </li>
                        <li class="list-group-item">
                            <strong>
                                <i class="bi bi-hand-thumbs-up me-1"></i>Permissão:
                            </strong>                                                            
                            @if($usuario->permissao == 1)
                                <span class="badge bg-success">SIM</span>
                            @else
                                <span class="badge bg-danger">NÃO</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>