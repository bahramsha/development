<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Attendance;
use app\Employee;
use DB;
use Session;

class AttendanceController extends Controller
{
    public function attendance()
    {
        $id = 0;
    	$attendances = Attendance::paginate(5);
        $employees = Employee::all();
        return view('backend.attendance' ,  compact("id","attendances","employees"));

    }

     public function add_attendance(){
   		  $employees = Employee::all();
    	  return view('backend.add_attendance',compact("employees"));
    }
     public function save_attendance(Request $request){

      //dd($request->all());
         $this->validate($request, array(
          'emp_id' =>'required|int|unique:attendances',
          'start_time' =>'required',
          'end_time'  => 'required'
     ));

     //    dd('validation done');

        $attendance = new Attendance();
        $attendance->emp_id = $request->emp_id;
        $attendance->strat_time = $request->start_time;
        $attendance->end_time = $request->end_time;
        $attendance->date = date('y-m-d');
        $attendance->save();
          Session::flash('success','You are successfully save the Attendace');
        return redirect()->route('attendance');


    }

    public function manage_payroll(){
        $attendances = DB::table('attendances')
                       ->join('employees', 'attendances.emp_id' , '=' , 'employees.id' )
                       ->join('contracts', 'attendances.contract_id' , '=','contracts.id' ) 
                       ->select('attendances.*' , 'employees.first_name','employees.last_name', 'contracts.salary' )    
                       ->get();

                       return view ('backend.manage_payroll',['attendances' => $attendances]);

    }

  public function get_attendance($id){
        $attId = decrypt($id);
        $attendances = Attendance::where('emp_id','=',$attId)->get();
        $employees=Employee::all();
      return view('backend.update_attendance' , compact("attendances","employees"));


     }

      public function update_attendance(Request $request,$id){
        $this->validate($request, array(
          'strat_time' =>'required',
          'end_time' => 'required'
     ));

        $attId = decrypt($id);
         Attendance::where('emp_id',$attId)
      ->UPDATE([
        'strat_time' => $request['strat_time'],
        'end_time' => $request['end_time']
      ]);
        Session::flash('success','You are successfully Updated the Attendance');
      return redirect()->route('attendance');
  
}

      public function delete_attendance($id){
       $attId = decrypt($id);
       Attendance::where('emp_id',$attId)->delete();
        Session::flash('success','You are successfully Deleted the Attendance');
      return redirect()->route('attendance');
     }

}
