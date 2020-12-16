@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class=" col-md-12 m-1">
                            @if(isset($result))
                            <form role="form" action="{{route('legalNatures.update',$result->id)}}" method="post" enctype="multipart/form-data">
                                {!! method_field('PUT') !!}
                                @else
                                <form name="formProduct" id="formProduct" method="post" action="{{route('legalNatures.store')}}" enctype="multipart/form-data">
                                    @endif
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                                    @if($user->type == 'n')
                                    <div class="form-group col-md-4 m-1">
                                        <label for="cpf">Cpf</label>
                                        <input class="form-control " type="text" name="cpf" id="cpf" value="{{isset($result->cpf)?$result->cpf:old('cpf')}}">
                                        @error('cpf')
                                        <p class="text-danger">{{$message??''}}</p>
                                        @enderror
                                    </div>
                                    @else
                                    <div class="form-group col-md-4 m-1">
                                        <label for="cnpj">cnpj</label>
                                        <input class="form-control " type="text" name="cnpj" id="cnpj" value="{{isset($result->cnpj)?$result->cnpj:old('cnpj')}}">
                                        @error('cnpj')
                                        <p class="text-danger">{{$message??''}}</p>
                                        @enderror
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">salvar</button>
                                    </div>
                                </form>
                        </div>
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