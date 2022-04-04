<?php

namespace App\Http\Controllers;
use App\Movimientos;
use App\Categorias;
use DB;
use PDF;
use Illuminate\Http\Request;

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
     $desde=date('');
     $hasta=date('');   
        $movimientos=movimientos::all();
        $movimientos=DB::select("SELECT * FROM movimientostable m 
            join categorytable c on m.cat_id=c.cat_id 
            join users u on m.usu_id=u.usu_id");

        return view('home')->with('movimientos',$movimientos)->with('desde',$desde)->with('hasta',$hasta);
    }
    public function search(Request $request){

       $data=$request->all();
       $desde=date('Y-m-d');
       $hasta=date('Y-m-d');
   
       if(isset($data['desde'])){
        $desde=$data['desde'];
        $hasta=$data['hasta'];
       } 
       
        $movimientos=DB::select("SELECT * FROM movimientostable m 
            join categorytable c on m.cat_id=c.cat_id 
            join users u on m.usu_id=u.usu_id
            where m.mov_fecha BETWEEN '$desde' AND '$hasta'");
if (isset($data['btn_pdf'])) {
    $data=['movimientos'=>$movimientos];
    $pdf=PDF::loadView('movimientos.reporte',$data);
    return $pdf->stream('reporte.pdf');
}

 

        return view('home')->with('movimientos',$movimientos)->with('desde',$desde)->with('hasta',$hasta);
    }


}
