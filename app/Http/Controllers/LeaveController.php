<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Leave_request;
use app\Employee;
use Session;
class LeaveController extends Controller
{
    public function leave()
    {
    	  $id = 0;
        $leaves = Leave_request::paginate(5);
        return view('backend.leave_request', compact("id","leaves"));
    }

    public function add_leave(){
        $employees = Employee::all();
        return view('backend.add_leave',compact("employees"));
    }

     public function save_leave(Request $request){

    	// dd($request->all());
         $this->validate($request, array(
          'emp_id' =>'required|int|unique:leave_requests',
          'request_date'  =>'required|date',
          'date_start'   =>'required|date',
          'date_end'=>'required|date',
          'reason'  =>'required',
          'approve' =>'required'
      ));
      //    dd('validation done');


         	$leave = new Leave_request();
  			$leave->emp_id = $request->emp_id;
  			$leave->request_date =  date('Y-m-d', strtotime($request->request_date));
  			$leave->date_start =  date('Y-m-d', strtotime($request->date_start));
       		$leave->date_end =   date('Y-m-d', strtotime($request->date_end));
  			$leave->reason =$request->reason;
  			$leave->approve =$request->approve;

  			$leave->save();
         	Session::flash('success','You are successfully save the Leave');
  			return redirect()->route('leave');

}

	 public function get_leave($id){
       $leaveId = decrypt($id);
       $leave = Leave_request::find($leaveId);
        $employees=Employee::all();
      return view('backend.update_leave' , compact("leave","employees"));


     }

     public function update_leave(Request $request,$id){
         $this->validate($request, array(
          'request_date'  =>'required|date',
          'date_start'   =>'required|date',
          'date_end'=>'required|date',
          'reason'  =>'required',
          'approve' =>'required'
      ));

        $leaveId = decrypt($id);
         Leave_request::where('id',$leaveId)
      ->UPDATE([
        'request_date' => $request['request_date'],
        'date_start' => $request['date_start'],
        'date_end' => $request['date_end'],
        'reason' => $request['reason'],
        'approve' => $request['approve']
      ]);
        Session::flash('success','You are successfully Updated the Leave Request');
      return redirect()->route('leave');
  
}

      public function delete_leave($id){
       $leaveId = decrypt($id);
       Leave_request::where('emp_id',$leaveId)->delete();
        Session::flash('success','You are successfully Deleted the leave');
      return redirect()->route('leave');
     }

}