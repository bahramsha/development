<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Timesheet;
use app\Employee;
use app\Project;
use Session;

class TimesheetController extends Controller
{
      public function timesheet()
    {	
    	 $id=0;
       $timesheets = Timesheet::paginate(5);
        return view('backend.timesheet',compact("id","timesheets"));
    }

    public function add_timesheet(){
        $employees = Employee::all();
        $projects = Project::all();
        return view('backend.add_timesheet',compact("employees","projects"));
    }

    public function save_timesheet(Request $request){

    	//dd($request->all());
         $this->validate($request, array(
          'emp_id' =>'required|int',
          'project_code_id'  =>'required',
          'timesheet_date'   =>'required|date',
          'task' =>'required'
      ));
      //    dd('validation done');


         	$timesheet = new Timesheet();
  			$timesheet->emp_id = $request->emp_id;
  			$timesheet->project_code_id = $request->project_code_id;
  			$timesheet->timesheet_date =  date('Y-m-d', strtotime($request->timesheet_date));
       		$timesheet->task = $request->task;
  			$timesheet->save();
         	Session::flash('success','You are successfully save the Timesheet');
  			return redirect()->route('timesheet');


}
	
	 public function get_timesheet($id){
       $timeId = decrypt($id);
       $timesheets = Timesheet::find($timeId);
       $employees = Employee::all();
       $projects = Project::all();
      return view('backend.update_timesheet' , compact("timesheets","employees","projects"));


     }

      public function update_timesheet(Request $request,$id){
        $this->validate($request, array(
          'timesheet_date'   =>'required|date',
          'task' =>'required'
        ));
      	$timeId = decrypt($id);
      	$timesheets = Timesheet::find($timeId);
      	$timesheets->id = $timeId;
      	$timesheets->timesheet_date = $request->timesheet_date;
      	$timesheets->task = $request->task;
      	$timesheets->update();
      	Session::flash('success','You are successfully Updated the Timesheet');
      	return redirect()->route('timesheet');


     }
      public function delete_timesheet($id){
       $timesheet=Timesheet::find(decrypt($id));
     	Session::flash('success','You are successfully Deleted the Timesheet');
       $timesheet->delete();
      return redirect()->route('timesheet');
     }
}
