<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Contract;
use app\Employee;
use app\Contract_type;
use Session;

class EmpcontractController extends Controller
{
    public function contract()
    {
    	 $id = 0;
    	$contracts = Contract::paginate(5);
    	return view('backend.contract',compact("contracts","id"));
    }

     public function add_contract(){
     	$employees = Employee::all();
      $contract_types = Contract_type::all();
    	return view('backend.add_contract',compact("employees","contract_types"));
    }

     public function save_contract(Request $request){

    	//dd($request->all());
         $this->validate($request, array(
          'emp_id' =>'required|int',
          'start_date'  =>'required|date',
          'end_date'   =>'date',
          'contract_type_name'=>'required',
          'position' =>'required|alpha',
          'gross_salary'  =>'required|int',
          'currency' =>'required'
      ));
      //    dd('validation done');


         	$contract = new Contract();
  			$contract->emp_id = $request->emp_id;
  			$contract->start_date = $request->start_date;
  			$contract->end_date = $request->end_date;
       	$contract->contract_type_name = $request->contract_type_name;
  			$contract->position =$request->position;
  			$contract->gross_salary =$request->gross_salary;
  			$contract->currency =$request->currency;

  			$contract->save();
         	Session::flash('success','You are successfully save the Contract');
  			return redirect()->route('contract');


}

 public function get_contract($id){
        $contId = decrypt($id);
      $contracts=Contract::find($contId);
      $employees = Employee::all();
      $contract_types = Contract_type::all();
      return view('backend.update_contract' , compact("contracts","employees","contract_types"));


     }

      public function update_contract(Request $request,$id){

         $this->validate($request, array(
          'emp_id' =>'required|int',
          'start_date'  =>'required|date',
          'end_date'   =>'date',
          'contract_type_name'=>'required',
          'position' =>'required|alpha',
          'gross_salary'  =>'required|int',
          'currency' =>'required|'
          ));
        $contId = decrypt($id);
        $contracts = Contract::find($contId);
        Session::flash('success','You are successfully Updated the Contract');
        $contracts->id = $contId;
        $contracts->emp_id = $request->emp_id;
        $contracts->start_date = $request->start_date;
        $contracts->end_date = $request->end_date;
        $contracts->contract_type_name = $request->contract_type_name;
        $contracts->position = $request->position;
        $contracts->gross_salary = $request->gross_salary;
        $contracts->currency = $request->currency;
        $contracts->update();
      return redirect()->route('contract');


     }


      public function delete_contract($id){
       $contracts=Contract::find(decrypt($id));
      Session::flash('success','You are successfully Deleted the Contract');
       $contracts->delete();
      return redirect()->route('contract');
     }

}

