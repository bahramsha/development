<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Project;
use app\Project_type;
use Session;

class ProjectController extends Controller
{
    public function project(){
      $id = 0;
    	 $projects = Project::paginate(5);
         return view('backend.project',compact("id","projects"));


      }

      public function add_project(){
   		$project_types = Project_type::all();
    	return view('backend.add_project',compact('project_types'));

    }

    public function save_project(Request $request){

    	//dd($request->all());
         $this->validate($request, array(
          'project_code' =>'required',
          'project_name'  =>'required',
          'project_type_id' =>'required|int',
       	  'donar_name'  =>'required',
          'start_date' =>'required',
          'end_date'  =>'required',
          'project_cost' =>'required|int',
          'currency' =>'required'
      ));
      //    dd('validation done');

  			$project = new Project();
  			$project->project_code = $request->project_code;
  			$project->project_name = $request->project_name;
  			$project->project_type_id = $request->project_type_id;
     		$project->donar_name = $request->donar_name;
  		    $project->start_date = date('Y-m-d', strtotime($request->start_date));
  		    $project->end_date = date('Y-m-d', strtotime($request->end_date));
  			$project->project_cost = $request->project_cost;
  			$project->currency = $request->currency;
  			$project->save();
         Session::flash('success','You are successfully save the Project');
  			return redirect('project');
     
}
	  public function get_project($id){
      $projectId = decrypt($id);
      $projects=Project::find($projectId);
      $project_types = Project_type::all();
      return view('backend.update_project' , compact("projects","project_types"));


     }

     public function update_project(Request $request,$id){

     	 $this->validate($request, array(
          'project_type_id' =>'required|int',
       	  'donar_name'  =>'required',
          'start_date' =>'required',
          'end_date'  =>'required',
          'project_cost' =>'required|int',
          'currency' =>'required'
      ));

     	$projectId = decrypt($id);
      $projects = Project::find($projectId);
  		$projects->project_type_id = $request->project_type_id;
     	$projects->donar_name = $request->donar_name;
      $projects->start_date = $request->start_date;
      $projects->end_date = $request->end_date;
      $projects->project_cost = $request->project_cost;
  		$projects->currency = $request->currency;
        $projects->update();
        Session::flash('success','You are Successfully updated the Project');
        return redirect()->route('project')
      ->with('message','Project updated Successfully');

}

     public function delete_project($id){
     $projectId = decrypt($id);
     $projects=Project::find($projectId);
     Session::flash('success','You are Successfully Deleted the Project');
     $projects->delete();
      return redirect()->route('project');
     }

}