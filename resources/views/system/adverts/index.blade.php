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
                  <td>Contato</td>
                  <td>Email</td>
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
                  <td>{{$adverst->phone}}</td>
                  <td>{{$adverst->email}}</td>
                  <td></td>
                </tr>
                @endforeach
                {{ $result->links() }}
              </tbody>
            </table>
              <div class="card-footer">
                <a href="{{route('adverts.form')}}"><button class="btn btn-success"> <i class="fas fa-file"></i> criar</button></a>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
