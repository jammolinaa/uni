<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Models\cursos;
use App\Models\profesores;
use App\Models\programas;
use Illuminate\Http\Request;

class crud extends Controller
{
        /*--CRUD PROESORES INICIO*/
    public function edit($id){
        $profesor=profesores::find($id);
        return view('cruds.profesores.Actualizar_Profesores',compact('profesor'));
    }
    public function inicio(){

        $contpro=programas::all()->count();
        $contcur=cursos::all()->count();
        $contest=Estudiantes::all()->count();
        $contprofe=profesores::all()->count();

        $programas=programas::all();
        $curso=cursos::all();
        $Estudiantes=Estudiantes::all();
        $profesores=profesores::all();
        $mejore=[];
        $i=0;

        foreach ($programas as $programa) {
                $curso=cursos::select('id','Curso','promedio_curso','Programa_id')
                ->orderBy('promedio_curso','desc')
                ->where('Programa_id','=',$programa->id)
                ->first();
                $i++;
                $mejore[$i]=$curso;
        }

        $ii=1;
        return view('index',compact('programas','mejore','curso','ii'),compact('contcur','contpro','contest','contprofe'),compact('Estudiantes','profesores'));
    }
    public function mostrar(){
        $profesor=profesores::paginate();
        return view('cruds.profesores.tables',compact('profesor'));
    }
    public function eliminar($id){
        $profesor=profesores::find($id);
        $profesor->delete();
        return redirect()->route('tablas_profesor');
    }
    public function guardar(Request $r){
        $profesor= new profesores();
        $profesor->cedula=$r->cedula;
        $profesor->nombre=$r->nombre;
        $profesor->apellido=$r->apellido;
        $profesor->edad=$r->edad;
        $profesor->correo=$r->correo;
        $profesor->contraseña=$r->contraseña;
        $profesor->save();
        return redirect()->route('tablas_profesor');
    }
    public function actualizar($id ,Request $r){
        $profesor=profesores::find($id);
        $profesor->cedula=$r->cedula;
        $profesor->nombre=$r->nombre;
        $profesor->apellido=$r->apellido;
        $profesor->edad=$r->edad;
        $profesor->correo=$r->correo;
        $profesor->contraseña=$r->contraseña;
        $profesor->save();
        return redirect()->route('tablas_profesor');
    }


    /*--CRUD PROFESORES FINAL*/

    /*--CRUD PROGRAMAS INICIO*/


    public function ver_programa_cursos($id){
        $cursos = cursos::select('id','Curso','Programa_id','Profesor_id','promedio_curso')
        ->orderBy('promedio_curso','desc')
        ->where('Programa_id','=',$id)
        ->get();
        return view('cruds.programas.Programas_cursos',compact('cursos'));
    }

    public function edit_programa($id){
        $programas=programas::find($id);
        return view('cruds.programas.Actualizar_programas',compact('programas'));
    }
    public function mostrar_programa(){
        $programas=programas::paginate();
        return view('cruds.programas.tabla_programas',compact('programas'));
    }
    public function eliminar_programa($id){
        $programas=programas::find($id);
        $programas->delete();
        return redirect()->route('tablas_programas');
    }
    public function guardar_programa(Request $r){
        $programas= new programas();
        $programas->programa=$r->programa;
        $programas->save();
        return redirect()->route('tablas_programas');
    }
    public function actualizar_programa($id ,Request $r){
        $programas=programas::find($id);
        $programas->programa=$r->programa;
        $programas->save();
        return redirect()->route('tablas_programas');
    }


    /*--CRUD PROGRAMAS FINAL*/

    /*-- CRUD CURSOS INICIO--*/
        public function ver_curso($id){
            $Estudiantes = Estudiantes::select('id','Curso_id','Identificacion','nombre','apellido','edad','correo','contraseña','n1','n2','n3','promedio')
            ->orderBy('promedio','desc')
            ->where('Curso_id','=',$id)
            ->get();
            return view('cruds.cursos.curso',compact('Estudiantes'));
        }
        public function mostrar_cursos(){
            $cursos=cursos::all();
            $profesor=profesores::all();
            $programa=programas::all();
            $cont=0;
            $prom=0;
            $Estudiante=Estudiantes::all();
            foreach ($Estudiante as $Estudiantes) {
                $cursos=cursos::all();
                foreach ($cursos as $c) {
                    cursos::where('id','=',$c->id)->update(['promedio_curso'=> (0)]);
                    $E = Estudiantes::where('Curso_id','=',$c->id)->get();
                     $cont=0;
                     $prom=0;
                foreach ($E as $Es) {
                    $prom+=$Es->promedio;
                    $cont++;
                    cursos::where('id','=',$c->id)->update(['promedio_curso'=> ($prom/$cont)]);
                }

            }
            }
        return view('cruds.cursos.tabla_Cursos',compact('cursos'),compact('programa','profesor'));
        }
        public function eliminar_cursos($id){
            $cursos=cursos::find($id);
            $cursos->delete();
            return redirect()->route('tablas_cursos');
        }
        public function guardar_cursos(Request $r){
            $cursos= new cursos();
            $cursos->Curso=$r->Curso;
            $cursos->Programa_id=$r->Programa_id;
            $cursos->Profesor_id=$r->Profesor_id;
            $cursos->save();
            return redirect()->route('tablas_cursos');
        }
        public function create_cursos(Request $r){
            $profesor=profesores::all();
            $programa=programas::all();
            return view('cruds.cursos.Create_Cursos',compact('programa','profesor'));
        }
        public function edit_cursos($id){
            $cursos=cursos::find($id);
            $profesor=profesores::all();
            $programa=programas::all();
            return view('cruds.cursos.Actualizar_Cursos',compact('cursos'),compact('profesor','programa'));
        }
        public function actualizar_cursos($id,Request $r){
            $cursos=cursos::find($id);
            $cursos->Curso=$r->Curso;
            $cursos->Programa_id=$r->Programa_id;
            $cursos->Profesor_id=$r->Profesor_id;
            $cursos->save();
            return redirect()->route('tablas_cursos',compact('cursos'));
        }
        /*--CRUD ESTUDIANTES INICIO--*/
        public function mostrar_estudiantes(){
            $Estudiantes=Estudiantes::all();
            $cursos=cursos::all();
            $mejore=[];
            $programas=programas::all();
            foreach ($Estudiantes as $Estudiante) {
                foreach ($programas as $programa) {
                    $programa->where('id','=',$Estudiante->cursos->Programa_id)->get();
                    $mejore[$programa->id]=$programa;
                }
            }
            return view('cruds.Estudiantes.tabla_Estudiantes',compact('Estudiantes','mejore'),compact('programas'));
        }
        public function eliminar_estudiantes($id){
            $Estudiantes=Estudiantes::find($id);
            $Estudiantes->delete();
            return redirect()->route('tablas_estudiantes');
        }
        public function guardar_estudiantes(Request $r){
            $Estudiantes= new Estudiantes();
            $Estudiantes->identificacion=$r->identificacion;
            $Estudiantes->nombre=$r->nombre;
            $Estudiantes->apellido=$r->apellido;
            $Estudiantes->edad=$r->edad;
            $Estudiantes->correo=$r->correo;
            $Estudiantes->contraseña=$r->contraseña;
            $Estudiantes->n1=$r->nota_1;
            $Estudiantes->n2=$r->nota_2;
            $Estudiantes->n3=$r->nota_3;
            $n1=$r->nota_1;
            $n2=$r->nota_2;
            $n3=$r->nota_3;
            $prom=($n1+$n2+$n3)/3;
            $Estudiantes->promedio=$prom;
            $Estudiantes->Curso_id=$r->Curso_id;
            $Estudiantes->save();
            return redirect()->route('tablas_estudiantes');
        }
        public function create_estudiantes(Request $r){
            $cursos=cursos::all();
            return view('cruds.Estudiantes.Create_Estudiantes',compact('cursos'));
        }
        public function edit_estudiantes($id){
            $Estudiantes=Estudiantes::find($id);
            $cursos=cursos::all();
            return view('cruds.Estudiantes.Actualizar_Estudiantes',compact('Estudiantes'),compact('cursos'));
        }
        public function actualizar_estudiantes($id,Request $r){
            $Estudiantes=Estudiantes::find($id);
            $Estudiantes->identificacion=$r->identificacion;
            $Estudiantes->nombre=$r->nombre;
            $Estudiantes->apellido=$r->apellido;
            $Estudiantes->edad=$r->edad;
            $Estudiantes->correo=$r->correo;
            $Estudiantes->contraseña=$r->contraseña;
            $Estudiantes->n1=$r->nota_1;
            $Estudiantes->n2=$r->nota_2;
            $Estudiantes->n3=$r->nota_3;
            $n1=$r->nota_1;
            $n2=$r->nota_2;
            $n3=$r->nota_3;
            $prom=($n1+$n2+$n3)/3;
            $Estudiantes->promedio=$prom;
            $Estudiantes->Curso_id=$r->Curso_id;
            $Estudiantes->save();
            return redirect()->route('tablas_estudiantes',compact('Estudiantes'));
        }

        /*--CRUD ESTUDIANTES FINAL--*/
    }

