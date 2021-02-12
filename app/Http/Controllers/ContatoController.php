<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller {
    public function contato(Request $request) {
        
        $motivo_contatos = [
            "1" => 'Dúvida',
            "2" => 'Elogio',
            "3" => 'Reclamação',
        ];
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        // realizar a validação dos dados recebidos na request
        $request->validate([
            'nome' => 'required|min:3|max:40', // nomes com no mínomo 3 caracaters e no máximo 40           
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
        // SiteContato::create($request->all());
    }
}
