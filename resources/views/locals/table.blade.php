<div class="table-responsive">
    <table class="table" id="locals-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Logo Img</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($locals as $local)
            <tr>
                <td>{{ $local->nombre }}</td>
            <td>{{ $local->logo_img }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['locals.destroy', $local->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('locals.show', [$local->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('locals.edit', [$local->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
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
