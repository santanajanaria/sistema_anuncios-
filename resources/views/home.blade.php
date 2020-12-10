@extends('adminlte::page')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Meus anúncios') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <div class="row col-md-12">
            @foreach($adverts as $advert)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Digital Strategist
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$advert->description}}</b></h2>
                      <p class="text-muted text-sm">
                        <b>Categoria: </b>
                        @foreach($categories as $category)
                        @if($category->id == $advert->category_id)
                        {{$category->type}}</p>
                      @endif
                      @endforeach
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li">
                            <i class="fas fa-lg fa-building"></i>
                          </span> Endereço:
                          @if(isset($perfil->user_id) == $advert->user_id)
                          {{$perfil->cep}}
                          {{$perfil->city}}
                          {{$perfil->address}}
                          {{$perfil->street}}
                          {{$perfil->number}}
                        </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{$perfil->contact}}</li>
                        @endif
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset(str_replace('photo','imagens',$advert->photo))}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection