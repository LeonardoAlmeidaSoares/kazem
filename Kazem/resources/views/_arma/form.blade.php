@extends('template.admin')

@section('title', ucwords('Arma'))

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">
                        {{ ucwords('Arma') }}
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
                            <input class="form-control" id="nome" name="nome" required type="text" placeholder="Nome do {{ ucwords('Arma') }}" value="{{ $model->nome }}">
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="tipo">Tipo: </label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option @if($model->id_arma == 0){{ "selected"}} @endif hidden >Selecione</option>
                                <option value='Concussão' @if($model->tipo == 'Concussão') {{ "selected"}} @endif >Concussão</option>
                                <option value='Corte' @if($model->tipo == 'Corte') {{ "selected"}} @endif >Corte</option>
                                <option value='Perfuração' @if($model->tipo == 'Perfuração') {{ "selected"}} @endif >Perfuração</option>
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="mb-3 col-2">
                            <label class="form-label" for="valor">Valor: </label>
                            <input class="form-control" id="valor" name="valor" required type="text" placeholder="Valor da {{ ucwords('Arma') }}" value="{{ $model->valor }}">
                        </div>

                        <div class="mb-3 col-2">
                            <label class="form-label" for="unidade">Tipo: </label>
                            <select class="form-control" name="unidade" id="unidade">
                                <option @if($model->id_arma == 0){{ "selected"}} @endif hidden >Selecione</option>
                                <option value='PC' @if($model->unidade == 'PC') {{ "selected"}} @endif >PC</option>
                                <option value='PP' @if($model->unidade == 'PP') {{ "selected"}} @endif >PP</option>
                                <option value='PO' @if($model->unidade == 'PO') {{ "selected"}} @endif >PO</option>
                                <option value='PL' @if($model->unidade == 'PL') {{ "selected"}} @endif >PL</option>
                            </select>
                        </div>

                        <div class="mb-3 col-2">
                            <label class="form-label" for="dano">Dano: </label>
                            <input class="form-control" id="dano" name="dano" required type="text" placeholder="Valor de dano da {{ ucwords('Arma') }}" value="{{ $model->dano }}">
                            </select>
                        </div>

                        <div class="mb-3 col-2">
                            <label class="form-label" for="peso">Peso: </label>
                            <input class="form-control" id="peso" name="peso" required type="text" placeholder="Peso (em kg) da {{ ucwords('Arma') }}" value="{{ $model->peso }}">
                            </select>
                        </div>

                        <div class="mb-3 col-4">
                            <label class="form-label" for="propriedades">Propriedades: </label>
                            <input class="form-control" id="propriedades" name="propriedades" required type="text" placeholder="Propriedades da {{ ucwords('Arma') }}" value="{{ $model->propriedades }}">
                            </select>
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
