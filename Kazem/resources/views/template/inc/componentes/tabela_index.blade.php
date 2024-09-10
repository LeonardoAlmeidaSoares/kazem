<?php
    $valueNames = [];
    foreach($model[0]->exibir as $chave => $item){
        if ($item["id"] == false) $valueNames[] = $item["descricao"];
    }
?>

<div id="" class="container" data-list="{'valueNames':[" + implode(",", $valueNames + "],'page':2,'pagination':true}">
    <div class="table-responsive scrollbar row" >
      <table class="table table-bordered table-striped fs--1 mb-0" id="tabela">
        <thead class="bg-200 text-900">
            
          <tr>
            @foreach($model[0]->exibir as $chave => $item)
                <th class="sort" data-sort="{{ $item["descricao"] }}">{{ $item["descricao"] }}</th>
            @endforeach
            <th class="">Ações</th>
          </tr>
        </thead>
        <tbody class="list">

            @foreach ($model as $item)
                <tr class="align-middle">
                    @foreach($model[0]->exibir as $chave => $campo)
                        @if ($campo["id"])
                            <th class="" >{{ Str::padLeft($item->{$campo["campo"]}, 3, '0') }}</th>
                        @else
                            @if(is_null($item->{$campo["link"]}))
                                @isset($campo["parent"])
                                    <th class="">{{ $item->{$campo["parent"]}->{$campo["campo"]} }}</th>
                                @else
                                    <th class="" >{{ $item->{$campo["campo"]} }}</th>
                                @endisset
                            @else
                                <th class="">
                                    <a href='{{ $item->{$campo["link"]} }}' target="_blank">
                                        {{ $item->{$campo["campo"]} }}
                                    </a>
                                </th>
                            @endif
                        @endif
                            
                    @endforeach
                    <td>
                        @foreach($item->links as $chave => $campo)
                            <a href="{{ url($campo['url']) . '/' . $item->{$campo["args"][0]} }} ">
                                <span class="{{ $campo["classe"] }} text-danger fs-1"></span>
                            </a>
                        @endforeach
                    </td>     
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>