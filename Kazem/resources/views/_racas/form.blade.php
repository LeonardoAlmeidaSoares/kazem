@extends('template.admin')

@section('title', 'Raças')

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">
                        Raças
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
                        <div class="mb-3 col-9">
                            <label class="form-label" for="titulo">Nome: </label>
                            <input class="form-control" id="titulo" name="titulo" required type="text" placeholder="Nome da Raça" value="{{ $model->titulo }}">
                        </div>

                        <div class="mb-3 col-3">
                            <label class="form-label" for="deslocamento">Deslocamento: </label>
                            <input class="form-control" id="deslocamento" name="deslocamento" type="text" placeholder="Deslocamento" value="{{ $model->deslocamento }}">
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
