<?php

namespace App\Http\Controllers;
use candidatosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class registrarVotoController extends Controller
{
    public function home(){
        $candidatos = DB::table('candidatos')->get();
        return view('home',['candidatos'=> $candidatos]);
    }

    public function paginaVotacao(){
        //checa se um usário está logado. Se não estiver, é redirecionado para página de cadastro    
        if(!Auth::check()){
            return \redirect('/register');
        }//checa se o eleitor já votou. Se não votou, é direcionado para página de votação
        else if(!Auth::user()->ja_votou){
            $candidatos = DB::table('candidatos')->get();
            return view('registrarVotoView',['candidatos'=> $candidatos]);
        }//atribui deadline a votação 
        /*else if(now() > date('2022-06-13 18:00:00')){
            return \redirect('home')->with('flashWarning','Você não pode mais votar! A votação foi encerrada dia 13 de junho às 17:00:00');
        }*/
        else{
            //se já votou
            return \redirect('home')->with('flashWarning','Você já votou!');
        }
        
    }

    public function registrarVoto(Request $request){
        $candidatoId = $request->input('candidatoId');
        
        //incrementar número de votos
        DB::table('candidatos')->where('id',$candidatoId)
                ->update([
                    'votos'=>DB::raw("votos + 1")
                ]);
        
        // muda o valor de ja_votou de 0 para 1 quando o eleitor clicar em confirmar o voto.
        DB::table('users')->where('id',Auth::user()->id)
                    ->update([
                        'ja_votou'=>1
                    ]);

        //return view('home');
        return \redirect('home')->with('flashMessage','FIM! Seu voto foi registrado.');
    }
}
