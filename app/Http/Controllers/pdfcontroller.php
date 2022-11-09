<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\rating;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Adapter\PDFLib;

class pdfcontroller extends Controller
{
    

    public function generatePDF($id)
    {
        $course=course::find($id);
            $rating=rating::where('course_id',$course->id)->get();
            $rating_total=rating::where('course_id',$course->id)->sum('rating');
            
                    if ($rating->count()>0) {
                        $rating_value=$rating_total/$rating->count();
                    }
                   else {
                $rating_value=0;
                        }
        $data = [
            'title' => 'Course statistcs',
            'date' => date('m/d/Y'),
            'course' => $course,
            'rating'=>$rating,
            'rating_value'=>$rating_value,

        ]; 
            
        $pdf = PDF::loadView('viewstats', $data);
     
        return $pdf->download('viewststs.pdf');
    }

}
