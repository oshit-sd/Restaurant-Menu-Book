<style type="text/css">
  .icc {
    color: #8EDCFA;
  }

  li>a {
    color: #8EDCFA;
  }

  .navigation>li>ul li.active>a {
    background: #156871;
  }

  #design {
    border-bottom: 1px solid #3cca9559;
  }
</style>
<!-- icc icon-bookmark spinner -->


<!-- Main navigation -->
<div class="sidebar-category sidebar-category-visible" style="background: #022533;">
  <div class="category-content no-padding">
    <ul class="navigation navigation-main navigation-accordion">

      <!-- Main -->
      <li id="design" class="@yield('activeDasboard')"><a href="{{ url('/admin') }}"><i class="icc icon-home4"></i> <span>Dashboard</span></a></li>
      <!-- ========================================================= -->


      @if(auth()->user()->can('Create') || auth()->user()->can('All Access'))
      {{-- <li id="design"  class="@yield('GameEntry')">--}}
      {{-- <a href="{{ url('GamesEntry/create') }}">--}}
      {{-- <i class="icc icon-arrow-right16"></i>Games Entry</span>--}}
      {{-- </a>--}}
      {{-- </li>--}}
      @endif



      <li id="design">
        <a href="#"><i class="icc icon-price-tag2"></i> <span>Category Information</span></a>
        <ul class="UL">
          <li id="design" class="@yield('category')">
            <a href="{{ url('/category/create') }}">
              <i class="icc icon-arrow-right16"></i>Category Entry
            </a>
          </li>

          <li id="design" class="@yield('subcategory')">
            <a href="{{ url('/subcategory/create') }}">
              <i class="icc icon-arrow-right16"></i>Sub-Category Entry
            </a>
          </li>
        </ul>
      </li>
      <!-- ========================================================= -->




      <li id="design">
        <a href="#"><i class="icc icon-menu3"></i> <span>Menu Item Information</span></a>
        <ul class="UL">
          <li id="design" class="@yield('menuitems')">
            <a href="{{ url('/menuitems/create') }}">
              <i class="icc icon-arrow-right16"></i>Menu Item
            </a>
          </li>
          <!-- ========================================================= -->

          <li id="design" class="@yield('MenuitemList')">
            <a href="{{ url('/menuitems') }}">
              <i class="icc icon-arrow-right16"></i>Menu Item List
            </a>
          </li>
          <!-- ========================================================= -->

          <li id="design" class="@yield('dietary')">
            <a href="{{ url('/dietary/create') }}">
              <i class="icc icon-arrow-right16"></i> Dietary Entry
            </a>
          </li>
          <!-- ========================================================= -->

          <li id="design" class="@yield('spicelevel')">
            <a href="{{ url('/spicelevel/create') }}">
              <i class="icc icon-arrow-right16"></i>Spice Level
            </a>
          </li>
          <!-- ========================================================= -->

          <li id="design">
            <a href="#"><i class="icc icon-align-bottom"></i> <span>Condiments Info</span></a>
            <ul class="UL">
              <li id="design" class="@yield('condiments')">
                <a href="{{ url('/condiments/create') }}">
                  <i class="icc icon-arrow-right16"></i>Condiments Entry
                </a>
              </li>

              <li id="design" class="@yield('condimentsGroup')">
                <a href="{{ url('/condimentsGroup/create') }}">
                  <i class="icc icon-arrow-right16"></i>Condiments Group
                </a>
              </li>
            </ul>
          </li>
          <!-- ========================================================= -->


          <li id="design">
            <a href="#"><i class="icc icon-cog4"></i> <span>Ingredient Info</span></a>
            <ul class="UL">

              <li id="design" class="@yield('ingredient')">
                <a href="{{ url('/ingredient/create') }}">
                  <i class="icc icon-arrow-right16"></i>Ingredient Entry
                </a>
              </li>
              <!-- ========================================================= -->


              <li id="design" class="@yield('IngredientGroup')">
                <a href="{{ url('/IngredientGroup/create') }}">
                  <i class="icc icon-arrow-right16"></i>Ingredient Group
                </a>
              </li>
            </ul>
          </li>

          <li id="design">
            <a href="#"><i class="icc icon-cog4"></i> <span>Preparation Info</span></a>
            <ul class="UL">

              <li id="design" class="@yield('preparation')">
                <a href="{{ url('/preparation/create') }}">
                  <i class="icc icon-arrow-right16"></i>Preparation
                </a>
              </li>
              <!-- ========================================================= -->


              <li id="design" class="@yield('preparationGroup')">
                <a href="{{ url('/preparationGroup/create') }}">
                  <i class="icc icon-arrow-right16"></i>Preparation Group
                </a>
              </li>
            </ul>
          </li>

          <li id="design" class="@yield('MealCourse')">
            <a href="{{ url('/MealCourse/create') }}">
              <i class="icc icon-arrow-right16"></i>Meal Course
            </a>
          </li>

          <li id="design" class="@yield('allergy')">
            <a href="{{ url('/allergy/create') }}">
              <i class="icc icon-arrow-right16"></i>Allergy Entry
            </a>
          </li>
        </ul>
      </li>
      <!-- ========================================================= -->

      <li id="design" class="@yield('ordersList')">
        <a href="{{ url('/orders') }}">
          <i class="icc icon-cart"></i>Order List
        </a>
      </li>
      <!-- ========================================================= -->

      <li id="design">
        <a href="#"><i class="icc icon-cog4"></i> <span>Settings</span></a>
        <ul class="UL">
          <li id="design" class="@yield('RestaurantSetting')">
            <a href="{{ url('/RestaurantSetting/create') }}">
              <i class="icc icon-arrow-right16"></i>Restaurant Settings
            </a>
          </li>


          <li id="design">
            <a href="#"><i class="icc icon-cog4"></i> <span>Table Information</span></a>
            <ul class="UL">

              <li id="design" class="@yield('table')">
                <a href="{{ url('/table/create') }}">
                  <i class="icc icon-arrow-right16"></i>Table Entry
                </a>
              </li>
              <!-- ========================================================= -->

              <li id="design" class="@yield('ColorPicker')">
                <a href="{{ url('/ColorPicker/create') }}">
                  <i class="icc icon-arrow-right16"></i>Table Status
                </a>
              </li>
              <!-- ========================================================= -->

              <li id="design" class="@yield('TableOTime')">
                <a href="{{ url('/TableOTime/create') }}">
                  <i class="icc icon-arrow-right16"></i>Table Occupancy Time
                </a>
              </li>
              <!-- ========================================================= -->

              <li id="design" class="@yield('tableSection')">
                <a href="{{ url('/tableSection/create') }}">
                  <i class="icc icon-arrow-right16"></i>Table Section
                </a>
              </li>
              <!-- ========================================================= -->

            </ul>
          </li>


          <li id="design" class="@yield('service')">
            <a href="{{ url('/service/create') }}">
              <i class="icc icon-arrow-right16"></i>Services
            </a>
          </li>

          <li id="design" class="@yield('fgh')">
            <a href="{{ url('/PrinterSetup/create') }}">
              <i class="icc icon-arrow-right16"></i>Printer Setup
            </a>
          </li>

        </ul>

      </li>
      <!-- ========================================================= -->

      <li id="design">
        <a href="#"><i class="icc icon-user-plus"></i> <span>User Information</span></a>
        <ul class="UL">

          <li id="design" class="@yield('UserEntry')">
            <a href="{{ url('/UserEntry/create') }}">
              <i class="icc icon-arrow-right16"></i> Create User
            </a>
          </li>
          <!-- ========================================================= -->

          <li id="design" class="@yield('AssignPermissions')">
            <a href="{{ url('roles') }}">
              <i class="icc icon-user-lock"></i>Assign Permissions
            </a>
          </li>
        </ul>
      </li>
      <!-- ========================================================= -->

      <li id="design">
        <a href="#"><i class="icc icon-user-plus"></i> <span>Admin Information</span></a>
        <ul class="UL">

          <li id="design" class="@yield('save_admin')">
            <a href="{{ url('/Admin/create') }}">
              <i class="icc icon-arrow-right16"></i> Create Admin
            </a>
          </li>
          <!-- ========================================================= -->

          <li id="design" class="@yield('AssignPermissions')">
            <a href="{{ url('roles') }}">
              <i class="icc icon-user-lock"></i>Assign Permissions
            </a>
          </li>
        </ul>
      </li>
      <!-- ========================================================= -->


      <li id="design" class="">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          <i class="icc icon-switch2"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
      <!-- ========================================================= -->

    </ul>
  </div>
</div>
<!-- /main navigation -->