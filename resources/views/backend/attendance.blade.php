@extends('layouts.master')

@yield('index')
@section('content')
<div id="page-wrapper"> 

       
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Attendance:-</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                  <div class="row" >
                <div class="col-lg-12" >
                    <a href="{{ url('add_attendance') }}" class="btn btn-emp btn-info btn btn-success" role="button" > <i class="fa fa-plus"></i>
                        <b>Add New Attendance</b></a>
                        <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                     </div>
                       </div>
                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title col-xs-1 text-center">ID</th>
                            <th class="column-title col-xs-2 text-center">Employee</th>
                            <th class="column-title col-xs-2 text-center">Strat_time</th>
                            <th class="column-title col-xs-2 text-center">End_time</th>
                            <th class="column-title col-xs-2 text-center">Date</th>
                            <th class="column-title col-xs-2 text-center">Update</th>
                            <th class="column-title col-xs-2 text-center">Delete</th>
                          </tr>
                        </thead>
                        @foreach($attendances as $attendance)
                        <tbody>
                            <td class="text-center">{{++$id}}</td>
                            <td class="text-center">{{$attendance->employee->first_name}} {{$attendance->employee->last_name}}</td>
                            <td class="tect-center">{{$attendance->strat_time}}</td>
                            <td class="tect-center">{{$attendance->end_time}}</td>
                            <td class="tect-center">{{$attendance->date}}</td>
                            <td class="text-center"><a href="{{route('get_province' , ['id' => Crypt::encrypt($province->id)])}}"><i class="fa fa-edit fa-2x "></i></a></td>
                            <td class="text-center"><a href="{{route('delete_province' , ['id' => Crypt::encrypt($province->id)])}}"><i class="fa fa-trash fa-2x"></i></a></td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                    </div>
                                        <div class="col-sm-3 pull-right">
                      <div class="panel-heading"style="height: 105px;">{{ $attendances->links() }}</div>
                    </div>
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
            
							
						
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>



@endsection