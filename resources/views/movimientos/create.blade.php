@extends('layouts.app')
@section('content')


<form action="" method="POST">
	@csrf

	<div class="container">
		<div class="row">
			<div class="col-md-4">
			<label for="">concepto</label>
			<select name="" id="" class="form-control">
			<option value="">elija una opcion</option>
			@foreach($categorias as $cat)
			<option value="{{$cat->cat_id}}">{{$cat->cat_nombre}} {{$cat->cat_tipo}}</option>
			@endforeach
		
			</select>
			</div>
			</div>
			<div>
			</form>

			@endsection	
