@extends('layouts.lecturer')
@section('content')
<div id="page-wrapper">
<div class="main-page">


   
    <table  class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">{{__('Title')}}</th>
                <th style="width:10%">{{__('Code')}}</th>
                <th style="width:8%">{{__('')}}</th>
                <th style="width:22%" class="text-center">{{__('')}}</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
    <tr>
        <td> {{$course->title  }}</td>
        
        <td> {{$course->code  }}</td>
        <td> <a href="/downloadpdf/{{ $course->id }}"> {{__('Download pdf ')}}</a></td>
        
    </tr>
    </tbody>
    </table>
    @php
    $ratenumber=number_format($rating_value);
@endphp


<style>
    .fa-star.checked {
    color: #ffc700;    
}
</style>

    <div class="row-one">
        <div class="row">@for ($i=1;$i<=$ratenumber;$i++)
       <i class="fa fa-star checked" ></i>
        
        
        @endfor</div>
        <div class="row"> @for ($j=$ratenumber+1; $j<=5;$j++)
        <i class="fa fa-star"></i>
        @endfor</div>
        @if ($rating->count()>0)
        <p>Number of students that rated:{{ $rating->count() }} .</p>
        
        @else
        <p> :No ratings</p>
       
    @endif
      
        <div class="clearfix"> </div>	
    </div>
    <h4 style="color: red">Comments</h4>
    @foreach ($rating as $rate )
            <p style="color: rgb(33, 49, 1)">{{$rate->comments}}</p>
    @endforeach

</div>
</div>