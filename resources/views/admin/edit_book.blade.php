<!DOCTYPE html>
<html>
  <head>
    <!-- Css-->
    @include('admin.css')
    <style type="text/css"></style>

    .div_center
    {
        text.align: center;
        margin: auto;
    }
    .title
    {
        color: white;
        padding: 30px;
        font-size: 30px;
        font-wight: bold;
    }

    .label
    {
        display: inline-black;
        width: 200px;
    }

    .div_pad
    {
        padding: 15%;
    }


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
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <div class="div_center">

            <h1 class="title">Update book</h1>
            <form action="{{url('update_book',$data->id)}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="div_pad">
                    <label>Book title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>

                <div class="div_pad">
                    <label>Auther Name</label>
                    <input type="text" name="auther_name" value="{{$data->auther_name}}">
                </div>

                <div class="div_pad">
                    <label>Price</label>
                    <input type="text" name="price" value="{{$data->price}}">
                </div>

                <div class="div_pad">
                    <label>Quantity</label>
                    <input type="text" name="quantity" value="{{$data->quantity}}">
                </div>

                <div class="div_pad">
                    <label>Description</label>
                    <texarea name="description">{{$data->description}}</texarea>
                </div>

                <div class="div_pad">
                    <label>Category</label>

                    <select name="category">
                        <option value="{{$data->category_id}}">{{$data->category->cat_tittle}}</option>
                        @foreach($category as $category)

                        <option value="{{$category->id}}">{{$category->cat_tittle}}</option>

                        @endforeach
                    </select>
                    <div class="div_pad">
                        <label>Current Auther Image</label>
                        <img style="width: 80px; border-radius: 50%; margin:auto;" src="/auther/{{$data->auther_img}}">
                    </div>

                    <div class="div_pad">
                        <label>Change Auther Image</label>
                        <input type="file" name="auther_img">
                    </div>

                    <div class="div_pad">
                        <label>Current Book Image</label>
                        <img style="width: 80px; margin:auto;" src="/book/{{$data->book_img}}">
                    </div>

                    <div class="div_pad">
                        <label>Change Book Image</label>
                        <input type="file" name="book_img">
                    </div>

                    <div class="div_pad">
                        <input class="btn btn-info" type="submit" value="Update Book">
                    </div>

                </div>
           
            </form>
          
          </div>          
          </div>

        </div>

    </div>

      <!-- Body-->
      @include('admin.body')
      <!-- End Body-->

      <!-- Footer-->
      @include('admin.footer')
      <!-- End Footer-->
  </body>
</html>