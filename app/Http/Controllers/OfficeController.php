<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\office;


class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $offices = Office::all();
        return view('officeCRUD.index', compact('offices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('officeCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'city' => 'required',
            'phone' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postalCode' => 'required',
            'territory' => 'required',

        ]);


        //$var = office::create($request->all());
        //return redirect()->route('officeCRUD.index')
          //              ->with('success','Office created successfully');
        try{
            $office = new office();
            $office->officeCode = rand(5,2000);
            $office->city = $request->city;
            $office->phone = $request->phone;
            $office->addressLine1 = $request->addressLine1;
            $office->addressLine2 = $request->addressLine2;
            $office->state = $request->state;
            $office->country = $request->country;
            $office->postalCode = $request->postalCode;
            $office->territory = $request->territory;
            $office->save();

            return redirect()->route('officeCRUD.index');
        }

        catch(Exception $e){
            return "fatal error -".$e->getMesagge();
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
        
            
        $office = office::find($id);
        return view('officeCRUD.show',compact('office'));
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
        $office = office::find($id);
        return view('officeCRUD.edit',compact('officeCode'));
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
        $this->validate($request, [
            'city' => 'required',
            'phone' => 'required',
            'adressLine1' => 'required',
            'AdressLine2' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postalCode' => 'required',
            'territory' => 'required',
        ]);

        Office::find($id)->update($request->all());
        return redirect()->route('officeCRUD.index')
                        ->with('success','Item updated successfully');

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
        Office::find($id)->delete();
        return redirect()->route('officeCRUD.index')
                        ->with('success','Item deleted successfully');
        }
    }


