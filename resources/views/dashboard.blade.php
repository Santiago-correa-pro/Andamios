@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Resumen de ventas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!Auth::guest())
                            <div class="container text-center">
                                    <p>Han vendido un total de <strong>{{number_format($inventorySum)}}<strong> COP</p>
                                    @foreach ($inventory_items as $inventory_item )
                                        <li class="list-group-item">
                                            Obtuvieron {{$inventory_item->sold}} COP por vender {{$inventory_item->name}}y fue vendido por <small>{{$inventory_item->user->name}}</small></li>
                                    @endforeach
                                    <a class="btn btn-primary link-raise" style="margin-top: 15px" href="/inventario/create">Añadir un Articulo</a>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
