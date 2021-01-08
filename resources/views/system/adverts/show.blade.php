@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-widget widget-user">
                <div class="row mb-2">
                    @foreach($photo as $image)
                    <img class="m-1" style="max-width: 30%;" src="{{asset(str_replace('photo','imagens',$image->photo))}}" alt="Photo">
                    <a href="{{route('imagem.destroy',$image->id)}}" class="text-danger m-1"><i class="fas fa-archive"></i></a>
                    @endforeach
                    <!-- /.col -->
                </div>
                <!--  -->
                <div class="col-md-4" style="background: url({{asset(str_replace('photo','imagens',$photo))}}) center">
                </div>
                <div class="widget-user-image">
                </div>
                <div class="card-footer">
                    <h3 class="widget-user-username">{{$result->Profile->User->name}}
                    </h3>
                    <h5 class="widget-user-desc">
                        {{$legalNature->cpf == null? $legalNature->cnpj:$legalNature->cpf}}
                    </h5>
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">DESCRIÇÃO</h5>
                                <span>{{$result->description}}</span>
                                <div class="form-group">
                                    <span class="description-text">Categoria: {{$result->Category->type}}</span>
                                </div>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">CONTATOS</h5>
                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    {{$result->Profile->User->email}}
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-phone"></i>/<i class="fab fa-whatsapp"></i>
                                    {{$result->Profile->contact}}
                                </div>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header"><i class="fas fa-map-marker-alt mr-1"></i>ENDEREÇO</h5>
                                <div class="div form-group">
                                    {{$result->Profile->city}} <br>
                                    {{$result->Profile->address}};
                                    {{$result->Profile->street}}; Nº:
                                    {{$result->Profile->number}}
                                </div>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    @php
                    $soma = 0;
                    foreach($view as $v){
                    if($v->advert_id == $advert->id){
                    $soma +=$v->look;
                    }
                    }
                    @endphp
                    <i class="fas fa-eye"></i>
                    {{$soma}}
                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">adicionar imagem</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Escolher Ingredientes</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    <div class="form-group" id="item">
                                        <form role="form" action="{{route('imagem.store')}}" method="post" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <input type="hidden" name="advert_id" id="advert_id" value="{{$result->id}}">
                                                    <label for="description">foto</label>
                                                    <div class="col-5 text-center">
                                                        <input type="file" name="photo" id="photo" value="{{isset($result->photo)?asset(str_replace('photo','imagens',$result->photo)):old('photo')}}">
                                                    </div>
                                                    @error('photo')
                                                    <p class="text-danger">{{$message??''}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">adcionar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.row -->
                </div>
            </div>

            <!--  -->
        </div>
    </div>
</div>
@endsection