<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use candidatosController;
use registrarVotoController;
use Auth;

class gerarRelatorioController extends Controller
{
    public function gerarRelatorio()
    {
        $candidatos_data = $this->get_candidatos_data();
        return view('gerarRelatorio')->with('candidatos_data', $candidatos_data);
    }
    
    public function get_candidatos_data(){
        $candidatos_data = DB::table('candidatos')
                        ->limit(200)
                        ->get();
        return $candidatos_data;
    }

    function pdf()
    {
    if(Auth::check() && Auth::user()->eh_admin){
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_candidatos_data_to_html());
     return $pdf->stream();
    }
    else{
        return \redirect('home')->with('flashWarning','Você não tem permissão para acessar essa página!');
    }
    }

    function convert_candidatos_data_to_html()
    {
        $candidatos_data = $this->get_candidatos_data();
        $output = '
        <h4>S.U.E - Sistema de Urna Eletrônica</h4>
        <h2 align="center">Relatório</h2>
        <h3>Dados da Eleição - Candidatos</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
            <th style="border: 1px solid; padding:12px;" width="15%">Nome</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Partido</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Número</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Quantidade de Votos</th>
        </tr>
     ';  
     foreach($candidatos_data as $candidato)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$candidato->nome.'</td>
       <td style="border: 1px solid; padding:12px;">'.$candidato->partido.'</td>
       <td style="border: 1px solid; padding:12px;">'.$candidato->número.'</td>
       <td style="border: 1px solid; padding:12px;">'.$candidato->votos.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }

}
