<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeData;

class EmployeeRegistration extends Controller
{
    public function Create() {
        return view('welcome');
    }

public function Store(Request $req){
    $req->validate([
       
        'First_name'=>'required',
        'Last_name'=>'required',
        'email'=>'required',
        'password'=>'required',
        'DOB'=>'required',
        'DOJ'=>'required',
        'salary'=>'required',
    
        ]);
    $registration= new EmployeeData;
    $registration->First_Name=$req->First_name;
    $registration->Last_Name=$req->Last_name ;
    $registration->Email=$req->email;
    $registration->password=$req->password ;
    $registration->Date_of_birth=$req->DOB;
    $registration->Date_of_joining=$req->DOJ;
    $registration->Salary=$req->salary;
        $registration->save();
    return response()->json(['success'=>'Done!']);
}
}
