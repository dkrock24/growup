<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MailsHelper;
use App\Models\User;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerRegisterController extends Controller
{
    private $mail;
    public function __construct(MailsHelper $mail)
    {
        //$this->middleware('auth');
        $this->mail = $mail;
    }

    public function index()
    {
        $result = User::all()->sortByDesc("id");
        return view('user/index', ['users' => $result]);
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
        $user = new User();
        $user->name = $request['name'];
        $user->last_name = $request['last_name'];
        $user->agreed = $request['agreed'] ? true : false;
        $user->email = $request['email'];
        $user->password = hash::make($request['password']);
        $user->role_id = 2;
        $user->save();

        if ($user) {
            
            $this->mail->newCustomer($user);

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
