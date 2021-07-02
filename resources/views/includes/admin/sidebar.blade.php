<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Produk</li><!-- /.menu-title -->
                <li class="">
                  <a href="{{ route('products.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Produk</a>
                </li>
                <li class="">
                    <a href="{{ route('products.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Produk</a>
                </li>

                <li class="menu-title">Foto Produk</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('product-galleries.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Foto Produk</a>
                </li>
                <li class="">
                    <a href="{{ route('product-galleries.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Foto Produk</a>
                </li>

                <li class="menu-title">Layanan</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('services.index')}}"> <i class="menu-icon fa fa-list"></i>Lihat Layanan</a>
                </li>
                <li class="">
                    <a href="{{route('services.create')}}"> <i class="menu-icon fa fa-plus"></i>Tambah Layanan</a>
                </li>

                <li class="menu-title">Administrator</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('transactions.index') }}"> <i class="menu-icon fa fa-bar-chart-o"></i>Lihat Transaksi</a>
                </li>
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-users"></i>Lihat Pengguna</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
  </aside>
  <!-- /#left-panel -->
