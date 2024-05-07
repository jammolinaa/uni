
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

<center>
    <h2>Crear Cursos</h2>
<form action="{{ route('guardar_cursos') }}" method="post"style="">

    @csrf




                          <label for="email" class="col-sm-2 col-form-label">Nombre Curso:</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="Curso" id="Curso" value="{{ old('Curso') }}" required>
                          </div>
                          <label for="Programa_id" class="col-sm-2 col-form-label">Programa:</label>

                          <div class="col-sm-5">
                        <select name="Programa_id" id="Programa_id" class="form-select" required>
                         <option value="">Seleccionar programa</option>
                                @foreach ($programa as $programa )
                         <option value="{{ $programa->id }}">{{$programa->programa }}</option>"
                         @endforeach
                        </select>

                      </div>
                    </div>

                          <label for="Profesor_id" class="col-sm-2 col-form-label">Profesor:</label>
                          <div class="col-sm-5">

                            <select name="Profesor_id" id="Profesor_id" class="form-select" required>
                             <option value="">Seleccionar profesor</option>
                                    @foreach ($profesor as $profesor )
                             <option value="{{$profesor->id }} ">{{$profesor->nombre }} {{$profesor->apellido}}</option>"
                             @endforeach
                            </select>

                          </div>
                        </div>




              <button type="submit">enviar</button>
              <button  href="{{route('tablas_cursos')}}"type="submit">Atras</button>


              </form>



