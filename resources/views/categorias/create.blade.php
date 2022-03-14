@extends('layouts.app')
@section('content')
<h4 class="bg-dark">Formulario de regitro</h4>
<form action="{{route('categorias.store')}}"method="POST">
	@csrf
	<div class="mb-3" style="width:220px;">
	<label for="">nombre de la categoria</label>
	<input type="text" name="cat_nombre" id="cat_nombre">
	<select class="form-select" id="cat_tipo" name="cat_tipo" aria-label="Default select examplr">
    <option selected>seleccione un tipo </option>
    <option value="1">Ingreso</option>
    <option value="2">Egreso</option>
</select>
	<button type="submit" style="width:80px;"class="btn btn-success">Guardar</button>
</form>

	@endsection