@extends('layouts.admin.default')

@section('content')
    <div class="card">
      <div class="card-header">
        <strong>Ubah Data Mitra</strong>
        <small>{{ $partners->uuid }}</small>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('partners.update', $partners->id) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="firstname" class="form-control-label">Nama Depan Mitra</label>
            <input  type="text"
                    name="firstname"
                    value="{{ old('firstname') ? old('firstname') : $partners->firstname }}"
                    class="form-control @error('firstname') is-invalid @enderror"/>
            @error('name') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="lastname" class="form-control-label">Nama Belakang Mitra</label>
            <input  type="text"
                    name="lastname"
                    value="{{ old('lastname') ? old('lastname') : $partners->lastname }}"
                    class="form-control @error('lastname') is-invalid @enderror"/>
            @error('name') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="email" class="form-control-label">Email</label>
            <input  type="email"
                    name="email"
                    value="{{ old('email') ? old('email') : $partners->email }}"
                    class="form-control @error('email') is-invalid @enderror"/>
            @error('email') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
              Ubah Data Mitra
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection
