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
        margin-bottom: 8px;
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

          {{-- Update Category --}}
          <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Update Category</h4>
              <a href="{{ url('category_page') }}" class="btn btn-sm btn-secondary">← Back</a>
            </div>

            <div class="card-body">
              <form action="{{ url('update_category', $data->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="cat_name">Category Name</label>
                  <input type="text" name="cat_name" id="cat_name" class="form-control"
                         value="{{ $data->cat_title }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ url('category_page') }}" class="btn btn-outline-light">Cancel</a>
              </form>
            </div>
          </div>

        </div>
      </div>

      @include('admin.footer')
    </div>
  </body>
</html>
