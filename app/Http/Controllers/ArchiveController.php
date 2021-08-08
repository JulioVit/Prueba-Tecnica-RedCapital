<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    //
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
                $nombre = "Archivo_".time().".".$file->guessExtension();
                $ruta = public_path("Archivos/".$nombre);
                copy($file, $ruta);
                dd("Archivo publicado exitosamente");
            }else{
                dd("Formato no soportado");
            }
        }

    }
}
