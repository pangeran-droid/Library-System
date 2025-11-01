<!DOCTYPE html>
<html lang="en">

  <head>

    @include('home.css')
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

  <!-- ***** Main Banner Area Start ***** -->
    @include('home.main')
  <!-- ***** Main Banner Area End ***** -->
  
    @include('home.category')
  

    @include('home.book')

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