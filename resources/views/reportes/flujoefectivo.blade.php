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
                        
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <h4>Reporte de Flujo de efectivo</h4><br>
                            <div class="col-md-9">
                            
                            <label class="col-md-3 form-control-label" for="text-input">Flujo de efectivo de la empresa</label>
                            <a href="{{url('flujototal')}}" target="_blank">
                            <button type="button" class="btn btn-success btn-lg">
                                <i class="fa fa-file fa-2x"></i>&nbsp;&nbsp;Reporte PDF
                            </button>
                            </a>
                            </div>
                        </div><br><br><br>
                        <div class="form-group row">
                            <h4>Flujo de efectivo por farmacia</h4><br>
                            <div class="col-md-9">                            
                            <div class="col-md-9">                                   
                                    @foreach($farmacias as $f)
                                        <a class="btn btn-primary" href="{{URL::action('FarmaciaController@flujopdf',$f->id)}}">                                        
                                            {{$f->nombre}}
                                        </a>                                             
                                    @endforeach
                                </select>        
                            </div> 
                        </div>
                    </div>
                </div>
        
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            
           
           
            
        </main>
        


@endsection