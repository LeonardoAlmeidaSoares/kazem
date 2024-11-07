@extends('template.admin')
 
@section('title', 'Home')
 
@section('content')

    @include('template.selector-escudo')
    
    <div class="row">
        @include('template.inc.dashboard._exploracao')
    </div>

    <div class="row">
        @include('template.inc.dashboard._interacao_social')
    </div>

    <div class="row">
        @include('template.inc.dashboard._interacao_social')
    </div>
 
@endsection