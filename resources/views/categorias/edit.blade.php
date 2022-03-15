@extends('layouts.app')
@section('content')
<?php
$ing="";
$egr="";

if ($categorias->cat_tipo==1) {
$ing="selected";
	
}else{
$egr="selected";
}
?>
<h1>Editar Categoria</h1>
<form action="{{route('categorias.update',$categorias->cat_id)}}" method="POST">
@csrf
	<div class="mb-3" style="width:220px;">
	<label for="">nombre de la categoria</label>
	<input type="text" value="{{$categorias->cat_nombre}} " name="cat_nombre" id="cat_nombre">
	<select class="form-select" id="cat_tipo" name="cat_tipo" aria-label="Default select examplr">
    <option disabled>Seleccione un tipo </option>
    <option {{$ing}} value="1">Ingreso</option>
    <option {{$egr}} value="2">Egreso</option>
</select>
	<button type="submit" style="width:80px;"class="btn btn-success">Guardar</button>
</form>

	@endsection