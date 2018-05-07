@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'InventoryController@store', "method" => 'POST', "class" => "btn-spacing-top"]) !!}
    <div class="form-group">
        {{Form::label('name', 'Articulo')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Articulo'])}}
    </div>
    <div class="form-group">
        {{Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Precio'])}}
    </div>
    <div class="form-group">
            {{Form::number('units', '', ['class' => 'form-control', 'placeholder' => 'Unidades'])}}
    </div>
    <div class="form-group">
            {{Form::number('sold', '', ['class' => 'form-control', 'placeholder' => 'Ventas'])}}
    </div>
    {{Form::submit('Enviar', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection