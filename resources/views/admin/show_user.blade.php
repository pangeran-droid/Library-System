<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
      integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
      .card {
        background: #2f333e;
        border: none;
        border-radius: 8px;
        color: #fff;
      }

      .card-header {
        border-bottom: 1px solid rgba(255,255,255,0.1);
      }

      .table {
        color: #fff;
        margin-top: 20px;
      }

      .table th {
        background-color: #3b4252;
        color: #fff;
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
      }

      .table td {
        vertical-align: middle;
        text-align: center;
        color: #ddd;
      }

      .btn {
        padding: 5px 10px;
        font-size: 14px;
      }

      .alert {
        margin-bottom: 20px;
      }

      .search-bar input {
        width: 220px;
        padding: 5px 10px;
        border-radius: 4px;
        border: none;
        outline: none;
      }

      .search-bar button {
        padding: 6px 10px;
        margin-left: 5px;
      }
    </style>
  </head>

  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')

      <div class="page-content">
        <div class="container-fluid py-4">

          {{-- ✅ Flash Message --}}
          @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          {{-- 🧍 All Users Table --}}
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="mb-0">All Users</h4>
              
              <div class="d-flex align-items-center">
                {{-- 🔍 Search Bar --}}
                <form action="{{ url('show_user') }}" method="GET" class="search-bar d-flex align-items-center">
                  <input type="text" name="search" placeholder="Search name or email..." value="{{ request('search') }}">
                  <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </form>
              </div>
            </div>

            <div class="card-body table-responsive">
              <table class="table table-bordered table-hover align-middle">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>User Type</th>
                    <th>Actions</th>
                  </tr>
                </thead>

                <tbody>
                  @forelse($data as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone ?? '-' }}</td>
                      <td>{{ $user->address ?? '-' }}</td>
                      <td>{{ ucfirst($user->usertype) }}</td>
                      <td>
                        @if($user->usertype != 'admin')
                          <a href="{{ url('edit_user', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                          <a href="{{ url('delete_user', $user->id) }}" onclick="confirmation(event)" class="btn btn-danger btn-sm">Delete</a>
                        @else
                          <span class="text-muted">Admin</span>
                        @endif
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center text-muted">No users found.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
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
          text: "Once deleted, this user cannot be restored!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = urlToRedirect;
          }
        });
      }
    </script>
  </body>
</html>
