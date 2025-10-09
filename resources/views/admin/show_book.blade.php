<!DOCTYPE html>
<html>
  <head>
    <!-- Css-->
    @include('admin.css')
    <!-- End Css-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <style type="text/css">
        .table_center {
            text-align: center;
            margin: auto;
            border: 1px solid yellowgreen;
            margin-top: 50px;
        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        .img_auther {
            width: 80px;
            border-radius: 50%;
        }

        .img_book {
            width: 150px;
            height: auto;
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

            <div class="table-responsive">
                <table class="table_center">
                    <tr>
                        <th>Book Title</th>
                        <th>Auther Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Author Image</th>
                        <th>Book Image</th>
                        <th>Deleted</th>
                    </tr>

                    @foreach($book as $book)
                    <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->auther_name}}</td>
                        <td>{{$book->price}}</td>
                        <td>{{$book->quantity}}</td>
                        <td>{{$book->description}}</td>
                        <td>{{$book->category->cat_title}}</td>

                        <td>
                            <img class="img_auther" src="auther/{{$book->auther_img}}">
                        </td>
                        <td>
                            <img class="img_book" src="book/{{$book->book_img}}">
                        </td>
                        <td>
                            <a onclick="confirmation(event)" href="{{url('book_delete', $book->id)}}" class="btn btn-danger">Deleted</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

          </div>
        </div>
      </div>

      <!-- Footer-->
      @include('admin.footer')
      <!-- End Footer-->

      <script type="text/javascript">
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);

          swal({
            title: "Are you sure to Delete this",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })

          .then((willCancel) => {
            if (willCancel) {
              window.location.href = urlToRedirect;
            }
          }
        )};
      </script>
  </body>
</html>