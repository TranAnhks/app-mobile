<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
            </li>
            <li>
                <a href="{!!URL::to('admin/home')!!}"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
            </li>
            <li>
                <a href="{!!URL::to('admin/category')!!}"><i class="fa fa-clipboard fa-fw"></i> Doanh mục</a>
            </li>
            <li>
                <a href="{!!URL::to('admin/product')!!}"><i class="glyphicon glyphicon-lock fa-fw"></i> Sản phẩm</a>
            </li>
            <li>
                <a href="{!!URL::to('admin/order')!!}"><i class="fa fa-calendar fa-fw"></i> Đơn đặt hàng</a>
            </li>
            <li>
                <a href="{!!URL::to('admin/customer')!!}"><i class="glyphicon glyphicon-signal fa-fw"></i> Khách hàng</a>
            </li>
        </ul>
    </div>
</div>