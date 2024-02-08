<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ url('admins/assets')}}/"
  data-template="vertical-menu-template-starter">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <title>@yield('title') :: ACME CRM</title>

    <meta name="description" content="" />
    @include("admin/include/styles")
    <!-- Page CSS -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
 

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            @include('admin/include/navigation')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                @include('admin/include/header')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @yield('content')

                   @include("admin/include/footer")

                   <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    @include("admin/include/script")
      

</body>

</html>
