<nav class="sidebar sidebar-offcanvas" id="sidebar">

  
  <ul class="nav">
    
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/email">
        <i class="mdi mdi-email-outline menu-icon"></i>
        <span class="menu-title">Email</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/inbox">
        <i class="mdi mdi-email-open-outline menu-icon"></i>
        <span class="menu-title">Inbox</span>
      </a>
    </li>
    
    @foreach ($menus as $menu )
    <li class="nav-item">
      <a class="nav-link" href="/{{ $menu->link }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">{{ $menu->judul }}</span>
      </a>
    </li>
    @endforeach
    
    @if (Auth::user()->id_jenis_user === 1 || Auth::user()->id_jenis_user === 2)
    
    <li class="nav-item">
      <span class="menu-title">Administrator</span>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="/roles">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Jenis User</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">User</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="/menu">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Menu</span>
      </a>
    </li>      
    @endif

  </ul>

  {{-- <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('roles.index') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Jenis User</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">User</span>
      </a>
    </li>

  </ul> --}}
</nav>