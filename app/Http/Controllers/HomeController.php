<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == "Admin"){
            $users = User::where('role', 'Usuario')->get();
            return view('admin.home', ['users' => $users]);
        }
        $user = Auth::id();
        $archivos = Archive::where('user_id', $user)->get();
        return view('home', ['archivos' => $archivos]);
    }

    public function admin(){
        if(auth()->user()->isAdmin){
            $users = User::where('role', 'Usuario')->get();
            return view('admin.home', ['users' => $users]);
        }else{
            return response("Acceso Prohibido", 403);
        }
    }
}
