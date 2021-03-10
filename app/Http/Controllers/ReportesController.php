<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Materia;
use App\Periodo;
use App\Carrera;
use App\Control;
use App\Guia;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }
    public function index()
    {
        $docentes= Docente::all();
        return view('reportes.index');
    }
    public function docentes(Request $request)
    {
        $docentes= Docente::all();
        return view('reportes.docentes',compact('docentes'));
    }
    public function materias(Request $request)
    {
        $docentes= Docente::all()->sortBy('DOC_NOMBRES');
        $materias= Materia::all();
        $periodos= Periodo::all();
        return view('reportes.materias',compact('docentes','materias','periodos'));
    }
    public function busqueda(Request $request)
    {
        $carreras= Carrera::all()->sortBy('CAR_NOMBRE');
        
        return view('reportes.busqueda',compact('carreras'));
    }
    public function resultado(Request $request)
    {
        $CAR_CODIGO= $request->select;
        $carreras= Carrera::all()->where('CAR_CODIGO', '=', $CAR_CODIGO);
        $materias= Materia::all()->where('CAR_CODIGO', '=', $CAR_CODIGO);
        $periodos= Periodo::all();
        $cantidad = array();
        foreach($periodos as $periodo){
            array_push($cantidad, $materias->where('PER_CODIGO', '=', $periodo->PER_CODIGO)->count());
        }
        
        //$materiasP= $materias->where('PER_CODIGO', '=', $periodos->PER_CODIGO)->count();
        return view('reportes.resultado',compact('CAR_CODIGO','carreras','materias','periodos','cantidad'));
       
    }
    public function MateriaCarreraPeriodo(Request $request)
    {   
        $carreras= Carrera::all()->sortBy('CAR_NOMBRE');
        $periodos= Periodo::all()->sortByDesc('PER_CODIGO');
        
        
        
        //$materiasP= $materias->where('PER_CODIGO', '=', $periodos->PER_CODIGO)->count();
        return view('reportes.MateriaCarreraPeriodo',compact('carreras','periodos'));
       
    }
    public function resultadoMateria(Request $request)
    {
        $CAR_CODIGO= $request->select;
        $PER_CODIGO= $request->select2;
        $carreras= Carrera::all()->where('CAR_CODIGO', '=', $CAR_CODIGO);
        $periodos= Periodo::all()->where('PER_CODIGO', '=', $PER_CODIGO);
        $materias=Materia::join('periodo', 'materia.PER_CODIGO', '=', 'periodo.PER_CODIGO')
        ->join('carrera', 'materia.CAR_CODIGO', '=', 'carrera.CAR_CODIGO')
        ->join('docente', 'docente.DOC_CODIGO', '=' , 'materia.DOC_CODIGO')
        ->select('materia.MAT_NOMBRE','materia.MAT_NRC','materia.MAT_CREDITOS','docente.DOC_NOMBRES','docente.DOC_APELLIDOS')
        ->where('materia.CAR_CODIGO', $CAR_CODIGO)
        ->where('materia.PER_CODIGO','=',$PER_CODIGO)
        ->groupBy('materia.MAT_NOMBRE','materia.MAT_NRC','materia.MAT_CREDITOS','docente.DOC_NOMBRES','docente.DOC_APELLIDOS')
        ->orderBy('materia.MAT_NOMBRE')
        ->get();
        return view('reportes.resultadoMateria',compact('materias','periodos','carreras')); 
    }
    public function periodo(Request $request)
    {
        $periodos= Periodo::all()->sortByDesc('PER_CODIGO');
        return view('reportes.periodo',compact('periodos'));
    }
    public function AreaHorarios(Request $request)
    {
        $PER_CODIGO= $request->select;
        $periodos= Periodo::all()->where('PER_CODIGO', '=', $PER_CODIGO);;
        $controls= Control::join('materia', 'materia.MAT_CODIGO', '=', 'control.MAT_CODIGO')
        ->select('control.CON_HORA_ENTRADA',DB::raw('count(CON_CODIGO) as Numero'))
        ->where('materia.PER_CODIGO','=',$PER_CODIGO)
        ->whereNotNull('control.CON_HORA_ENTRADA_R')
        ->groupBy('control.CON_HORA_ENTRADA')
        ->get();
        return view('reportes.AreaHorarios',compact('controls','periodos'));
       
    }
    public function GuiasporCarrera(Request $request)
    {   
        $carreras= Carrera::all()->sortBy('CAR_NOMBRE');
        $periodos= Periodo::all()->sortByDesc('PER_CODIGO');
        $CAR_CODIGO= $request->select;
        $PER_CODIGO= $request->select2;
        $FECH_INICIO= $request->inicio;
        $FECH_FINAL= $request->final;
        $guias= Guia::join('materia', 'materia.MAT_CODIGO', '=', 'guia.MAT_CODIGO')
        ->join('docente', 'docente.DOC_CODIGO', '=' , 'guia.DOC_CODIGO')
        ->where('guia.PER_CODIGO','=',$PER_CODIGO)
        ->where('materia.CAR_CODIGO','=',$CAR_CODIGO)
        ->orderBy('materia.MAT_NOMBRE','ASC')
        ->orderBy('materia.MAT_CODIGO','ASC')
        ->orderBy('guia.GUI_NUMERO','ASC')
        ->get();
        return view('reportes.GuiasporCarrera',compact('guias','carreras','periodos'));
       
    }
    public function UsoDocente(Request $request)
    {
        $DOC_CODIGO= $request->select;
        $PER_CODIGO= $request->select2;
        $materia= Materia::all()->where('DOC_CODIGO', '=', $DOC_CODIGO);
        $materias=$materia->where('PER_CODIGO','=',$PER_CODIGO);
        $periodos= Periodo::all()->sortByDesc('PER_CODIGO');
        $docentes= Docente::all()->sortBy('DOC_APELLIDOS');
        $controls= Control::join('materia', 'materia.MAT_CODIGO', '=', 'control.MAT_CODIGO')
        ->leftjoin('guia', 'control.GUI_CODIGO', '=', 'guia.GUI_CODIGO')
        ->select('control.MAT_CODIGO','control.CON_DIA','control.CON_EXTRA','control.CON_NUMERO_HORAS','control.CON_HORA_ENTRADA','control.CON_HORA_SALIDA','control.CON_HORA_ENTRADA_R','control.CON_HORA_SALIDA_R','materia.MAT_NOMBRE','materia.MAT_NRC','control.GUI_CODIGO','guia.GUI_NUMERO')
        ->where('control.DOC_CODIGO','=',$DOC_CODIGO)
        ->where('materia.PER_CODIGO','=',$PER_CODIGO)
        ->orderBy('materia.MAT_CODIGO','ASC')
        ->orderBy('materia.MAT_NOMBRE','ASC')
        ->orderBy('control.CON_DIA','DESC')
        ->get();
        
        return view('reportes.UsoDocente',compact('docentes','controls','materias','periodos'));
    }
}