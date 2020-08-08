<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Session;
class SubAdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $students = Student::where('passport','!=','')
        ->where('accept','=','')->paginate(25);
        // dd($students);

        return view('admin.homeadmin')->with('students',$students);
    }
    
    public function show($id){
        $student = Student::find($id);
        if($student->passport !='' && $student->passport != null){
        return view('admin.studentreca')->with('student',$student);
        }
    }
    public function update(Request $request, $id){
        $student = Student::find($id);
        $student->accept = $request->accept;

        $message = 'Name: '.$student->Name.' ID Number: '.$student->MatricNumber.' Department: '.$student->DepartmentName;
            
            \QrCode::size(500)
                    ->format('png')
                    ->backgroundColor(255,255,255)
                    ->margin(2)
                    ->generate($message, public_path('upload/qrCode/').$student->Name.str_replace("/",'-',$student->MatricNumber).'.png');
                    
        $student->update();
        Session::put('success','The response has been saved successfully');
        return redirect('/admin');
    }
    // public function verify(){
    //     $students = Student::where([['passport','!=',''],['accept', '!=','']])->paginate(25);
    //     return view('admin.verifieda')->with('students',$students);
    // }
    //
}
