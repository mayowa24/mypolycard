<!DOCTYPE html>
<html lang="en">
<head>
        <title>polycard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/fedpoly.jpg" type="image/x-icon">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    
</head>
<body>

    <div class="container ">
        <br>
        @include('includes.header')
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                
                    <ul class="c-flex">
                        <li><a href="{{URL::to('/admin')}}">Profile</a></li>
                        <li><a href="{{URL::to('/slogin')}}"> Logout</a></li>
                    </ul>
                </div>
        </nav>
    <div class="container1 my-10">
        @yield('content')
    </div>

        
        
    @include('includes.footer')          
</div>
    
</body>
</html>