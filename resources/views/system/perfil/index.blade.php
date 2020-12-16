@extends('adminlte::page')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
          @if($perfil)
          <div class="form-group">
            <p>{{$perfil->contact}}</p>
          </div>
          <div class="form-group">
            <p>{{$perfil->cep}}</p>
            <p>{{$perfil->city}}</p>
            <p>{{$perfil->address}}</p>
          </div>
          <div class="form-group">
            <p>{{$perfil->street}}</p>
            <p>{{$perfil->number}}</p>
          </div>
          <div class="form-group">
            <a href="{{route('perfil.edit',$perfil->user_id)}}">
              <button class="btn btn-success">Editar</button>
            </a>
          </div>
          @else
          <div class="form-group">
            <a href="{{route('perfil.form',$users->id)}}">
              <button class="btn btn-success">cadastrar</button>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection