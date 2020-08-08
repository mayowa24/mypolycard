@extends('layouts.appindex')
@section('content')
{{-- <div class="col-md-6 text-center">
        <form action="" method="post">
                <div class="form-group">
                    <label for="">Full Name:</label>
                    <input type="text" name = "full_name" class="form-control" placeholder="Enter your fullname">
                </div>
                <div class="form-group">
                    <label for="">Matric Number:</label>
                    <input type="text" name = "matric" class="form-control" placeholder="Enter your Matric Number">
                </div>
                <button type="submit" class="btn btn-info btn-md">Login</button>
    </form>
</div> --}}

<div class="row">
        <div class="col-sm-12 mb-4">
        <h2 class=" text-center display-3">Login</h2>
        <h6 class=" text-center text-info ">All fields are required for login.</h6>
        </div>
        
        <div class="col-sm-8 col-md-8 offset-sm-2 offset-md-2">
        {{-- <form action="" method="POST" name="frmlogin"> --}}
            @if(Session::has('error'))
                <p class="alert alert-danger">
                    {{Session::get('error')}}
                    {{Session::put('error',null)}}
                </p>
            @endif
            @if(Session::has('error1'))
                <p class="alert alert-danger">
                    {{Session::get('error1')}}
                    {{Session::put('error1',null)}}
                </p>
            @endif
        {!!Form::open(['action'=>'StudentController@doLogin','method'=>'POST'])!!}
        {{csrf_field()}}
        <div class="form-group row">
            <div class="col-sm-3">
                {{Form::label('','Fullname')}}
            </div>
            <div class="col-sm-7">
                {{Form::text('Name','',['class'=>'form-control','pattern'=>'^[a-zA-Z][a-zA-Z\s]{1,60}$', 'placeholder'=>'fullname'])}}
            </div>
        </div>

        <div class="form-group row">
                <div class="col-sm-3">
                    {{Form::label('','Matric NO:')}}
                </div>
                <div class="col-sm-7">
                    {{Form::text('MatricNumber','',['class'=>'form-control',
                    'title'=>'Alphabet,digit,dash and forward slash are allowed.', 'placeholder'=>'matric number'])}}
                </div>
        </div>
        <div class="form-group row justify-center">
                <div class="col-sm-5">

                </div>
                <div class="col-sm-7">
                        {{Form::submit('Login',['class'=>'btn btn-info btn-lg'])}}
                </div>
        </div>

            
        {!!Form::close()!!}
             {{-- <div class=" text-center fade show alert-dismissible alert" role="alert">
                 <button type="button" class="close" data-dismiss="alert">
                 <span aria-hidden="true">&times;</span>
                 </button>
             </div>
         
                 <label for="regno" class=" col-sm-2 col-md-2 col-form-label"><span class="text-danger">*</span>Name</label>
                 <div class="col-sm-8 col-md-8">
                     <input type="text" name="name" placeholder="Fullname"
                     title="Only allow alphabet, space, apostroph."
                     required maxlength="60" pattern="^[a-zA-Z][a-zA-Z\s]{1,60}$" class="form-control"/>
         
                 </div>
             </div>
             <div class="form-group row">
                 <label for="matric" class=" col-sm-2 col-md-2 col-form-label"><span class="text-danger">*</span>Matric No</label>
                 <div class="col-sm-8 col-md-8">
                     <input type="text" name="matric" placeholder="Matric No"
                     title="Alphabet,digit,dash and forward slash are allowed." 
                     required maxlength="20" pattern="^[a-zA-Z][A-Z0-9\-\/]{2,20}$" class="form-control"/>
                 </div>
             </div>
           
             <div class="form-group row">
                 <div class="col-sm-2"></div>
                 <div class="col-sm-8 text-center">
                     <input type="submit" value="Login >>" name="submit" id="submit" class=" btn btn-secondary">
                 </div>
             </div>
         </form> --}}
        </div>
    </div>

@endsection