<!DOCTYPE html>
<html>
<head>
       @include('include.link')
</head>
<body class="nav-md">

        @include('sidebars.sidebar')
        <!-- page content -->
        <div class="right_col" role="main">
                @yield('content')
        </div>

        @include('include.script')
        @include('include.footer')
</body>
</html>