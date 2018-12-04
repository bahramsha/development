<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Expense;
use app\Employee;
use app\Project;
use Session;

class ExpenseController extends Controller
{
    public function expense(){
    	$id = 0;
    	$expenses = Expense::paginate(5);
    	 return view('backend.expense',compact("id","expenses"));
    }

     public function add_expense(){
     	$employees = Employee::all();
   		$projects = Project::all();
    	return view('backend.add_expense',compact("employees","projects"));

    }

     public function save_expense(Request $request){

    	//dd($request->all());
         $this->validate($request, array(
          'emp_id' =>'required|int',
          'project_code_id' =>'required',
          'item_name'  =>'required',
          'expense_date' =>'required|date',
          'qty' =>'required|int',
          'price'  =>'required|int',
          'description' =>'required',
          'currency' =>'required'
      ));
      //    dd('validation done');

  			$expense = new Expense();
  			$expense->emp_id = $request->emp_id;
  			$expense->project_code_id = $request->project_code_id;
  			$expense->item_name = $request->item_name;
  		    $expense->expense_date = date('Y-m-d', strtotime($request->expense_date));
  			$expense->qty = $request->qty;
  			$expense->price = $request->price;
  			$expense->description = $request->description;
  			$expense->currency =$request->currency;
  			$expense->save();
        	Session::flash('success','You are successfully save the Expense');
  			return redirect('expense');
     
}
}
