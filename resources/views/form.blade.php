@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/guardar" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="urlarchivo">
                    <input type="submit" value="subir">
                </form>
            </div>
        </div>
    </div>
@endsection
