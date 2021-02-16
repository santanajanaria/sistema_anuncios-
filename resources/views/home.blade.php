@extends('adminlte::page')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="form-group col-md-6">
              <form role="form" action="{{route('adverts.search')}}" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                  {!! csrf_field() !!}
                  <input type="search" name="searchAdvert" id="searchAdvert" class="form-control" placeholder="Pesquisar Anúncios aqui ...">
                  <div class="input-group-append">
                    <button class="input-group-text"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <div class="form-group col-md-6">
              <form role="form" action="{{route('adverts.searchC')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="input-group mb-3">
                  <select name="searchC" id="searchC" class="form-control">
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->type}}</option>
                    @endforeach
                  </select>
                  <div class="input-group-append">
                    <button class="input-group-text"><i class=" fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <div class="row col-md-12">
            @foreach($adverts as $advert)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <a href="{{route('adverts.view',$advert->id)}}">
                <div class="card bg-light">
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{$advert->description}}</b></h2>
                        <p class="text-muted text-sm">
                          <b>Categoria: </b>
                          {{$advert->Category->type}}
                        </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li">
                              <i class="fas fa-lg fa-building"></i>
                            </span> Endereço:
                            {{$advert->Profile->cep}}
                            {{$advert->Profile->city}}
                            {{$advert->Profile->address}}
                            {{$advert->Profile->street}}
                            {{$advert->Profile->number}}
                          </li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Contato : {{$advert->Profile->contact}}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> Nome : {{$advert->Profile->User->name}}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        @foreach($imagens as $image)
                        @if($image->advert_id == $advert->id)
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="card-img-top" src="{{asset(str_replace('photo','imagens',$image->photo))}}" alt="Photo">
                            </div>
                            <div class="carousel-item">
                              <img src="..." class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                              <img src="..." class="d-block w-100" alt="...">
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <i class="fas fa-eye">
                        @php
                        $soma = 0;
                        foreach($views as $view){
                        if($view->advert_id == $advert->id){
                        $soma +=$view->look;
                        }
                        }
                        @endphp
                        {{$soma}}
                      </i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection