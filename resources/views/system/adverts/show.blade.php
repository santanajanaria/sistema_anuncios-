@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="form-group">usuario: {{$user->name}}</div>
                    <div class="form-group">descrição: {{$result->description}}</div>
                    <div class="form-group">
                        <img src="{{asset(str_replace('photo','imagens',$result->photo))}}" style="width:100px;height:auto" alt="">
                    </div>
                    <div class="form-group">
                        Categoria: {{$category->type}}
                    </div>
                    <div class="form-group">
                        Email: {{$perfil->email}}
                    </div>
                    <div class="form-group">
                        Contato: {{$perfil->phone}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection