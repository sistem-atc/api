<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Uf::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{
            $request->validate([
            'user' => 'required',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e){
            return $e->errors();
        }

        return Uf::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigouf)
    {
        return Uf::where('Tabela', $codigouf)->get(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigouf)
    {
        
        $request->validate([
            'user' => 'required',
        ]);

        return Uf::where('Tabela', $codigouf)->update($request->all()); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigouf)
    {
        
        $ufcod =  Client::where('Tabela', 'like', $codigouf)->get();
        return Uf::destroy($ufcod);

    }
}
