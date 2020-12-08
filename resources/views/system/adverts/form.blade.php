@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@if(isset($result)) Editar @else Cadastrar @endif Produto</div>
                <div class="card-body">
                    @if(isset($result))
                    <form role="form" action="{{route('adverts.update',$result->id)}}" method="post" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        @else
                        <form name="formProduct" id="formProduct" method="post" action="{{route('adverts.store')}}" enctype="multipart/form-data">
                            @endif
                            {!! csrf_field() !!}
                            <div class="row">
                                <input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
                                <div class="form-group col-md-5 m-1">
                                    <label for="description">Descrição</label>
                                    <input class="form-control " type="text" name="description" id="description" value="{{isset($result->description)?$result->description:old('description')}}">
                                    @error('description')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5 m-1">
                                    <label for="description">Contato</label>
                                    <input class="form-control " type="text" name="phone" id="phone" value="{{isset($result->phone)?$result->phone:old('phone')}}">
                                    @error('phone')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5 m-1">
                                    <label for="description">foto</label>
                                    <input class="form-control " type="file" name="photo" id="photo" value="{{isset($result->photo)?$result->photo:old('photo')}}">
                                    @error('photo')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5 m-1">
                                    <label for="description">email</label>
                                    <input class="form-control " type="text" name="email" id="email" value="{{isset($result->email)?$result->email:old('email')}}">
                                    @error('email')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                            </div>
                            @if($result??'')
                            <button class="btn btn-{{($result??'')?'warning':'info'}}" type="submit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            @else
                            <button class="btn btn-{{($result??'')?'info':'success'}}" type="submit"><i class="fas fa-plus"></i>
                                Cadastrar
                            </button>
                            @endif
                        </form>
                        <a href="{{route('adverts.index')}}">
                            <button class="btn btn-default">
                                <i class="fas fa-reply"></i>Voltar
                            </button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection