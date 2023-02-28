<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $local->nombre }}</p>
</div>

<!-- Logo Img Field -->
<div class="col-sm-12">
    {!! Form::label('logo_img', 'Logo Img:') !!}
    <p>{{ $local->logo_img }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $local->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $local->updated_at }}</p>
</div>

