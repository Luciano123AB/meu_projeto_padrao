<ul id="sidebar" class="col-12 col-md-2 bg-white border border-md-end border-black overflow-auto py-2" style="max-height: calc(100vh - 70px); transition: transform 0.3s ease; z-index: 1100;">
    <h6 class="fw-bold border-bottom border-black py-1">OPÇÕES:</h6>

    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
                        
        <a href="{{ route("home") }}" class="link-secondary text-decoration-none">Página Home</a>
    </li>
    <br>
                
    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
                        
        <a href="{{ route("tabela") }}" class="link-secondary text-decoration-none">Tabela de Usuários</a>
    </li>
    <br>
                    
    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
                        
        <a href="{{ route("cards") }}" class="link-secondary text-decoration-none">Cards de Usuários</a>
    </li>
    <br>
                    
    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
                        
        <a href="{{ route("dashboard") }}" class="link-secondary text-decoration-none">Dashboard</a>
    </li>
    <br>
                    
    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
                        
        <a href="{{ route("pesquisa") }}" class="link-secondary text-decoration-none">Pesquisa de Usuários</a>
    </li>
    <br>
                    
    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
                        
        <a href="{{ route("logs", ["id" => Crypt::encrypt(session("usuario.id"))]) }}" class="link-secondary text-decoration-none">Logs</a>
    </li>
    <br>
                    
    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
        </svg>
                        
        <a href="{{ route("importarExportar") }}" class="link-secondary text-decoration-none">Importar / Exportar</a>
    </li>
</ul>

<div id="overlay" style="position: fixed; top:0; left:0; width:100%; height:100%; background-color: rgba(0,0,0,0.5); display:none; z-index:1050;"></div>