<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            {{-- {{Auth::user()->name}} --}}
            <p class="app-sidebar__user-name">welcome,</p>
            {{-- <p class="app-sidebar__user-name">welcome, {{ auth()->user()->name}}</p> --}}
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>

            <a class="app-menu__item" href="{{ route('admin.dashboard') }}"><i
                    class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            {{-- <i class="fa fa-id-card-o" aria-hidden="true"></i> --}}
            <a class="app-menu__item" href="{{ route('admin.user.index') }}"><i
                    class="app-menu__icon fa fa-users  "></i>
                <span class="app-menu__label">Users</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.order.index') }}"><i
                    class="app-menu__icon fa fa-shopping-cart"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.wishlist.index') }}"><i class="app-menu__icon fa fa-bolt"></i>
                <span class="app-menu__label">Wishlist</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.products.index') }}"><i class="app-menu__icon fa fa-product-hunt" aria-hidden="true"></i>
                <span class="app-menu__label"> Products</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.reviews.index') }}"><i
                    class="app-menu__icon fa fa-star"></i>
                <span class="app-menu__label">Reviews</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.sellers.index') }}"><i
                    class="app-menu__icon fa fa-money"></i>
                <span class="app-menu__label">Sellers</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        @role('super-admin')
        <li>
            <a class="app-menu__item" href="{{ route('admin.roles.index') }}"><i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Roles</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="{{ route('admin.permissions.index') }}"><i class="app-menu__icon fa fa-address-book-o"></i>
                <span class="app-menu__label">Permissions</span>
            </a>
        </li>
        @endrole


        {{--
        <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
        <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li> --}}
    </ul>
    {{-- {{ route('admin.user.index') }} --}}
    {{-- <a class="app-menu__item" href="{{ route('admin.author.index') }}"><i
            class="app-menu__icon fa fa-id-card-o"></i>
        <span class="app-menu__label">Author</span>
    </a> --}}
    {{-- <i class="fa fa-pencil" aria-hidden="true"></i> --}}

    {{-- <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i
                class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>
                    Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i
                        class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
        </ul>
    </li> --}}
    </ul>
</aside>
