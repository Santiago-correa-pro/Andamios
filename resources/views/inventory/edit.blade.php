@extends('layouts.app')

@section('content')
{!! Form::open(['action' => ['InventoryController@update', $inventory->id], "method" => 'POST', "class" => "btn-spacing-top"]) !!}
    <div class="form-group">
        {{Form::label('name', 'Articulo')}}
        {{Form::text('name', $inventory->name, ['class' => 'form-control', 'placeholder' => 'Articulo'])}}
    </div>
    <div class="form-group">
        {{Form::number('price', $inventory->price, ['class' => 'form-control', 'placeholder' => 'Precio'])}}
    </div>
    <div class="form-group">
            {{Form::number('units', $inventory->units, ['class' => 'form-control', 'placeholder' => 'Unidades'])}}
    </div>
    <div class="form-group">
            {{Form::number('sold', $inventory->sold  , ['class' => 'form-control', 'placeholder' => 'Ventas'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Enviar', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection