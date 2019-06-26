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

        <form id="example-form" action="{{ route('actualizar', $products->id) }}" method="post" >
                {{ csrf_field() }}
                <div>
                    <h3>Uno</h3>
                    <section>
                        <?php //dd($products->cursos); ?>
                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <label for="nombre">Nombre *</label>
                        <input id="nombre" name="nombre_producto" type="text" class="required" value="{{  $products->nombre_producto }}">
                        <p>(*) Mandatory</p>
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


            <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
            <script src="{{ asset('js/jquery.steps.js') }}"></script>
            <script src="{{  asset('js/jquery.validate.min.js')}}"></script>
            <script src="{{ asset('js/script.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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


</body>
</html>
