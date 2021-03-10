<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::get('reportes', 'ReportesController@index')->name('reportes.index');
Route::get('reportes/docentes', 'ReportesController@docentes')->name('reportes.docentes');
Route::get('reportes/materias', 'ReportesController@materias')->name('reportes.materias');
Route::get('reportes/busqueda', 'ReportesController@busqueda')->name('reportes.busqueda');
Route::get('reportes/resultado', 'ReportesController@resultado')->name('reportes.resultado');
Route::get('reportes/MateriaCarreraPeriodo', 'ReportesController@MateriaCarreraPeriodo')->name('reportes.MateriaCarreraPeriodo');
Route::get('reportes/resultadoMateria', 'ReportesController@resultadoMateria')->name('reportes.resultadoMateria');
Route::get('reportes/periodo', 'ReportesController@periodo')->name('reportes.periodo');
Route::get('reportes/AreaHorarios', 'ReportesController@AreaHorarios')->name('reportes.AreaHorarios');
Route::get('reportes/GuiasporCarrera', 'ReportesController@GuiasporCarrera')->name('reportes.GuiasporCarrera');
Route::get('reportes/UsoDocente', 'ReportesController@UsoDocente')->name('reportes.UsoDocente');
