<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //dd(auth()->user()->name);
        if (auth()->user()->role_id == 2) {
            return redirect('services')->with('message', 'Hello!');
        }
        $result = "from admin user";
        return view('home', ['result' => $result]);
    }
}
