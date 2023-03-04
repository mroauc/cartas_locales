<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carta Antojos Purisima</title>
</head>
<style>
    body {
        background-image: url('/storage/fondo2.png');
        /* background-image: url("{{ asset('storage/fondo2.png') }}"); */
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
    }
</style>
<body>
    <table>
        <tbody>
            @foreach ($categorias->sortBy('pos_carta') as $categoria)
                <tr>
                    <td><h4>{{$categoria->nombre}}</h4></td>
                </tr>
                @foreach ($categoria->productos->whereNull('id_producto_padre') as $producto)
                    <tr>
                        <td><span>{{$producto->nombre}}<span class="dots"></span></span></td>
                        <td><span>{{$producto->precio != 0 ? number_format($producto->precio, 0, ',', '.') : ''}}</span></td>
                    </tr>
                    @if (count($producto->productos_hijos) == 0)
                        <tr>
                            <p style="margin: 0;">{{$producto->descripcion}}</p>
                        </tr>
                    @endif
                    @if (count($producto->productos_hijos) > 0)
                      @foreach ($producto->productos_hijos as $p_hijo)
                        <tr>
                            <td><span> -{{$p_hijo->nombre}}<span class="dots"></span></span></td>
                            <td><span>{{$p_hijo->precio != 0 ? number_format($p_hijo->precio, 0, ',', '.') : ''}}</span></td>
                        </tr>    
                        <tr>
                            <p style="margin: 0;">{{$p_hijo->descripcion}}</p>
                            
                        </tr>    
                      @endforeach
                        
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>