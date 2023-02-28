<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    <select name="id_local" id="select_local" class="form-control">
        <option value="">Seleccione Local</option>
        @foreach ($locales as $local)
            <option value="{{$local->id}}" {{isset($producto) && $producto->id_local == $local->id ? 'selected' : ''}}>{{$local->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <select name="id_categoria" id="select_categoria" class="form-control">
        <option value="">Seleccione Categoría</option>
        @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}" {{isset($producto) && $producto->id_categoria == $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
        @endforeach
    </select>
</div>