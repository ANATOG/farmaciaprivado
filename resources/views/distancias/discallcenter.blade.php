@extends('home')
@section('contenido')

<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/"><h1>FARMACIA AMEDIC S.A.</h1></a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">

                       <h2>Distancias entre farmacias</h2><br/>
                      
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmoDistancia">
                        <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-primary">
                                    <tr class="bg-primary">
                                    
                                        <th>Farmacia A</th>
                                        <th>Farmacia B</th>
                                        <th>Distancia</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        @foreach($distancias as $d)
                                            <td>{{$d->FarmaciaA}}</td>
                                            <td>{{$d->FarmaciaB}}</td>
                                            <td>{{$d->distancia}}</td>   
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Fin ejemplo de tabla Listado -->
            
            
        </main>
        


@endsection