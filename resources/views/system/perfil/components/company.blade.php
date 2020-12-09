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
                  <td>Data</td>
                  <td>Ações</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                {{ $result->links() }}
              </tbody>
            </table>
              <div class="card-footer">
                <button class="btn btn-success"> <i class="fas fa-file"></i> criar</button>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
