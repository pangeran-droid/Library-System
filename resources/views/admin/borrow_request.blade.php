<!DOCTYPE html>
<html>
  <head>
    <!-- Css-->
    @include('admin.css')
    <style type="text/css">
        .center
        {
            text-align: center;
            margin: auto;
            width: 80%;
            border: 1px solid white;
            margin-top: 60px;
        }

        th
        {
            background-color: skyblue;
            text-align: center;
            color: white;
            font-size: 15px;
            font-weight: bold;
            padding: 10px;
        }

    </style>
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
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <table class="center">
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Book title</th>
                    <th>Quantity</th>
                    <th>Borrow Status</th>
                    <th>Book Image</th>
                    <th>Change Status</th>
                </tr>

                @foreach ($data as $data)

                <tr>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->user->email }}</td>
                    <td>{{ $data->user->phone }}</td>

                    <td>{{ $data->book->title }}</td>
                    <td>{{ $data->book->quantity }}</td>
                    <td>
                      @if ($dta->status == 'approved')
                      <span style="color: skyblue;">{{ $data->status }}</span>
                      
                      @endif

                      @if ($dta->status == 'rejected')
                      <span style="color: red;">{{ $data->status }}</span>
                      
                      @endif

                      @if ($dta->status == 'returned')
                      <span style="color: yellow;">{{ $data->status }}</span>
                      
                      @endif

                      @if ($dta->status == 'Applied')
                      <span style="color: white;">{{ $data->status }}</span>
                      
                      @endif
                    </td>
                    <td>
                        <img style="height: 150px; width: 60px" src="book/{{ $data->book->book_img }}">
                    </td>
                    <td>
                      <a class="btn btn-warning" href="{{ url('approve_book',$data->id) }}">Approved</a>
                      <a class="btn btn-danger" href="{{ url('rejected_book',$data->id) }}">Rejected</a>
                      <a class="btn btn-info" href="{{ url('return_book',$data->id) }}">Returned</a>
                    </td>
                </tr>

                @endforeach

            </table>

          </div>
       </div>
    </div>
      <!-- End Body-->

      <!-- Footer-->
      @include('admin.footer')
      <!-- End Footer-->
  </body>
</html>