
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<table class="table table-dark">

                    <tr>
                        <th>id</th>
                        <th>Curso</th>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>n1</th>
                        <th>n2</th>
                        <th>n3</th>
                        <th>promedio</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tfoot>

                </tfoot>
                <tbody>
                    <tr>

                        @foreach ($Estudiantes as $Estudiante)

                        <td>{{$Estudiante->id}}</td>
                        <td>{{$Estudiante->cursos->Curso}}</td>
                        <td>{{$Estudiante->Identificacion}}</td>
                        <td>{{$Estudiante->nombre}}</td>
                        <td>{{$Estudiante->apellido}}</td>
                        <td>{{$Estudiante->edad}}</td>
                        <td>{{$Estudiante->correo}}</td>
                        <td>{{$Estudiante->contraseña}}</td>
                        <td>{{$Estudiante->n1}}</td>
                        <td>{{$Estudiante->n2}}</td>
                        <td>{{$Estudiante->n3}}</td>
                        <td>{{$Estudiante->promedio}}</td>
                        <td><form action="{{route('eliminar_estudiantes',$Estudiante->id)}}" method="POST">
                            @csrf
                        @method('delete')
                    <button style="background-color: #ff6961;  width: 70px;
                    height: 20px;"type="submit"></button>
                        </form>
                    </td> <td>
                    <form action="{{route('edit_estudiantes',$Estudiante->id)}}" method="GET">
                            @csrf
                    <button style="background-color: #616eff;  width: 70px;
                    height: 20px;"type="submit"></button>

                        </form></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
