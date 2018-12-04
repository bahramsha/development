@extends('layouts.master')

@yield('index')
@section('content')
	
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Expense:-</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row"></div>
                      <div class="col-lg-12" >
                    <a href="{{ url('expense') }}" class="btn btn-emp btn-info btn btn-success" role="button" > <i class="fa fa-cogs"></i>
                        <b>Manage Expense</b></a>
                     </div><br>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post"  action="{{ route('save_expense')}}" enctype="multipart/form-data">	
                      

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
                        <div class="item form-group  {{ $errors->has('project_code_id') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project_code<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="project_code_id" value="{{ old('project_code_id') }}">
                            <option></option>
                            @foreach($projects->all() as $project)
                            <option value="{{$project->project_code}}">{{$project->project_code}}</option>
                            @endforeach
                          </select>
                           @if($errors->has('project_code_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('project_code_id') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('item_name') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item_Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="item_name"  value="{{ old('item_name') }}" required="required" type="text" placeholder="Item Name">
                           @if($errors->has('item_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('item_name') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                         <div class="item form-group {{ $errors->has('expense_date') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Expense_Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" class="form-control has-feedback-left" name="expense_date"  value="{{ old('expense_date') }}" placeholder="Expense Date" aria-describedby="inputSuccess2Status2">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                @if($errors->has('expense_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('expense_date') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('qty') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="qty"  value="{{ old('qty') }}" required="required" type="text" placeholder="Quantity
                          ">
                           @if($errors->has('qty'))
                    <span class="help-block">
                        <strong>{{ $errors->first('qty') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('price') ?'has-error':'' }} ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="price"  value="{{ old('price') }}" required="required" type="text" placeholder="Price
                          ">
                           @if($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                    @endif
                        </div>
                      </div>
                      <div class="item form-group {{ $errors->has('description') ?'has-error':'' }} ">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="description" value="{{ old('description') }}" class="form-control col-md-7 col-xs-12" placeholder="Description"></textarea>
                                @if($errors->has('description'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
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