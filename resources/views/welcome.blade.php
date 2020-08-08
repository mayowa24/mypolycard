@extends('layouts.appindex')
@section('content')
<div class="row ">
    <div class="col-sm-12">
        <h2 class=" text-center">Read the following instructions.</h2>
        <h3 class="text-center">
            As a new user on this platform, you are adviced to follow these steps:
        </h3>
     </div>
       <div class="col-sm-3"></div>
       <div class=" pl-5 pl-sm-1 mt-3 col-sm-9">
            <ol class="inst">
                <li>Login with your Fullname and Matric Number as shown on the Matric Number list.</li>
                <li>Make sure you upload your passport with white background.</li>
                {{-- <li>Scan your signature with white background and upload.</li> --}}
                <li>Ensure that file to be uploaded is not more than 20kb for both passport and signature.</li>
            </ol>
        </div>
   
</div>
@endsection