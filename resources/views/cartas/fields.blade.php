<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('id_local', 'Local:') !!}
    <select name="id_local" id="select_local" class="form-control">
        <option value="">Seleccione Local</option>
        @foreach ($locales as $local)
            <option value="{{$local->id}}" {{isset($carta) && $carta->id_local == $local->id ? 'selected' : ''}}>{{$local->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label>Selecciona las opciones:</label>
    @foreach ($productos as $producto)
        <div class="checkbox">
            <label><input type="checkbox" value="{{$producto->id}}" name="productos[]" {{isset($carta) && $carta->productos()->where('productos.id', $producto->id)->exists() ? 'checked' : ''}}>{{$producto->nombre}}</label>
        </div>    
    @endforeach
</div>
