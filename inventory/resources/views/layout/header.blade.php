<div class="row">
		<div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius: 10px; font-size:14pt;">
                {{-- <a class="navbar-brand" href="#">Navbar scroll</a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll" >
                  @if(auth()->user())
                    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;" >
                      <li class="nav-item">
                        <a class="nav-link" href="{{asset('beranda')}}">Home </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{asset('/produk')}}">Produk</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                          Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                          <li><a class="dropdown-item" href="{{asset('/produsen')}}">Produsen</a></li>
                          {{-- <li><a class="dropdown-item" href="#">Pembeli</a></li> --}}
                          {{-- <li><hr class="dropdown-divider"></li> --}}
                          <li><a class="dropdown-item" href="{{asset('/kategori')}}">Kategori Produk</a></li>
                          <li><a class="dropdown-item" href="{{asset('/satuan')}}">Satuan Beli</a></li>

                        </ul>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" tabindex="-1" aria-disabled="true">Logout</a>
                      </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  @else
                  <div class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                  </div>
                  @endif
                  <form class="d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </nav>
		</div>
</div>
<br>