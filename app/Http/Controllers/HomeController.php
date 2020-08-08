<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
// use App\Student;

use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::where('passport','!=','')
        ->where('accept','=','')->paginate(25);
        // dd($students);

        return view('home')->with('students',$students);
    }
    public function show($id){
        $student = Student::find($id);
    if($student->passport !='' && $student->passport != null){
        return view('admin.studentrec')->with('student',$student);
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
        Session::put('success','this student has been validated successfully');
        return redirect('/home');
    }
    public function verify(){
        $students = Student::where([['passport','!=',''],['accept', '!=','']])->paginate(25);
        return view('admin.verified')->with('students',$students);
    }
    
}
