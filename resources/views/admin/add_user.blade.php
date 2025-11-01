<!DOCTYPE html>
<html>
<head>
  @include('admin.css')
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

    label {
      color: #fff;
      font-weight: 500;
      margin-bottom: 6px;
    }

    .form-control {
      background-color: #3a3f4b;
      border: 1px solid #555;
      color: #fff;
    }

    .form-control:focus {
      background-color: #3a3f4b;
      border-color: #007bff;
      color: #fff;
      box-shadow: none;
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

        {{-- Add User Form --}}
        <div class="card mx-auto" style="max-width: 600px;">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Add New User</h4>
            <a href="{{ url('show_user') }}" class="btn btn-sm btn-secondary">← Back</a>
          </div>

          <div class="card-body">
            <form action="{{ url('store_user') }}" method="POST">
              @csrf

              <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control">
              </div>

              <div class="mb-3">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="form-control" rows="3"></textarea>
              </div>

              <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="usertype">User Type</label>
                <select id="usertype" name="usertype" class="form-control">
                  <option value="user" selected>User</option>
                  <option value="admin">Admin</option>
                </select>
              </div>

              <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">Add User</button>
                <a href="{{ url('show_user') }}" class="btn btn-outline-light">Cancel</a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

    @include('admin.footer')
  </div>
</body>
</html>
