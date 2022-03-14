@extends('layouts.app')
@section('content')
<h2 class="bg-dark test-white">Lista de usuarios</h2>

<a href="{{route('usuarios.create')}}" class="btn btn-danger">Nuevo</a>

<table class="table">
	<th>#</th>
	<th>nombre</th>
	<th>cedula</th>
	@foreach($users as $u)
	<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$u->usu_usuario}}</td>
		<td>{{$u->usu_cedula}}</td>
	</tr>
	@endforeach
</table>
@endsection		