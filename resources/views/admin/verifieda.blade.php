@extends('layouts.app1')
@section('content')
    <div class="container">
        <?php
        $increment = 0;
        ?>
        <table class="table responsive">
            <thead>
                <th>SN</th>
                <th>Matric Number</th>
                <th>Name</th>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{$increment= $increment+1}}</td>
                    <td>{{$student->MatricNumber}}</td>
                    <td>{{$student->Name}}</td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        {{$students->links()}}
    </div>
@endsection