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
          <div class="row">
            <div class="form-group col">
              <div class="col"><strong>CONTATO:</strong>
                <p class="text-uppercase">{{$perfil->contact}}</p>
              </div>
              <div class="col"><strong>CEP:</strong>
                <p class="text-uppercase">{{$perfil->cep}}</p>
              </div>
              <div class="col"><strong>CIDADE:</strong>
                <p class="text-uppercase">{{$perfil->city}}</p>
              </div>
            </div>
            <div class="form-group col">
              <div class="col"><strong>BAIRRO:</strong>
                <p class="text-uppercase">{{$perfil->address}}</p>
              </div>
              <div class="col"><strong>RUA:</strong>
                <p class="text-uppercase">{{$perfil->street}}</p>
              </div>
              <div class="col"><strong>NUMERO:</strong>
                <p class="text-uppercase">{{$perfil->number}}</p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <a href="{{route('perfil.edit',$perfil->user_id)}}">
              <button class="btn btn-success"><i class="fas fa-edit"></i> Editar</button>
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