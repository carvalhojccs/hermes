@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_index')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ route('numeracoes.create') }}" class="btn btn-success"><i class="fa fa-file"></i><span>&nbsp;&nbsp;</span><span>Novo</span></a>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th>Ano</th>
                        <th>Numeração</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->ano }}</td>
                        <td>{{ $item->numeracao }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('ativar_ano', $item->id) }}" class="btn btn-sm btn-primary">Ativar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @include('admin.componentes.componente_links')
        </div>
    </div>
</div>
@stop