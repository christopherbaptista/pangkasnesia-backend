@extends('layouts.admin.default')

@section('content')
    <div class="orders">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="box-title">Daftar Pengguna</h4>
            </div>
            <div class="card-body--">
              <div class="table-stats order-table ov-h">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Pengguna</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname}} {{$user->lastname}}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <form action="{{ route('users.destroy', $user->id) }}"
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
