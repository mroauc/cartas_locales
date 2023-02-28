<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo_img', 'Logo Img:') !!}
    <input type="file" class="form-control form-control-file" id="logo" name="logo" onchange="mostrarVistaPrevia()">
    {{-- <img id="img_sel" src="{{isset($local->logo_img) ? asset('storage/'.$local->logo_img) : '#'}}" alt="img_sel" width="300px"> --}}
    <img id="img_sel" src="{{isset($local->logo_img) ? \Storage::url('public/logos/3.jpg') : '#'}}" alt="img_sel" width="300px">
</div>

@push('page_scripts')
    <script>
        function mostrarVistaPrevia() {
            const archivoSeleccionado = document.getElementById('logo').files[0];
            const vistaPrevia = document.getElementById('img_sel');
            const lector = new FileReader();

            lector.onloadend = function() {
                vistaPrevia.src = lector.result;
            }

            if (archivoSeleccionado) {
                lector.readAsDataURL(archivoSeleccionado);
            } else {
                vistaPrevia.src = '';
            }
        }
    </script>
@endpush