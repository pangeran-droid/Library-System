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

      .form-control, select, textarea, input[type="file"] {
        background-color: #3b4252;
        border: 1px solid #555;
        color: #fff;
      }

      .form-control:focus, select:focus, textarea:focus {
        border-color: #5e81ac;
        outline: none;
        box-shadow: none;
      }

      .img-preview {
        border-radius: 8px;
        margin-top: 10px;
        width: 100px;
        height: auto;
        border: 1px solid #555;
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

          {{-- Card Form --}}
          <div class="card">
            <h1>Update Book</h1>

            <form action="{{ url('update_book', $data->id) }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label>Book Title</label>
                <input type="text" name="title" value="{{ $data->title }}" class="form-control">
              </div>

              <div class="mb-3">
                <label>Author Name</label>
                <input type="text" name="auther_name" value="{{ $data->auther_name }}" class="form-control">
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Price</label>
                  <input type="number" name="price" value="{{ $data->price }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                  <label>Quantity</label>
                  <input type="number" name="quantity" value="{{ $data->quantity }}" class="form-control">
                </div>
              </div>

              <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $data->description }}</textarea>
              </div>

              <div class="mb-3">
                <label>Category</label>
                <select name="category" class="form-control">
                  <option value="{{ $data->category_id }}">{{ $data->category->cat_title }}</option>
                  @foreach($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->cat_title }}</option>
                  @endforeach
                </select>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 text-center">
                  <label>Current Author Image</label>
                  <div>
                    <img src="{{ asset('auther/' . $data->auther_img) }}" alt="Author Image" class="img-preview">
                  </div>
                  <label class="mt-2">Change Author Image</label>
                  <input type="file" name="auther_img" class="form-control">
                </div>

                <div class="col-md-6 mb-4 text-center">
                  <label>Current Book Image</label>
                  <div>
                    <img src="{{ asset('book/' . $data->book_img) }}" alt="Book Image" class="img-preview">
                  </div>
                  <label class="mt-2">Change Book Image</label>
                  <input type="file" name="book_img" class="form-control">
                </div>
              </div>

              <div class="text-center mt-4">
                <input type="submit" value="Update Book" class="btn btn-info">
                <a href="{{ url('show_book') }}" class="btn btn-outline-light">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>

      @include('admin.footer')
    </div>
  </body>
</html>
