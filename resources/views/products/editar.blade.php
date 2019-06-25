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
                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <label for="nombre">Nombre *</label>
                        <input id="nombre" name="nombre" type="text" class="required" value="{{  $products->nombre }}">
                        <p>(*) Mandatory</p>
                    </section>

                    <h3>Dos</h3>

                    <section>
                        <label for="ap">Apellido Paterno *</label>
                        <input id="ap" name="ap" type="text" class="required" value="{{  $products->ap }}">
                        <p>(*) Mandatory</p>
                    </section>

                    <h3>Final</h3>
                    <section>
                        <label for="am">Apellido Materno *</label>
                        <input id="am" name="am" type="text" class="required" value="{{  $products->am }}">
                        <p>(*) Mandatory</p>
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

</body>
</html>