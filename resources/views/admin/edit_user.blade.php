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
      padding: 30px;
      margin-top: 40px;
    }

    .card h1 {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 25px;
      text-align: center;
      color: #fff;
    }

    label {
      font-weight: 600;
      margin-bottom: 5px;
      display: block;
    }

    .form-control, select {
      background-color: #3b4252;
      border: 1px solid #555;
      color: #fff;
    }

    .form-control:focus, select:focus {
      border-color: #5e81ac;
      outline: none;
      box-shadow: none;
    }

    .btn {
      padding: 8px 20px;
    }
  </style>
</head>
<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content">
      <div class="container-fluid">

        {{-- Flash Message --}}
        @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        {{-- Card Form --}}
        <div class="card">
          <h1>Edit User</h1>

          <form action="{{ url('update_user', $data->id) }}" method="POST">
            @csrf

            <div class="mb-3">
              <label>Name</label>
              <input type="text" name="name" value="{{ $data->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" value="{{ $data->email }}" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Phone</label>
              <input type="text" name="phone" value="{{ $data->phone }}" class="form-control">
            </div>

            <div class="mb-3">
              <label>Address</label>
              <textarea name="address" class="form-control" rows="3">{{ $data->address }}</textarea>
            </div>

            <!-- <div class="mb-3">
              <label>Password <small>(Leave blank to keep current)</small></label>
              <input type="password" name="password" class="form-control">
            </div> -->

            <div class="mb-3">
              <label>User Type</label>
              <select name="usertype" class="form-control">
                <option value="user" {{ $data->usertype=='user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $data->usertype=='admin' ? 'selected' : '' }}>Admin</option>
              </select>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-info">Update User</button>
              <a href="{{ url('show_user') }}" class="btn btn-outline-light">Cancel</a>
            </div>
          </form>
        </div>

      </div>
    </div>

    @include('admin.footer')
  </div>
</body>
</html>
