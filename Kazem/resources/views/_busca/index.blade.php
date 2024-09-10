@extends('template.admin')

@section('title', ucwords('Idioma'))

@section('content')

<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
      <div class="row">
        <div class="col-lg-8">
          <h3>Resultados de Pesquisa</h3>
          <p class="mb-0">Voce procurou pelo termo "<b>{{$termo}}</b>" e aqui está o que encontramos sobre isso.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      
        <?php $ultimotermo = "";?>

      @foreach($retorno as $item)

        @if($ultimotermo != $item->Tipo)
            
            @if($ultimotermo != "")
                <hr class="my-3" />
                <?php $ultimotermo = $item->Tipo; ?>
            @endif
            <hr class="my-3" />
            <h6> 
                <a href="{{ url($item->link) }}">
                    {{ $item->Tipo . ": " . $item->titulo}}
                    <span class="fas fa-caret-right ms-2"></span>
                </a>
            </h6>
            <p class="fs--1 mb-3">
                {!! $item->descricao !!}
            </p>

        @endif
      @endforeach
    </div>
  </div>
  


@endsection