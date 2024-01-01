<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use Illuminate\Http\Request;

class CatalogController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Catalog::all()->sortByDesc("id");
        return view('catalog/index', ['catalog' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catalog/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;

        Catalog::create($data);
        return redirect('catalog')->with('message', 'Record was created!');
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
    public function edit($catalog)
    {
        $catalog = Catalog::find($catalog);

        return view('catalog/create', ['catalog'=> $catalog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $catalog = Catalog::find($id);
        $data =  $request->all();
        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;


        $catalog->update($data);

        return redirect('catalog')->with('message','Catalog has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();

        return redirect('catalog')->with('message','Catalog has been deleted.');
    }
}
