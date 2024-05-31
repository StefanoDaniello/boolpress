<nav id="sidebar" class="bg-dark navbar-dark">
  <a href="/" class="nav-link" id="big-logo">
    <h2 class="p-2"><i class="fa-solid fa-square-rss"></i>
      <span> Boolpress</span></h2>
  </a>
  <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link  {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}}" href="{{route('admin.dashboard')}}">
          <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
           <span>
             Dasboard
          </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link   {{Route::currentRouteName() == 'admin.posts.index' ? 'active' : ''}}" href="{{route('admin.posts.index')}}"> <i class="fa-solid fa-newspaper fa-lg fa-fw"></i>
          <span> Posts</span></a>
      </li>
    <details>
      <summary>Other Pages</summary>
        <ul>
          <li class="nav-item">
            <a class="nav-link"><i class="fa-solid fa-tags fa-lg fa-fw"></i>
              <span> Tags</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link "><i class="fa-solid fa-list fa-lg fa-fw"></i>
              <span> Categories</span></a>
        </ul>
      </details>
    </ul>
</nav>