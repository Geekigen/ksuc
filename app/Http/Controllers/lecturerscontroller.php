<?php

namespace App\Http\Controllers;

use App\Models\lecturer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class lecturerscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturer=lecturer::all();

        return view('layouts.lecs')
        ->with('lecturer',$lecturer)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.lecscreate');
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
            'Name'=>'Required',
           
            'email' => ['required', 'string', 'email', 'max:255'],
            ]);

            $nominal= new lecturer;

            $nominal->name=$request->input('Name');
            $nominal->mail=$request->input('email');
     
            Alert::success('Name added', 'the name was added successfully');
            $nominal->save();
            return back()->with('success', 'Task Created Successfully!');
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
    {  $lecturer=lecturer::find($id)->first();
        return view('layouts.lecsedit')
        ->with('lecturer',$lecturer);
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
       
        $this->validate($request, [
            'Name'=>'Required',
           
            'email' => ['required', 'string', 'email', 'max:255'],
            ]);


            $lecturer=lecturer::where('id',$id)
            ->update([

                'name'=>$request->input('Name'),
                'mail'=>$request->input('email'),
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=lecturer::find($id);
        $temp->delete();
        return back()->with('status',__('Record deleted'));
    }
}
