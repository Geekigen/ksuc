<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ratingcontroller extends Controller
{
    public function rate(Request $request,){
        $rating=new rating();
        $user_id=Auth::user()->id;
        // $lantec=lantec::all();
        $ratingcourse_id=$request->input('courseid');
       
                        $already_rated=rating::where('student',$user_id)
                        ->where('course_id',$ratingcourse_id)->first();
                        if ($already_rated) {
                            $already_rated->rating=$request->input('rate');
                            $already_rated->comments=$request->input('comment');
                            $already_rated->update();
                            return redirect('/gorate')->with('status',"thanks for rate update!!");
                        }
                        else {
                               $rating->course_id=$request->input('courseid');
                $rating->student=$user_id;
                $rating->rating=$request->input('rate');
                $rating->comments=$request->input('comment');
                $rating->save();
                return redirect('/gorate')->back()->with('status',"Thank You for  rating");
                        }
        
                    
        
       
        }
      
        public function viewStat($id){
            $course=course::find($id);
            $rating=rating::where('course_id',$course->id)->get();
            $rating_total=rating::where('course_id',$course->id)->sum('rating');
            
                    if ($rating->count()>0) {
                        $rating_value=$rating_total/$rating->count();
                    }
                   else {
                $rating_value=0;
                        }
                      
            return view('layouts.viewstat')
            ->with('course',$course)
            
            ->with('rating',$rating)
            ->with('rating_value',$rating_value);
        }

        public function viewRating(){
            $courses=course::where('lec_name',Auth::user()->email)->get();
       

foreach ($courses as $course) {

        }   return view('layouts.viewrating')
            ->with('courses',$courses)
            ; 
        
          
    }
        
}
