@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background: url({{asset(str_replace('photo','imagens',$result->photo))}}) center">
                    <h3 class="widget-user-username text-right">{{$result->Profile->User->name}}
                    </h3>
                    <h5 class="widget-user-desc text-right">
                        {{$legalNature->cpf == null? $legalNature->cnpj:$legalNature->cpf}}
                    </h5>
                </div>
                <div class="widget-user-image">
                    <!-- <img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar"> -->
                </div>
                <div class="card-footer">
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
                    <!-- /.row -->
                </div>
            </div>

            <!--  -->
        </div>
    </div>
</div>
@endsection