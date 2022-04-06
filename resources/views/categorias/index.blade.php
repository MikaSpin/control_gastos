@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header "> 
                    <div class="row m-1">
                        <div class="col-md-12">
<label style="text-align: center;"> <h4>Crear una nueva categoria</h4></label>
	<a href="{{route('categorias.create')}}" class="btn btn-success btn-sm" style="margin-left:55%;">Nuevo</a>
</div>
<table class="table">
	<th>#</th>
	<th>nombre</th>
	<th>tipo</th>
	@foreach($categorias as $cat)

	<tr>
		<td>{{$loop->iteration}}</td>
		<td>{{$cat->cat_nombre}}</td>
		<td>{{$cat->cat_tipo}}</td>
	</td>
	<td>
		<div class="row">
			
	     <a href="{{route('categorias.edit',$cat->cat_id)}} " class="btn btn-primary btn-sm">Editar</a>
	     
	     <form action="{{route('categorias.destroy',$cat->cat_id)}}" method="POST" onsubmit="return-confirm('desa eliminar?')">
	     	@csrf
	     	<button class="btn btn-danger btn-sm">Eliminar</button>
	     </form>

		</div>

	 </td>
	</tr> 
	@endforeach
</table>
@endsection		