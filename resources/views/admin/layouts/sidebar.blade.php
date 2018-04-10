<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin\dist\img\avatar.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Администратирование</li>
        <li class="active treeview">
            <li class=""><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i> Новости</a></li>
            @can('posts.category',Auth::user())
            <li class=""><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Категории</a></li>
            @endcan
            @can('posts.tag',Auth::user())
            <li class=""><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Теги</a></li>
            @endcan
            <li class=""><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> Админ пользователи</a></li>
            <li class=""><a href="{{ route('role.index') }}"><i class="fa fa-circle-o"></i> Правила</a></li>
            <li class=""><a href="{{ route('permission.index') }}"><i class="fa fa-circle-o"></i> Разрешения</a></li>
        </li>
          <li class="header">Главная страница</li>
          <li class="treeview">
            <li class=""><a href="{{ route('header.index') }}"><i class="fa fa-circle-o"></i> Шапка главной страницы</a></li>
            <li class=""><a href="{{ route('course.index') }}"><i class="fa fa-circle-o"></i> Курсы на выбор</a></li>
            <li class=""><a href="{{ route('plan.index') }}"><i class="fa fa-circle-o"></i> Учебный план</a></li>
            <li class=""><a href="{{ route('teacher.index') }}"><i class="fa fa-circle-o"></i> Преподаватели</a></li>
            <li class=""><a href="{{ route('gallery.index') }}"><i class="fa fa-circle-o"></i> Галерея</a></li>
            <li class=""><a href="{{ route('about.index') }}"><i class="fa fa-circle-o"></i> Где мы находимся</a></li>
            <li class=""><a href="{{ route('link.index') }}"><i class="fa fa-circle-o"></i> Ссылки</a></li>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>