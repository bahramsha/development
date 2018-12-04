@extends('layouts.master')

@yield('index')
@section('content')
	
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Leave:-</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                   
                  </div>
                  <div class="row"></div>
                      <div class="col-lg-12" >
                    <a href="{{ url('leave') }}" class="btn btn-emp btn-info btn btn-success" role="button" > <i class="fa fa-cogs"></i>
                        <b>Manage Leave</b></a>
                     </div><br>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate method="post"   action="
                    {{ URL::to('update_leave',['id'=>Crypt::encrypt($leave->emp_id)])}}" enctype="multipart/form-data">	
                      

                              {{csrf_field()}}
                      <div class="item form-group {{ $errors->has('emp_id') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="emp_id" name="emp_id" value=" {{$leave->employee->first_name}} {{$leave->employee->last_name}}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Employee" disabled="disabled">
                        </div>
                      </div>
                        <div class="item form-group {{ $errors->has('request_date') ?'has-error':'' }} ">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Request Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date"  name="request_date" value="{{ $leave->request_date }}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Request Date">
                                @if($errors->has('request_date'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('request_date') }}</strong>
                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="item form-group {{ $errors->has('date_start') ?'has-error':'' }} ">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Date Start <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date"  name="date_start" value="{{ $leave->date_start }}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Date Start">
                        @if($errors->has('date_start'))
                            <span class="help-block">
                        <strong>{{ $errors->first('date_start') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
            <div class="item form-group {{ $errors->has('date_end') ?'has-error':'' }} ">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Date End <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date"  name="date_end" value="{{ $leave->date_end }}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Date End">
                    @if($errors->has('date_end'))
                        <span class="help-block">
                        <strong>{{ $errors->first('date_end') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
                    <div class="item form-group {{ $errors->has('reason') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Reason <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="reason" value="{{ old('reason') }}" class="form-control col-md-7 col-xs-12" placeholder="Reason">{{ $leave->reason}}</textarea>
                                @if($errors->has('reason'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('reason') }}</strong>
                           </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Approve</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div  class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-success" id="bg" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="approve" id="yes" value="yes"> &nbsp; Yes &nbsp;
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="approve" id="no"  value="NO"> &nbsp; NO! &nbsp;
                                    </label>
                                </div>
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
            <script type="text/javascript">
              if(document.getElementById('yes').value = 'yes'){
                var bg = document.getElementById('bg');
                bg.css(background:'red');
              }
            
            </script>

@endsection