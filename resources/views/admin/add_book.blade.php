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

      .form-control, select, textarea {
        background-color: #3a3f4b;
        border: 1px solid #555;
        color: #fff;
      }

      .form-control:focus, select:focus, textarea:focus {
        background-color: #3a3f4b;
        border-color: #007bff;
        color: #fff;
        box-shadow: none;
      }

      textarea {
        resize: vertical;
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
          
          {{-- Validation Errors --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <strong>There is an error:</strong>
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{-- Add Book Form --}}
          <div class="card mx-auto" style="max-width: 800px;">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Add New Book</h4>
              <a href="{{ url('show_book') }}" class="btn btn-sm btn-secondary">← Back</a>
            </div>

            <div class="card-body">
              <form action="{{ url('store_book') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="title">Book Title</label>
                  <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label for="auther_name">Author Name</label>
                  <input type="text" id="auther_name" name="auther_name" class="form-control" required>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" class="form-control" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="description">Description</label>
                  <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                  <label for="category">Category</label>
                  <select id="category" name="category" class="form-control" required>
                    <option value="">Select a Category</option>
                    @foreach($data as $category)
                      <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="book_img">Book Image</label>
                    <input type="file" id="book_img" name="book_img" class="form-control" accept="image/*" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="auther_img">Author Image</label>
                    <input type="file" id="auther_img" name="auther_img" class="form-control" accept="image/*">
                  </div>
                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-primary">Add Book</button>
                  <a href="{{ url('show_book') }}" class="btn btn-outline-light">Cancel</a>
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
