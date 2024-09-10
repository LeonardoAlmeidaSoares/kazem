@extends('template.admin')

@section('title', ucwords('Magia'))

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">
                        {{ ucwords('Magia') }}
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
                            <input class="form-control" id="nome" name="nome" required type="text" placeholder="Nome da Magia" value="{{ $model->nome }}">
                        </div>

                        <div class="mb-3 col-3">
                            <label class="form-label" for="nome">Escola de Magia: </label>
                            <select class="form-control" name="id_escola_magia" id="id_escola_magia">
                            @foreach($escolas as $item)
                                <option value={{ $item->id_escola_magia}} @if($model->id_escola_magia == $item->id_escola_magia) {{ "selected"}} @endif >
                                    {{ $item->nome }}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-3">
                            <label class="form-label" for="nivel">Nível: </label>
                            <select class="form-control" name="nivel" id="nivel">
                                <option value=0 @if($model->nivel == 0) {{ "selected"}} @endif >0</option>
                                <option value=1 @if($model->nivel == 1) {{ "selected"}} @endif >1</option>
                                <option value=2 @if($model->nivel == 2) {{ "selected"}} @endif >2</option>
                                <option value=3 @if($model->nivel == 3) {{ "selected"}} @endif >3</option>
                                <option value=4 @if($model->nivel == 4) {{ "selected"}} @endif >4</option>
                                <option value=5 @if($model->nivel == 5) {{ "selected"}} @endif >5</option>
                                <option value=6 @if($model->nivel == 6) {{ "selected"}} @endif >6</option>
                                <option value=7 @if($model->nivel == 7) {{ "selected"}} @endif >7</option>
                                <option value=8 @if($model->nivel == 8) {{ "selected"}} @endif >8</option>
                                <option value=9 @if($model->nivel == 9) {{ "selected"}} @endif >9</option>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="nome">Componentes: </label>
                            <input class="form-control" id="componentes" name="componentes" type="text" placeholder="Componentes da Magia" value="{{ $model->componentes }}">
                        </div>

                        <div class="mb-3 col-3">
                            <label class="form-label" for="nivel">Tipo da Magia: </label>
                            <select class="form-control" name="tipo_magia" id="tipo_magia">
                                <option value='A' @if($model->tipo_magia == 'A') {{ "selected"}} @endif >Arcana</option>
                                <option value='D' @if($model->tipo_magia == 'D') {{ "selected"}} @endif >Divina</option>
                                <option value='S' @if($model->tipo_magia == 'S') {{ "selected"}} @endif >Selvagem</option>
                            </select>
                        </div>

                        <div class="mb-3 col-3">
                            <label class="form-label" for="ritual">Ritual: </label>
                            <select class="form-control" name="ritual" id="ritual">
                                <option value='S' @if($model->ritual == 'S') {{ "selected"}} @endif >Sim</option>
                                <option value='N' @if($model->ritual == 'N') {{ "selected"}} @endif >Não</option>
                            </select>
                        </div>

                        <div class="mb-3 col-4">
                            <label class="form-label" for="ritual">Ação: </label>
                            <input class="form-control" id="acao" name="acao" type="text" placeholder="Ação" value="{{ $model->acao }}">
                        </div>

                        <div class="mb-3 col-4">
                            <label class="form-label" for="alcance">Alcance: </label>
                            <input class="form-control" id="alcance" name="alcance" type="text" placeholder="Alcance" value="{{ $model->alcance }}">
                        </div>

                        <div class="mb-3 col-4">
                            <label class="form-label" for="duracao">Duração: </label>
                            <input class="form-control" id="duracao" name="duracao" type="text" placeholder="Duração" value="{{ $model->duracao }}">
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
