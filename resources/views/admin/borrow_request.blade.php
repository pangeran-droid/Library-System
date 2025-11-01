<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style>
      .page-title {
        color: #fff;
        text-align: center;
        font-size: 36px;
        font-weight: 700;
        margin-top: 20px;
        margin-bottom: 30px;
      }

      .card {
        background: #2f333e;
        border: none;
        border-radius: 10px;
        padding: 25px;
        color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
      }

      th {
        background-color: #5e81ac;
        color: #fff;
        font-weight: 600;
        text-align: center;
      }

      td {
        text-align: center;
        vertical-align: middle;
      }

      .status {
        font-weight: 600;
        text-transform: capitalize;
      }

      .status.approved { color: #00b4d8; }
      .status.returned { color: #f1fa8c; }
      .status.rejected { color: #ff4b5c; }
      .status.applied  { color: #e0e0e0; }

      .img-book {
        width: 80px;
        height: auto;
        border-radius: 6px;
        border: 1px solid #555;
      }

      .btn {
        padding: 4px 12px;
        font-size: 14px;
      }

      .table > :not(caption) > * > * {
        background-color: transparent;
      }
    </style>
  </head>
  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')

      <div class="page-content">
        <div class="container-fluid">

          <h1 class="page-title">Borrow Request</h1>

          <div class="card">
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Book Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $req)
                  <tr>
                    <td>{{ $req->user->name }}</td>
                    <td>{{ $req->user->email }}</td>
                    <td>{{ $req->user->phone }}</td>
                    <td>{{ $req->book->title }}</td>
                    <td>{{ $req->book->quantity }}</td>

                    <td>
                      <span class="status 
                        @if($req->status == 'Approved') approved 
                        @elseif($req->status == 'Returned') returned 
                        @elseif($req->status == 'Rejected') rejected 
                        @else applied @endif">
                        {{ $req->status }}
                      </span>
                    </td>

                    <td>
                      <img src="{{ asset('book/' . $req->book->book_img) }}" alt="Book Image" class="img-book">
                    </td>

                    <td>
                      <a href="{{ url('approved_book', $req->id) }}" class="btn btn-sm btn-warning">Approve</a>
                      <a href="{{ url('returned_book', $req->id) }}" class="btn btn-sm btn-info">Returned</a>
                      <a href="{{ url('rejected_book', $req->id) }}" class="btn btn-sm btn-danger">Reject</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      @include('admin.footer')
    </div>
  </body>
</html>
