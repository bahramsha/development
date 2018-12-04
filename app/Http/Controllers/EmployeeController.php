<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use app\Employee;
use app\Department;
use app\Province;
use Session;


class EmployeeController extends Controller
{

   public function employee(){
        $id = 0;
        $employees = Employee::paginate(5);
        return view('backend.employee' ,  compact("employees","id"));


      }

   public function add_employee(){
   		$departments = Department::all();
      $provinces = Province::all();
    	return view('backend.add_employee',compact('departments','provinces'));
    }


    public function save_employee(Request $request){

    	//dd($request->all());
         $this->validate($request, array(
          'first_name' =>'required|min:3|max:128|alpha',
          'last_name'  =>'required|min:4|max:128|alpha',
          'date_of_birth' =>'required',
          'image'=>'required| mimes:jpeg,jpg,png',
          'gender' =>'required',
          'phone'  =>'required|',
          'email' =>'required|email|max:128|unique:employees',
          'department_id' =>'required|int',
          'province_id' =>'required|int',
          'district' =>'required|min:3|max:64',
          'location' =>'required|min:10|max:1000'
      ));
      //    dd('validation done');

            if($request->hasFile('image')){
            $original =  $request->image->getClientOriginalName();
            $request->image->storeAs('public/images',$original);
          }

  			$employee = new Employee();
  			$employee->first_name = $request->first_name;
  			$employee->last_name = $request->last_name;
  			$employee->phone = $request->phone;
        $employee->email = $request->email;
  			$employee->gender =$request->gender;
  		  $employee->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
  			$employee->image       = $original;
  			$employee->department_id = $request->department_id;
  			$employee->province_id = $request->province_id;
  			$employee->district = $request->district;
  			$employee->location = $request->location;
  			$employee->save();
         Session::flash('success','You are successfully save the Employee');
  			return redirect('employee');
      //   Employee::create($request->all());
     	 // return back();

     
     
     

   }


       public function get_employee($id){
        $empId = decrypt($id);
      $employees=Employee::find($empId);
      $departments = Department::all();
      $provinces = Province::all();
      return view('backend.update_employee' , compact("employees","departments","provinces"));


     }

      public function update_employee(Request $request,$id){

         $this->validate($request, array(
          'first_name' =>'required|min:6|max:128|alpha',
          'last_name'  =>'required|min:6|max:128|alpha',
          'date_of_birth' =>'required',
          'image'=>'mimes:jpeg,jpg,png',
          'gender' =>'required',
          'phone'  =>'required|',
          'email' =>'required|email|max:128',
          'department_id' =>'required|int',
          'province_id' =>'required|int',
          'district' =>'required|min:3|max:64',
          'location' =>'required|min:10|max:1000'
      ));

          if($request->hasFile('image')){
            $original =  $request->image->getClientOriginalName();
            $request->image->storeAs('public/images',$original);
                
        $depId = decrypt($id);
        $employees = Employee::find($depId);
        $oldimage = $employees->image;
        Session::flash('success','You are successfully updated the employee');
        $employees->id = $depId;
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->gender = $request->gender;
        $employees->date_of_birth = $request->date_of_birth;
        $employees->image       = $original;
        $employees->department_id = $request->department_id;
        $employees->province_id = $request->province_id;
        $employees->district = $request->district;
        $employees->location = $request->location;
        $employees->update();
        
                Storage::delete('public/images'.$oldimage);
                return redirect()->route('employee')
      ->with('message','Employee updated successfully');

       
            }
            else{
        $depId = decrypt($id);
        $employees = Employee::find($depId);
        $oldimage = $employees->image;
        Session::flash('success','You are successfully updated the employee');
        $employees->id = $depId;
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->gender = $request->gender;
        $employees->date_of_birth = $request->date_of_birth;
        $employees->department_id = $request->department_id;
        $employees->province_id = $request->province_id;
        $employees->district = $request->district;
        $employees->location = $request->location;
        $employees->update();
      return redirect()->route('employee')
      ->with('message','Employee updated successfully');
    }

     }


      public function delete_employee($id){
       $employees=Employee::find(decrypt($id));
       $image = $employees->image;
        Storage::delete('public/images/'.$image);
        Session::flash('success','You are successfully deleted the employees');
       $employees->delete();
      return redirect()->route('employee')
          ->with('message','Employee deleted successfully');
     }




}
