@extends('layouts.app')

@section('content')
<div class="well">
    <a class="btn btn-primary link-raise btn-spacing-top" href="/">Volver al Inicio</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Articulo</th>
                    <th scope="col">Inventario</th>
                    <th scope="col" id="price">Precio</th>
                    <th scope="col" id="sold">Ventas</th>
                    <th scope="col" id="edit">Actualizar</th>
                </tr>
            </thead>
        @foreach($inventory as $inventory_item)
            @if($inventory_item->units <= 5)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Necesitas un nuevo pedido de {{$inventory_item->name}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
            @if(!Auth::guest())
                    <tbody>
                    <tr>
                        <td><a class="text-dark" href="/inventario/{{$inventory_item->id}}">{{$inventory_item->name}}</a></td>
                        <a href="/dashboard"></a>
                        <td>{{$inventory_item->units}}</td>
                        <td>{{number_format($inventory_item->price)}} COP</td>
                        <td>{{number_format($inventory_item->sold)}} COP</td>
                        <td><a class="btn btn-secondary" href="/inventario/{{$inventory_item->id}}/edit">Actualizar</td>
                    </tr>
                    </tbody>
            @endif
        @endforeach
        </table>
            <a class="btn btn-primary float-right link-raise" href="/inventario/create">+</a>
                {!!Form::open(['action' => 'InventoryController@destroyAll',
                "method" => "POST", 'class' => 'float-left btn-spacing'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Eliminar Todo', ['class' => 'btn btn-danger link-raise'])}}
                {!!Form::close()!!}
                {{ $inventory->links() }}
</div>
@endsection