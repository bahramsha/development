<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Contract_type;
use Session;
class typeController extends Controller
{
    public function type()
    {
    	$id = 0;
       $contract_types=Contract_type::paginate(5);
    	return view('backend.contract_type',compact('contract_types',"id"));
    }


    public function add_contract_type(){

    	return view('backend.add_contract_type');


    }

    public function save_contract_type(Request $request){

         $this->validate($request,[
          'contract_type_name' =>'required'
      ]);

        Contract_type::create($request->all());

        Session::flash('success','You are successfully Save the Contract Type');

     	 return redirect('type');


     }

     public function get_contract_type($id){

      $contract_types=Contract_type::find(decrypt($id));
      return view('backend.update_contract_type' , compact("contract_types"));


     }

     public function update_contract_type(Request $request,$id){
       $this->validate($request,[
          'contract_type_name' =>'required'
      ]);
      	$contId = decrypt($id);
      	$contract_types = Contract_type::find($contId);
        Session::flash('success','You are successfully Updated the Contract Type');
      	$contract_types->id = $contId;
      	$contract_types->contract_type_name = $request->contract_type_name;
      	$contract_types->update();
      return redirect()->route('type');


     }


      public function delete_contract_type($id){
       $contract_types=Contract_type::find(decrypt($id));
      Session::flash('success','You are successfully Deleted the Contract Type');
       $contract_types->delete();
      return redirect()->route('type');
     }
}
