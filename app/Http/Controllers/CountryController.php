<?php

namespace App\Http\Controllers;

use App\Models\County;
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
        return County::all();
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
                'countryid' => 'required',
                'countryname' => 'required',
                'user' => 'required'
            ]);
        }catch (\Illuminate\Validation\ValidationException $e){
            return $e->errors();
        }

        return County::create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigocountry)
    {
        return County::where('countryid', $codigocountry)->get(); 
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
            'countryid' => 'required',
            'countryname' => 'required',
            'user' => 'required'
        ]);

        return County::where('countryid', $codigocountry)->update($request->all()); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigocountry)
    {
        
        $country =  County::where('countryid', 'like', $codigocountry)->get();
        return County::destroy($country);
        
    }
}
