<!DOCTYPE html>
<html>
  <head> 
    <!-- Css-->
    @include('admin.css')
    <!-- End Css-->
    <style type="text/css">
        .div_deg {
            text-align: center;
            margin: auto;
        }

        .title_deg {
            color: white;
            padding: 40px;
            font-size: 30px;
            font-weight: bold;
        }
    </style>
  </head>
  <body>
    <!-- Header Navigation-->
    @include('admin.header')    
    <!-- End Header Navigation-->  
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
       @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="div_deg">

                <h1 class="title_deg">Update Category</h1>

                <form action="{{url('update_category', $data->id)}}" method="POST">

                @csrf

                    <label>Category Name</label>

                    <input type="text" name="cat_name" value="{{$data->cat_title}}">

                    <input type="submit" class="btn btn-info">
                </form>

            </div>

          </div>
        </div>
      </div>

      <!-- Footer-->
      @include('admin.footer')
      <!-- End Footer-->
  </body>
</html>