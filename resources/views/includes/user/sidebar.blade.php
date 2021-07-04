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
                  <a href="{{ route('products.index') }}"> <i class="menu-icon fa fa-dropbox"></i>Lihat Produk</a>
                </li>
                {{-- <li class="">
                    <a href="{{ route('products.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Produk</a>
                </li> --}}
                <li class="">
                    <a href="{{ route('product-galleries.index') }}"> <i class="menu-icon fa fa-comments"></i>Reviews</a>
                </li>

                {{-- <li class="menu-title">Foto Produk</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('product-galleries.index') }}"> <i class="menu-icon fa fa-image"></i>Lihat Foto Produk</a>
                </li>
                <li class="">
                    <a href="{{ route('product-galleries.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Foto Produk</a>
                </li> --}}

                <li class="menu-title">Layanan</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('services.index')}}"> <i class="menu-icon fa fa-scissors"></i>Lihat Layanan</a>
                </li>
                {{-- <li class="">
                    <a href="{{route('services.create')}}"> <i class="menu-icon fa fa-plus"></i>Tambah Layanan</a>
                </li> --}}
                <li class="">
                    <a href="{{ route('product-galleries.index') }}"> <i class="menu-icon fa fa-comments"></i>Reviews</a>
                </li>

                {{-- <li class="menu-title">Foto Layanan</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('service-galleries.index') }}"> <i class="menu-icon fa fa-image"></i>Lihat Foto Layanan</a>
                </li>
                <li class="">
                    <a href="{{ route('service-galleries.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Foto Layanan</a>
                </li> --}}

                <li class="menu-title">Membership</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('transactions.index') }}"> <i class="menu-icon fa fa-bar-chart-o"></i>Lihat Transaksi</a>
                </li>
                {{-- <li class="">
                    <a href="{{ route('users.index')}}"> <i class="menu-icon fa fa-users"></i>Lihat Pengguna</a>
                </li>
                <li class="">
                    <a href="{{ route('partners.index')}}"> <i class="menu-icon fa fa-user-plus"></i>Lihat Mitra</a>
                </li> --}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
  </aside>
  <!-- /#left-panel -->
