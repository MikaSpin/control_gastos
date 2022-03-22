@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1 style="font-family: cursive;font-size: 25px," >lista de movimientos</h1> <a href="{{route('movimientos.create')}}" style="margin-left: 0% ;" class="btn btn-success">Nuevo
                </a> </div>

                <div class="card-body">

                  <table class="table">
                      <th>#</th>
                      <th>Detalle</th>
                      <th>tipo</th>
                      <th>fecha</th>
                      <th>valor</th>
                      <th>Acciones</th>
                  </table>  
                 <!--    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  Has inciado session  {{ Auth::user()->usu_usuario }}
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
