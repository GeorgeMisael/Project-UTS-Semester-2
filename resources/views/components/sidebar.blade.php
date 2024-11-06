<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

  <li class="nav-item">
      <a id="menu-category" class="nav-link {{ Request::routeIs('category.index') ? 'active' : '' }}" href="{{ route('category.index') }}" aria-expanded="false" aria-controls="tables">
          <i class="mdi mdi-email-open-outline menu-icon"></i>
          <span class="menu-title">Category</span>
      </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('book.index') }}" aria-expanded="false" aria-controls="tables">
      <i class="mdi mdi-book-open-page-variant menu-icon"></i>
      <span class="menu-title">Book</span>
    </a>
  </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('messages.create') }}" aria-expanded="false" aria-controls="tables">
          <i class="mdi mdi-email-outline menu-icon"></i>
          <span class="menu-title">Create Email</span>
      </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('messages.index') }}" aria-expanded="false" aria-controls="tables">
      <i class="mdi mdi-inbox menu-icon"></i>
      <span class="menu-title">Inbox</span>
    </a>
  </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('messages.sent') ? 'active' : '' }}" href=" {{ route('messages.sent')}}" aria-expanded="false" aria-controls="tables">
          <i class="mdi mdi-send menu-icon"></i>
          <span class="menu-title">Sent </span>
        </a>
      </li>

      <li class="nav-item">
        <a id="menu-draft" class="nav-link {{ Request::routeIs('messages.draft') ? 'active' : '' }}" href="{{ route('messages.draft') }}" aria-expanded="false" aria-controls="tables">
            <i class="mdi mdi-email-open-outline menu-icon"></i>
            <span class="menu-title">Draft</span>
        </a>
      </li>
    
    @foreach ($menus as $menu )
    <li class="nav-item">
      <a class="nav-link" href="/{{ $menu->link }}">
        <i class="mdi mdi-earth menu-icon"></i>
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
{{-- george --}}