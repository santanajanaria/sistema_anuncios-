@extends('adminlte::page')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Produtos</h3>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <td>#</td>
              <td>Descrição</td>
              <td>Ações</td>
            </tr>
          </thead>
          @if(isset($result))
          <tbody>
            @php
            $i = 0;
            @endphp
            @foreach($result as $advert)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$advert->description}}</td>
              <td>
                <div class="form-group">
                  <a href="{{route('adverts.show',$advert->id)}}" class="text-primary m-1"><i class="fas fa-eye"></i></a>
                  <a href="{{route('adverts.edit',$advert->id)}}" class="text-warning m-2"><i class="fas fa-edit"></i></a>
                  <a href="{{route('adverts.remove',$advert->id)}}" class="text-danger m-1"><i class="fas fa-archive"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
          {{ $result->links() }}
          @endif
        </table>
        <div class="card-footer">
          <a href="{{route('adverts.form')}}"><button class="btn btn-success"> <i class="fas fa-file"></i> criar</button></a>
          <a href="/adverts/removed"> <button class="btn btn-danger"> <i class="fas fa-archive"></i> Arquivos Removidos</button> </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection