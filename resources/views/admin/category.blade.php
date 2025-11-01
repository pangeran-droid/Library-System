<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
      integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
      .page-header {
        margin-bottom: 0;
      }

      .card {
        background: #2f333e;
        border: none;
        border-radius: 8px;
        color: #fff;
      }

      .card-header {
        border-bottom: 1px solid rgba(255,255,255,0.1);
      }

      .table th {
        background-color: #007bff;
        color: white;
        text-align: center;
      }

      .table td {
        vertical-align: middle;
        text-align: center;
      }

      .form-inline input {
        border-radius: 6px;
        margin-right: 10px;
      }
    </style>
  </head>

  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')

      <div class="page-content">
        <div class="container-fluid py-4">

          {{-- Flash Message --}}
          @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          {{-- Add Category --}}
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Add New Category</h4>
            </div>
            <div class="card-body">
              <form class="form-inline" action="{{ url('add_category') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                  <label for="category" class="sr-only">Category Name</label>
                  <input type="text" name="category" id="category" class="form-control" placeholder="Enter category name" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Add</button>
              </form>
            </div>
          </div>

          {{-- Category List --}}
          <div class="card">
            <div class="card-header">
              <h4 class="mb-0">Category List</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $item)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->cat_title }}</td>
                        <td>
                          <a class="btn btn-sm btn-info" href="{{ url('edit_category', $item->id) }}">
                            <i class="fa fa-pencil"></i> Edit
                          </a>
                          <a onclick="confirmation(event)" class="btn btn-sm btn-danger" href="{{ url('cat_delete', $item->id) }}">
                            <i class="fa fa-trash"></i> Delete
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
      @include('admin.footer')
    </div>

    <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
          title: "Are you sure?",
          text: "This category will be permanently deleted!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            window.location.href = urlToRedirect;
          }
        });
      }
    </script>
  </body>
</html>
