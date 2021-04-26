<!-- Brand Logo -->
<a href="#" class="brand-link">
    <span class="brand-text font-weight-light" style="margin-left:20px;">@include('inc.companyname')</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <!--<img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
    </div>
    <div class="info">
        <a href="#" class="d-block">Welcome, {{Auth::user()->name}}</a>
        @if(Auth::user()->level == '1')
            <a href="#" class="d-block" style="font-size:10pt;">Admin</a>
        @elseif(Auth::user()->level == '2')
            <a href="#" class="d-block" style="font-size:10pt;">Manager</a>
        @elseif(Auth::user()->level == '3')
            <a href="#" class="d-block" style="font-size:10pt;">Owner</a>
        @elseif(Auth::user()->level == '4')
            <a href="#" class="d-block" style="font-size:10pt;">Developer</a>
        @endif
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <!--
        <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Contoh1
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="../../index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
            </a>
            </li>
        </ul>
        </li>
        <li class="nav-item">
        <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Contoh2
            <span class="right badge badge-danger">New</span>
            </p>
        </a>
        </li>
        -->

        <!--<li class="nav-item">
        <a href="{{ route('newtransaction.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Checkup
            </p>
        </a>
        </li>-->
        
        <li class="nav-item">
            <a href="{{route('medrec.index')}}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                Medical Records
                </p>
            </a>
        </li>

        <!--
        <li class="nav-header">MASTERS</li>
        <li class="nav-item">
        <a href="{{route('medrec.index')}}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Medical Records
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('allergies.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Allergies
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('medicines.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Medicines
            </p>
        </a>
        </li>
        -->
        <li class="nav-header">REPORTS</li>
        <li class="nav-item">
        <a href="{{ route('reportcheckup.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Checkup
            </p>
        </a>
        </li> 
        <li class="nav-header">SETTINGS</li>
        <li class="nav-item">
        <a href="{{ route('gensettings.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            General Settings
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('usrsettings.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            User Settings
            </p>
        </a>
        </li> 
        <!--<li class="nav-item">
        <a href="{{ route('pagessettings.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Pages Settings
            </p>
        </a>
        </li>-->


    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->