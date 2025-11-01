<!DOCTYPE html>
<html lang="en">
<head>
  @include('home.css')

  <style type="text/css">
    .title {
        color: #fff;
        padding: 10px 0;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
    }

    .history-table {
        margin: 50px auto;
        background-color: #1e1e1e;
        color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 255, 170, 0.2);
    }

    .history-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .history-table th, .history-table td {
        padding: 15px;
        text-align: center;
    }

    .history-table th {
        background-color: #00cc99;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
    }

    .history-table td {
        background-color: #292929;
        font-size: 16px;
    }

    .img_book {
        width: 80px;
        height: auto;
        border-radius: 5px;
        border: 1px solid #555;
    }

    @media screen and (max-width: 768px) {
        .history-table table, .history-table thead, .history-table tbody, .history-table th, .history-table td, .history-table tr {
            display: block;
        }

        .history-table td {
            text-align: left;
            padding-left: 50%;
            position: relative;
        }

        .history-table td::before {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 45%;
            white-space: nowrap;
            font-weight: bold;
            color: #ccc;
        }

        .history-table td:nth-of-type(1)::before { content: "Book Name"; }
        .history-table td:nth-of-type(2)::before { content: "Author Name"; }
        .history-table td:nth-of-type(3)::before { content: "Book Status"; }
        .history-table td:nth-of-type(4)::before { content: "Image"; }
        .history-table td:nth-of-type(4)::before { content: "Cancel Request"; }
    }
  </style>
</head>

<body style="background-color: #1e1e1e; color: #fff;">

  <div class="page-wrapper" style="min-height: 100vh; display: flex; flex-direction: column;">
  <!-- ***** Header Area Start ***** -->
  @include('home.header')
  <!-- ***** Header Area End ***** -->

  @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 z-3 w-auto" role="alert" style="z-index: 1055;">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="currently-market" style="flex: 1;">
    <div class="container">
      <div class="row">
        <h1 class="title">My Borrow History</h1>

        <div class="table-responsive history-table">
          <table>
            <thead>
              <tr>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Book Status</th>
                <th>Image</th>
                <th>Cancel Request</th>
              </tr>
            </thead>
            <tbody>
              @forelse($data as $data)
              <tr>
                <td>{{ $data->book->title ?? '-' }}</td>
                <td>{{ $data->book->auther_name ?? '-' }}</td>
                <td>{{ $data->status }}</td>
                <td>
                  @if($data->book && $data->book->book_img)
                    <img class="img_book" src="{{ asset('book/'.$data->book->book_img) }}" alt="Book Image">
                  @else
                    <span>No image</span>
                  @endif
                </td>
                <td>
                  @if($data->status == 'Applied')
                    <a href="{{url('cancel_req', $data->id)}}" class="btn btn-warning">Cancel</a>
                  @else
                    <span>Not Allowed</span>
                  @endif
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" style="padding: 20px; text-align: center;">No borrow history found.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  @include('home.footer')
  </div>
  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/tabs.js') }}"></script>
  <script src="{{ asset('assets/js/popup.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const alert = document.querySelector('.alert');
      if (alert) {
        setTimeout(() => {
          const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
          bsAlert.close();
        }, 5000);
      }
    });
  </script>
</body>
</html>
