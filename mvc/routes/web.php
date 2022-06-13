<?php

use App\Http\Controllers\CadidatosController;
use App\Http\Controllers\registrarVotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gerarRelatorioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
    //return view("home");
});
*/
/*Route::get('/home', function () {

    return view("home");

})->name('home');*/
                                                                         
Route::get('home',[registrarVotoController::class,'home'])->name('home');

Route::get('/criar_candidato', [CadidatosController::class, 'criar_candidato'])->name('criar_candidato'); 

Route::post('/cadastrarCandidato', [CadidatosController::class, 'cadastrarCandidato'])->name('cadastrarCandidato'); 

Route::get('/registrarVotoView', [registrarVotoController::class, 'paginaVotacao'])->name('paginaVotacao');
                                                                                                                //protege a página contra usuários não logados 
Route::post('/registrarVotoController', [registrarVotoController::class, 'registrarVoto'])->name('registrarVoto')->middleware('auth');

Route::get('/gerarRelatorio', [gerarRelatorioController::class, 'pdf'])->name('gerarRelatorio')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
