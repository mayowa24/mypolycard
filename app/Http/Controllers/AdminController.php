<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
                            
        
        
        return view('admin.users')->with('users',$users);
    }
    public function newadmin(){
        return view('admin.newadmin');
    }
    public function show($id){
        $user = User::find($id);
        if($user){
            return view('admin.changepass')->with('user',$user);
        }
    }
    public function store(Request $request){
        if($request->password != $request->password_confirmation){
            Session::put('error', 'password mismatch');
        }
        else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
                       
            return redirect('/users');
        }
        
    }
    public function destroy(Request $request,$id){
        $user = User::find($id);
        if($user){
            print('user'.$user->id);
        }
    }
    // public function show($id){
    //     $student = Student::find($id);
    // if($student->passport !='' && $student->passport != null){
    //     return view('admin.studentrec')->with('student',$student);
    // }
    // else{
    //     Session::put('error','This student has not upload his/her passport');
    //     return redirect('/admin');
    // }
        
    // }
    // public function update(Request $request, $id){
    //     $student = Student::find($id);
    //     $student->accept = $request->accept;

    //     $message = 'Name: '.$student->Name.' ID Number: '.$student->MatricNumber.' Department: '.$student->DepartmentName;
            
    //         \QrCode::size(500)
    //                 ->format('png')
    //                 ->backgroundColor(255,255,255)
    //                 ->margin(2)
    //                 ->generate($message, public_path('upload/qrCode/').$student->Name.str_replace("/",'-',$student->MatricNumber).'.png');

    //     $student->update();
    //     Session::put('success','this student has been validated successfully');
    //     return redirect('/admin');
    // }
    //
}
