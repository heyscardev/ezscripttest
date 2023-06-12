<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">EzScript</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  {{ route::is('authors.index')? 'active' : '' }}" aria-current="page" href="{{route('authors.index')}}">Authors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route::is('books.index')? 'active' : '' }}" href="{{route('books.index')}}">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route::is('partners.index')? 'active' : '' }}" href="{{route('partners.index')}}">Partners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ route::is('loans.index')? 'active' : '' }}" href="{{route('loans.index')}}">Loans</a>
        </li>

  </div>
</nav>
