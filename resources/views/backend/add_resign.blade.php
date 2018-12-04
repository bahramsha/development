@extends('layouts.master')

@yield('index')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Resign:-</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="row"></div>
                <div class="col-lg-12" >
                    <a href="{{ url('resign') }}" class="btn btn-emp btn-info btn btn-success" role="button" > <i class="fa fa-cogs"></i>
                        <b>Manage Resign</b></a>
                </div><br>
                <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post"  action="{{ route('save_resign')}}" enctype="multipart/form-data">


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
                        <div class="item form-group {{ $errors->has('resign_date') ?'has-error':'' }} ">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Resign Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date"  name="resign_date" value="{{ old('resign_date') }}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Resign Date">
                                @if($errors->has('resign_date'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('resign_date') }}</strong>
                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="item form-group {{ $errors->has('reason') ?'has-error':'' }} ">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Reason <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="reason" value="{{ old('reason') }}" class="form-control col-md-7 col-xs-12" placeholder="Reason"></textarea>
                                @if($errors->has('reason'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('reason') }}</strong>
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