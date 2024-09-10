<?php

use App\Http\Controllers\BuscaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\ContinenteController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\PersonagemController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(BuscaController::class)->group(function () {
    Route::post('busca', 'index');
});

Route::controller(PersonagemController::class)->group(function () {
    Route::get('personagem', 'index');
    Route::match(['get', 'post'], 'personagem/form/{id}', 'form');
    Route::get('personagem/ficha/{id}', 'ficha');
});

Route::controller(RacaController::class)->group(function () {
    Route::get('raca', 'index');
    Route::match(['get', 'post'], 'raca/form/{id}', 'form');
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

use App\Http\Controllers\TalentoController;

Route::controller(TalentoController::class)->group(function () {
    Route::get('talento', 'index');
    Route::match(['get', 'post'], 'talento/form/{id}', 'form');
});

use App\Http\Controllers\IdiomaController;

Route::controller(IdiomaController::class)->group(function () {
    Route::get('idioma', 'index');
    Route::match(['get', 'post'], 'idioma/form/{id}', 'form');
});

use App\Http\Controllers\EscolaMagiaController;

Route::controller(EscolaMagiaController::class)->group(function () {
    Route::get('escolamagia', 'index');
    Route::match(['get', 'post'], 'escolamagia/form/{id}', 'form');
});

use App\Http\Controllers\MagiaController;

Route::controller(MagiaController::class)->group(function () {
    Route::get('magia', 'index');
    Route::match(['get', 'post'], 'magia/form/{id}', 'form');
});