<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FICHA DE RESPONSABILIDAD</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h1>AMEDIC S.A.</h1>
                <pre>
Esta ficha es una replica de su original
VALIDA UNICAMENTE CON FIRMA
<br /><br />
FECHA DE DESCARGA: 
{{now()}}
</pre>


            </td>
            
            <td align="right" style="width: 40%;">

                <h3>CONTROL DE ACTIVOS</h3>
                <pre>
                    Responsabilidad
                    Control
                    Inventario
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>
@foreach($ficha as $f)
<div class="invoice">
    <h3>FICHA NUMERO {{$f->id}}</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Descripcion</th>            
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Activo</th>            
            
        </tr>
        <tr>
            <td>{{$f->activo}}</td>
        </tr>
        <tr>
            <th>Farmacia donde se encuentra</th>
        </tr>
        <tr>
            <td>{{$f->farmacia}}</td>
        </tr>
        <tr>
            <th>Fecha de emision de esta tarjeta</th> 
        </tr>
        <tr>            
            <td align="left">{{$f->fechaasig}}</td>
        </tr>
        <tr>
            <th>Costo del activo</th>            
        </tr>
        <tr>
            <td>{{$f->precio}}</td>
        </tr>
        <tr>
            <th>Observaciones</t>
        </tr>
        <tr>            
            <td>{{$f->descripcion}}</td>
        </tr>
        <tr>
            <th>Firma de responsabilidad</t>
        </tr>
        <tr>
            <td>{{$f->empleado}}</td>
        </tr>
        
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">F.</td>
            <td align="left" class="gray">_________________________</td>
        </tr>
        </tfoot>
    </table>
</div>
@endforeach 
<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }}  
            </td>
            <td align="right" style="width: 50%;">
                AMEDIC S.A.
            </td>
        </tr>

    </table>
</div>
</body>
</html>