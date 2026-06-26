![Laravel](https://img.shields.io/badge/Laravel-12-red)
![PHP](https://img.shields.io/badge/PHP-8.3-blue)
![License](https://img.shields.io/badge/license-MIT-green)
![Tests](https://img.shields.io/badge/tests-Passing-success)

# 🌐 Meu Projeto Padrão
- Status: 🟢 Concluído

---

## 📑 Índice

- Sobre
- Funcionalidades
- Stack
- Estrutura
- Demonstração
- Pré-Requisitos
- Instalação
- Variáveis
- Docker
- Deploy
- Roadmap
- Licença
- Autor

---

## 📜 Sobre

Aplicação web padrão com **Laravel**, com foco em:

- Funcionalidades mais frequêntes.

---

## ✨ Funcionalidades

- Cadastro, login, atualização, mudança de senha e exclusão de player.
- Listagens de usuários, logs e cards de usuários.
- Dashboard
- Pesquisa de usuários.
- Busca de endereço via API.
- Importação/Exportação de usuários usando Excel/PDF.
- Trilha sonora mudo/tocando via JS.
- Tema escuro/claro via sessão.

---

## 🧱 Stack

- **Backend:** PHP 8.3.30 + Laravel 12
- **Frontend build:** Vite + CSS/JS
- **Banco de dados:** MySQL 8
- **Testes:** PestPHP (Feature/Unit tests)
- **Containerização:** Docker

---

## 📁 Estrutura Principal

```text
app/
├── Exports/              # Classes de exportação. (Excel, PDF)
├── Http/
    ├── Controllers/      # Controladores da aplicação. (MainController, CadastroUpdate, etc.)
    └── Middleware/       # Regras de acesso.
├── Imports/              # Classes de importação. (Excel, PDF)
├── Models/               # Modelos Eloquent. (Usuario, Log)
├── Services/             # Regras de negócio auxiliares
└── View/
    └── Components/       # Classes de componentes Blade.
config/                   # Configurações gerais.
database/
├── factories/            # Geração de dados fictícios para testes e seeders. (UsuarioFactory, LogFactory)
├── migrations/           # Estrutura do banco.
└── seeders/              # População inicial do banco de dados. (DatabaseSeeder)
docs/                     # Imagens usadas pelo site. (Documentação do projeto)
public/
├── assets/
    ├── audios/           # Som usado pelo site. (Tema)
    ├── images/           # Imagens usadas pelo site (Fundos)
    └── js/               # Scripts carregados diretamente.
resources/
├── css/                  # Estilos personalizados.
└── views/                # Telas Blade.
routes/
└── web.php               # Rotas da aplicação.
tests/                    # Testes automatizados.
```

## 📸 Demonstração
| Tela Login | Tela Home |
|-------------|-----------|
| ![](docs/login.png) | ![](docs/home.png) |

---

## ✅ Pré-Requisitos

- PHP 8.3-
- Composer 2+
- Node.js 20+
- MySQL 8+

---

## 🚀 Como Rodar Localmente

1. Clone o projeto:

```bash
git clone <url-do-repositorio>
cd meu_projeto_padrao
```

2. Instale dependências PHP:

```bash
composer install
```

3. Instale dependências front-end:

```bash
npm install
```

4. Crie o arquivo de ambiente:

```bash
cp .env.example .env
```

5. Gere a chave da aplicação:

```bash
php artisan key:generate
```

6. Configure as variáveis de banco no `.env`.

7. Rode as migrations:

```bash
php artisan migrate
```

8. Rode as seeds:

```bash
php artisan db:seed
```

9. Suba o ambiente de desenvolvimento (server + queue + vite):
 
```bash
composer run dev
```

> O comando acima executa `php artisan serve`, `queue:listen` e `npm run dev` em paralelo.

---
 
## 🧪 Testes

Rodar suíte de testes:
 
```bash
php artisan test
```

Ou via Composer:
 
```bash
composer test
```
 
---

## ⚙️ Variáveis de Ambiente Importantes

Ajuste pelo menos:

- `APP_NAME`, `APP_ENV`, `APP_KEY`, `APP_DEBUG`, `APP_URL`
- `CACHE_STORE`
- `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- `LOG_CHANNEL`, `LOG_LEVEL`
- `QUEUE_CONNECTION`
- `SESSION_DRIVER`, `SESSION_HTTP_ONLY`, `SESSION_SECURE_COOKIE`

---

## 🐳 Docker

Este projeto possui `Dockerfile` para facilitar execução/deploy.

Exemplo de build e run:

```bash
docker build -t meu-projeto-padrao .
docker run -p 8080:8080 --env-file .env meu-projeto-padrao
```

Comando de start definido no container:

```bash
php artisan migrate --force && php artisan optimize && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
```

---

## ☁️ Deploy (Ex.: Railway)

Checklist recomendado:

1. Criar projeto usando o repositório do GitHub.
2. Criar e garantir que o banco MySQL esteja provisionado e acessível.
3. Configurar variáveis de ambiente de produção.
4. Rodar migrations e seeders no deploy (`php artisan migrate --force`, `php artisan db:seed --force`).
 
---

## 🗺️ Roadmap Técnico Sugerido (Melhorias)

- [ ] Nenhum.

---

## 📄 Licença

Este projeto está licenciado sob a licença MIT.

---

## 👨‍💻 Autor

Projeto desenvolvido por: **Luciano Eduardo Stefanello da Silva**.
