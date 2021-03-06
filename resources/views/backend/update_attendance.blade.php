@extends('layouts.master')

@yield('index')
@section('content')
	
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Attendance:-</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row"></div>
                      <div class="col-lg-12" >
                    <a href="{{ url('attendance') }}" class="btn btn-emp btn-info btn btn-success" role="button" > <i class="fa fa-cogs"></i>
                        <b>Manage Attendance</b></a>
                     </div><br>
                  <div class="x_content">
                      @foreach($attendances as $attendance)
                           
                            @endforeach

                    <form class="form-horizontal form-label-left" novalidate method="post"   action="
                    {{ URL::to('update_attendance',['id'=>Crypt::encrypt($attendance->emp_id)])}}" enctype="multipart/form-data">	
                      

                              {{csrf_field()}}
                      <div class="item form-group {{ $errors->has('emp_id') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="emp_id" name="emp_id" value=" {{$attendance->employee->first_name}} {{$attendance->employee->last_name}}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Employee" disabled="disabled">
                        </div>
                      </div>
        
                     
            
                      <div class="item form-group {{ $errors->has('hours') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Hours <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="hours" name="hours" value="{{ $attendance->hours }}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Hours">
                          @if($errors->has('hours'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hours') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            @if(Session::has('success'))
                          <div class="alert alert-success" role="alert">
                            <strong>Success:</strong> {{Session::get('success') }}
                          </div>
                          @endif

                           @if (count($errors) > 0)

                            <div class="alert alert-danger" role="alert">
                                <strong>Errors:-</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                  </ul>
                            </div>
                            @endif
                          <button id="send" type="submit"  name ="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

@endsection