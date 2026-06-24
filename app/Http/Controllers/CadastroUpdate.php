<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CadastroUpdate
{
    public function cadastroSubmit(Request $request): RedirectResponse {
        $request->validate([
            'nome' => 'required|min:1|max:80',
            'usuario' => 'required|min:6|max:30',
            'email' => 'required|email',
            'senha' => 'required|min:8|max:64|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).+$/',
            'confirmar_senha' => 'required|same:senha',
            'cpf' => 'required',
            'data' => 'required',
            'celular' => 'required|min:14',
            'genero' => 'required',
            'foto' => 'max:10485760'
        ],
        
        [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter pelo menos :min caractere.',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres.',
            'usuario.required' => 'O campo usuário é obrigatório.',
            'usuario.min' => 'O campo usuário deve ter pelo menos :min caracteres.',
            'usuario.max' => 'O campo usuário deve ter no máximo :max caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.min' => 'O campo senha deve ter pelo menos :min caracteres.',
            'senha.max' => 'O campo senha deve ter no máximo :max caracteres.',
            'senha.regex' => 'A senha deve conter pelo menos um caractere especial, uma letra maiúscula, uma letra minúscula e um número.',
            'confirmar_senha.required' => 'O campo confirmar senha é obrigatório.',
            'confirmar_senha.same' => 'As senhas não coincidem.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'data.required' => 'O campo data de nascimento é obrigatório.',
            'celular.required' => 'O campo celular é obrigatório.',
            'celular.min' => 'O campo celular deve ter pelo menos :min caracteres.',
            'genero.required' => 'O campo gênero é obrigatório.',
            'foto.max' => 'O campo foto deve ter no máximo 10MB.'
        ]);

        $nome_usuario = $request->input('usuario');
        $email = $request->input('email');
        $cpf = $request->input('cpf');
        $celular = $request->input('celular');
        $foto_escolhida = $request->file('foto');

        if (!Operacoes::validarCPF($cpf)) {
            return redirect()->back()->withInput()->with('cpfErro', 'CPF inválido.');
        }

        $usuario = Usuario::where('usuario', $nome_usuario)
                          ->where('email', $email)
                          ->where('cpf', $cpf)
                          ->where('celular', $celular)
                          ->where('deleted_at', NULL)->first();

        if ($usuario) {
            return redirect()->back()->withInput()->with('usuarioExiste', 'Esse usuário já está cadastrado.');
        }

        $foto = 'vazio.png';

        if ($foto_escolhida && $foto_escolhida->isValid()) {
            if ($foto_escolhida->getSize() > 10485760) {
                return redirect()->back()->withInput()->with('fotoTamanho', 'Essa foto é muito grande.');
            }

            $foto_conteudo = file_get_contents($foto_escolhida->getRealPath());

            if (!$foto_conteudo) {
                return redirect()->back()->withInput()->with('fotoErro', 'Não foi possível carregar esta foto. Tente novamente.');
            }

            $foto = strtolower($nome_usuario) . '.png';

            Storage::disk('fotos')->put($foto, $foto_conteudo);
        }

        $usuario = new Usuario();
        $usuario->nome_completo = $request->input('nome');
        $usuario->usuario = $nome_usuario;
        $usuario->email = $email;
        $usuario->senha = Hash::make($request->input('senha'));
        $usuario->cpf = $cpf;
        $usuario->data_nascimento = Carbon::createFromFormat('d/m/Y', $request->input('data'))->format('Y-m-d');
        $usuario->celular = $celular;
        $usuario->genero = $request->input('genero');
        $usuario->foto = $foto;
        $usuario->permissao = 0;
        $usuario->ultimo_acesso = null;
        $usuario->created_at = Carbon::now();
        $usuario->save();

        if ($usuario) {

            $cor = 'info';

            if (session('tema') == 'escuro') {

                $cor = 'secondary';

            }

            return redirect()->route('login')->with('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso!',
                'text' => 'Usuário cadastrado com êxito! Faça login para continuar.',
                'cor' => "$cor"
            ]);
        }

        $cor = 'danger';

        if (session('tema') == 'escuro') {

            $cor = 'dark';

        }

        return redirect()->back()->withInput()->with('alerta', [
            'icon' => 'error',
            'title' => 'Erro!',
            'text' => 'Erro ao cadastrar o usuário! Tente novamente.',
            'cor' => "$cor"
        ]);
    }

    public function updateSubmit(Request $request): RedirectResponse {

        $id = Operacoes::decryptId($request->input('id'));

        $request->validate([
            'nome' => 'required|min:1|max:80',
            'usuario' => [
                'required',
                'min:6',
                'max:30',
                Rule::unique('usuarios')->ignore($id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('usuarios')->ignore($id)
            ],
            'celular' => [
                'required',
                'min:14',
                Rule::unique('usuarios')->ignore($id)
            ],
            'foto' => 'max:10485760'
        ],
        
        [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter pelo menos :min caractere.',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres.',
            'usuario.required' => 'O campo usuário é obrigatório.',
            'usuario.min' => 'O campo usuário deve ter pelo menos :min caracteres.',
            'usuario.max' => 'O campo usuário deve ter no máximo :max caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'celular.required' => 'O campo celular é obrigatório.',
            'celular.min' => 'O campo celular deve ter pelo menos :min caracteres.',
            'foto.max' => 'O campo foto deve ter no máximo 10MB.'
        ]);
        
        $novo_usuario = Usuario::find($id);
        $usuario = $request->input('usuario');
        $foto_escolhida = $request->file('foto');
        $foto = 'vazio.png';

        if ($foto_escolhida && $foto_escolhida->isValid()) {
            if ($foto_escolhida->getSize() > 10485760) {
                return redirect()->back()->withInput()->with('fotoTamanho', 'Essa foto é muito grande.');
            }

            $foto_conteudo = file_get_contents($foto_escolhida->getRealPath());

            if (!$foto_conteudo) {
                return redirect()->back()->withInput()->with('fotoErro', 'Não foi possível carregar esta foto. Tente novamente');
            }

            $foto = strtolower($usuario) . '.png';

            if (Storage::disk('fotos')->exists($novo_usuario->foto) && $novo_usuario->foto !== 'vazio.png') {
                Storage::disk('fotos')->delete($novo_usuario->foto);
            }

            Storage::disk('fotos')->put($foto, $foto_conteudo);
        } elseif ($novo_usuario->foto === 'vazio.png') {
            Storage::disk('fotos')->delete(strtolower($novo_usuario->usuario) . '.png');
        }

        $novo_usuario->nome_completo = $request->input('nome');
        $novo_usuario->usuario = $usuario;
        $novo_usuario->email = $request->input('email');
        $novo_usuario->celular = $request->input('celular');
        $novo_usuario->foto = $foto;
        $novo_usuario->updated_at = Carbon::now();
        $novo_usuario->save();

        if ($novo_usuario) {

            $cor = 'info';

            if (session('tema') == 'escuro') {

                $cor = 'secondary';

            }

            return redirect()->route('home')->with('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso!',
                'text' => 'Usuário atualizado com êxito!',
                'cor' => "$cor"
            ]);
        }

        $cor = 'danger';

        if (session('tema') == 'escuro') {

            $cor = 'dark';

        }

        return redirect()->back()->withInput()->with('alerta', [
            'icon' => 'error',
            'title' => 'Erro!',
            'text' => 'Falha ao atualizar o usuário! Tente novamente.',
            'cor' => "$cor"
        ]);
    }

    public function mudarSenhaSubmit(Request $request): RedirectResponse {
        $request->validate([
            'senha_atual' => 'required',
            'senha' => [
                'required',
                'min:8',
                'max:64',
                'regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).+$/',
                Rule::unique('usuarios')->ignore(Auth::user()->id)
            ],
            'confirmar_senha' => 'required|same:senha'
        ],
        
        [
            'senha_atual.required' => 'O campo senha atual é obrigatório.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.min' => 'O campo senha deve ter pelo menos :min caracteres.',
            'senha.max' => 'O campo senha deve ter no máximo :max caracteres.',
            'senha.regex' => 'A senha deve conter pelo menos um caractere especial, uma letra maiúscula, uma letra minúscula e um número.',
            'confirmar_senha.required' => 'O campo confirmar senha é obrigatório.',
            'confirmar_senha.same' => 'As senhas não coincidem.'
        ]);

        if (!Hash::check($request->input('senha_atual'), Auth::user()->senha)) {
            return redirect()->back()->withInput()->with('senhaInvalida', 'A senha atual está incorreta.');
        }

        $usuario = Usuario::find(Auth::user()->id);

        $usuario->senha = Hash::make($request->input('senha'));
        $usuario->updated_at = Carbon::now();
        $usuario->save();

        if ($usuario) {

            $cor = 'info';

            if (session('tema') == 'escuro') {

                $cor = 'secondary';

            }

            return redirect()->route('home')->with('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso!',
                'text' => 'Senha atualizada com êxito!',
                'cor' => "$cor"
            ]);
        }

        $cor = 'danger';

        if (session('tema') == 'escuro') {

            $cor = 'dark';

        }

        return redirect()->back()->withInput()->with('alerta', [
            'icon' => 'error',
            'title' => 'Erro!',
            'text' => 'Falha ao atualizar a senha! Tente novamente.',
            'cor' => "$cor"
        ]);
    }
}
