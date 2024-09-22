@extends('template.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $titulo }}</h4>
            <p class="card-description">
                @if (session('msg_sucesso'))
                    <div class="alert alert-success">
                        {{ session('msg_sucesso') }}
                    </div>
                @endif
            </p>
            <form action="{{ Request::url() }}" method="POST" class="row">
                @csrf

                @foreach ($model->form as $item)

                    @if ($item['type'] == 'text')
                        <div class="{{ $item['class'] }}">
                            <div class="form-group ">
                                <label class="col-form-label">{{ ucwords($item['label']) }}</label>
                                <input type="text" class="form-control form-control-sm" name="{{ $item['name'] }}"
                                    id="{{ $item['name'] }}" value="{{ $model->{$item['name']} }}">
                            </div>
                        </div>
                    @endif

                    @if ($item['type'] == 'textarea')
                        <div class="{{ $item['class'] }}">
                            <div class="form-group ">
                                <label class="col-form-label">{{ ucwords($item['label']) }}</label>
                                <textarea class="form-control textarea form-control-sm" rows=10 name="{{ $item['name'] }}" id="{{ $item['name'] }}">
                                {!! trim($model->{$item['name']}) !!}
                            </textarea>
                            </div>
                        </div>
                    @endif

                    @if($item['type'] == 'select')
                    <div class="{{ $item['class'] }}">
                        <div class="form-group ">
                            <label class="col-form-label">{{ ucwords($item['label']) }}</label>
                            <select class="form-control form-control-sm select2" name="{{ $item['name'] }}" id="{{ $item['name'] }}">
                                <option selected hidden>Selecione</option>
                                @foreach($item["content"] as $id => $val)
                                    <option value="{{ $id }}" @if($model->{$item['name']} == $id) selected @endif >{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

                    @if ($item['type'] == 'sim_nao')
                    <div class="{{ $item['class'] }}">
                        <div class="form-group ">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" @if($model->{$item['name']} == 'S') checked @endif name="{{ $item['name'] }}"> 
                                    {{ ucwords($item['label']) }} 
                                    <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($item['type'] == 'valor_unidade')
                        <div class="{{ $item['class'] }}">
                            <div class="form-group ">
                                <label class="col-form-label">{{ ucwords($item['label']) }}</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control form-control-sm" aria-label="Text input with dropdown button" value="{{ $model->{$item['name']} }}" name="{{ $item['name'] }}" id="{{ $item['name'] }}">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Unidades</button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item dropdown-item-unidade" attr-val="PC" href="#">
                                                PC
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item dropdown-item-unidade" attr-val="PP" href="#">
                                                PP
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item dropdown-item-unidade" attr-val="PO" href="#">
                                                PO
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item dropdown-item-unidade" attr-val="PL" href="#">
                                                PL
                                            </a>
                                        </li>
                                    </ul>
                                    <input type="hidden" id="unidade" name="unidade" value="{{ $model->unidade }}" />
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                
                <div class="row">
                    <input type="submit" class="offset-10 col-2 btn btn-primary btn-lg btn-block" value="Salvar" />
                </div>
            </form>
        </div>
    </div>
@endsection

