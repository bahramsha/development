<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Project_type;
use Session;

class ProjecttypeController extends Controller
{
     public function project_type()
    {
    	$id = 0;
    	$project_types = Project_type::paginate(5);
    	return view('backend.projecttype',compact("id","project_types"));
    }

    public function add_project_type(){

    	return view('backend.add_project_type');


    }

     public function save_project_type(Request $request){

         $this->validate($request,[
          'project_type_name' =>'required'
      ]);

        Project_type::create($request->all());

        Session::flash('success','You are successfully Save the Project Type');

     	 return redirect('project_type');


     }

      public function get_project_type($id){

      $project_types=Project_type::find(decrypt($id));
      return view('backend.update_project_type' , compact("project_types"));


     }

     public function update_project_type(Request $request,$id){
       $this->validate($request,[
          'project_type_name' =>'required'
      ]);
      	$project_typeId = decrypt($id);
      	$project_types = Project_type::find($project_typeId);
        Session::flash('success','You are successfully Updated the Project Type');
      	$project_types->id = $project_typeId;
      	$project_types->project_type_name = $request->project_type_name;
      	$project_types->update();
      return redirect()->route('project_type');


     }


      public function delete_project_type($id){
       $project_types=Project_type::find(decrypt($id));
      Session::flash('success','You are successfully Deleted the Project Type');
       $project_types->delete();
      return redirect()->route('project_type');
     }
}
