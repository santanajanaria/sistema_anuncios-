@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="form-group">usuario: {{$result->Profile->User->name}}</div>
                    <div class="form-group">descrição: {{$result->description}}</div>
                    <div class="form-group">
                        <img src="{{asset(str_replace('photo','imagens',$result->photo))}}" style="width:100px;height:auto" alt="">
                    </div>
                    <div class="form-group">
                        Categoria: {{$result->Category->type}}
                    </div>
                    <div class="form-group">
                        Email: {{$result->Profile->User->email}}
                    </div>
                    <div class="form-group">
                        Contato: {{$result->Profile->contact}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection