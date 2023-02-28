<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Pos Carta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pos_carta', 'Pos Carta:') !!}
    {!! Form::number('pos_carta', null, ['class' => 'form-control']) !!}
</div>