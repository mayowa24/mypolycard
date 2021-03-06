@extends('layouts.app1')

@section('content')
<div class="container">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @section('content')
    <div class="container">
            @if(Session::has('error'))
            <p class="alert alert-danger">
                {{Session::get('error')}}
                {{Session::put('error',null)}}
            </p>
            @endif
        <table class="table responsive">
            <thead>
                <th>S/N</th>
                <th>Matric Number</th>
                <th>Students Name</th>
            </thead>
            <tbody>
                <?php
                    $increment = 0;
                    ?>
                @foreach($students as $student)
                <tr>
                <td>{{$increment = $increment + 1}}</td>
                <td>{{$student->MatricNumber}}</td>
                <td><a href="admin/show/{{$student->id}}">{{$student->Name}}</a></td>
                </tr>
                @endforeach
                
                
            </tbody>
        </table>
        {{$students->links()}}
    </div>
</div>
@endsection
