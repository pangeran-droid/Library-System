<!DOCTYPE html>
<html lang="en">

  <head>

    @include('home.css')
    <style type="text/css">
      .filters ul li a.active {
        color: #fff;
        background-color: #7453fc;
        border-radius: 20px;
        padding: 8px 15px;
      }

      .search-form {
        max-width: 700px;
        margin: 0 auto;
      }

      .search-form .form-control {
        border-radius: 30px 0 0 30px;
        border: 1px solid #ddd;
        padding: 12px 20px;
        font-size: 16px;
      }

      .search-form .btn {
        border-radius: 0 30px 30px 0;
        background-color: #7453fc;
        border: none;
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .search-form .btn:hover {
        background-color: #5d3be0;
      }

      .search-form .form-control:focus {
        box-shadow: none;
        border-color: #7453fc;
      }
    </style>
  </head>

<body>

  <!-- ***** Header Area Start ***** -->
    @include('home.header')
  <!-- ***** Header Area End ***** -->

  @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 z-3 w-auto" role="alert" style="z-index: 1055;">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6" style="margin-top: 100px;">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>

        <div class="col-lg-6" style="margin-top: 100px;">
          <div class="filters">
            <ul>
              <li data-filter="*">
                <a href="{{url('explore')}}" class="{{ request()->is('explore') ? 'active' : '' }}">All Books</a>
              </li>

              @foreach($category as $category)
              <li data-filter="*">
                <a href="{{url('cat_search', $category->id)}}" class="{{ request()->is('cat_search/'.$category->id) ? 'active' : '' }}">{{$category->cat_title}}</a>
              </li> 
              @endforeach     

            </ul>
        </div>
    </div>

    <form action="{{ url('search') }}" method="GET" class="search-form mt-4 mb-5">
      @csrf
      <div class="input-group">
        <input 
          type="search" 
          name="search" 
          class="form-control form-control-lg shadow-sm" 
          placeholder="Search for book title, author name..." 
          aria-label="Search"
        >
        <button class="btn btn-primary px-4" type="submit">
          <i class="fa fa-search me-1"></i> Search
        </button>
      </div>
    </form>

        <div class="col-lg-12">
          <div class="row grid">

          @foreach($data as $data)

            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="{{ asset('book/' . $data->book_img) }}" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>
                <div class="right-content">
                  <h4>{{$data->title}}</h4>
                  <span class="author">
                    <img src="{{ asset('auther/' . $data->auther_img) }}" alt="" style="max-width: 50px; border-radius: 50%;">
                    <h6>{{$data->auther_name}}</h6>
                  </span>
                  <div class="line-dec"></div>
                  <span class="bid">
                    Current Available<br><strong>{{$data->quantity}}</strong><br> 
                  </span>

                  <div class="text-button">
                    <a href="{{url('book_details', $data->id)}}">View Book Details</a>
                  </div>
                  </br>
                  <div class="">
                    @auth
                      <a class="btn btn-primary" href="{{ url('borrow_books', $data->id) }}">Apply to Borrow</a>
                    @else
                      <a class="btn btn-secondary disabled" href="#" title="Please login first">Login to Borrow</a>
                    @endauth
                  </div>
                </div>
              </div>
            </div>

            @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </div>


    @include('home.footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
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