<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function form(){
        return view('form');
    }

    public function guardar(Request $request){
        //dd($request->file());
        if($request->hasFile("urlarchivo")){
            $file = $request->file("urlarchivo");
            $extension = $file->guessExtension();
            // Extensiones permitidas en el sistema
            $compatibles = array("pdf", "doc", "docx", "csv", "xlsx", "xml", "txt");
            //dd($compatibles);
            if(in_array($extension, $compatibles)){
                $nombre = "Doc_".time().".".$file->guessExtension();
                $ruta = public_path("Archivos/".$nombre);
                copy($file, $ruta);
                $archivo = new Archive;
                $archivo->name = $nombre;
                $user = Auth::id();
                $archivo->user_id = $user;
                $archivo->save();
                return view('form');
            }else{
                dd("Formato no soportado");
                return view('form');
            }
        }
        return view('form');
    }

    public function descargar(){

    }
}
