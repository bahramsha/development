@extends('layouts.master')

@yield('index')
@section('content')
	
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Contract:-</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="
                    {{ URL::to('update_contract',['id'=>Crypt::encrypt($contracts->id)])}}
                    " enctype="multipart/form-data">	
                              {{csrf_field()}}
                      <div class="item form-group {{ $errors->has('emp_id') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="emp_id" name="emp_id" value=" {{$contracts->employee->first_name}} {{$contracts->employee->last_name}}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Employee" disabled="disabled">
                        </div>
                      </div>
                       <div class="item form-group  {{ $errors->has('start_date') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Start Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="start_date" value="{{ $contracts->start_date }}"  required="required" type="text" placeholder="Start Date">
                           @if($errors->has('start_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('start_date') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('end_date') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">End Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="end_date" name="end_date" value="{{ $contracts->end_date }}"  required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Phone">
                          @if($errors->has('end_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('end_date') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('contract_type_name') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contract Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="contract_type_name" value="{{ old('emp_id') }}">
                            <option></option>
                            @foreach($contract_types->all() as $contract_type)
                            <option value="{{ $contract_type->id }}" {{ ($contracts->contract_type_name == $contract_type->id ) ? 'selected' : '' }}>{{ $contract_type->contract_type_name }}</option>
                            @endforeach
                          </select>
                           @if($errors->has('contract_type_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('contract_type_name') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                       <div class="item form-group  {{ $errors->has('position') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Position<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="position" name="position" value="{{ $contracts->position }}"  required="required" class="form-control col-md-7 col-xs-12" placeholder="Position">
                           @if($errors->has('position'))
                    <span class="help-block">
                        <strong>{{ $errors->first('position') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                     
                          <div class="item form-group  {{ $errors->has('gross_salary') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Gross Salary<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="gross_salary" name="gross_salary" value="{{ $contracts->gross_salary }}" required="required" class="form-control col-md-7 col-xs-12" placeholder="Gross Salary">
                           @if($errors->has('gross_salary'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gross_salary') }}</strong>
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
                              <input type="radio" name="currency"  value="D$"> &nbsp; D$ &nbsp;
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

@endsection