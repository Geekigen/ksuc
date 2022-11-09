<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\nominal;
use App\Models\studentnominal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class pagescontroller extends Controller
{
  public function admin(){
    return view('layouts.admin1');
  }
  public function lec(){
    return view('layouts.lecturer1');
  }
  public function student(){
    return view('layouts.studentnominal');
  }


  public function studentnominal(Request $request){

    $this->validate($request, [
      'name'=>'Required',
      ]);

      $nominal= new studentnominal;

      $nominal->adm=$request->input('name');
      $nominal->name=Auth::user()->email;

      Alert::success('Name added', 'the name was added successfully');
      $nominal->save();
      return redirect('/gorate')->with('success', 'Task Created Successfully!');
  }

  public function gorate(){
    $email=Auth::user()->email;
    $studentnominal=studentnominal::where('name',$email)->value('adm');
  
$stu=nominal::where('adm',$studentnominal)->value('year');
$school=nominal::where('adm',$studentnominal)->value('school');
    $course=course::where('year',$stu)
    ->where('school',$school)
    ->get();
    
    return view('layouts.courselist')->with('course',$course);
  }

}
