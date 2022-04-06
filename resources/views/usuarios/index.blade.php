@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-7" style="background: #fff;">
		<h1 style="text-align: center; font-family: algeria;">Lista de <U></U>suarios <a href="{{route('usuarios.create')}}" class="btn btn-success" style="margin-left:50%;">Nuevo usuario</a></h1>
		
		<table class="table table-striped table-bordered ">
	<th style="text-align:center;">#</th>
	<th style="text-align:center;">nombre</th>
	<th style="text-align:center;">cedula</th>
	@foreach($users as $u)
	<tr>
		<td style="text-align:center;">{{$loop->iteration}}</td>
		<td style="text-align:center;">{{$u->usu_usuario}}</td>
		<td style="text-align:center;">{{$u->usu_cedula}}</td>
	</tr>
	@endforeach
</table>
	</div>
	<div class="col-md-2"></div>
</div>



@endsection		