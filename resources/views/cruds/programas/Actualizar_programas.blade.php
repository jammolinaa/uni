
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
<h2>Actualizar Programa</h2>
<center>
<form action="{{route('actualizar_programas',$programas)}}" method="POST"
enctype="multipart/form-data">>
@csrf
@method('put')
<div class="md-3 row">
  <label for="matricula" class="col-sm-2 col-form-label">Programa:</label>
  <div class="col-sm-5">
    <input type="text" class="form-control" name="programa" id="programa" value="{{$programas->programa}}" required>
   </div>
 </div>










         <button type="submit">enviar</button>
         <button  href="{{route('tablas_programas')}}"type="submit">Atras</button>

    </label>
