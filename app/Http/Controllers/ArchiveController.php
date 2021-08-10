<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ArchiveController extends Controller
{
    public function guardar(Request $request){
        $user = Auth::id();
        $archivos = Archive::where('user_id', $user)->get();
        $context = ['archivos' => $archivos];
        if($request->hasFile("urlarchivo")){
            $file = $request->file("urlarchivo");
            $extension = $file->guessExtension();
            // Extensiones permitidas en el sistema
            $compatibles = array("pdf", "doc", "docx", "csv", "xlsx", "xml", "txt");
            if(in_array($extension, $compatibles)){
                $this->guardarArchivo($file, $user);
                return redirect('home', 302, $context);
            }else{
                dd("Formato no soportado");
                return redirect('home', 302, $context);
            }
        }
        return redirect('home', 302, $context);
    }

    public function guardar_admin(Request $request){
        $users = User::where('role', 'Usuario')->get();
        $context = ['users' => $users];
        if($request->hasFile("urlarchivo")){
            $data = $request->all();
            $id = $request->input('user');
            $file = $request->file("urlarchivo");
            $extension = $file->guessExtension();
            // Extensiones permitidas en el sistema
            $compatibles = array("pdf", "doc", "docx", "csv", "xlsx", "xml", "txt");
            if(in_array($extension, $compatibles)){
                $this->guardarArchivo($file, $id);
                return redirect('admin', 302, $context);
            }else{
                dd("Formato no soportado");
                return redirect('admin', 302, $context);
            }
        }
        return redirect('admin', 302, $context);
    }

    protected function guardarArchivo($file, $id){
        $nombre = "Doc_".time().".".$file->guessExtension();
        $ruta = public_path("Archivos/".$nombre);
        copy($file, $ruta);
        $archivo = new Archive;
        $archivo->name = $nombre;
        $archivo->user_id = $id;
        $archivo->save();
    }

    public function descargar($filename){
        $file_path = public_path() .'/Archivos/'. $filename;
        if (file_exists($file_path))
        {
            // Send Download
            return Response::download($file_path, $filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
}
