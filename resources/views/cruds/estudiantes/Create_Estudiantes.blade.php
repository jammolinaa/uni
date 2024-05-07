
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
<h2>Registrar Estudiantes</h2>
<center>
<form action="{{ route('guardar_estudiantes') }}" method="post"style="">

    @csrf

     <div class="md-3 row">
       <label for="matricula" class="col-sm-2 col-form-label">Identificacion:</label>
       <div class="col-sm-5">
         <input type="text" class="form-control" name="identificacion" id="identificacion" value="{{ old('identificacion') }}" required>
        </div>
      </div>


      <div class="md-3 row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
        </div>
      </div>
      <div class="md-3 row">
        <label for="nombre" class="col-sm-2 col-form-label">Apellido:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="apellido" id="apellido" value="{{ old('apellido') }}" required>
        </div>
      </div>




          <div class="md-3 row">
            <label for="telefono" class="col-sm-2 col-form-label">Edad:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="edad" id="edad" value="{{ old('edad') }}" required>
            </div>
          </div>


            <div class="md-3 row">
              <label for="email" class="col-sm-2 col-form-label">Correo:</label>
              <div class="col-sm-5">
                <input type="email" class="form-control" name="correo" id="correo" value="{{ old('correo') }}" required>
              </div>


            <div class="md-3 row">
              <label for="email" class="col-sm-2 col-form-label">Contraseña:</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="contraseña" id="contraseña" value="{{ old('contraseña') }}" required>
              </div>

            <div class="md-3 row">
                <label for="email" class="col-sm-2 col-form-label">Nota 1:</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nota_1" id="nota_1" value=0 >
                </div>
                <div class="md-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Nota 2:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nota_2" id="nota_2" value=0>
                    </div>
                    <div class="md-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Nota 3:</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="nota_3" id="nota_3" value=0 >
                        </div>
                        <div class="md-3 row">
                        <div class="col-sm-5">
                        <select name="Curso_id" id="Curso:_id" class="form-select" required>

                            <option value="">Seleccionar Curso</option>
                                   @foreach ($cursos as $cursos )
                            <option value="{{ $cursos->id }}">{{$cursos->Curso }}</option>"
                            @endforeach
                           </select>
                           <br>
                        </div>
                    </div>
                    <div class="col-sm-5">
                           <button type="submit">enviar</button>
                            <button  href="{{route('tablas_estudiantes')}}"type="submit">Atras</button>


              </form>

