@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_index')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(['route' => request()->segment(2).'.search','class' => 'form form-inline']) }}
                {{ Form::text('campo1',$filters['campo1'] ?? '',['placeholder' => 'Volume','class' => 'form-control']) }}
                {{ Form::text('campo2',$filters['campo2'] ?? '',['placeholder' => 'Material','class' => 'form-control']) }}
                {{ Form::text('campo3',$filters['campo2'] ?? '',['placeholder' => 'Embalagem','class' => 'form-control']) }}
                {{ Form::text('campo4',$filters['campo2'] ?? '',['placeholder' => 'Peso (Kg)','class' => 'form-control']) }}
                {{ Form::text('campo5',$filters['campo2'] ?? '',['placeholder' => 'Setor de origem','class' => 'form-control']) }}
                {{ Form::text('campo6',$filters['campo2'] ?? '',['placeholder' => 'Local de origem','class' => 'form-control']) }}
                {{ Form::text('campo7',$filters['campo2'] ?? '',['placeholder' => 'Local de destino','class' => 'form-control']) }}
                {{ Form::text('campo8',$filters['campo2'] ?? '',['placeholder' => 'Data de saída','class' => 'form-control']) }}
                {{ Form::text('campo9',$filters['campo2'] ?? '',['placeholder' => 'Modal','class' => 'form-control']) }}
                {{ Form::text('campo10',$filters['campo2'] ?? '',['placeholder' => 'Guia de Embarque','class' => 'form-control']) }}
                {{ Form::text('campo11',$filters['campo2'] ?? '',['placeholder' => 'Status','class' => 'form-control']) }}
                {{ Form::submit('Pesquisar',['class' => 'btn btn-primary']) }}
                @if(isset($filters))
                    <a href="{{ route(request()->segment(2).'.index') }}">(x) Limpar Resultados da Pesquisa</a>
                @endif
            {{ Form::close() }}
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ route(request()->segment(2).'.create') }}" class="btn btn-success"><i class="fa fa-file"></i><span>&nbsp;&nbsp;</span><span>Novo</span></a>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th>Volume</th>
                        <th>Descrição do Material</th>
                        <th>Embalagem</th>
                        <th>Peso (Kg)</th>
                        <th>Setor de origem</th>
                        <th>Local de Origem</th>
                        <th>Lodal de Destino</th>
                        <th>Data da Saída</th>
                        <th>Modal</th>
                        <th>Guia de Embarque</th>
                        <th>Status</th>
                        <th>Última Alteração</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->volume }}</td>
                        <td>{{ $item->descricao }}</td>
                        <td>{{ $item->embalagem->descricao }}</td>
                        <td>{{ $item->peso }}</td>
                        <td>{{ $item->origem->descricao }}</td>
                        <td>{{ $item->local->descricao }}</td>
                        <td>{{ $item->campo2 }}</td>
                        <td>{{ $item->campo2 }}</td>
                        <td>{{ $item->campo2 }}</td>
                        <td>{{ $item->campo2 }}</td>
                        <td>{{ $item->campo2 }}</td>
                        <td>
                            <a href="{{ route(request()->segment(2).'.show', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye">&nbsp;</i>Detalhes</a>
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