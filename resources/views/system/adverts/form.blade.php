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
                            <input type="hidden" name="profile_id" id="profile_id" value="{{isset($result->profile_id)?$result->profile_id:$profile->id}}">
                            <input type="hidden" name="tP_id" id="tP_id" value="{{isset($result->tP_id)?$result->tP_id:$profile->tP_id}}">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="description">Descrição</label>
                                    <input class="form-control " type="text" name="description" id="description" value="{{isset($result->description)?$result->description:old('description')}}">
                                    @error('description')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category_id">Categoria</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $category)
                                        <option {{isset($result->category_id) == $category->id?'selected':''}} value="{{$category->id}}">{{$category->type}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="description">foto</label>
                                    <div class="col-5 text-center">
                                        @if(isset($result))
                                        <img src="{{asset(str_replace('photo','imagens',$result->photo))}}" alt="user-avatar" class="img-circle img-fluid">
                                        @endif
                                        <input type="file" name="photo" id="photo" value="{{isset($result->photo)?asset(str_replace('photo','imagens',$result->photo)):old('photo')}}">
                                    </div>
                                    @error('photo')
                                    <p class="text-danger">{{$message??''}}</p>
                                    @enderror
                                </div>
                            </div>
                            @if($result??'')
                            <button class=" btn btn-{{($result??'')?'warning':'info'}}" type="submit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </button>
                            @else
                            <button class=" btn btn-{{($result??'')?'info':'success'}}" type="submit"><i class="fas fa-plus"></i>
                                Cadastrar
                            </button>
                            @endif
                            <a href="{{route('adverts.index')}}" class="">
                                <button class="btn btn-default ">
                                    <i class="fas fa-reply"></i>Voltar
                                </button>
                            </a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection