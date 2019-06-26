@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    <h1>Lista con Elementos Borrados Lógicos</h1>
                <div class="panel-heading">
                    <a href="{{ route('add') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>

                    <a href="{{ route('index') }}" class="pull-right btn btn-sm btn-dark">
                        Lista normal
                    </a>
                </div>

                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Url</th>
                                <th>Ver</th>
                                <th>Descripción</th>
                                <th>Eliminar </th>
                                <th>Recuperar</th>

                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $products)
                            <tr>

                                <td>{{ $products->id }}</td>
                                <td>{{ $products->nombre_producto }}</td>
                                <td>{{ $products->ap_producto }}</td>
                                <td>{{ $products->slug_producto }}</td>
                                    {{--  @foreach($products['cursos'] as $item)
                                    <td>{{ $item->nombre_curso }}</td>
                                    @endforeach  --}}
                                <td width="10px">
                                    <a href="#" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('edit', $products->slug_producto) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">

                                    <form action="{{ route('delete_permanente', $products->slug_producto)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Estas seguro')">Eliminado Permanente</button>
                                          </form>
                                </td>
                                <td width="10px">
                                        <a href="{{ route('recuperar', $products->slug_producto) }}" class="btn btn-sm btn-success" onclick="return confirm('Estas seguro')">Recuperar</a>
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
