@extends('template.admin')

@section('title', 'Jogadores')

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">
                        Jogadores
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
                        <div class="mb-3 col-8">
                            <label class="form-label" for="titulo">Nome: </label>
                            <input class="form-control" id="nome" name="nome" required type="text" placeholder="Nome do Jogador" value="{{ $model->nome }}">
                        </div>

                        <div class="mb-3 col-4">
                            <label class="form-label" for="status">Status: </label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="A" @if($model->status == 'N') selected @endif>Ativo</option>
                                <option value="I" @if($model->status == 'I') selected @endif>Inativo</option>
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
