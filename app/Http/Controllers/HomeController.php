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
            $context = ['users' => $users];
            return view('admin.home', $context);
        }
        $user = Auth::id();
        $archivos = Archive::where('user_id', $user)->get();
        $context = ['archivos' => $archivos];
        return view('home', $context);
    }

    public function admin(){
        $users = User::where('role', 'Usuario')->get();
        $context = ['users' => $users];
        return view('admin.home', $context);
    }

    public function admin_user($id){
        $user = User::where('role', 'Usuario')->where('id', $id)->first();
        $archivos = Archive::where('user_id', $user->id)->get();
        $context = ['archivos' => $archivos, 'user' => $user];
        return view('admin.user', $context);
    }
}
