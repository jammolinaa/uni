<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<table class="table table-dark">

    <tr>
        <th>id </th>
        <th>Nombre cursos   </th>
        <th>Nombre Programa   </th>
        <th>Nombre Profesor   </th>
        <th>Promedio   </th>
        <th>Eliminar   </th>
        <th>Actualizar   </th>
        <th>Estudiantes   </th>
    </tr>
</thead>
<tfoot>

</tfoot>
<tbody>
    <tr>
        @foreach ($cursos as $curso)
        <td>{{$curso->id}}</td>
        <td>{{$curso->Curso}}</td>
        <td>{{$curso->programa->programa}}</td>
        <td>{{$curso->profesor->nombre}} {{$curso->profesor->apellido}}</td>
        <td>   {{$curso->promedio_curso}}</td>
        <td><form action="{{route('eliminar_cursos',$curso->id)}}" method="POST">
            @csrf
        @method('delete')
    <button style="background-color: #ff6961;  width: 70px;
    height: 20px;"type="submit"></button>
        </form>
    </td> <td>
    <form action="{{route('edit_cursos',$curso->id)}}" method="GET">
            @csrf
    <button style="background-color: #616eff;  width: 70px;
    height: 20px;"type="submit"></button>

        </form></td>
        <td>
            <form action="{{route('ver_curso',$curso->id)}}" method="GET">
                    @csrf
            <button style="background-color: #61ffab;  width: 70px;
            height: 20px;"type="submit"></button>

                </form></td>
    </tr>
    @endforeach

  </table>

