<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AICS </title>
    @extends('include.link')

  </head>

  <body class="login">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="a">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"  href="{{ url('/') }}"><b>&nbsp;&nbsp;&nbsp;AICS-MIS</b></a>
        </div>

        <!-- Top Menu Items -->

        <ul class="nav navbar-right top-nav">
            
                <li>
                    <a href="{{ url('/') }}"><i class="fa fa-list"></i><b>&nbsp;&nbsp;&nbsp;New Jobs </b></a>
                </li>
              </ul>
            </div>
          </nav>
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{route('signin') }}">
            <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                <hr class="colorgraph"><br>

               {{ csrf_field() }}
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
             <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-8 col-xs-8">
               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  required="" autofocus="" >

                 @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-8 col-xs-8">
              <input id="password" type="password" class="form-control" name="password" required="">

                  @if ($errors->has('password'))
                     <span class="help-block">
                         <strong>{{ $errors->first('password') }}</strong>
                     </span>
                  @endif
             </div>
        </div>
            
                <div class="form-group">
            <div class="col-md-6 col-xs-4 col-md-offset-5 col-xs-offset-5">
                <button type="submit" class="btn btn-primary btn-block" id="b">Login</button>
            </div>
        </div>
            </form>
          </section>
        </div>
        </div>
        </div>
        <style type="text/css">
          #a{
            background: #26B99A;
    border: 1px solid #169F85;
          }
          #b{
              background: #26B99A;
    border: 1px solid #169F85;
          }
        </style>
  </body>
</html>
