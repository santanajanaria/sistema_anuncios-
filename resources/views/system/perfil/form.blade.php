@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    @if(isset($profile))
                    <form role="form" action="{{route('perfil.update',$profile->id)}}" method="post" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        @else
                        <form name="formProduct" id="formProduct" method="post" action="{{route('perfil.store',$user)}}" enctype="multipart/form-data">
                            @endif
                            {!! csrf_field() !!}
                            <input type="hidden" name="user_id" id="user_id" value="{{$user}}">
                            <input type="hidden" name="tP_id" id="tP_id" value="{{$tP_id}}">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="contact">Contato</label>
                                    <input type="text" name="contact" id="contact" class="form-control" value="{{isset($profile->contact)?$profile->contact:old('contact')}}">

                                    @error('contact')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cep">cep</label>
                                    <input type="text" name="cep" id="cep" class="form-control" value="{{isset($profile->cep)?$profile->cep:old('cep')}}">

                                    @error('cep')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="city">city</label>
                                    <input type="text" name="city" id="city" class="form-control" value="{{isset($profile->city)?$profile->city:old('city')}}">

                                    @error('city')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">address</label>

                                    <input type="text" name="address" id="address" class="form-control" value="{{isset($profile->address)?$profile->address:old('address')}}">
                                    @error('address')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="street">street</label>
                                    <input type="text" name="street" id="street" class="form-control" value="{{isset($profile->street)?$profile->street:old('street')}}">

                                    @error('street')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number">number</label>
                                    <input type="text" name="number" id="number" class="form-control" value="{{isset($profile->number)?$profile->number:old('number')}}">

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