@extends('layouts.master')

@yield('index')
@section('content')
	
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Project:-</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row"></div>
                      <div class="col-lg-12" >
                    <a href="{{ url('project') }}" class="btn btn-emp btn-info btn btn-success" role="button" > <i class="fa fa-cogs"></i>
                        <b>Manage Project</b></a>
                     </div><br>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post"  action="{{ route('save_project')}}" enctype="multipart/form-data">	
                      

                              {{csrf_field()}}
                      <div class="item form-group {{ $errors->has('project_code') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project_Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="project_code"  value="{{ old('project_code') }}" required="required"  placeholder="Project Code">
                           @if($errors->has('project_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('project_code') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                       <div class="item form-group  {{ $errors->has('project_name') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="project_name" value="{{ old('project_name') }}"  required="required"  placeholder="Project Name">
                           @if($errors->has('project_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('project_name') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                     <div class="item form-group {{ $errors->has('project_type_id') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="project_type_id" value="{{ old('project_type_id') }}" >
                            <option></option>
                            @foreach($project_types as $project_type)
                            <option value="{{$project_type->id}}">{{ $project_type->project_type_name }}</option>
                            @endforeach
                          </select>
                            @if($errors->has('project_type_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('project_type_id') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                        <div class="item form-group  {{ $errors->has('donar_name') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Donar Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="donar_name" value="{{ old('donar_name') }}"  required="required"  placeholder="Donar Name">
                           @if($errors->has('donar_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('donar_name') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                          <div class="item form-group {{ $errors->has('start_date') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Start Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" class="form-control has-feedback-left" name="start_date"  value="{{ old('start_date') }}" placeholder="Start Date" aria-describedby="inputSuccess2Status2">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                @if($errors->has('start_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('start_date') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                       <div class="item form-group {{ $errors->has('end_date') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">End Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" class="form-control has-feedback-left" name="end_date"  value="{{ old('end_date') }}" placeholder="End Date" aria-describedby="inputSuccess2Status2">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                @if($errors->has('end_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('end_date') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                       <div class="item form-group  {{ $errors->has('project_cost') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Project_Cost<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="project_cost" value="{{ old('project_cost') }}" required="required" class="form-control col-md-7 col-xs-12" placeholder="Project Cost">
                           @if($errors->has('project_cost'))
                    <span class="help-block">
                        <strong>{{ $errors->first('project_cost') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Currency</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="currency" value="AFG"> &nbsp; AFG &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="currency"  value="$"> &nbsp; D$ &nbsp;
                            </label>
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