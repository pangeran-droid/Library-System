<!DOCTYPE html>
<html lang="en">

  <head>

    @include('home.css')
    <style type="text/css">

       .table_deg
       {

        border: 1px solid white;
        margin: auto;
        text-align: center;
        margin-top: 100px;
       }

       th
       {
        background-color: skyblue;
        color: white;
        font-weight: bold;
        font-size: 18px;
        padding: 10px;
       }

       td
       {
        color: white;
        background-color: black;
        border: 1px solid white;
       }

      .book_img
      {
        height: 120px;
        width: 80px;
        margin: auto;
      }


    </style>
  </head>

<body>

  <!-- ***** Header Area Start ***** -->
    @include('home.header')
<div class="currently-market">
    <div class="container">
      <div class="row">

         @if(session()->has('mesagge'))

         <div style="margin-top: 100px;" class="alert alert-success">

         {{session()->get('message')}}
         <button type="button" class="close" aria-hidden="true"
         data-bs-dismiss="alert">x</button>

        </div>

         @endif

      <table class="table_deg">
        <tr>
          <th>Book Name</th>
          <th>Book Auther</th>
          <th>Book status</th>
          <th>Image</th>
          <th>Cancel Request</th>
      
        </tr>
        @foreach($data as $data)
        <tr>
          <td>{{$data->book->title}}</td>
          <td>{{$data->book->auther_name}}</td>
          <td>{{$data->status}}</td>
          <td>
            <img class="book_img" src="book/{{$data->book_img}}">
          </td>
          <td>

             @if($data->status == 'Applied')

            <a href="{{url('cancel_req',$data->id)}}" class="btn 
            btn-warning">cancel</a>

            @else
            <p style="collor: white; font-weight: bold;">Not Allowed</p>
            @endif
          </td>
        </tr>

        @endforeach
      </table>

      </div>
    </div>
  </div>


  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
    @include('home.main')
  <!-- ***** Main Banner Area End ***** -->
  
    @include('home.category')
  

    @include('home.book')

    @include('home.footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>