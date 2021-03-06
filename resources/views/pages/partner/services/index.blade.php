@extends('layouts.partner.default')

@section('content')
    <div class="orders">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="box-title">Daftar Layanan</h4>
            </div>
            <div class="card-body--">
              <div class="table-stats order-table ov-h">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                          <a href="{{ route('services.gallery', $item->id) }}" class="btn btn-info btn-sm">
                          {{-- <a href="#" class="btn btn-info btn-sm"> --}}
                            <i class="fa fa-picture-o"></i>
                          </a>
                          <a href="{{ route('services.edit', $item->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <form item="{{ route('services.destroy', $item->id) }}"
                                method="post"
                                class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                              <i class="fa fa-trash"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    @empty
                        <tr>
                          <td colspan="6" class="text-center p-5">
                            Data tidak tersedia
                          </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
