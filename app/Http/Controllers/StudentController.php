<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {

        $students = Student::all();
        return view('student.index',compact('students'));
    }

    public function deletedata(Request $get)
    {
        $id = $get->id;
        $delete = Student::where("id", $id)->delete();
        if($delete){
            return response()->json("success");
        }else{
            return response()->json("error");
        }
    }

}
