<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/	

		//Authentication Routes
Route::get('/',[
			'uses'  =>	'loginController@showLogin',
			'as'	=>	'login_form'
			]);

		Route::post('signin',[
			'uses' =>'loginController@signIn',
			'as'   => 'signin'
			]);

		Route::get('signout',[
			'uses' =>'loginController@logout',
			'as'   => 'logout'
			]);

	

		// Dashboard routes
/*================================================================================*/		
		Route::group(['middleware' => 'preventBackHistory'],function(){

			///////////////HOME//////////////////

		Route::get('/home', function () {
		  return view('backend.index');
 })->name('home');

//////////////////////////user///////////


///////////////////////Department///////////////////

    Route::get('department',[
      'uses' =>'DepartmentController@department',
      'as'   => 'department'
      ]);


Route::get('/add_departments',[
			'uses' =>'DepartmentController@add_departments',
			'as'   => 'add_departments'
			]);

//save department ///

 Route::post('save_departments'  , [
  'uses'  => 'DepartmentController@save_departments' ,
  'as'    => 'save_departments'

 ]);

 /////get department ///

 Route::get('get_department/{id}' ,  [
  'uses' => 'DepartmentController@get_department',
    'as' => 'get_department'

 ]);

 /////update department ///

 Route::post('update_department/{id}' ,  [
  'uses' => 'DepartmentController@update_department',
    'as' => 'update_department'

 ]);

//////////delete department//////////////////

  Route::get('delete_department/{id}',    [

   'uses' => 'DepartmentController@delete_department',
     'as' => 'delete_department'

 ]);

  /////////////province/////////////////

  Route::get('province',[
      'uses' =>'ProvinceController@province',
      'as'   => 'province'
      ]);


  Route::get('/add_province',[
			'uses' =>'ProvinceController@add_province',
			'as'   => 'add_province'
			]);

 Route::post('save_province'  , [
  'uses'  => 'ProvinceController@save_province' ,
  'as'    => 'save_province'

 ]);
 
 Route::get('get_province/{id}' ,  [
  'uses' => 'ProvinceController@get_province',
    'as' => 'get_province'

 ]);


 Route::post('update_province/{id}' ,  [
  'uses' => 'ProvinceController@update_province',
    'as' => 'update_province'

 ]);

 Route::get('delete_province/{id}',    [

   'uses' => 'ProvinceController@delete_province',
     'as' => 'delete_province'

 ]);
////////////////////////////////Employee//////////////////////////////////

Route::get('employee',[
      'uses' =>'EmployeeController@employee',
      'as'   => 'employee'
      ]);

/////////add employee/////////
Route::get('/add_employee',[
			'uses' =>'EmployeeController@add_employee',
			'as'   => 'add_employee'
			]);

//////save employee /////

 Route::post('save_employee'  , [
  'uses'  => 'EmployeeController@save_employee' ,
  'as'    => 'save_employee'

 ]);

  /////get employee///

 Route::get('get_employee/{id}' ,  [
  'uses' => 'EmployeeController@get_employee',
    'as' => 'get_employee'

 ]);

 /////update employee ///

 Route::post('update_employee/{id}' ,  [
  'uses' => 'EmployeeController@update_employee',
    'as' => 'update_employee'

 ]);

//////////delete employee//////////////////

  Route::get('delete_employee/{id}',    [

   'uses' => 'EmployeeController@delete_employee',
     'as' => 'delete_employee'

 ]);

////////////////contract//////////////

  ////////contract Type///////////////
Route::get('/type',[
      'uses' =>'typeController@type',
      'as'   => 'type'
      ]);

//////////add contract_type/////////
Route::get('/add_contract_type',[
      'uses' =>'typeController@add_contract_type',
      'as'   => 'add_contract_type'
      ]);

///////////save contract_type//////
Route::post('save_contract_type'  , [
  'uses'  => 'typeController@save_contract_type' ,
  'as'    => 'save_contract_type'

 ]);

///////////get contract_type///////
 Route::get('get_contract_type/{id}' ,  [
  'uses' => 'typeController@get_contract_type',
    'as' => 'get_contract_type'

 ]);

////////////update contract_type//////////
 Route::post('update_contract_type/{id}' ,  [
  'uses' => 'typeController@update_contract_type',
    'as' => 'update_contract_type'

 ]);

///////////delete contract_type////////
  Route::get('delete_contract_type/{id}',    [

   'uses' => 'typeController@delete_contract_type',
     'as' => 'delete_contract_type'

 ]);

////////////////Contract///////////////////

Route::get('/contract',[
      'uses' =>'EmpcontractController@contract',
      'as'   => 'contract'
      ]);

Route::get('/add_contract',[
      'uses' =>'EmpcontractController@add_contract',
      'as'   => 'add_contract'
      ]);

//////save contract /////

 Route::post('save_contract'  , [
  'uses'  => 'EmpcontractController@save_contract' ,
  'as'    => 'save_contract'

 ]);



  /////get contract ///

 Route::get('get_contract/{id}' ,  [
  'uses' => 'EmpcontractController@get_contract',
    'as' => 'get_contract'

 ]);

 /////update contract ///

 Route::post('update_contract/{id}' ,  [
  'uses' => 'EmpcontractController@update_contract',
    'as' => 'update_contract'

 ]);

//////////delete contract//////////////////

  Route::get('delete_contract/{id}',    [

   'uses' => 'EmpcontractController@delete_contract',
     'as' => 'delete_contract'

 ]);


  ////////////////////////////////overtime////////////////////////

Route::get('overtime',[
      'uses' =>'OvertimeController@overtime',
      'as'   => 'overtime'
      ]);

/////////add overtime/////////
Route::get('/add_overtime',[
      'uses' =>'OvertimeController@add_overtime',
      'as'   => 'add_overtime'
      ]);

//////save overtime /////

 Route::post('save_overtime'  , [
  'uses'  => 'OvertimeController@save_overtime' ,
  'as'    => 'save_overtime'

 ]);

  /////get overtime///

 Route::get('get_overtime/{id}' ,  [
  'uses' => 'OvertimeController@get_overtime',
    'as' => 'get_overtime'

 ]);

 /////update overtime ///

 Route::post('update_overtime/{id}' ,  [
  'uses' => 'OvertimeController@update_overtime',
    'as' => 'update_overtime'

 ]);

//////////delete overtime//////////////////

  Route::get('delete_overtime/{id}',    [

   'uses' => 'OvertimeController@delete_overtime',
     'as' => 'delete_overtime'

 ]);

////////////////////////////////Attendance//////////////////////////////////

Route::get('attendance',[
      'uses' =>'AttendanceController@attendance',
      'as'   => 'attendance'
      ]);

/////////add attendance/////////
Route::get('/add_attendance',[
      'uses' =>'AttendanceController@add_attendance',
      'as'   => 'add_attendance'
      ]);

//////save attendance /////

 Route::post('save_attendance'  , [
  'uses'  => 'AttendanceController@save_attendance' ,
  'as'    => 'save_attendance'

 ]);

  /////get attendance///

 Route::get('get_attendance/{id}' ,  [
  'uses' => 'AttendanceController@get_attendance',
    'as' => 'get_attendance'

 ]);

 /////update attendance ///

 Route::post('update_attendance/{id}' ,  [
  'uses' => 'AttendanceController@update_attendance',
    'as' => 'update_attendance'

 ]);

//////////delete attendance//////////////////

  Route::get('delete_attendance/{id}',    [
   'uses' => 'AttendanceController@delete_attendance',
     'as' => 'delete_attendance'

 ]);


//////////////////////////////// Leave_Request//////////////////////

Route::get('leave',[
      'uses' =>'LeaveController@leave',
      'as'   => 'leave'
      ]);

/////////add request/////////
Route::get('/add_leave',[
      'uses' =>'LeaveController@add_leave',
      'as'   => 'add_leave'
      ]);

//////save request /////

 Route::post('save_leave'  , [
  'uses'  => 'LeaveController@save_leave' ,
  'as'    => 'save_leave'

 ]);

  /////get request///

 Route::get('get_leave/{id}' ,  [
  'uses' => 'LeaveController@get_leave',
    'as' => 'get_leave'

 ]);

 /////update request ///

 Route::post('update_leave/{id}' ,  [
  'uses' => 'LeaveController@update_leave',
    'as' => 'update_leave'

 ]);

//////////delete request//////////////////

  Route::get('delete_leave/{id}',    [
   'uses' => 'LeaveController@delete_leave',
     'as' => 'delete_leave'

 ]);
  ////////////////////////payroll/////////////////////////////

//////////////////////////////// Resign///////////////////////

Route::get('resign',[
      'uses' =>'ResignController@resign',
      'as'   => 'resign'
      ]);

///add resign///
Route::get('/add_resign',[
      'uses' =>'ResignController@add_resign',
      'as'   => 'add_resign'
      ]);

///save resign /////

 Route::post('save_resign'  , [
  'uses'  => 'ResignController@save_resign' ,
  'as'    => 'save_resign'

 ]);

/////get resign///

 Route::get('get_resign/{id}' ,  [
  'uses' => 'ResignController@get_resign',
    'as' => 'get_resign'

 ]);

///update resign ///

 Route::post('update_resign/{id}' ,  [
  'uses' => 'ResignController@update_resign',
    'as' => 'update_resign'

 ]);

///delete resign///

  Route::get('delete_resign/{id}',    [
   'uses' => 'ResignController@delete_resign',
     'as' => 'delete_resign'

 ]);

//////////////////Project Type//////

Route::get('project_type',[
      'uses' =>'projecttypeController@project_type',
      'as'   => 'project_type'
      ]);

//////////add project_type/////////
Route::get('/add_project_type',[
      'uses' =>'projecttypeController@add_project_type',
      'as'   => 'add_project_type'
      ]);

///////////save project_type//////
Route::post('save_project_type'  , [
  'uses'  => 'projecttypeController@save_project_type' ,
  'as'    => 'save_project_type'

 ]);

///////////get project_type///////
 Route::get('get_project_type/{id}' ,  [
  'uses' => 'projecttypeController@get_project_type',
    'as' => 'get_project_type'

 ]);

////////////update project_type//////////
 Route::post('update_project_type/{id}' ,  [
  'uses' => 'projecttypeController@update_project_type',
    'as' => 'update_project_type'

 ]);

///////////delete project_type////////
  Route::get('delete_project_type/{id}',    [
   'uses' => 'projecttypeController@delete_project_type',
     'as' => 'delete_project_type'

 ]);

////////////////////////////////Project//////////////////////////////////

Route::get('project',[
      'uses' =>'ProjectController@project',
      'as'   => 'project'
      ]);

/////////add project/////////
Route::get('/add_project',[
      'uses' =>'ProjectController@add_project',
      'as'   => 'add_project'
      ]);

//////save project /////

 Route::post('save_project'  , [
  'uses'  => 'ProjectController@save_project' ,
  'as'    => 'save_project'

 ]);

/////get project///

 Route::get('get_project/{id}' ,  [
  'uses' => 'ProjectController@get_project',
    'as' => 'get_project'

 ]);

/////update project //////

 Route::post('update_project/{id}' ,  [
  'uses' => 'ProjectController@update_project',
    'as' => 'update_project'

 ]);

//////////delete project//////////////////

  Route::get('delete_project/{id}',    [
   'uses' => 'ProjectController@delete_project',
     'as' => 'delete_project'

 ]);

  //////////////////////////////// Timesheet//////////////////////

Route::get('timesheet',[
      'uses' =>'TimesheetController@timesheet',
      'as'   => 'timesheet'
      ]);

/////////add timesheet/////////
Route::get('/add_timesheet',[
      'uses' =>'TimesheetController@add_timesheet',
      'as'   => 'add_timesheet'
      ]);

//////save timesheet /////

 Route::post('save_timesheet'  , [
  'uses'  => 'TimesheetController@save_timesheet' ,
  'as'    => 'save_timesheet'

 ]);

  /////get timesheet///

 Route::get('get_timesheet/{id}' ,  [
  'uses' => 'TimesheetController@get_timesheet',
    'as' => 'get_timesheet'

 ]);

 /////update timesheet ///

 Route::post('update_timesheet/{id}' ,  [
  'uses' => 'TimesheetController@update_timesheet',
    'as' => 'update_timesheet'

 ]);

//////////delete timesheet//////////////////

  Route::get('delete_timesheet/{id}',    [
   'uses' => 'TimesheetController@delete_timesheet',
     'as' => 'delete_timesheet'

 ]);


  ////////////////////////////////Expense//////////////////////////////////

Route::get('expense',[
      'uses' =>'ExpenseController@expense',
      'as'   => 'expense'
      ]);

/////////add expense/////////
Route::get('/add_expense',[
      'uses' =>'ExpenseController@add_expense',
      'as'   => 'add_expense'
      ]);

//////save expense /////

 Route::post('save_expense'  , [
  'uses'  => 'ExpenseController@save_expense' ,
  'as'    => 'save_expense'

 ]);

  /////get expense///

 Route::get('get_expense/{id}' ,  [
  'uses' => 'ExpenseController@get_expense',
    'as' => 'get_expense'

 ]);

 /////update expense //////

 Route::post('update_expense/{id}' ,  [
  'uses' => 'ExpenseController@update_expense',
    'as' => 'update_expense'

 ]);

//////////delete expense//////////////////

  Route::get('delete_expense/{id}',    [
   'uses' => 'ExpenseController@delete_expense',
     'as' => 'delete_expense'

 ]);

  Route::get('manage_payroll',[
      'uses' =>'AttendanceController@manage_payroll',
      'as'   => 'manage_payroll'
      ]);
 

});


