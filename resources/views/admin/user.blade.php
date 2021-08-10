@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
        </style>
    </head>
    <body>
        <table id="information">
            <br>
            <a>Ha accedido al historico de un usuario en especifico, la información correspondiente al usuario se muestra a continuación</a>
            <br>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Correo Electrónico</th>
            </tr>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        </table>
        <table id="customers">
            <br>
            <a>Click sobre el nombre del archivo para descargar el mismo.</a>
            <br>
            <tr>
                <th>Nombre del Archivo</th>
                <th>Fecha de Creación</th>
                <th>Opciones</th>
            </tr>
            @foreach($archivos as $a)
                <tr>
                    <td>{{$a->name}}</td>
                    <td>{{$a->created_at}}</td>
                    <td><a href="/descargar/{{$a->name}}">Descargar</a></td>
                </tr>
            @endforeach
        </table>
        <button id="btVolver" onclick="history.go(-1)" class="btn btn-success botonVolver">
            Volver
        </button>
    </body>
</html>
@endsection
