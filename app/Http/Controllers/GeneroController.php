<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App \{
    User, Role, Genre
};
use App\Http\Requests\GeneroRequest;


class GeneroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing()
    {
        $genres = Genre::all();

        return response()->json(
            $genres->toArray()
        );
    }

    public function index()
    {
        return view('genero.index');
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request)
    {
        if ($request->ajax()) {
            Genre::create($request->all());
            return response()->json([
                "mensaje" => $request->all(),
                // "mensaje" => "creado"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre=Genre::find($id);
        return response()->json(
            $genre->toArray()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genre=Genre::find($id);
        $genre->fill($request->all());
        $genre->save();
        return response()->json([
                "mensaje"=>"listo"
            ]
        ); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $genre->delete($id);
        Genre::findOrFail($id)->delete();
        return response()->json([
                "mensaje"=>"borrado"
            ]
        ); 
    }
}
