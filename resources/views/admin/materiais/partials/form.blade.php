<div class="form-row">
    
    <div class="form-group col-md-6">
        {{ Form::label('descricao','Descrição do Material') }}
        {{ Form::text('descricao',null,['placeholder' => 'Descrição do material','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('embalagem_id','Embalagem') }}
        {{ Form::select('embalagem_id',$embalagens,null,['placeholder' => 'Selecione uma embalagem...', 'class' => 'form-control', 'id' => 'embalagens']) }}
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('peso','Peso (Kg)') }}
        {{ Form::number('peso',null,['placeholder' => 'Peso do material','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('remetente_id','Remetente') }}
        {{ Form::select('remetente_id',$remetentes,null,['placeholder' => 'Selecione um remetente...', 'class' => 'form-control', 'id' => 'remetentes']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('destino_id','Destino') }}
        {{ Form::select('destino_id',$destinos,null,['placeholder' => 'Selecione um destino...', 'class' => 'form-control', 'id' => 'destinos']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('origem_id','Setor de Origem') }}
        {{ Form::select('origem_id',$origens,null,['placeholder' => 'Selecione uma origem...', 'class' => 'form-control', 'id' => 'origens']) }}
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('data_saida','Data da saída') }}
        {{ Form::date('data_saida',null,['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('modal_id','Modal') }}
        {{ Form::select('modal_id',$modais,null,['placeholder' => 'Selecione um modal...', 'class' => 'form-control', 'id' => 'remetentes']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('guia_embarque','Guia de embarque') }}
        {{ Form::text('guia_embarque',null,['placeholder' => 'Guia enbarque','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('status_id','Status') }}
        {{ Form::select('status_id',$status,null,['placeholder' => 'Selecione um status...', 'class' => 'form-control', 'id' => 'remetentes']) }}
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('ultima_auteracao','Última auteração') }}
        {{ Form::date('ultima_auteracao',null,['class' => 'form-control']) }}
    </div>
<div class="form-group col-md-2">
        {{ Form::hidden('volume',null,['placeholder' => 'Valor automático','class' => 'form-control']) }}
    </div>    
    
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>