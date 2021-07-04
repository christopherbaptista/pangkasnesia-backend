@extends('layouts.user.default')

@section('content')
    <div class="card">
      <div class="card-header">
        <strong>Berikan Review Produk</strong>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('product-reviews.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name" class="form-control-label">Nama Produk</label>
            <select name="products_id"
                    class="form-control @error('products_id') is-invalid @enderror">
                @foreach ($products as $product)
                  <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="star" class="form-control-label">Rating Produk</label>
            <input  type="integer"
                    name="star"
                    value="{{ old('star') }}"
                    accept="integer"
                    required
                    class="form-control @error('star') is-invalid @enderror"/>
            @error('star') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="comments" class="form-control-label">Comments</label>
            <input  type="text"
                    name="comments"
                    value="{{ old('comments') }}"
                    class="form-control @error('comments') is-invalid @enderror"/>
            @error('comments') <div class="text-muted">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
              Kirim Review
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection
