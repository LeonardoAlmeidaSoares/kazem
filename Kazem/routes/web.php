<?php

use App\Http\Controllers\BuscaController;
use App\Http\Controllers\IAController;
use App\Livewire\FichaPersonagem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\ContinenteController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\PersonagemController;
use App\Http\Controllers\ProficienciaController;
use App\Http\Controllers\TalentoController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\EscolaMagiaController;
use App\Http\Controllers\MagiaController;
use App\Http\Controllers\ArmaController;
use App\Http\Controllers\ArmaduraController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\DivindadeController;
use App\Http\Controllers\EspecializacaoController;
use App\Http\Controllers\OrganizacaoController;
use App\Http\Controllers\DashboardController;

Route::get('/generate-image', [IAController::class, 'generateImage']);
Route::get('/personagem/ficha/{id}', FichaPersonagem::class);

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('dashboard-escudo', 'escudo');
});

Route::controller(BuscaController::class)->group(function () {
    Route::post('busca', 'index');
});

Route::controller(PersonagemController::class)->group(function () {
    Route::get('personagem', 'index');
    Route::post('atualizar-imagem','atualizarImagem');
});

Route::controller(RacaController::class)->group(function () {
    Route::get('raca', 'index');
    Route::match(['get', 'post'], 'raca/form/{id}', 'form');

    Route::get('racavariante/{id}', 'variacao');
    Route::match(['get', 'post'], 'racavariante/{idRaca}/{id}', 'varianteform');
});

Route::controller(ContinenteController::class)->group(function () {
    Route::get('continente', 'index');
    Route::match(['get', 'post'], 'continente/form/{id}', 'form');
});

Route::controller(ClasseController::class)->group(function () {
    Route::get('classe', 'index');
    Route::match(['get', 'post'], 'classe/form/{id}', 'form');
});

Route::controller(CidadeController::class)->group(function () {
    Route::get('cidade', 'index');
    Route::match(['get', 'post'], 'cidade/form/{id}', 'form');
});

Route::controller(JogadorController::class)->group(function () {
    Route::get('jogador', 'index');
    Route::match(['get', 'post'], 'jogador/form/{id}', 'form');
});

Route::controller(AntecedenteController::class)->group(function () {
    Route::get('antecedente', 'index');
    Route::match(['get', 'post'], 'antecedente/form/{id}', 'form');
});

Route::controller(TalentoController::class)->group(function () {
    Route::get('talento', 'index');
    Route::match(['get', 'post'], 'talento/form/{id}', 'form');
});

Route::controller(IdiomaController::class)->group(function () {
    Route::get('idioma', 'index');
    Route::match(['get', 'post'], 'idioma/form/{id}', 'form');
});

Route::controller(EscolaMagiaController::class)->group(function () {
    Route::get('escolamagia', 'index');
    Route::match(['get', 'post'], 'escolamagia/form/{id}', 'form');
});

Route::controller(MagiaController::class)->group(function () {
    Route::get('magia', 'index');
    Route::match(['get', 'post'], 'magia/form/{id}', 'form');
});

Route::controller(ArmaController::class)->group(function () {
    Route::get('arma', 'index');
    Route::match(['get', 'post'], 'arma/form/{id}', 'form');
});

Route::controller(ArmaduraController::class)->group(function () {
    Route::get('armadura', 'index');
    Route::match(['get', 'post'], 'armadura/form/{id}', 'form');
});

Route::controller(EquipamentoController::class)->group(function () {
    Route::get('equipamento', 'index');
    Route::match(['get', 'post'], 'equipamento/form/{id}', 'form');
});

Route::controller(DivindadeController::class)->group(function () {
    Route::get('divindade', 'index');
    Route::match(['get', 'post'], 'divindade/form/{id}', 'form');
});

Route::controller(OrganizacaoController::class)->group(function () {
    Route::get('organizacao', 'index');
    Route::match(['get', 'post'], 'organizacao/form/{id}', 'form');
});

Route::controller(EspecializacaoController::class)->group(function () {
    Route::get('especializacao', 'index');
    Route::match(['get', 'post'], 'especializacao/form/{id}', 'form');
});

Route::controller(ProficienciaController::class)->group(function () {
    Route::get('proficiencia', 'index');
    Route::match(['get', 'post'], 'proficiencia/form/{id}', 'form');
});

Route::get('/ia/send', [IAController::class, 'sendMessage']);
Route::get('/kazemTalk', [IAController::class, 'continueConversation']);
