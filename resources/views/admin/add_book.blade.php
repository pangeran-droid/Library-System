<!DOCTYPE html>
<html>
  <head>
    <!-- Css-->
    @include('admin.css')
    <!-- End Css-->
     <style>
        .div_center {
            text-align: center;
            margin: auto;
        }

        .title_deg {
            color: white;
            padding: 35px;
            font-size: 40px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_pad {
            padding: 15px;
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

              @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hiden="true">x</button>
                    {{session()->get('message')}}
                </div>
              @endif

            <div class="div_center">

            <h1 class="title_deg">Add Books</h1>

            <form action="{{url('store_book')}}" method="POST" enctype="multipart/form-data">

            @csrf

                <div class="div_pad">
                    <label>Book Title</label>
                    <input type="text" name="title">
                </div>
                <div class="div_pad">
                    <label>Author Name</label>
                    <input type="text" name="auther_name">
                </div>
                <div class="div_pad">
                    <label>Price</label>
                    <input type="number" name="price">
                </div>
                <div class="div_pad">
                    <label>Quantity</label>
                    <input type="number" name="quantity">
                </div>
                <div class="div_pad">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="div_pad">
                    <label>Category</label>
                    <select name="category" require>
                        <option>Select a Category</option>

                        @foreach($data as $data)
                        <option value="{{$data->id}}">{{$data->cat_title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="div_pad">
                    <label>Book Image</label>
                    <input type="file" name="book_img">
                </div>
                <div class="div_pad">
                    <label>Auther Image</label>
                    <input type="file" name="auther_img">
                </div>

                <div class="div_pad">
                    <input type="submit" value="Add Book" class="btn btn-info">
                </div>

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