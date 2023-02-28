@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Local</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <form method="POST" action="{{ route('locals.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
    
                    <div class="row">
                        @include('locals.fields')
                    </div>
    
                </div>
    
                <div class="card-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('locals.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
            {{-- {!! Form::open(['route' => 'locals.store']) !!} --}}


            {{-- {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
