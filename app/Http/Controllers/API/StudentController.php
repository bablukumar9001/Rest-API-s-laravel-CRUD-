<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;
// use Validator;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{
     public function  postuserdata(Request $request ){

        //  echo"hello abhay";                                                          //----Post student data                      
       

        $validator = Validator::make($request->all(),[

            'name'=> 'required',
            'address'=> 'required',
            'mobile'=> 'required',
            'qualification'=> 'required',
            'gender'=> 'required',

        ]);
  
        if ($validator->fails()){
             return response()->json([

                   'status'=>422,
                   'mesage'=>$validator->messages()
                 
             ],422);
        }
        else{
             
            $student = new Students;
            $student->name= $request->name;
            $student->address= $request->address;
            $student->mobile= $request->mobile;   
            $student->qualification= $request->qualification;
            $student->gender= $request->gender;

            $student->save();

              return response ()-> json ([
                'status'=>200,
                'message'=>'Student record created successfully '
,
              ],200);
        
        
        }
     }

      public function  getuserdata(Request $request ){

//    $students = Students::select('name', 'address','qualification', 'mobile' ,'gender' )->get();

   $students = Students::all();
    return response()->json([                                    //---------------- show all  stuents data 
        'status'=>200,
        'students'=> $students,


    ]);

      }
      public function  showuserdata($id){


             $student= Students::find($id);                     //---------------- show   student data by ID 
             if($student){
                 return response()->json([
                    'status'=>200,
                    'student'=>$student
                 ],200);
             }
             else
             {
                 return response()->json([
                    'status'=>404,
                    'student'=>' student ID  not found '
                 ],200);
             }

      }
  
      public function  updateuserdata(Request $request, $id){

         
    
         $validator = Validator::make($request->all(),[
                                                                        //---------------- Update  student data by ID                      
            'name'=> 'required',
            'address'=> 'required',
            'mobile'=> 'required',
            'qualification'=> 'required',
            'gender'=> 'required',

       ]);
     
       
        if ($validator->fails()){
             return response()->json([

                   'status'=>422,
                   'mesage'=>$validator->messages()
                 
             ],422);
        }


             $student= Students::find($id);
             if($student){


            $student->name= $request->name;
            $student->address= $request->address;
            $student->mobile= $request->mobile;
            $student->qualification= $request->qualification;
            $student->gender= $request->gender;

            $student->update();


                 return response()->json([
                    'status'=>200,
                    'student'=>'students data updated succsessfully '
                 ],200);
             }
             else
             {
                 return response()->json([
                    'status'=>404,
                    'student'=>' student ID  not found '
                 ],200);
             }

      
    }
      public function  deleteuserdata(Request $request, $id){                    //---------------- Delete user data by ID 

         
    
               $student= Students::find($id);
             if($student){
                $student->delete();
;                 return response()->json([
                    'status'=>200,
                    'student'=>'student data deleted succsessfully'
                 ],200);
             }
             else
             {
                 return response()->json([
                    'status'=>404,
                    'student'=>' student ID  not found '
                 ],200);
             }
        

      
    }
  
      
}
