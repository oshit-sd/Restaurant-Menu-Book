 <style type="text/css">
    .title{
      font-size: 26px;
      font-family: Lobster;
      font-weight: 600;
      font-style: normal;
      color: #fff;
      text-transform: capitalize;
      text-align: center;
      font-variant: small-caps;
    }
    .icons{
      font-size: 28px;
      color: #27f90f;
    }
 </style>
 <!-- Main navbar -->
  <div class="navbar navbar-inverse" style="background: #1072a0;" >
    <div class="navbar-header">
      <a class="navbar-brand title" href="{{ url('/admin') }}">
        <i class="icon-graduation2 icons"></i>
        <span style="color: #bbe616;">Emenu</span>
        <span style="color: #16e658;">Admin</span>
        <span style="color: #f7fb3f;">Panel</span>
      </a>

      <ul class="nav navbar-nav visible-xs-block">
        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
      </ul>
    </div>


    <style type="text/css">
      #design >a{ color: #fff; }
      #design >a:hover{ background: #0c3a4c; }
    </style>

    <div class="navbar-collapse collapse" id="navbar-mobile">
      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown dropdown-user">
          <a class="dropdown-toggle" data-toggle="dropdown">
            <img style="height: 50px; width: 30px;" src="{{ asset('assets/BackEnd/user.png') }}">
            <span>{{ Auth::user()->name }}</span>
            <i class="caret"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-right">
            <li>
              <a href="{{ url('/ChangePassword/'.Auth::user()->id) }}" class="linka fancybox fancybox.ajax" data-popup="tooltip" title data-original-title="Change_Password"><i class="icon-lock"></i> Change Password</a>
            </li>
            <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logoutForm').submit();"><i class="icon-switch2"></i> Logout</a>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /main navbar -->