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
            <td><a href="/download">Descargar</a></td>
        </tr>
    @endforeach
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a>Para agregar un archivo nuevo debe considerar las extensiones soportadas. Ante cualquier problema comuniquese con un administrador</a>
                <form action="/guardar" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="urlarchivo">
                    <input type="submit" value="subir">
                </form>
            </div>
        </div>
    </div>
</table>

</body>
</html>

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection
