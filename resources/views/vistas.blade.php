@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Visitas Carta</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">


            <div class="card-body">

                <div class="row">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Visitas</th>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($vistas as $item)
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->visitas}}</td>
                                @endforeach

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="card-footer">
            </div>


        </div>
    </div>
@endsection
