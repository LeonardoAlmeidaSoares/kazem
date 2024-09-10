@extends('template.admin')

@section('title', 'Raças')

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">
                        Classes
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
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="nome">Nome: </label>
                            <input class="form-control" id="nome" name="nome" required type="text" placeholder="Nome" value="{{ $model->nome }}">
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="nome">Somente NPCs: </label>
                            <select class="form-control" id="somente_npc" name="somente_npc" required>
                                <option value="N" @if($model->somente_npc == 'N') selected @endif>Não</option>
                                <option value="S" @if($model->somente_npc == 'S') selected @endif>Sim</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label" for="nome">Descrição: </label>
                            <textarea rows=6 name="descricao" id="descricao" class="form-control">{!! $model->descricao !!}</textarea>
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