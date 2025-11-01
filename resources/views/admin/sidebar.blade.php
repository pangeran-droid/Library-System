      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ asset('admin/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">E-Library</h1>
            <p>Management System</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class="{{ Request::is('home') ? 'active' : '' }}">
            <a href="{{ url('/home') }}"> <i class="icon-home"></i>Home </a>
          </li>
          <li class="{{ Request::is('category_page') ? 'active' : '' }}">
            <a href="{{url('category_page')}}"> <i class="icon-grid"></i>Category </a>
          </li>
          <li>
            <a href="#booksDropdown" data-toggle="collapse" aria-expanded="{{ Request::is('add_book') || Request::is('show_book') ? 'true' : 'false' }}"> <i class="icon-windows"></i>Books </a>
            <ul id="booksDropdown" class="collapse list-unstyled {{ Request::is('add_book') || Request::is('show_book') ? 'show' : '' }}">
              <li class="{{ Request::is('add_book') ? 'active' : '' }}">
                <a href="{{url('add_book')}}">Add Books</a>
              </li>
              <li class="{{ Request::is('show_book') ? 'active' : '' }}">
                <a href="{{url('show_book')}}">Show Books</a>
              </li>
            </ul>
          </li>
          <li class="{{ Request::is('borrow_request') ? 'active' : '' }}">
              <a href="{{url('borrow_request')}}"> <i class="icon-logout"></i>Borrow Request</a>
          </li>
        </ul><span class="heading">Extras</span>
          <li>
            <a href="#usersDropdown" data-toggle="collapse" aria-expanded="{{ Request::is('add_user') || Request::is('show_user') ? 'true' : 'false' }}"> <i class="icon-user"></i>Users </a>
            <ul id="usersDropdown" class="collapse list-unstyled {{ Request::is('add_user') || Request::is('show_user') ? 'show' : '' }}">
              <li class="{{ Request::is('add_user') ? 'active' : '' }}">
                <a href="{{ url('add_user') }}">Add User</a>
              </li>
              <li class="{{ Request::is('show_user') ? 'active' : '' }}">
                <a href="{{ url('show_user') }}">Show Users</a>
              </li>
            </ul>
          </li>
      </nav>
      
      <!-- Sidebar Navigation end-->