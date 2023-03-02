<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú del Restaurante</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="{{ asset('css/carta1.css') }}" rel="stylesheet">
</head>

<style>
    
    body{
      /* background: rgb(251,253,152); */
      
      /* background: radial-gradient(circle, rgba(251,253,152,1) 28%, rgba(255,253,103,1) 77%); */
      /* background: {{asset('storage/public/fondo.jpg')}}; */
      background-image: url("{{ asset('storage/fondo2.png') }}");
      background-size: contain;
    }

    .menu-item-name {
        /* text-align-last: justify; */
        text-justify: inter-word;
    }

        /* .dots::after {
        content: "{{str_repeat('.', 60)}}";
        font-size: 16px;
        padding-left: 5px;
        color: #888;
    } */

    .menu-item-name h3 {
      text-indent: 20px;
    }

    .menu-item-name_2::after {
      content: "";
      display: inline-block;
      width: calc(100% - 80px);
      border-bottom: 1px dotted #ccc;
      margin-left: 10px;
      margin-right: 10px;
    }

    /* .menu-item-name small{
      line-height: 0.5;
    } */
    
</style>

<body>
  <section>
    <div class="row justify-content-center">
        <img src="{{asset('storage/logos/3.jpg')}}" width="190px" height="140px" alt="">
    </div>
  </section>

  @foreach ($categorias->sortBy('pos_carta') as $categoria)
    <section class="menu mt-3">
        <div class="container bg-blur rounded shadow pt-2 pb-2 mb-4" style="background-color: #f1f1f1f2;">
          <div class="row">
            <div class="col-md-10">
              <div class="section-title">
                <h4>{{$categoria->nombre}}</h4>
              </div>
            </div>
            <div class="col-md-8">
                @foreach ($categoria->productos as $producto)
                    <div class="mb-1">
                      <div class="menu-item d-flex">
                        <div class="menu-item-name">
                            <span>{{$producto->nombre}}<span class="dots"></span></span>
                        </div>
                        <div class="menu-item-price ml-auto align-items-center">
                            <span>{{$producto->precio != 0 ? number_format($producto->precio, 0, ',', '.') : ''}}</span>
                        </div>
                      </div>
                      @if (count($producto->productos_hijos) == 0)
                        <div style="margin-top: -5px; font-size: 15px; color: #6e6e6e;">
                          <p style="margin: 0;">{{$producto->descripcion}}</p>
                        </div>
                      @endif
                    </div>
                    @if (count($producto->productos_hijos) > 0)
                      @foreach ($producto->productos_hijos as $p_hijo)
                      <div class="ml-3 mb-1" style="margin-top: -5px;">
                        <div class="menu-item d-flex">
                          <div class="menu-item-name">
                              <span>{{$p_hijo->nombre}}<span class="dots"></span></span>
                          </div>
                          <div class="menu-item-price ml-auto align-items-center">
                              <span>{{number_format($p_hijo->precio, 0, ',', '.')}}</span>
                          </div>
                        </div>
                        <div style="margin-top: -5px; font-size: 15px; color: #6e6e6e;">
                          <p style="margin: 0;">{{$p_hijo->descripcion}}</p>
                        </div>
                      </div>
                          
                      @endforeach
                        
                    @endif
                @endforeach
            </div>
          </div>
        </div>
    </section>
  @endforeach

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNS3tx" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
    // Agrega puntos líderes entre el nombre del producto y el precio
    $('.menu-item-name').each(function() {
        var dots = '';
        var nameWidth = $(this).width();
        var priceWidth = $(this).next('.menu-item-price').width();
        var maxWidth = $(this).parent().width() - nameWidth - priceWidth - 10; // 20 es un margen de seguridad

        while ($(this).find('.dots').width() < maxWidth) {
            dots += '.';
            $(this).find('.dots').text(dots);
        }
    });
});
</script>
</body>
</html>
