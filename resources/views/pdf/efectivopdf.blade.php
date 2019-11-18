<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FLUJO DE EFECTIVO</title>
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875rem;
            font-weight: normal;
            line-height: 1.5;
            color: #151b1e;           
        }
        .table-info,
        .table-info > th,
        .table-info > td {
        background-color: #d3eef6; }
        .bg-primary {
        background-color: #20a8d8 !important; }
        .bg-success,
        .bg-success > th,
        .bg-success > td {
        background-color: #cdedd8; }
        .table-danger,
        .table-danger > th,
        .table-danger > td {
        background-color: #fdd6d6; }
        .table {
            display: table;
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }
        .table-bordered {
            border: 1px solid #c2cfd6;
        }
        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #c2cfd6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #c2cfd6;
        }
        .table-bordered thead th, .table-bordered thead td {
            border-bottom-width: 2px;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #c2cfd6;
        }
        th, td {
            display: table-cell;
            vertical-align: inherit;
        }
        th {
            font-weight: bold;
            text-align: -internal-center;
            text-align: left;
        }
        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .izquierda{
            float:left;
        }
        .derecha{
            float:right;
        }
    </style>
</head>
<body>
    <div>
        <h3>AMEDIC S.A.<span class="derecha">{{now()}}</span></h3>
    </div>
    <div>
        <input type="hidden" {{$totalG=0}} {{$flujo=0}}
        {{$ingresos=0}}>
        <table class="table table-bordered">
            <thead colspan="2">
                <tr class="bg-primary">
                    <th  > 
                        <th >FLUJO DE EFECTIVO GENERAL AMEDIC S.A.</th>                  
                    </th> 
                </tr>
                               
            </thead>
            <tbody> 
                <tr class="bg-success"> 
                    <th colspan="2" >Ingresos en efectivo</th>                   
                </tr>
                <tr>
                    <th>Caja chica</th>                                            
                    <td>Q. {{$ca}}</td>                   
                </tr>
                <tr>
                    <th>Ventas</th>                                            
                    <td>Q. {{$v}}</td>                   
                </tr>
                
                {{$ingresos=$v+$ca}}
                
                <tr class="table-info">
                    <th >Total de Ingresos en efectivo (Efectivo disponible):</th>                                            
                    <td class="bg-primary">Q. {{$ingresos}}</td>                   
                </tr>


                <tr class="table-info"> 
                    <th colspan="2" >Egresos en efectivo</th>                   
                </tr>   
                <tr>
                    <th>Compras</th>                                            
                    <td>Q. {{$c}}</td>                   
                </tr>
                
                {{$totalG=$totalG+$c}}           
                @foreach($gastos as $g)
                <tr>
                    <th>{{$g->tipo}}</th>                                            
                    <td>Q. {{$g->monto}}</td>                   
                </tr>
                
                {{$totalG=$totalG+$g->monto}}
                @endforeach 
                <tr class="table-info">
                    <th >Total de egresos de efectivo:</th>                                            
                    <td class="bg-primary">Q. {{$totalG}}</td>                   
                </tr>
                {{$flujo=$ingresos -$totalG}}
                <tr class="bg-primary">
                    <th >Flujo de efectivo:</th>                                            
                    <td>Q. {{$flujo}}</td>                   
                </tr>
                                          
            </tbody>
        </table>
    </div>    
</body>
</html>