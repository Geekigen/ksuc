@extends('layouts.app')
@section('content')



    @foreach ($course as $lec)
    <table  class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:40%">{{__('Title')}}</th>
                <th style="width:10%">{{__('Code')}}</th>
                <th style="width:8%">{{__('')}}</th>
                <th style="width:12%" class="text-center">{{__('Year')}}</th>
            </tr>
        </thead>
        <tbody>
    <tr>
        <td> {{$lec->title  }}</td>
        
        <td> {{$lec->code  }}</td>
        <td><a href="course/{{ $lec->id }}"> {{__('Rate it ')}}</a></td>
        <td> {{$lec->year  }}</td>
        {{-- <td>
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
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
                
              </div>
              <input type="text" name="comment">
        </td> --}}
        
    </tr>
    </tbody>
    </table>
    
    @endforeach
@endsection
