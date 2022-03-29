@extends('layouts.app')
@section('content')

<div style="fount-family: cursive;fount-stze: 25px;margin-left:40% ;">Editar Categoria</div>
<br>
<form action="{{route('movimientos.update',$movimientos->mov_id)}}" method="POST">
	@csrf

	<div class="" style="width:250px;margin-left: 40%;">
		<label class="form-label">Nombre</label>
		<input type="text" class="form-control" id="mov_nombre" value="{{$movimientos->mov_detalle}}" name="mov_nombre" required autocomplete="mov_nombre" autofocus aria-descmiribedby="emailHelp">

	</div>	

	<div class="" style="width:250px;margin-left: 40%;">
		<label class="form-label">Valor</label>
		<input type="text" class="form-control" id="mov_valor" value="{{$movimientos->mov_valor}}" name="mov_valor" required autocomplete="mov_valor" autofocus aria-describedby="emailHelp">

	</div>	

	<div class="" style="width:250px;margin-left: 40%;">
		<label class="form-label">fecha</label>
		<input type="text" class="form-control" id="mov_fecha" value="{{$movimientos->mov_fecha}}" name="mov_fecha" required autocomplete="mov_fecha" autofocus aria-describedby="emailHelp">

	</div>

	<div class="" style="width:510px;margin-left: 40%;">
	<label class="form-label">tipo de categoria</label>
	<div class="col-md-6">
	<select name="cat_id" id="cat_id" class="form-control">
	<option value="">Elija una opcion</option>
	@foreach($categorias as $cat)

	@if($cat->cat_id==$movimientos->cat_id)
	@if($cat->cat_id==1)
    @else
    @endif
    	<option selected value="{{$cat->cat_id}} "{{$cat->cat_nombre}} (Ingreso) </option>
    	@else
    	@if($cat->cat_tipo==1)
    	<option value="{{$cat->cat_id}} "> {{$cat->cat_nombre}} (Ingreso) </option>
    	@else
    	<option value="{{$cat->cat_id}} "> {{$cat->cat_nombre}}  (Ingreso) </option>
    	@endif
    @endif
    



    @endforeach
    </select>
   </div>
   </div>

   <br>
   <button type="submit" style="width:250px;margin-left: 40%;" class="btn btn-primary">Guardar </button>

   @endsection












