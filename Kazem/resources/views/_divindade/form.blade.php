@extends('template.admin')

@section('title', ucwords('Divindade'))

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">
                        {{ ucwords('Divindade') }}
                        <a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#example"
                            style="padding-left: 0.375em;"></a>
                    </h5>
                </div>

            </div>
        </div>

        @if (session('msg_sucesso'))
            <div class="alert alert-success">
                {{ session('msg_sucesso') }}
            </div>
        @endif

        <form action="{{ Request::url() }}" method="POST">
            @csrf
            <div class="card-body bg-light">
                <div class="tab-content container">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label" for="nome">Nome: </label>
                            <input class="form-control" id="nome" name="nome" required type="text" placeholder="Nome do {{ ucwords('Divindade') }}" value="{{ $model->nome }}">
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="alcunha">Alcunha: </label>
                            <input class="form-control" id="alcunha" name="alcunha" type="text" placeholder="Alcunha" value="{{ $model->alcunha }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label" for="dominios">Domínios: </label>
                            <input class="form-control" id="dominios" name="dominios" required type="text" placeholder="Dominios da {{ ucwords('Divindade') }}" value="{{ $model->dominios }}">
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="aspecto">Aspecto: </label>
                            <input class="form-control" id="aspecto" name="aspecto" type="text" placeholder="Aspecto" value="{{ $model->aspecto }}">
                        </div>
                    </div>

                    <div class="row">

                        <div class="mb-3 col-6">
                            <label class="form-label" for="alinhamento">Alinhamento: </label>
                            <select class="form-control" name="alinhamento" id="alinhamento">
                                <option @if($model->id_divindade == 0){{ "selected"}} @endif hidden >Selecione</option>
                                <option value='L/B' @if($model->alinhamento == 'L/B') {{ "selected"}} @endif >Leal e Bom</option>
                                <option value='L/N' @if($model->alinhamento == 'L/N') {{ "selected"}} @endif >Leal e Neutro</option>
                                <option value='L/M' @if($model->alinhamento == 'L/M') {{ "selected"}} @endif >Leal e Mal</option>
                                <option value='N/B' @if($model->alinhamento == 'N/B') {{ "selected"}} @endif >Neutro e Bom</option>
                                <option value='N/N' @if($model->alinhamento == 'N/N') {{ "selected"}} @endif >Neutro e Neutro</option>
                                <option value='N/M' @if($model->alinhamento == 'N/M') {{ "selected"}} @endif >Neutro e Mal</option>
                                <option value='C/B' @if($model->alinhamento == 'C/B') {{ "selected"}} @endif >Caótico e Bom</option>
                                <option value='C/N' @if($model->alinhamento == 'C/N') {{ "selected"}} @endif >Caótico e Neutro</option>
                                <option value='C/M' @if($model->alinhamento == 'C/M') {{ "selected"}} @endif >Caótico e Mal</option>
                            </select>    
                        </div>

                        <div class="mb-3 col-3">
                            <label class="form-label" for="posto">Posto: </label>
                            <select class="form-control" name="posto" id="posto">
                                <option hidden @if($model->id_divindade == 0){{ "selected"}} @endif hidden >Selecione</option>
                                <option value='Menor' @if($model->posto == 'menor') {{ "selected"}} @endif >Menor</option>
                                <option value='Intermediario' @if($model->posto == 'intermediario') {{ "selected"}} @endif >Intermediário</option>
                                <option value='Maior' @if($model->posto == 'maior') {{ "selected"}} @endif >Maior</option>
                            </select>    
                        </div>

                        <div class="mb-3 col-3">
                            <label class="form-label" for="arma_predileta">Arma Predileta: </label>
                            <input class="form-control" id="arma_predileta" name="arma_predileta" type="text" placeholder="Arma predileta" value="{{ $model->arma_predileta }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label" for="Descrição">Descrição: </label>
                            <textarea class="form-control" id="descricao" rows=10 name="descricao"> {!! $model->descricao !!}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light col-12 mb-3">
                  <input type="submit" class="btn btn-primary float-end " value="Salvar" />
                </div>

            </div>
        </form>
    </div>

@endsection
