<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Resign;
use app\Employee;
use Session;

class ResignController extends Controller
{
     public function resign()
    {
    	 $id = 0;
    	 $resigns = Resign::paginate(5);
        return view('backend.resign',compact("id","resigns"));
    }

     public function add_resign(){
        $employees = Employee::all();
        return view('backend.add_resign',compact("employees"));
    }

     public function save_resign(Request $request){

    	// dd($request->all());
         $this->validate($request, array(
          'emp_id' =>'required|int|unique:Resigns',
          'resign_date'  =>'required|date',
          'reason'  =>'required'
      ));
      //    dd('validation done');


         	$resign = new Resign();
  			$resign->emp_id = $request->emp_id;
  			$resign->resign_date =  date('Y-m-d', strtotime($request->resign_date));
  			$resign->reason =$request->reason;
  			$resign->save();
         	Session::flash('success','You are successfully save the Resign');
  			return redirect()->route('resign');

}
	 public function get_resign($id){
       $resignId = decrypt($id);
       $resign = Resign::find($resignId);
       $employees=Employee::all();
      return view('backend.update_resign' , compact("resign","employees"));


     }

      public function update_resign(Request $request,$id){

         $this->validate($request, array(
         'resign_date'  =>'required|date',
         'reason'  =>'required'
    
          ));
        $leaveId = decrypt($id);
         Resign::where('id',$leaveId)
      ->UPDATE([
        'resign_date' => $request['resign_date'],
        'reason' => $request['reason']
      ]);
        Session::flash('success','You are successfully Updated the Resign');
      return redirect()->route('resign');


     }


      public function delete_resign($id){
       $resign=Resign::find(decrypt($id));
      Session::flash('success','You are successfully Deleted the Resign');
       $resign->delete();
      return redirect()->route('resign');
     }
}
