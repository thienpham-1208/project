@extends('admin.layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset(mix('css/admin.category.index.css')) }}">
@endsection

@section('pageName')
    <h2>Quản lí thể loại món ăn</h2>
@endsection
@section('content')
    <div class="group-button">
        <a href="{{ route('admin.category.index') }}" class="btn btn-item">Quản lí loại món ăn</a>
        <a href="#" class="btn btn-item active-primary">Sửa loại món ăn</a>
    </div>
    <div class="row">
        <div class="col col-lg-5 col-md-5">
            <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Tên loại món ăn</label>
                    <input type="text" required name="name" class="form-control"
                        value="{{ old('name', $category->name) }}">
                </div>
                @error('name')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}">
                </div>
                @error('slug')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-save">Sửa</button>
                </div>
            </form>
        </div>
    </div>

@endsection
