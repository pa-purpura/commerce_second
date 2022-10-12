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

            <a class="app-menu__item active" href="{{ route('admin.dashboard') }}"><i
                    class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            {{-- <i class="fa fa-id-card-o" aria-hidden="true"></i> --}}

            <a class="app-menu__item active" href=""><i class="app-menu__icon fa fa-users  "></i>
                <span class="app-menu__label">Users</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item active" href="{{ route('admin.reviews.index') }}"><i
                    class="app-menu__icon fa fa-star"></i>
                <span class="app-menu__label">Reviews</span>
            </a>
        </li>
        <li>

            <a class="app-menu__item active" href="{{ route('admin.sellers.index') }}"><i
                    class="app-menu__icon fa fa-money"></i>
                <span class="app-menu__label">Sellers</span>
            </a>
        </li>



        {{--
        <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
        <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li> --}}
    </ul>
    {{-- {{ route('admin.user.index') }} --}}
    {{-- <a class="app-menu__item active" href="{{ route('admin.author.index') }}"><i
            class="app-menu__icon fa fa-id-card-o"></i>
        <span class="app-menu__label">Author</span>
    </a> --}}
    {{-- <i class="fa fa-pencil" aria-hidden="true"></i> --}}


    </li>
    {{-- <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i
                class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item active" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>
                    Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i
                        class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
        </ul>
    </li> --}}
    <li>
        <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">Settings</span>
        </a>
    </li>
    </ul>
</aside>
