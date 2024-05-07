<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crud;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/create/programas',function (){return view('cruds.programas.Create_programas');})->name('Crear_programas');
Route::get('/create/profesores',function (){return view('cruds.profesores.Create_Profesores');})->name('Crear_P');
Route::controller(crud::class)->group(function(){
    Route::get('/', 'inicio')->name('inicio');
    /*--CRUD PROFESORES INICIO--*/
    Route::get('/tabla_profesores', 'mostrar')->name('tablas_profesor');
    Route::post('guardar', 'guardar')->name('guardar_profesor');
    Route::delete('eliminar/{id}', 'eliminar')->name('eliminar');
    Route::get('profesor/{id}/formulario', 'edit')->name('edit_profesor');
    Route::put('profesor/{id}/actualizar', 'actualizar')->name('actualizar_profesor');
   /*--CRUD PROFESORES FINAL--*/

   /*--CRUD PROGRAMAS INICIO--*/
   Route::get('/programa/{id}', 'ver_programa_cursos')->name('ver_programa_cursos');
   Route::get('/tabla_programas', 'mostrar_programa')->name('tablas_programas');
   Route::post('guardar_programas', 'guardar_programa')->name('guardar_programas');
   Route::delete('eliminar_programas/{id}', 'eliminar_programa')->name('eliminar_programas');
   Route::get('programas/{id}/formulario', 'edit_programa')->name('edit_programas');
   Route::put('programas/{id}/actualizar', 'actualizar_programa')->name('actualizar_programas');
    /*--CRUD PROGRAMAS FINAL--*/
    
    /*--CRUD CURSOS INICIO--*/
    Route::get('/curso/{id}', 'ver_curso')->name('ver_curso');
    Route::get('/create/cursos', 'create_cursos')->name('create_cursos');
    Route::get('/tabla_cursos', 'mostrar_cursos')->name('tablas_cursos');
    Route::post('guardar_cursos', 'guardar_cursos')->name('guardar_cursos');
    Route::delete('eliminar_cursos/{id}', 'eliminar_cursos')->name('eliminar_cursos');
    Route::get('cursos/{id}/formulario', 'edit_cursos')->name('edit_cursos');
    Route::put('cursos/{id}/actualizar', 'actualizar_cursos')->name('actualizar_cursos');
    /*--CRUD CURSOS FINAL--*/

    /*--CRUD ESTUDIANTES INICIO--*/
    Route::get('/create/estudiantes', 'create_estudiantes')->name('create_estudiantes');
    Route::get('/tabla_estudiantes', 'mostrar_estudiantes')->name('tablas_estudiantes');
    Route::post('guardar_estudiantes', 'guardar_estudiantes')->name('guardar_estudiantes');
    Route::delete('eliminar_estudiantes/{id}', 'eliminar_estudiantes')->name('eliminar_estudiantes');
    Route::get('estudiantes/{id}', 'edit_estudiantes')->name('edit_estudiantes');
    Route::put('estudiantes/{id}/guardar', 'actualizar_estudiantes')->name('actualizar_estudiantes');
    /*--CRUD ESTUDIANTES FINAL--*/


});


Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
