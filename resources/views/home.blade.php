@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header "> 
                    <div class="row m-1">
                        <div class="col-md-7">
                            
                    <h1 style="font-family: cursive;font-size: 25px;">Lista de movimientos</h1>
                        </div>
                    <div class="col-md-5">
                        <form action=" {{route('home.search')}} " method="POST">
                            @csrf
                            desde:
                            <input type="date" name="desde" id="desde" value="">
                            <br>    
                            hasta:
                            <input type="date" name="hasta" id="hasta" value="">
                            <button href="" value="btn_buscar" name="btn_buscar" class="btn btn-info btn-sm"> Buscar</button>
                            <button href="" value="btn_pdf" name="btn_pdf" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
  <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
</svg></button>
                <a href="{{route('movimientos.create')}}" style=" ;" name="btn_nuevo" class="  btn btn-success btn-sm">Nuevo</a>
                        </form>
                    </div>
                </div> 
                    </div>

                <div class="card-body">

                    <table class="table table-striped" >
                        <th>#</th>
                        <th>Responsable</th>
                        <th>Detalle</th>
                        <th>Categoria</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                        <?php 
                        $t_ing=0;
                        $t_egr=0;
                        $t_saldo=0;
                        ?>
                        @foreach($movimientos as $mov)
                        <?php
                        if ($mov->cat_tipo==1) {
                            $t_ing+=$mov->mov_valor;
                        }else{
                            $t_egr+=$mov->mov_valor;
                        }
                        
                       $t_saldo=$t_ing-$t_egr;                        ?>

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$mov->usu_nombre}} {{$mov->usu_apellido}}</td>
                            <td>{{$mov->mov_nombre}}</td>
                            <td>{{$mov->cat_nombre}}</td>
                            
                            @if($mov->cat_tipo==1)
        <td>Ingreso</td>
        @else
        <td>Egreso</td>
        @endif 
                            <td>{{$mov->mov_fecha}}</td>
                            <td>{{number_format($mov->mov_valor,2)}} $</td>
                            <td>
                                <div class="row">
                    
            <a href="{{route('movimientos.edit',$mov->mov_id)}}" class="btn btn-primary">  Editar</a>
        
            <form  style="margin-left: 1%" action="{{route('movimientos.destroy',$mov->mov_id)}}" method="POST" onsubmit="return confirm('desea eliminar?')">
            @csrf
            <!-- <a href="" class="btn btn-danger">Eliminar</a> -->
                <button class="btn btn-danger">eliminar</button>
            </form>
                </div>
                            </td>
                        </tr>
                        
                    @endforeach   
                    <tr>
                        <th colspan="2">Totales:</th>
                        <th>Ingreso:{{number_format($t_ing,2)}} $</th>
                        <th>Egreso:{{number_format($t_egr,2)}} $</th>
                        <th>Saldo:{{number_format($t_saldo,2)}} $</th>
                    </tr>                 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
