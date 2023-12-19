<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function register(request $request)
    {
        return view('user/register', []);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
        $user =  User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'agreed' => $request['agreed'] ? true : false,
            'email' => $request['email'],
            'password' => hash::make($request['password']),
            'role_id' => 2
        ]);

        if ($user) {
            return redirect('/services')->with('message', 'You are in now!');
        } else {
            return redirect('/register')->with('message', 'Something went wrong!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogRequest $request, Catalog $catalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        //
    }
}
