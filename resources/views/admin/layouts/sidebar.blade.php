 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
     <nav class="navbar navbar-expand-sm navbar-default">
         <div id="main-menu" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav">
                 <li class="active">
                     <a href="{{ route('admin.dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                 </li>
                 <li class="menu-title">MASTER</li><!-- /.menu-title -->
                 <li>
                     <a href="index.html"><i class="menu-icon fa fa-user"></i>Data User </a>
                     <a href="index.html"><i class="menu-icon fa fa-group"></i>Data Vendor </a>
                     <a href="index.html"><i class="menu-icon fa fa-home"></i>Data Professional </a>
                     <a href="index.html"><i class="menu-icon fa fa-dropbox"></i>Data Produk </a>
                     {{-- <a href="{{ route('admin.master.store') }}"><i class="menu-icon fa fa-dropbox"></i>Master Store
                     </a> --}}
                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Data Category</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><a href="{{ route('admin.data-category.store') }}">Category Store</a></li>
                         <li><a href="{{ route('admin.data-category.vendor') }}">Category Vendor</a></li>
                         <li><a href="{{ route('admin.data-category.professional') }}">Category Professional</a></li>
                     </ul>
                 </li>
                 </li>


                 <li class="menu-title">SETTINGS</li><!-- /.menu-title -->
                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                         <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                         <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                         <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                         <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                         <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                         <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                         <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                         <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                         <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                     </ul>
                 </li>

                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                         <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                     </ul>
                 </li>
             </ul>
         </div><!-- /.navbar-collapse -->
     </nav>
 </aside>
 <!-- /#left-panel -->
