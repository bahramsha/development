@extends('layouts.master')
@yield('index')
@section('content')
  
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Attendance:-</h2>
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

                    <form class="form-horizontal form-label-left" novalidate method="post"  action="{{ route('save_attendance')}}" enctype="multipart/form-data"> 
                      

                              {{csrf_field()}}
                      <div class="item form-group {{ $errors->has('emp_id') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="emp_id" value="{{ old('emp_id') }}">
                            <option></option>
                            @foreach($employees->all() as $employee)
                            <option value="{{$employee->id}}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                          </select>
                           @if($errors->has('emp_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('emp_id') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>    
                      <div class="item form-group {{ $errors->has('strat_time') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Strat_time <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" name="strat_time" value="{{ old('strat_time') }}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="strat_time">
                          @if($errors->has('strat_time'))
                    <span class="help-block">
                        <strong>{{ $errors->first('strat_time') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>

                         <div class="item form-group {{ $errors->has('end_time') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >End_time <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" name="end_time" value="{{ old('end_time') }}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="end_time">
                          @if($errors->has('end_time'))
                    <span class="help-block">
                        <strong>{{ $errors->first('end_time') }}</strong>
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