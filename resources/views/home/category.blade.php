<div id="categories" class="categories-collections">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="categories">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h2>Browse Through Book <em>Categories</em> Here.</h2>
              </div>
            </div>

            @foreach($category as $category)
            <div class="col-lg-2 col-sm-6">
              <div class="item text-center">
                <div class="icon">
                  <img src="{{ asset('assets/images/icon-0' . (($loop->index % 6) + 1) . '.png') }}" alt="">
                </div>
                <h4>{{ $category->cat_title }}</h4>
                <div class="text-button">
                  <a href="{{ url('cat_search', $category->id) }}">View Books</a>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
