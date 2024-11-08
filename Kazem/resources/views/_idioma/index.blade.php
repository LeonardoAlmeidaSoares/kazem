@extends('template.admin')

@section('title', ucwords('Idioma'))

@section('content')

    <div class="card z-index-1 mb-3" id="recentPurchaseTable"
        data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
        <div class="card-header">

            @if (session('msg_sucesso'))
                <div class="alert alert-success">
                    {{ session('msg_sucesso') }}
                </div>
            @endif

            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Gestão de {{ ucwords('Idioma') }}s </h5>
                </div>
                <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                    <div id="table-purchases-replace-element">
                        <a href="{{ url(strtolower('Idioma') . '/form/0') }}">
                            <button class="btn btn-falcon-default btn-sm" type="button">
                                <svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""
                                    style="transform-origin: 0.4375em 0.625em;">
                                    <g transform="translate(224 256)">
                                        <g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)">
                                            <path fill="currentColor"
                                                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"
                                                transform="translate(-224 -256)"></path>
                                        </g>
                                    </g>
                                </svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com -->
                                <span class="d-none d-sm-inline-block ms-1">Novo</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body px-0 py-0">
            <div class="table-responsive scrollbar">
                @include('template.inc.componentes.tabela_index')
            </div>
        </div>
        <div class="card-footer">
            <div class="row align-items-center">

            </div>
        </div>
    </div>

@endsection
