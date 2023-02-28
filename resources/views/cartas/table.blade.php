<div class="table-responsive">
    <table class="table" id="cartas-table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartas as $carta)
            <tr>
                <td>{{ $carta->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cartas.destroy', $carta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cartas.show', [$carta->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cartas.edit', [$carta->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ route('cartas.mostrarCarta', [$carta->id]) }}"
                           class='btn btn-default btn-xs'>
                           <i class="fas fa-utensils"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
