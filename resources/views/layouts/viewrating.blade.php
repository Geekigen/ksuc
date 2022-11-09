@extends('layouts.lecturer')
@section('content')
<div id="page-wrapper">
<div class="main-page">


    @foreach ($courses as $lec)
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
    <tr>A
        <td> {{$lec->title  }}</td>
        
        <td> {{$lec->code  }}</td>
        <td><a href="viewstat/{{ $lec->id }}"> {{__('view statisics ')}}</a></td>
        <td> </td>
        
    </tr>
    </tbody>
    </table>
    
    @endforeach

</div>
</div>