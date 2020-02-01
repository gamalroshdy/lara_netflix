<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
    <div class="text-center">
        <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
        <p class="app-sidebar__user-designation">{{ implode(', ',auth()->user()->roles->pluck('name')->toArray()) }}</p>
    </div>
</div>
<ul class="app-menu">
    <li><a class="app-menu__item {{ Route::is('admin.home*') ? 'active' : '' }}" href="{{ route('admin.home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li><a class="app-menu__item {{ Route::is('admin.categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">@lang('site.categories')</span></a></li>
    <li><a class="app-menu__item {{ Route::is('admin.roles*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="app-menu__icon fa fa-anchor"></i><span class="app-menu__label">@lang('site.roles')</span></a></li>
{{--    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>--}}
{{--        <ul class="treeview-menu">--}}
{{--            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>--}}
{{--            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>--}}
{{--            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>--}}
{{--            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
</ul>
