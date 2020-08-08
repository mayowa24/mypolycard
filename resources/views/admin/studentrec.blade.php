@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Student Details</h2>
    {!! QrCode::size(250)->generate('Name: '. $student->Name. '/n'.'ID Number:'.$student->MatricNumber); !!}
<img src="{{asset("upload/passport/$student->passport")}}" alt="unable to load Image">
<p><h3>{{$student->Name}}</h3></p>
<p><h3>{{$student->MatricNumber}}</h3></p>
<p><h3>{{$student->DepartmentName}}</h3></p>
{!!Form::open(['action'=>['HomeController@update',$student->id],'method'=>'POST', 'class'=>'form-horizontal'])!!}
{{csrf_field()}}
{{Form::select('accept', ['Yes' => 'Accept', 'No' => 'Reject'])}}

{{Form::submit('Submit',['class'=>'btn btn-primary btn-lg'])}}
{{-- {{Form::hidden('_method','PUT')}} --}}
{!!Form::close()!!}
</div>
@endsection