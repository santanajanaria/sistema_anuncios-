@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    @if(isset($result))
                    <form role="form" action="{{route('perfil.update',$result->id)}}" method="post" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        @else
                        <form name="formProduct" id="formProduct" method="post" action="{{route('perfil.store',$user_id)}}" enctype="multipart/form-data">
                            @endif
                            {!! csrf_field() !!}
                            <input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">{{$type=='n'?'nome':'Nome da Empresa'}}</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{isset($result->name)?$result->name:old('name')}}">
                                    @error('name')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="contact">Contato</label>
                                    <input type="text" name="contact" id="contact" class="form-control" value="{{isset($result->contact)?$result->contact:old('contact')}}">

                                    @error('contact')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                @if($type == 'e')
                                <div class="form-group col-md-4">
                                    <label for="cnpj">cnpj</label>
                                    <input type="text" name="cnpj" id="cnpj" class="form-control" value="{{isset($result->cnpj)?$result->cnpj:old('cnpj')}}">

                                    @error('cnpj')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="cep">cep</label>
                                    <input type="text" name="cep" id="cep" class="form-control" value="{{isset($result->cep)?$result->cep:old('cep')}}">

                                    @error('cep')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="city">city</label>
                                    <input type="text" name="city" id="city" class="form-control" value="{{isset($result->city)?$result->city:old('city')}}">

                                    @error('city')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address">address</label>

                                    <input type="text" name="address" id="address" class="form-control" value="{{isset($result->address)?$result->address:old('address')}}">
                                    @error('address')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="street">street</label>
                                    <input type="text" name="street" id="street" class="form-control" value="{{isset($result->street)?$result->street:old('street')}}">

                                    @error('street')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number">number</label>
                                    <input type="text" name="number" id="number" class="form-control" value="{{isset($result->number)?$result->number:old('number')}}">

                                    @error('number')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">cadastrar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection