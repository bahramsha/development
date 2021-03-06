@extends('layouts.master')

@yield('index')
@section('content')


<div id="page-wrapper"> 

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contract:-</h1>
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
                    <a href="{{ url('add_contract') }}" class="btn btn-emp btn-info btn btn-success" role="button" > <i class="fa fa-plus"></i>
                        <b>Add New Contract</b></a>
                        <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                     </div>
                       </div>

                  <div class="x_content">

                    <div class="table-responsive" id="a">
                      <table class="table table-striped jambo_table bulk_action table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title col-xs-1">ID</th>
                            <th class="column-title col-xs-1">Employee</th>
                            <th class="column-title col-xs-2">Start Date</th>
                            <th class="column-title col-xs-2">End Date</th>
                            <th class="column-title col-xs-2">Contract Type</th>
                            <th class="column-title col-xs-2">Position</th>
                            <th class="column-title col-xs-2">Gross Salary</th>
                            <th class="column-title col-xs-2">Currency</th>
                            <th class="column-title col-xs-2">Update </th>
                            <th class="column-title col-xs-2">Delete </th>
                          </tr>
                        </thead>
                         @foreach($contracts as $contract)
                        <tbody>
                           <td class="text-center">{{++$id}} </td>
                            <td class="text-center">{{$contract->employee->first_name}} {{$contract->employee->last_name}}</td>
                            <td class="text-center">{{$contract->start_date}}</td>
                            <td class="text-center">{{$contract->end_date}}</td>
                            <td class="text-center">{{$contract->contract_type->contract_type_name}}</td>
                            <td class="text-center">{{$contract->position}}</td>
                            <td class="text-center">{{$contract->gross_salary}}</td>
                            <td class="text-center">{{$contract->currency}}</td>
                            <td class="text-center"><a href="{{route('get_contract' , ['id' => Crypt::encrypt($contract->id)])}}"><i class="fa fa-edit fa-2x "></i></a></td>
                            <td class="text-center"><a href="{{route('delete_contract' , ['id' => Crypt::encrypt($contract->id)])}}"><i class="fa fa-trash fa-2x"></i></a></td>

                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                      
                    </div>
                    <button class="btn btn-success" onclick="printContent('a')">Print Contract</button>
                    <div class="col-sm-3 pull-right">
                      <div class="panel-heading"style="height: 105px;">{{ $contracts->links() }}</div>
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

   <!-- <script type="text/javascript">

function printContent(id){
str=document.getElementById(id).innerHTML;
newwin=window.open()
newwin.document.write('<HTML>\n<HEAD>\n')
newwin.document.write('<TITLE>Contract</TITLE>\n')
newwin.document.write('<script>\n')
newwin.document.write('function chkstate(){\n')
newwin.document.write('if(document.readyState=="complete"){\n')
newwin.document.write('window.close()\n')
newwin.document.write('}\n')
newwin.document.write('else{\n')
newwin.document.write('setTimeout("chkstate()",2000)\n')
newwin.document.write('}\n')
newwin.document.write('}\n')
newwin.document.write('function print_win(){\n')
newwin.document.write('window.print();\n')
newwin.document.write('chkstate();\n')
newwin.document.write('}\n')
newwin.document.write('<\/script>\n')
newwin.document.write('</HEAD>\n')
newwin.document.write('<BODY onload="print_win()">\n')
newwin.document.write(str)
newwin.document.write('</BODY>\n')
newwin.document.write('</HTML>\n')
newwin.document.close()
}

</script> -->
 <script>
        function printContent(a){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(a).innerHTML;
           document.body.innerHTML = printcontent;
             window.print();
            document.body.innerHTML = restorepage;
}
</script>
@endsection


