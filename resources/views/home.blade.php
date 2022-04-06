@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header "> 
                    <div class="row m-1">
                        <div class="col-md-6">
                            
                    <h1 style="font-family: cursive;font-size: 25px;">Lista de movimientos</h1>
                        </div>
                    <div class="col-md-6">
                        <form action=" {{route('home.search')}} " method="POST">
                            @csrf
                            desde:
                            <input type="date" name="desde" id="desde" value="">
                            <br>    
                            hasta:
                            <input style="margin-top:1%;margin-left: 1%;" type="date" name="hasta" id="hasta" value="">
                            <button href="" value="btn_buscar" name="btn_buscar" class="btn btn-info btn-sm"> Buscar</button>
                            <button href="" value="btn_pdf" name="btn_pdf" class="btn btn-danger btn-sm">PDF</button>
                <a href="{{route('movimientos.create')}}" style=" ;" name="btn_nuevo" class="  btn btn-success btn-sm">Nuevo</a>
                        </form>
                    </div>
                </div> 
                    </div>

                <div class="card-body">

                    <table class="table table-striped" >
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Responsable</th>
                        <th style="text-align: center;">Detalle</th>
                        <th style="text-align: center;">Categoria</th>
                        <th style="text-align: center;">Tipo</th>
                        <th style="text-align: center;">Fecha</th>
                        <th style="text-align: center;">Valor</th>
                        <th style="text-align: center;">Acciones</th>
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
                            <td style="text-align: center;">{{$loop->iteration}}</td>
                            <td  style="text-align: center;">{{$mov->usu_nombre}} {{$mov->usu_apellido}}</td>
                            <td  style="text-align: center;">{{$mov->mov_nombre}}</td>
                            <td  style="text-align: center;">{{$mov->cat_nombre}}</td>
                            
                            @if($mov->cat_tipo==1)
        <td  style="text-align: center;">Ingreso</td>
        @else
        <td  style="text-align: center;">Egreso</td>
        @endif 
                            <td  style="text-align: center;">{{$mov->mov_fecha}}</td>
                            <td  style="text-align: center;">{{number_format($mov->mov_valor,2)}} $</td>
                            <td>
                                <div class="row">
                    
            <a href="{{route('movimientos.edit',$mov->mov_id)}}" class="btn btn-primary btn-sm">  Editar</a>
        
            <form  style="margin-left: 1%" action="{{route('movimientos.destroy',$mov->mov_id)}}" method="POST" onsubmit="return confirm('desea eliminar?')">
            @csrf
            <!-- <a href="" class="btn btn-danger">Eliminar</a> -->
                <button class="btn btn-danger btn-sm">eliminar</button>
            </form>
                </div>
                            </td>
                        </tr>
                        
                    @endforeach   
                    <tr>
                        <th colspan="2">Totales:</th>
                        <th style="text-align:center;">Ingreso:{{number_format($t_ing,2)}} $</th>
                        <th style="text-align:center;">Egreso:{{number_format($t_egr,2)}} $</th>
                        <th style="text-align:center;">Saldo:{{number_format($t_saldo,2)}} $</th>
                    </tr>                 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
