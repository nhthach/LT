   <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/avatar5.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->getName()}}</p>
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
        <li class="header">MAIN NAVIGATION</li>
        @if(Auth::user()->hasAccess(['config'],'read') == true)
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>System</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="{{route('admin.config.index')}}"><i class="fa fa-circle-o"></i> Config System</a></li>  
              <li class="active"><a href="{{route('admin.category.index')}}"><i class="fa fa-circle-o"></i> Categories</a></li>  
            </ul>
          </li>
        @endif
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manage Lincese</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.lincese.index')}}"><i class="fa fa-circle-o"></i>Manage License Type</a></li>
            <li><a href="{{route('admin.lincese.index')}}"><i class="fa fa-circle-o"></i> Manage License Rank ( Class )
            <li><a href="{{route('admin.exam.index')}}"><i class="fa fa-circle-o"></i> Manage Exams</a></li>
          </ul>
        </li>
       <li class="treeview">
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Manage Question</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green ">new</small>
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->hasAccess(['user'],'read') == true)
              <li><a href="{{ route('admin.question.create') }}"><i class="fa fa-circle-o"></i>New Question</a></li>
              <li><a href="{{ route('admin.question.import') }}"><i class="fa fa-circle-o"></i>Import Question</a></li>
            @endif
            <li><a href="{{ route('admin.question.index') }}"><i class="fa fa-circle-o"></i>Manage Question</a></li>
            <li><a href="{{ route('admin.question.type.index') }}"><i class="fa fa-circle-o"></i> Manage Question Type</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Mange Acticel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.article.create') }}"><i class="fa fa-circle-o"></i>New Acticel</a></li>
            <li><a href="{{ route('admin.article.index') }}"><i class="fa fa-circle-o"></i> Manage Acticels</a></li>
          </ul>
        </li>
        @if(Auth::user()->hasAccess(['user'],'read') == true)
          <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Manage User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin.role.index')}}"><i class="fa fa-circle-o"></i> Admin Roles</a></li>
              <li><a href="{{ route('admin.admin.index')}}"><i class="fa fa-circle-o"></i> Manager Admin System</a></li>
               <li><a href="{{ route('admin.admin.index')}}"><i class="fa fa-circle-o"></i> Manager User System</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->