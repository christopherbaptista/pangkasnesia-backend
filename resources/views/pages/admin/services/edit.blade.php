@extends('layouts.admin.default')

@section('content')
    <div class="card">
      <div class="card-header">
        <strong>Ubah Layanan</strong>
        <small>{{ $action->name }}</small>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('services.update', $action->id) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="name" class="form-control-label">Nama Layanan</label>
            <input  type="text"
                    name="name"
                    value="{{ old('name') ? old('name') : $action->name }}"
                    class="form-control @error('name') is-invalid @enderror"/>
            @error('name') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="category" class="form-control-label">Kategori Layanan</label>
            <input  type="text"
                    name="category"
                    value="{{ old('category') ? old('category') : $action->category }}"
                    class="form-control @error('category') is-invalid @enderror"/>
            @error('category') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="description" class="form-control-label">Deskripsi Layanan</label>
            <textarea name="description"
                      class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $action->description }}</textarea>
            @error('description') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="price" class="form-control-label">Harga Layanan</label>
            <input  type="number"
                    name="price"
                    value="{{ old('price') ? old('price') : $action->price }}"
                    class="form-control @error('price') is-invalid @enderror"/>
            @error('price') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          {{-- <div class="form-group">
            <label for="quantity" class="form-control-label">Kuantitas Layanan</label>
            <input  type="number"
                    name="quantity"
                    value="{{ old('quantity') ? old('quantity') : $action->quantity }}"
                    class="form-control @error('quantity') is-invalid @enderror"/>
            @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
          </div> --}}
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
              Ubah Layanan
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection
