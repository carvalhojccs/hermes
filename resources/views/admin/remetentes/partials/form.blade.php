<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('descricao','Remetente') }}
        {{ Form::text('descricao',null,['placeholder' => 'Nome do remetente','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sigla','Sigla') }}
        {{ Form::text('sigla',null,['placeholder' => 'Sigla do remetente','class' => 'form-control']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>