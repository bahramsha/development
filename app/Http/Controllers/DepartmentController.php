<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Department;
use Session;

class DepartmentController extends Controller
{


    public function department(){
       $id = 0;
       $departments=Department::paginate(5);
      return view('backend.department',compact('departments',"id"));


    }    

    public function add_departments(){

    	return view('backend.add_departments');


    }

     public function save_departments(Request $request){

         $this->validate($request,[
          'name' =>'required|max:255|alpha'
      ]);

        Department::create($request->all());

        Session::flash('success','You are successfully save the departments');

     	 return redirect('department');


     }



      public function get_department($id){

      $departments=Department::find(decrypt($id));
      return view('backend.update_department' , compact("departments"));


     }

      public function update_department(Request $request,$id){
        
         $this->validate($request,[
          'name' =>'required|max:255|alpha'
      ]);
      	$depId = decrypt($id);
      	$departments = Department::find($depId);
        Session::flash('success','You are successfully updated the departments');
      	$departments->id = $depId;
      	$departments->name = $request->name;
      	$departments->update();
      return redirect()->route('department')
      ->with('message','Department updated successfully');


     }


      public function delete_department($id){
       $departments=Department::find(decrypt($id));
      Session::flash('success','You are successfully deleted the departments');
       $departments->delete();
      return redirect()->route('department')
          ->with('message','Department deleted successfully');
     }



}
