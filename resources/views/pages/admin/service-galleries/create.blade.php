@extends('layouts.admin.default')

@section('content')
    <div class="card">
      <div class="card-header">
        <strong>Tambah Foto Layanan</strong>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('service-galleries.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name" class="form-control-label">Nama Layanan</label>
            <select name="services_id"
                    class="form-control @error('services_id') is-invalid @enderror">
                @foreach ($services as $service)
                  <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
            @error('services_id') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="photo" class="form-control-label">Foto Layanan</label>
            <input  type="file"
                    name="photo"
                    value="{{ old('photo') }}"
                    accept="image/*"
                    required
                    class="form-control @error('photo') is-invalid @enderror"/>
            @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="is_default" class="form-control-label">Jadikan Default</label>
            <br>
            <label>
              <input  type="radio" style="height:20px; width:20px;"
                    name="is_default"
                    value="1"
                    class="form-control @error('is_default') is-invalid @enderror"/> Yes
            </label>
            &nbsp;
            <label>
              <input  type="radio" style="height:20px; width:20px;"
                    name="is_default"
                    value="0"
                    class="form-control @error('is_default') is-invalid @enderror"/> No
            </label>
            @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
              Tambah Foto Layanan
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection
