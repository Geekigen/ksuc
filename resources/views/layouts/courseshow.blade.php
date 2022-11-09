@extends('layouts.app')
@section('content')
<style>
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>
<table  class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:500%">{{__('Title')}}</th>
            <th style="width:10%">{{__('Code')}}</th>
            <th style="width:22%" class="text-center">{{__('Year')}}</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
<tr>
    <td> {{$course->title  }}</td>
    
    <td> {{$course->code  }}</td>
    <td> {{$course->year  }}</td>
    
</tr>
</tbody>
</table>

<form action="/rate" method="post">

    @csrf
    
              <div class="d-flex flex-column">
                
 
                
            <div class="rate ">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">Best</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">Better</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">Good</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">Below expecation</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">Needs improvement</label>
                
              </div>
              <div class="text-center mt-5">
                <textarea name="comment" id="comment" cols="40" rows="5" placeholder="{{__('Reason for the rating(comment here)')}}"></textarea>
               <input type="hidden" name="courseid" value="{{$course->id}}">
              </div></div>
              
              
        
          

        
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-style btn-primary">{{__('Rate this course')}}<i class="far fa-paper-plane ml-lg-3"></i></button>
       
    </div>

</form>
@endsection