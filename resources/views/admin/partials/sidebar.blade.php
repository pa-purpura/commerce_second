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

            <a class="app-menu__item active" href="{{ route('admin.user.index') }}"><i class="app-menu__icon fa fa-users  "></i>
                <span class="app-menu__label">Users</span>
            </a>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-star"></i><span class="app-menu__label">Reviews</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>

            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('admin.reviews.index') }}"><i class="icon fa fa-circle-o"></i> All
                        Reviews</a></li>
                <li><a class="treeview-item" href="{{ route('admin.reviews.create') }}" rel="noopener"><i
                            class="icon fa fa-circle-o"></i>Create</a></li>
                {{-- <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
                <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li> --}}
            </ul>

            <a class="app-menu__item active" href="{{ route('admin.products.index') }}"><i class=" app-menu__icon fa fa-product-hunt" aria-hidden="true"></i> 
                <span class="app-menu__label"> Prodotti</span>
            </a>
            
            {{-- {{ route('admin.user.index') }} --}}
            {{-- <a class="app-menu__item active" href="{{ route('admin.user.index') }}"><i class="app-menu__icon fa fa-id-card-o"></i>
                <span class="app-menu__label">Author</span>
            </a> --}}
            {{-- <i class="fa fa-pencil" aria-hidden="true"></i> --}}


        </li>        

        <li>
            <a class="app-menu__item active" href="{{ route('admin.order.index') }}"><i class="app-menu__icon fa fa-shopping-cart"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li>    

            <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
