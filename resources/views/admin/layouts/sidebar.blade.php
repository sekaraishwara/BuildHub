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
                     <a href="{{ route('admin.data.user') }}"><i class="menu-icon fa fa-user"></i>Data User
                     </a>
                     <a href="{{ route('admin.data.vendor') }}"><i class="menu-icon fa fa-group"></i>Data Vendor </a>
                     <a href="{{ route('admin.data.professional') }}"><i class="menu-icon fa fa-home"></i>Data
                         Professional </a>
                     <a href="{{ route('admin.data.store') }}"><i class="menu-icon fa fa-dropbox"></i>Data Store </a>
                     {{-- <a href="{{ route('admin.data.store') }}"><i class="menu-icon fa fa-money"></i>Data Price Range --}}
                     </a>
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

                 <li class="menu-title">TRANSACTION</li><!-- /.menu-title -->
                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Need Approve Order</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="fa fa-puzzle-piece"></i><a
                                 href="{{ route('admin.transaction.approval.service') }}">Order
                                 Service</a></li>
                         <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('admin.transaction.approval') }}">Order
                                 Store</a></li>
                     </ul>
                 </li>
                 <li class="menu-title">BUILDHUB BLOG</li><!-- /.menu-title -->
                 <li>

                     <a href="{{ route('admin.data.blog') }}"><i class="menu-icon fa fa-newspaper-o"></i>Data Artikel
                     </a>
                 </li>
                 <li class="menu-title">BUILDHUB EVENT</li><!-- /.menu-title -->
                 <li>

                     <a href="{{ route('admin.data.event') }}"><i class="menu-icon fa fa-newspaper-o"></i>Data Event
                     </a>
                 </li>
             </ul>
         </div>
     </nav>
 </aside>
 <!-- /#left-panel -->
