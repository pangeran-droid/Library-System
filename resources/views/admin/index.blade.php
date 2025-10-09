<!DOCTYPE html>
<html>
  <head>
    <!-- Css-->
    @include('admin.css')
    <!-- End Css-->
  </head>
  <body>
    <!-- Header Navigation-->
    @include('admin.header')    
    <!-- End Header Navigation-->
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <!-- Body-->
      @include('admin.body')
      <!-- End Body-->

      <!-- Footer-->
      @include('admin.footer')
      <!-- End Footer-->
  </body>
</html>