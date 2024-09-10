@extends('template.admin')

@section('title', 'Cidades')

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="example">
                        Cidades
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
                            <label class="form-label" for="nome">Continente: </label>
                            <select class="form-control" id="id_continente" name="id_continente" required>
                                @foreach($continentes as $item)
                                    <option value="{{ $item->id_continente}}" @if($model->id_continente == $item->id_continente) selected @endif>{{ $item->nome }}</option>
                                @endforeach
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
