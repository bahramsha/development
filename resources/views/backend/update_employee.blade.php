@extends('layouts.master')

@yield('index')
@section('content')
  
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Employee:-</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post"  action="{{ URL::to('update_employee',['id'=>Crypt::encrypt($employees->id)])}}" enctype="multipart/form-data"> 
                              {{csrf_field()}}
                      <div class="item form-group {{ $errors->has('first_name') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="first_name"  value="{{$employees->first_name}}" required="required" type="text">
                           @if($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{$errors->first('first_name')}}</strong>
                       

                    </span>
                    @endif
                        </div>
                      </div>
                       <div class="item form-group  {{ $errors->has('last_name') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="last_name"  value="{{$employees->last_name}}"  required="required" type="text">
                           @if($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name')}}</strong>
                       
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('phone') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" value="{{$employees->phone}}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                          @if($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{$errors->first('phone')}}</strong>
                       
                    </span>
                    @endif
                        </div>
                      </div>
                       <div class="item form-group  {{ $errors->has('email') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" value="{{$employees->email}}" required="required" class="form-control col-md-7 col-xs-12">
                           @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{$errors->first('email')}}</strong>
                        
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('gender') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gender <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="gender"  value="{{$employees->gender}}" required="required" type="text" placeholder="Gender">
                           @if($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                       
                    </span>
                    @endif
                        </div>
                      </div>
                          <div class="item form-group {{ $errors->has('date_of_birth') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Date of Birth<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" class="form-control has-feedback-left" name="date_of_birth"  value="{{$employees->date_of_birth}}" placeholder="Date of Birth" aria-describedby="inputSuccess2Status2">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                @if($errors->has('date_of_birth'))
                    <span class="help-block">
                        <strong>{{$errors->first('date_of_birth')}}</strong>
                        
                    </span>
                    @endif
                        </div>
                      </div>
                       <div class="item form-group {{ $errors->has('image') ? ' has-error' : '' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Photo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="image" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="image"  value="{{$employees->image}}" required="required" type="file">
                            @if ($errors->has('image'))
                                            <span class="help-block">
                                                  <strong>{{ $errors->first('image') }}</strong>
                                                 

                                            </span>
                                        @endif
                        </div>
                      </div>
                       <div class="item form-group  {{ $errors->has('department_id') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Department<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="department_id" value="{{ old('department_id') }}"  >
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" {{($employees->department->id == $department->id) ? 'selected' : '' }}>{{ $department->name }}</option>
                            @endforeach
                          </select>
                          
                             @if($errors->has('department_id'))
                    <span class="help-block">
                        <strong>{{$errors->first('department_id')}}</strong>
  
                    </span>
                    @endif
                        </div>
                      </div>
                        <div class="item form-group {{ $errors->has('province_id') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Province<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="province_id" value="{{ old('province_id') }}" >
                            <option></option>
                            @foreach($provinces as $province)
                            <option value="{{$province->id}}" {{($employees->province->id == $province->id) ? 'selected' : '' }}>{{ $province->province_name }}</option>
                            @endforeach
                          </select>

                            @if($errors->has('province_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('province_id') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>

                      
                       <div class="item form-group {{ $errors->has('district') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">District<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="district" value="{{$employees->district}}" required="required" type="text">
                            @if($errors->has('district'))
                    <span class="help-block">
                        <strong>{{$errors->first('district') }}</strong>
                        
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('location') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Location <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="location"  class="form-control col-md-7 col-xs-12">{{$employees->location}}</textarea>
                           @if($errors->has('location'))
                    <span class="help-block">
                        <strong>{{ $errors->first('location') }}</strong>
                        
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