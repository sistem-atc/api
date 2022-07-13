<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
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
            'cnpj' => 'required',
            'email' => 'required',
            'user' => 'required',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e){
            return $e->errors();
        }



        return Client::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cnpj)
    {
        
        return Client::where('cnpj', $cnpj)->get(); 
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cnpj)
    {
        
        $request->validate([
            'cnpj' => 'required',
            'email' => 'required',
            'user' => 'required',
        ]);

        return Client::where('cnpj', $cnpj)->update($request->all()); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cnpj)
    {
        $client =  Client::where('cnpj', 'like', $cnpj)->get();
        return Client::destroy($client);
    }
}
