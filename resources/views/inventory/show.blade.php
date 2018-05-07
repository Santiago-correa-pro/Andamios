@extends('layouts.app')

@section('content')
<a class="btn btn-primary link-raise btn-spacing-top" href="/inventario">Volver al Inventario</a>
<div class="jumbotron text-center">
    @if($inventory)
        <h1>{{$inventory->name}}</h1>
        <ul class="list-group">
            <li class="list-group-item">Inventario: <strong>{{$inventory->units}}</strong></li>
            <li class="list-group-item">Precio <strong>{{number_format($inventory->price)}}</strong> COP</li>
        </ul>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id == $inventory->user_id)
                <a href="/inventario/{{$inventory->id}}/edit" class="btn btn-primary float-right">Actualizar</a>
                {!!Form::open(['action' => ['InventoryController@destroy', $inventory->id],
                "method" => "POST", 'class' => 'float-right btn-spacing'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
        @endif
    @else 
        <h1 class="jumbotron text-center">Necesitas mas inventario</h1>
     @endif
</div>
@endsection