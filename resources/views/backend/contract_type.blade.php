@extends('layouts.master')

@yield('index')
@section('content')

<div id="page-wrapper"> 

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contract Type:-</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                   <div class="row" >
                <div class="col-lg-12" >
                    <a href="{{ url('add_contract_type') }}" class="btn btn-emp btn-info btn btn-success" role="button" > <i class="fa fa-plus"></i>
                        <b>Add New Contract Type</b></a>
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
                            <th class="column-title col-xs-1 text-center">ID </th>
                            <th class="column-title col-xs-2 text-center">Contract Type</th>
                            <th class="column-title col-xs-2 text-center">Update </th>
                            <th class="column-title col-xs-2 text-center">Delete </th>
                          </tr>
                        </thead>
                        @foreach($contract_types as $contract_type)
                        <tbody>
                              <td class="text-center">{{++$id}} </td>
                            <td class="text-center">{{$contract_type->contract_type_name}}</td>
                            <td class="text-center"><a href="{{route('get_contract_type' , ['id' => Crypt::encrypt($contract_type->id)])}}"><i class="fa fa-edit fa-2x "></i></a></td>
                            <td class="text-center"><a href="{{route('delete_contract_type' , ['id' => Crypt::encrypt($contract_type->id)])}}"><i class="fa fa-trash fa-2x"></i></a></td>

                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                      
                    </div>
                    <div class="col-sm-3 pull-right">
                      <div class="panel-heading"style="height: 105px;">{{ $contract_types->links() }}</div>
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



        </div>
    

@endsection