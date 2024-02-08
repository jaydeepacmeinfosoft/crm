<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ url('admins/assets')}}/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | {{config('app.name')}}</title>
    <meta name="description" content="" />
    @include("admin/include/styles")
    <link rel="stylesheet" href="{{ url('admins/assets/vendor/css/pages/page-auth.css')}}" />
    <!-- Page CSS -->


</head>

<body>
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
         

            @yield('content')

            <!-- /Register -->
          </div>
        </div>
    <!-- / Layout wrapper -->

    @include("admin/include/script")
</body>

</html>
