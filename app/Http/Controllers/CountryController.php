<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Country::all();
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

        return Country::create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigocountry)
    {
        return Country::where('Tabela', $codigocountry)->get(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigocountry)
    {
        
        $request->validate([
            'user' => 'required',
        ]);

        return Country::where('Tabela', $codigocountry)->update($request->all()); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigocountry)
    {
        
        $country =  Client::where('Tabela', 'like', $codigocountry)->get();
        return Client::destroy($country);
        
    }
}
