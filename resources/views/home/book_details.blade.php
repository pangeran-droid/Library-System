<!DOCTYPE html>
<html lang="en">

  <head>

    @include('home.css')
    <style>
      .book-description {
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        text-align: justify;
        line-height: 1.6;
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

  <div class="item-details-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>View Details <em>For Item</em> Here.</h2>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="left-image">
            <img src="{{ asset('book/' . $data->book_img) }}" alt="{{ $data->title }}" class="img-fluid rounded" style="max-width: 100%; height: auto; max-height: 400px; object-fit: contain;">

          </div>
        </div>

        <div class="col-lg-5 align-self-center">
          <h4>{{ $data->title }}</h4>

          <span class="author d-flex align-items-center mb-2">
            <img src="{{ asset('auther/' . $data->auther_img) }}" alt="{{ $data->auther_name }}" style="max-width: 50px; border-radius: 50%; margin-right: 10px;">
            <h6 class="mb-0">{{ $data->auther_name }}</h6>
          </span>

          <p class="book-description">{{ $data->description }}</p>

          <div class="qr-section mt-4 text-center">
              <h5>📱 Scan this book's QR Code</h5>
              <img src="data:image/png;base64,{{ $data->qr_base64 }}" 
                  alt="QR Code {{ $data->title }}" 
                  style="width:130px; border: 2px solid #ccc; border-radius: 10px; padding: 5px; background: #fff;">
              <p class="text-muted mt-2">
                  Point your phone camera at this QR Code to open the book details page.
              </p>
          </div>

          <div class="row">
            <div class="col-6">
              <span class="bid">
                Available<br><strong>{{ $data->quantity }}</strong><br>
              </span>
            </div>
            <div class="col-6">
              <span class="ends">
                Total Quantity<br><strong>{{ $data->total_quantity ?? '-' }}</strong><br>
              </span>
            </div>
          </div>

          </br>
          <div class="">
            @auth
              @if($data->quantity > 0)
                <a class="btn btn-primary" href="{{ url('borrow_books', $data->id) }}">Apply to Borrow</a>
              @else
                <button class="btn btn-secondary" disabled>Out of Stock</button>
              @endif
            @else
              <a class="btn btn-secondary disabled" href="#" title="Please login first">Login to Borrow</a>
            @endauth
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