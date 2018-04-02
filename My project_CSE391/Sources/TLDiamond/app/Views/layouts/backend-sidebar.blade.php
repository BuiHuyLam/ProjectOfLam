<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Trang sức</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="">
          <a href="{{ route('backend.index') }}">
            <i class="fa fa-home"></i><strong>Trang chính</strong>
          </a>
        </li>
{{-- Sản phẩm --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i><span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backend.products') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
            <li><a href="{{ route('backend.products-create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
          </ul>
        </li>
{{-- Danh mục --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i><span>Danh mục</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('backend.category') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
            <li><a href="{{ route('backend.category-create') }}"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
          </ul>
        </li>
{{-- Người dùng --}}
        <li class="">
          <a href="{{ route('backend.user',['groups'=>'admin']) }}">
            <i class="glyphicon glyphicon-user"></i><span>Users</span>
          </a>
        </li>
{{-- Khách hàng --}}
        <li class="">
          <a href="{{ route('backend.user',['groups'=>'customer']) }}">
            <i class="glyphicon glyphicon-user"></i><span>Khách hàng</span>
          </a>
        </li>
<!-- Đơn hàng -->
        <li class="">
          <a href="{{ route('backend.order') }}">
            <i class="glyphicon glyphicon-shopping-cart"></i><span>Đơn hàng</span>
          </a>
        </li>
<!-- Banner -->
        <!-- <li>
          <a href="{{ route('backend.banner') }}">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
 --><!-- Contact -->
        <li class="">
          <a href="{{ route('backend.contact') }}">
            <i class="glyphicon glyphicon-envelope"></i><span>Liên hệ</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>