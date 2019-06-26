<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios</title>


    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.steps.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

        <form id="example-form" action="{{ route('actualizar', $products->slug_producto) }}" method="post" >
                {{ csrf_field() }}
                <div>
                    <h3>Uno</h3>
                    <section>
                        <div class="container">
                                <div class="row">
                                    <div class="datos col-md-3">
                                            <label for="nombre">Nombre *</label>
                                            <input id="nombre_producto" name="nombre_producto" value="{{ $products->nombre_producto }}" type="text" class="required">
                                            <p>(*) Mandatory</p>
                                    </div>
                                    <div class="dos col-md-3">
                                            <label for="slug">Url amigable *</label>
                                            <input id="slug_producto" name="slug_producto" value="{{ $products->slug_producto }}"" type="text" class="required" readonly >
                                            <p>(*) No se puede modificar</p>
                                    </div>
                                </div>
                        </div>
                    </section>

                    <h3>Dos</h3>

                    <section>
                        <label for="ap">Apellido Paterno *</label>
                        <input id="ap" name="ap_producto" type="text" class="required" value="{{  $products->ap_producto }}">
                        <p>(*) Mandatory</p>
                    </section>

                    <h3>Final</h3>
                    <section>
                            <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th><a href="#" class="btn btn-info addRow">+</a></th>

                                                </tr>
                                            </thead>
                                            @foreach($products->cursos as $item=>$v)

                                            <tbody>
                                                    <tr>
                                                        <td><input type="text" name="nombre_curso[]" value="{{ $v->nombre_curso }}" class="form-control"></td>
                                                        <td><input type="text" name="descripcion_curso[]" value="{{ $v->descripcion_curso }}" class="form-control"></td>
                                                        <td><a href="#" class="btn btn-danger remove">-</a></td>
                                                    </tr>
                                                </tbody>


                                            @endforeach
                                        </table>
                                    </div>
                                </div>

                    </section>


                </div>
            </form>


            <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
            <script src="{{ asset('js/jquery.steps.js') }}"></script>
            <script src="{{  asset('js/jquery.validate.min.js')}}"></script>
            <script src="{{ asset('js/script.js') }}"></script>
            <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
        $('.addRow').on('click',function(){
            agregarFila();
        });

        function agregarFila(){
            var tr=
            '<tr>'+
                    '<td><input type="text" name="nombre_curso[]" class="form-control"></td>'+
                    '<td><input type="text" name="descripcion_curso[]" class="form-control"></td>'+
                    '<td><a href="#" class="btn btn-danger remove">-</a></td>'+
            '</tr>';

            $('tbody').append(tr);
        }

        $('tbody').on('click','.remove', function()
        {
            $(this).parent().parent().remove();
        });
    </script>

    <script>
            //pra el slug
            $(document).ready(function(){
                $("#nombre_producto, #slug_producto").stringToSlug({
                    callback: function(text){
                        $('#slug_producto').val(text);
                    }
                });
            });
        </script>


</body>
</html>
