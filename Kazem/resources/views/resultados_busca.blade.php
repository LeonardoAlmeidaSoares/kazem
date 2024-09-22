@extends('template.admin')

@section('content')
    @foreach ($retorno as $item)
        <div class="col-12">
          <a href="{{ url($item->link) }}" style="text-decoration: none;">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->titulo}}</h4>
                    <p class="card-description"> {{ $item->Tipo }} </p>
                    <p> {{ \Str::limit($item->descricao, 100)}} </p>
                </div>
            </div>
          </a>
        </div>
    @endforeach
@endsection
