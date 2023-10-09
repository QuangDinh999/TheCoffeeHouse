<aside class="sidebar navbar-default" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-coffee"></i> Drink<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('drink.index')}}">Drink</a>
                    </li>
                    <li>
                        <a href="{{route('drinksize.index')}}">Drink Size</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('category.index')}}"><i class="fa fa-filter"></i> Categories</a>
            </li>
            <li>
                <a href="{{route('size.index')}}"><i class="fa fa-circle-o-notch"></i> Sizes</a>
            </li>
            <li>
                <a href="{{route('customer.index')}}"><i class="fa fa-user-circle"></i> Customers</a>
            </li>
            <li>
                <a href="{{route('payment.index')}}"><i class="fa fa-credit-card"></i> Payment</a>
            </li>
            <li>
                <a href="{{route('invoice.index')}}"><i class="fa fa-shopping-bag"></i> Invoices<span class="fa arrow"></span></a>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
</aside>
