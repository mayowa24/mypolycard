@extends('layouts.app1')
@section('content')

<div class = "container">
    <?php
        $increment = 0;
        ?>
    <table class="table responsive">
        <thead>
            <th>S/N</th>
            <th>Name</th>
            <th>Email</th>
            {{-- <th>Action</th>    --}}
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$increment = $increment+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection