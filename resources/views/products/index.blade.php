@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Categorías
                    <a href="{{ route('add') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>
                </div>

                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>

                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $products)
                            <tr>
                                <td>{{ $products->id }}</td>
                                <td>{{ $products->nombre_producto }}</td>
                                <td>{{ $products->ap_producto }}</td>

                                <td width="10px">
                                    <a href="#" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('edit', $products->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">

                                    <form action="{{ route('delete', $products->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                                          </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $productos->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
