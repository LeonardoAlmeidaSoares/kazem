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
            <div class="table-responsive">
                <table class="table table-striped" id="listagem">
                    <thead>
                        <tr>
                            @isset($model[0])
                                @foreach ($model[0]->exibir as $chave => $item)
                                    <th>{{ $item['descricao'] }}</th>
                                @endforeach
                                <td></td>
                            @endisset
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $item)
                            <tr class="align-middle">
                                @foreach ($model[0]->exibir as $chave => $campo)
                                    @if ($campo['id'])
                                        <th class="">{{ Str::padLeft($item->{$campo['campo']}, 3, '0') }}</th>
                                    @else
                                        @if (is_null($item->{$campo['link']}))
                                            @isset($campo['parent'])
                                                <td class="">{{ $item->{$campo['parent']}->{$campo['campo']} }}</td>
                                            @else
                                                <td class="">{{ $item->{$campo['campo']} }}</td>
                                            @endisset
                                        @else
                                            <td class="">
                                                <a href='{{ $item->{$campo['link']} }}' target="_blank">
                                                    {{ $item->{$campo['campo']} }}
                                                </a>
                                            </td>
                                        @endif
                                    @endif
                                @endforeach
                                <td>
                                    @foreach ($item->links as $chave => $campo)
                                        <?php $link = ''; ?>
                                        @foreach ($campo['args'] as $arg)
                                            <?php $link .= '/' . $item->{$arg}; ?>
                                        @endforeach

                                        <a href="{{ url($campo['url']) . $link }}"
                                            @if (isset($campo['target'])) target="_blank" @endif
                                            title="{{ $campo['title'] }}">
                                            <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                                                <i class="{{ $campo['classe'] }}"></i>
                                            </button>
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <?php  
                    
                if(Str::contains(url()->current(), 'personagem'))
                {
                    $link = url()->current() . "/ficha/0";
                } elseif(Str::contains(url()->current(), 'racavariante'))
                {
                    $link = url()->current() . "/0";
                } 
                else {
                    $link = url()->current() . "/form/0";
                }
                
                ?>
                <a href="{{ $link }}" type="button" class="btn btn-primary btn-rounded btn-fw">
                    Novo
                </a>
            </div>
        </div>
    </div>
@endsection
