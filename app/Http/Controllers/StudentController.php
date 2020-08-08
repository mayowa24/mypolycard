<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageSaveRequest;

use Redirect;
use App\Student;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    public function doLogin(Request $request){
        if(!$request->Name||!$request->MatricNumber){
            Session::put('error', 'All fields required');
        }
            $this->validate($request,[
                'Name' => 'required',
                'MatricNumber'=>'required'
                ]);
        $student = Student::where([['Name','=',$request->Name],['MatricNumber','=',$request->MatricNumber]])->first();

        if($student){
            if($student->passport <> ''&& $student->accept === ''){
                Session::put('status','You have submitted a passport, No need to upload another');
            }
            if($student->passport <> ''&& $student->accept === 'No'){
                Session::put('reject','Your passport has been rejected, upload a white background passport');
            }
            if($student->passport <> ''&& $student->accept === 'Yes'){
                Session::put('accept','Congratulations! Your passport has been accepted');
            }
            return view('students.home')->with('student',$student);
        }
        elseif($request->Name === 'card' && $request->MatricNumber ==='fedpoly'){
            return redirect('/admin');
        }
        else{
            Session::put('error1', 'Incorrect Name or Matric Number');
            return redirect('/slogin');
        }
        // $credentials = $request->only('Name','MatricNumber');
        // if(Auth::attempt($credentials)){
        //     print('login happen here');    
        // }
        return redirect('/slogin');

        
    }
    public function update(Request $request, $id){
        // $student = Student::find($id);
        $student = Student::find($id);
        if(!$request->passport){
            Session::put('error', 'You have to choose a passport');
        }

        // $validator =Validator::make($request->all(), [
        //     'passport'=>'image|mimes:jpeg,png,jpg|max:20',
        // ]);
        // if($validator->fails()){
        //     return redirect()->back()
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        $this->validate($request ,[
            'passport'=>'image|max:20|mimes:jpeg,png,jpg',
            ]);
        // $path2 = public_path('qr.png');
                            
        
        if($request->hasFile('passport')){
            $fileNameE = $request->file('passport')->getClientOriginalName($student->Name);
            $fileName = pathinfo($fileNameE, null);
            $extension = $request->file('passport')->getClientOriginalExtension();
            $toStore = $fileName.'_'.$student->Name.str_replace("/",'-',$student->MatricNumber).'.'.$extension;
            $path = public_path().'/upload/passport';
            $upload = $request->file('passport')->move($path, $toStore);

            $student->passport = $toStore;
            $student->update();
            return redirect('/');
        }

                
        return redirect()->back();
    }
    // 01756047540097877
}
