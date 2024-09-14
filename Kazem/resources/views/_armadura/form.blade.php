@extends('template.admin')

@section('title', ucwords('Armadura'))

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">
                        {{ ucwords('Armadura') }}
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
                        <div class="mb-3 col-12">
                            <label class="form-label" for="nome">Nome: </label>
                            <input class="form-control" id="nome" name="nome" required type="text" placeholder="Nome da {{ ucwords('Armadura') }}" value="{{ $model->nome }}">
                        </div>

                        

                    </div>

                    <div class="row">
                        <div class="mb-3 col-2">
                            <label class="form-label" for="ca">CA: </label>
                            <input class="form-control" id="ca" name="ca" required type="text" placeholder="Valor da CA" value="{{ $model->ca }}">
                        </div>

                        <div class="mb-3 col-2">
                            <label class="form-label" for="valor">Valor: </label>
                            <input class="form-control" id="valor" name="valor" required type="text" placeholder="Valor" value="{{ $model->valor }}">
                        </div>

                        <div class="mb-3 col-2">
                            <label class="form-label" for="unidade">Unidades: </label>
                            <select class="form-control" name="unidade" id="unidade">
                                <option @if($model->id_arma == 0){{ "selected"}} @endif hidden >Selecione</option>
                                <option value='PC' @if($model->unidade == 'PC') {{ "selected"}} @endif >PC</option>
                                <option value='PP' @if($model->unidade == 'PP') {{ "selected"}} @endif >PP</option>
                                <option value='PO' @if($model->unidade == 'PO') {{ "selected"}} @endif >PO</option>
                                <option value='PL' @if($model->unidade == 'PL') {{ "selected"}} @endif >PL</option>
                            </select>
                        </div>

                        <div class="mb-3 col-2">
                            <label class="form-label" for="forca_necessaria">Mínimo de Força: </label>
                            <input class="form-control" id="forca_necessaria" name="forca_necessaria" type="text" placeholder="Forca Necessaria" value="{{ $model->forca_necessaria }}">
                        </div>

                        <div class="mb-3 col-2">
                            <label class="form-label" for="tipo">Furtividade: </label>
                            <select class="form-control" name="desv_furtividade" id="desv_furtividade">
                                <option @if($model->id_arma == 0){{ "selected"}} @endif hidden >Selecione</option>
                                <option value='S' @if($model->tipo == 'S') {{ "selected"}} @endif >Desvantagem</option>
                                <option value='N' @if($model->tipo == 'N') {{ "selected"}} @endif >Normal</option>
                            </select>
                        </div>


                        <div class="mb-3 col-2">
                            <label class="form-label" for="peso">Peso: </label>
                            <input class="form-control" id="peso" name="peso" required type="text" placeholder="Peso (em kg) da {{ ucwords('Arma') }}" value="{{ $model->peso }}">
                            </select>
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
