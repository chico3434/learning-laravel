<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller {
    public function contato(Request $request) {
        
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        // realizar a validação dos dados recebidos na request
        $request->validate(
            [
                'nome' => 'required|min:3|max:40', // nomes com no mínomo 3 caracaters e no máximo 40           
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
            ],
            [
                'nome.required' => 'O campo nome precisa ser preenchido',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'telefone.required' => 'O campo telefone precisa ser preenchido',
                'email.email' => 'O campo email precisa ter um email válido',
                'motivo_contatos_id.required' => 'O motivo do contado deve ser selecionado',
                'mensagem.required' => 'É necessário digitar a mensagem',
                'mensagem.max' => 'A mensagem não pode ter mais de 2000 caracteres',
            ]
        );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
