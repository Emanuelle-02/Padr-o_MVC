<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CadidatosController extends Controller
{
    public function cadastrarCandidato(Request $request){
        $nome_candidato = $request->input('nome_candidato');
        $nome_partido = $request->input('nome_partido');
        $numero_vot = $request->input('numero_vot');

        DB::table('candidatos')->insert([
            'nome' => $nome_candidato,
            'partido' => $nome_partido,
            'número' => $numero_vot,
            'votos' => 0
        
        ]);

        return view('criar_candidato');

    }
    //checa se o usuário está logado e se eh_admin. Se for, pode inserir candidatos no sistema, se não, terá o acesso negado.
    public function criar_candidato(){
        if(Auth::check() && Auth::user()->eh_admin){
            return view('criar_candidato');
        }
        else{
            return \redirect('home')->with('flashWarning', 'Você não tem permissão para acessar essa página!');
        }
    }
}
