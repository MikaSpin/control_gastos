<?php

namespace App\Http\Controllers;
use App\Movimientos;
use App\Categorias;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movimientos=movimientos::all();
        $movimientos=DB::select("SELECT * FROM movimientostable m
            join categorytable c on m.cat_id=c.cat_id
            join users s on m.usu_id=s.usu_id");
        // $movimientos=Movimientos:where('cat_tipo','cat_id');
        // $movimientos['cat_tipo']=Movimientos::find()->cat_tipo;
        return view('home')->with('movimientos',$movimientos    );
         }
        public function search(Request $request){


        $data=$request->all();
        $desde=date('Y-m-d');
        $hasta=date('Y-m-d');

        if (isset($data['desde'])) {
        $desde=$data['desde'];
        $hasta=$data['hasta'];



        $movimientos=DB::select("SELECT * FROM movimientostable m
           join categorytable c on m.cat_id=c.cat_id
           join users s on m.usu_id=s.usu_id
           WHERE m.mov_fecha BETWEEN '$desde' AND '$hasta'
           ");

        return view('home')
        ->with('movimientos',$movimientos)
        ->with('desde',$desde)
        ->with('hasta',$hasta)
        ;
        }
    }
      
        
    }

