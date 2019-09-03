<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="top-left pull-left">
            <div class="language">
              <form action="#" method="post" enctype="multipart/form-data" id="language">
                <div class="btn-group">
                  <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img
                      src="{{ asset('assets/FrontEnd/image/flags/gb.png')}}" alt="English" title="English">English <i
                      class="fa fa-caret-down"></i></button>
                  <ul class="dropdown-menu">
                    <li><a href="#"><img src="{{ asset('assets/FrontEnd/image/flags/lb.png')}}" alt="Arabic"
                          title="Arabic"> Arabic</a></li>
                    <li><a href="#"><img src="{{ asset('assets/FrontEnd/image/flags/gb.png')}}" alt="English"
                          title="English"> English</a></li>
                  </ul>
                </div>
              </form>
            </div>
          </div>
          <div class="top-right pull-right">
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">
                <li class="dropdown"><a href="#" title="{{ Auth::user()->name }}" class="dropdown-toggle"
                    data-toggle="dropdown"> <i class="fa fa-user"></i><span>{{ Auth::user()->name }}</span> <span
                      class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logoutForm').submit();" class="Logout">Logout</a>
                      <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="header-inner">

      <div class="col-sm-4 ">
        <div id="logo"> <a href="{{ url('/') }}">
            <img src="{{ asset('assets/FrontEnd/image/logo.png')}}" title="eMenu" alt="eMenu"
              class="img-responsive" /></a>
        </div>
      </div>

      <div class="col-sm-4 header-right">
        <div id="cart" class="btn-group btn-block">
          <a href="{{route('CartList')}}" class="linka fancybox fancybox.ajax">
            <span id="cart-total">
              <span class="cart-title">Shopping Cart</span><br>
              <span class="cartQty">{{ (Cart::count())?Cart::count():"0" }}</span> item(s) -
              <span class="subTotal">${{ (Cart::subtotal())?Cart::subtotal():"00" }}</span>
            </span>
          </a>
        </div>
      </div>

    </div>
  </div>
</header>