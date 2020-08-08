@extends('layouts.studentlay')
@section('content')

<div class="row">
    <div class="col-md-7">
        <table class="table table-responsive">
            <tr>
                <td><strong>Matric No:</strong></td>
                <td>{{$student->MatricNumber}}</td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{$student->Name}}</td>
            </tr>
            <tr>
                <td><strong>Sex:</strong></td>
                <td>{{$student->SexName}}</td>
            </tr>
            <tr>
                <td><strong>Department:</strong></td>
                <td>{{$student->DepartmentName}}</td>
            </tr>
            <tr>
                <td><strong>Programme:</strong></td>
                <td>{{$student->ProgrammeName}}</td>
            </tr>

            
        </table>
        {{-- {!! QrCode::size(250)->generate('Name: '. $student->Name. '/n'.'ID Number:'.$student->MatricNumber); !!}  --}}
    </div>

    <div class="col-md-4 text-center">
        <br>
        <h3>UPLOAD PASSPORT</h3>
        <p><h4><strong>Notice: <strong></h4> the passport must be a white backgroung color and the maximum size is 20kb</p>
        <img src="{{asset("upload/passport/$student->passport")}}" height="100px" width="100px" class="img-fluid" alt="{{asset('img/avatar.png')}}">
        @if(Session::has('status'))
                <p class="alert alert-primary">
                    {{Session::get('status')}}
                    {{Session::put('status',null)}}
                </p>
            @endif
            @if(Session::has('reject'))
                <p class="alert alert-danger">
                    {{Session::get('reject')}}
                    {{Session::put('reject',null)}}
                </p>
            @endif
            @if(Session::has('accept'))
                <p class="alert alert-success">
                    {{Session::get('accept')}}
                    {{Session::put('accept',null)}}
                </p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-success">
                    {{Session::get('error')}}
                    {{Session::put('error', null)}}
                </p>
            @endif
            @if(Session::has('error2'))
                <p class="alert alert-primary">
                    {{Session::get('error2')}}
                    {{Session::put('error2',null)}}
                </p>
            @endif
            @if(Session::has('pend'))
                <p class="alert alert-primary">
                    {{Session::get('pend')}}
                    {{Session::put('pend',null)}}
                </p>
            @endif
        <hr>
        <div class="col-sm-9 col-md-9">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        {!!Form::open(['action'=>['StudentController@update',$student->id],'method'=>'POST',
        'class'=>' form-horizontal','enctype'=>'multipart/form-data'])!!}
        {{csrf_field()}}
                
            {{-- {{Form::file('passport',['class'=>'form-control','id'=>"passport", 'onchange'=>'loadPreview(this);'])}}
            <img src="{{asset('img/avatar.png')}}" id="passport_pre" class = "" width="200" height="150"> --}}
            
                <img src="{{asset('img/avatar.png')}}" style="cursor: pointer;" height="100px" width="100px" alt="Avatar"
                id="pdisplay" name="pdisplay" onclick="triggerClick()" class=" img-fluid"
                title="Click to select Image">
                <div onclick="triggerClick()" class=" mt-2 font-weight-bold" style=" cursor: pointer;">Upload Passport</div>
                <input type="file" name="passport" pattern="([a-zA-Z0-9\/\s_\\.\-\(\):])+(.jpg|.jpeg|.png|.gif)$" style=" display:none;" id="passport" placeholder="Passport"
                onchange="displayImage(this)"
                required  class=" form-control">
                
            </div>
            @if($student->passport != ''&& $student->accept ==='Yes')
            {{Form::submit('Upload',['class'=>'btn btn-info btn-md', 'disabled'])}}
            @endif
            @if($student->passport != ''&& $student->accept ==='No')
            {{Form::submit('Upload',['class'=>'btn btn-info btn-md'])}}
            @endif
            @if($student->passport != ''&& $student->accept ==='')
            {{Form::submit('Upload',['class'=>'btn btn-info btn-md', 'disabled'])}}
            @endif
            @if($student->passport === ''&& $student->accept ==='')
            {{Form::submit('Upload',['class'=>'btn btn-info btn-md'])}}
            @endif
            {{-- {{Form::hidden('_method','POST')}} --}}
        {!!Form::close()!!}
    </div>
    </div>
    {{-- <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    </script>  --}}
    <script>
    function triggerClick(e) {
        document.querySelector('#passport').click();
    }
    function displayImage(e) {
        if(e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#pdisplay').setAttribute('src',e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    </script>
    
@endsection