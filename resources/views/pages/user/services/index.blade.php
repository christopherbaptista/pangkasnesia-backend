@extends('layouts.user.default')

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
                      <th>Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($service as $services)
                      <tr>
                        <td>{{ $services->id }}</td>
                        <td>{{ $services->name }}</td>
                        <td>{{ $services->category }}</td>
                        <td>{{ $services->price }}</td>
                        <td>
                          {{-- <a href="{{ route('service.edit', $services->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <form action="{{ route('service.destroy', $services->id) }}"
                                method="post"
                                class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                              <i class="fa fa-trash"></i>
                            </button>
                          </form> --}}
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
