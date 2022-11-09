@extends('layouts.admin')
@section('content')
<div id="page-wrapper">
<div class="main-page">


    @foreach ($nominal as $student)
    <table  class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">{{__('Name')}}</th>
                <th style="width:10%">{{__('Admission no')}}</th>
                <th style="width:8%">{{__('Edit')}}</th>
                <th style="width:22%" class="text-center">{{__('Delete')}}</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
    <tr>
        <td> {{$student->name  }}</td>
        <td> {{$student->adm  }}</td>
        <td><a href="nominal/{{ $student->id }}/edit"> {{__('Edit ')}}</a></td>
        <td>
    {{-- add ajax on the next update for deletion confirmation --}}
            <form action ="/nominal/{{ $student->id }}" method="POST">
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