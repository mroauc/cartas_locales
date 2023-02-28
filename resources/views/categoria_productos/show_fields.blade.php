<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $categoriaProducto->nombre }}</p>
</div>

<!-- Pos Carta Field -->
<div class="col-sm-12">
    {!! Form::label('pos_carta', 'Pos Carta:') !!}
    <p>{{ $categoriaProducto->pos_carta }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $categoriaProducto->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $categoriaProducto->updated_at }}</p>
</div>

