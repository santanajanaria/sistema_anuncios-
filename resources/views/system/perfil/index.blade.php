@extends('adminlte::page')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
          <div class="form-group">
            <p>name</p>
            <p>contact</p>
            @if($type == 'e')
            <p>cnpj
              @endif
          </div>

          <div class="form-group">
          </div>
          <div class="form-group">
            <p>cep</p>
            <p>city</p>
            <p>address</p>
          </div>
          <div class="form-group">
            <p>street</p>
            <p>number</p>
          </div>
          <div class="form-group">
            <a href="{{route('perfil.form',$user)}}">
              <button class="btn btn-success">Perfil</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection