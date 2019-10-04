<div class="form-row">
    <div class="form-group col-md-2">
        {{ Form::label('ano','Ano') }}
        {{ Form::text('ano',null,['placeholder' => 'Ex. 2019','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('numeracao','Numeração') }}
        {{ Form::text('numeracao',null,['placeholder' => 'Numeração','class' => 'form-control']) }}
    </div>
    
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>