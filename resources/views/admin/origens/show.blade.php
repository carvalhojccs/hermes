@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_show')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('descricao','Descrição da origem:') }}
                {{ Form::text('descricao',$data->descricao,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y'),['class' => 'form-control','disabled']) }}
            </div>
            @include('admin.componentes.form_btn_show')
        </div>
    </div>
</div>
@stop