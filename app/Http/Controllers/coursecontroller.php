<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class coursecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email=Auth::user()->email;
        $course=course::where('lec_name',$email)->get();

        return view('layouts.course')
        ->with('course',$course)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.coursecreate');
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
            'title'=>'Required',
            'code'=>'Required',
            'Year'=>'Required',
            'school'=>'Required'
            
            ]);

            $nominal= new course;

            $nominal->title=$request->input('title');
            $nominal->code=$request->input('code');
            $nominal->year=$request->input('Year');
            $nominal->school=$request->input('school');
            $nominal->lec_name=Auth::user()->email;
     
            Alert::success('Course  added', 'the name was added successfully');
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
        $course=course::find($id);
        return view('layouts.courseshow')
        ->with('course',$course)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer=course::find($id)->first();
        return view('layouts.courseedit')
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
            'title'=>'Required',
            'code'=>'Required',
            'Year'=>'Required',
            'school'=>'Required',
            
            ]);

            $lecturer=course::where('id',$id)
            ->update([

                'title'=>$request->input('title'),
                'code'=>$request->input('code'),
                
                'year'=>$request->input('Year'),
                'school'=>$request->input('school'),
                
                'lec_name'=>Auth::user()->email,
                
                
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
        //
    }
}
