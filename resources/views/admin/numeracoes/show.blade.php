@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_show')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('ano','Ano:') }}
                {{ Form::text('ano',$data->ano,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('numeracao','Numeracao corrente:') }}
                {{ Form::text('numeracao',$data->numeracao,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('status','Status:') }}
                {{ Form::text('status',$data->status,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y à\s H:m:s'),['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_atualizacao','Atualizdo em:') }}
                {{ Form::text('data_atualizacao',$data->updated_at->format('d/m/Y à\s H:m:s'),['class' => 'form-control','disabled']) }}
            </div>
            @include('admin.componentes.form_btn_show')
        </div>
    </div>
</div>
@stop