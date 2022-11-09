@extends('layouts.admin')
@section('content')
<div id="page-wrapper">
<div class="main-page">


    @foreach ($lecturer as $lec)
    <table  class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">{{__('Name')}}</th>
                <th style="width:10%">{{__('Email')}}</th>
                <th style="width:8%">{{__('Edit')}}</th>
                <th style="width:22%" class="text-center">{{__('Delete')}}</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
    <tr>
        <td> {{$lec->name  }}</td>
        <td> {{$lec->mail  }}</td>
        <td><a href="lec/{{ $lec->id }}/edit"> {{__('Edit ')}}</a></td>
        <td>
    {{-- add ajax on the next update for deletion confirmation --}}
            <form action ="/lec/{{ $lec->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" value="Delete"><i class="fa fa-trash-o"></i></button>
                   </form>
          </td>
    </tr>
    </tbody>
    </table>
    
    @endforeach

</div>
</div>