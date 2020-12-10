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
          <tbody>
            @php
            $i = 0;
            @endphp
            @foreach($result as $adverst)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$adverst->description}}</td>
              <td>
                <div class="form-group">
                  <a href="{{route('adverts.show',$adverst->id)}}" class="text-primary m-1"><i class="fas fa-eye"></i></a>
                  <a href="{{route('adverts.edit',$adverst->id)}}" class="text-warning m-2"><i class="fas fa-edit"></i></a>
                  <a href="{{route('adverts.remove',$adverst->id)}}" class="text-danger m-1"><i class="fas fa-archive"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
          {{ $result->links() }}
        </table>
        <div class="card-footer">
          <a href="{{route('adverts.form')}}"><button class="btn btn-success"> <i class="fas fa-file"></i> criar</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection