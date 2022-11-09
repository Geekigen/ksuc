<?php

namespace App\Http\Controllers;

use App\Models\nominal;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\SweetAlertServiceProvider;

class nominalrollcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
  {
    
   $nominal=nominal::all();

   return view('layouts.nominal')
   ->with('nominal',$nominal)
   ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('layouts.nominalcreate');
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
            'name'=>'Required',
            'adm'=>'Required',
            'school'=>'Required',
            'year'=>'Required'

            ]);

            $nominal= new nominal;

            $nominal->name=$request->input('name');
            $nominal->adm=$request->input('adm');
            $nominal->school=$request->input('school');
            $nominal->year=$request->input('year');
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
    {
        $student=nominal::find($id)->first();
        return view('layouts.nominaledit')
        ->with('student',$student);
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
            'Adm'=>'Required',
            'school'=>'Required'
            ]);

            $student=nominal::where('id',$id)
            ->update([

                'name'=>$request->input('Name'),
                'adm'=>$request->input('Adm'),
                
                'school'=>$request->input('school'),
            ]);
            return back()->with('success', 'update Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=nominal::find($id);
        $temp->delete();
        return back()->with('status',__('Record deleted'));
    }
}
