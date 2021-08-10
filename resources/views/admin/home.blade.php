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
<body onload="cargarUsuarios()">
    <div class="container">
        <h4>Bienvenido al Panel de Administración</h4>
        <table id="customers">
            <br>
            <a>Puede revisar los archivos de los usuarios del sistema u agregar unos nuevos</a>
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
                    <td><a href="/admin/{{$u->id}}">Ver Historico</a></td>
                </tr>
            @endforeach
        </table>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a>Para agregar un archivo nuevo debe considerar las extensiones soportadas. Debe señalar el usuario al cual se le asocia el archivo.</a>
                <div>
                    <form id="formSubida" action="/admin" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="urlarchivo" id="archivo">
                        <label for="user">Escoja un usuario:</label>
                        <select name="user" id="user">
                            @foreach($users as $u)
                                <option value={{$u->id}}>{{$u->name}}</option>
                            @endforeach
                        </select>
                        <button id="btSubirArchivo" type="submit" class="btn btn-success botonGuardarAsignatura">
                            Vincular archivo al usuario
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
