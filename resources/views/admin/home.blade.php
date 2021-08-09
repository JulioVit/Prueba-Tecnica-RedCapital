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
    <a>Bienvenido al Panel de Administración, puede revisar los archivos de los usuarios del sistema u agregar unos nuevos</a>
    <br>
    <tr>
        <th>Nombre de Usuario</th>
        <th>Correo Electrónico</th>
        <th>Opciones</th>
    </tr>
    @foreach($users as $u)
        <tr>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td><a href="/admin/user">Ver Historico</a></td>
        </tr>
    @endforeach
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a>Para agregar un archivo nuevo debe considerar las extensiones soportadas. Debe señalar el usuario al cual se le asocia el archivo.</a>
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
