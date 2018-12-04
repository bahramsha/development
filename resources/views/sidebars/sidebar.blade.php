   <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{URL::to('home')}}" class="site_title"><i class="fa fa-dashboard"></i> <span>AICS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                <h2>Safiullah</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />


    <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{{URL::to('home')}}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-right"></span></a>
                  </li>
                   <li><a href="#"><i class="fa fa-user"></i> User <span class="fa fa-chevron-right"></span></a>
                  </li>
                  <li><a href="{{URL::to('department')}}"><i class="fa fa-file"></i> Department <span class="fa fa-chevron-right"></span></a>
                  </li>
                   <li><a href="{{URL::to('province')}}"><i class="fa fa-cubes"></i> Province<span class="fa fa-chevron-right"></span></a></li>
                  <li><a  href="{{URL::to('employee')}}"><i class="fa fa-users"></i> Employee<span class="fa fa-chevron-right"></span></a> </li>
                    <li><a><i class="fa fa-file-text"></i> Contract<span class="fa fa-chevron-down"></span></a> 
                       <ul class="nav child_menu">
                         <li><a href="{{URL::to('type')}}"><i class="fa fa-plus-square"></i>Add Contract Type<span class="fa fa-chevron-right"></span></a></li>
                         <li><a href="{{URL::to('contract')}}"><i class="fa fa-plus-square"></i>Add Contract<span class="fa fa-chevron-right"></span></a></li>
                      </ul>
                      </li>
                      <li><a  href="{{URL::to('attendance')}}"><i class="fa fa-male"></i> Attendance<span class="fa fa-chevron-right"></span></a> </li>
                       <li><a  href="{{URL::to('leave')}}"><i class="fa fa-plane"></i> Leave Request<span class="fa fa-chevron-right"></span></a> </li>
                        <li><a href="{{URL::to('payroll')}}"><i class="fa fa-bar-chart-o"></i> Payroll <span class="fa fa-chevron-right"></span></a>
                </li>
                    <li><a href="{{URL::to('resign')}}"><i class="fa fa-remove"></i> Resign <span class="fa fa-chevron-right"></span></a>
                </li>
                  <li><a><i class="fa fa-sitemap"></i> Project <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('project_type')}}"><i class="fa fa-plus-square"></i>Add Project Type<span class="fa fa-chevron-right"></span></a></li>
                      <li><a  href="{{URL::to('project')}}"><i class="fa fa-plus-square"></i>Add Project<span class="fa fa-chevron-right"></span></a></li>
                       <li><a  href="{{URL::to('timesheet')}}"><i class="fa fa-table"></i>Timesheet<span class="fa fa-chevron-right"></span></a></li>
                         <li><a  href="{{URL::to('expense')}}"><i class="fa fa-credit-card"></i>Expense<span class="fa fa-chevron-right"></span></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder-open"></i>Research<span class="fa fa-chevron-right"></span></a>
                  </li>
                   <li><a><i class="fa fa-certificate"></i>Certificate<span class="fa fa-chevron-right"></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
         <!-- /sidebar menu -->

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Safiullah
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#"> Profile</a></li>
                    <li>
                    </li>
                    <li><a href="{{URL::to('signout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->