@extends('layouts.lecturer')
@section('content')
<div id="page-wrapper">
<div class="main-page">


    @foreach ($course as $lec)
    <table  class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:500%">{{__('Title')}}</th>
                <th style="width:10%">{{__('Code')}}</th>
                <th style="width:8%">{{__('Edit')}}</th>
                <th style="width:22%" class="text-center">{{__('Year')}}</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
    <tr>
        <td> {{$lec->title  }}</td>
        
        <td> {{$lec->code  }}</td>
        <td><a href="course/{{ $lec->id }}/edit"> {{__('Edit ')}}</a></td>
        <td> {{$lec->year  }}</td>
        
    </tr>
    </tbody>
    </table>
    
    @endforeach

</div>
</div>