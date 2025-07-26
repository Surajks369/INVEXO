<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <div class="d-flex sidebar-profile">
        <div class="sidebar-profile-image">
          <img src="{{ asset('images/logo.jpg') }}" alt="image">
          <span class="sidebar-status-indicator"></span>
        </div>
        <div class="sidebar-profile-name">
          <p class="sidebar-name">Admin</p>
          <p class="sidebar-designation">Administrator</p>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/home') }}">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/categories') }}">
        <i class="typcn typcn-briefcase menu-icon"></i>
        <span class="menu-title">Categories</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/users') }}">
        <i class="typcn typcn-user menu-icon"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/research-reports') }}">
        <i class="typcn typcn-document-text menu-icon"></i>
        <span class="menu-title">Research Reports</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/crypto-ideas') }}">
        <i class="typcn typcn-lightbulb menu-icon"></i>
        <span class="menu-title">Crypto Ideas</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('notifications.index') }}">
        <i class="typcn typcn-bell menu-icon"></i>
        <span class="menu-title">Notifications</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/subscriptions') }}">
        <i class="typcn typcn-key-outline menu-icon"></i>
        <span class="menu-title">Subscriptions</span>
      </a>
    </li>
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="#" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
          <i class="typcn typcn-power menu-icon"></i>
          <span class="menu-title">Logout</span>
        </a>
      </form>
    </li>
    
    
    <!-- Add more menu items here -->
  </ul>
</nav>
