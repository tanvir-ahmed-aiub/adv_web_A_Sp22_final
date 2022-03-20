<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentAPIController extends Controller
{
    //
    public function getall(){
        return Student::all();
    }
    public function get(Request $req){
        $st = Student::where('id',$req->id)->first();
        if($st){
            return response()->json($st,200);
        }
        return response()->json(["msg"=>"notfound"],404);
        
    }
    public function add(Request $req){
        try{
            $st = new  Student;
            $st->name = $req->name;
            $st->dob = $req->dob;
            $st->userid = $req->st_id;
            if($st->save()){

                return response()->json(["msg"=>"Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not add"],500);
        }
        
        
        
    }
}
