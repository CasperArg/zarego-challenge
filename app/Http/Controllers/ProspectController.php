<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Prospect;
use App\Mail\ProspectMail;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prospectsform');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $newProspect = Prospect::where('email', $request->email)->first();
        
        
        


        $rules = [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
        ];
        $input = $request->all();
        $validator = Validator::make($input,$rules);
        if ($validator->fails()) {
            // return response()->json(['error' => $validator->messages()], 400);
            return view('prospectsform', ['success' => false]);
        }

        $isnew = $newProspect === null;


        $success = true;

        if($isnew) {

            $prospect = new Prospect;
    
            $prospect->name = $request->name;
            $prospect->lastname = $request->lastname;
            $prospect->email = $request->email;
    
            $prospect->save();
    
            $success = $prospect->save();
    
            Mail::to(['mail'=> $request->email])->send(new ProspectMail());
    
        }
        
        return view('prospectsform', ['success' => $success, 'isnew' => $isnew]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
