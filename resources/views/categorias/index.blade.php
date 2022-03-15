@extends('layouts.app')
@section('content')
<div>
<label> <h4>Crear una nueva categoria</h4></label>
	<a href="{{route('categorias.create')}}" class="btn btn-primary">
Nuevo</a>
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
			
	     <a href="{{route('categorias.edit',$cat->cat_id)}} " class="btn btn-primary">Editar</a>
	     
	     <form action="{{route('categorias.destroy',$cat->cat_id)}}" method="POST" onsubmit="return-confirm('desa eliminar?')">
	     	@csrf
	     	<button>Eliminar</button>
	     </form>

		</div>

	 </td>
	</tr> 
	@endforeach
</table>
@endsection		