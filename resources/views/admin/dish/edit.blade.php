@extends('admin.layouts.default')

@section('pageName')
    <h2>Quản lí món ăn</h2>
@endsection

@section('content')
    <div class="group-button">
        <a href="{{ route('admin.dish.index') }}" class="btn btn-item">Quản lí món ăn</a>
        <a href="{{ route('admin.dish.create') }}" class="btn btn-item">Thêm món ăn</a>
        <a href="#" class="btn btn-item active-primary">Sửa món ăn</a>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 pl-0">
            <form action="{{ route('admin.dish.update', $dish->id) }}" id="form-edit-dish" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên món ăn</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $dish->name) }}">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Ảnh</label>
                    <br>
                    <input id="img" type="file" name="image" class="form-control hidden" value="{{ $dish->image }}">
                    <img id="avatar" class="thumbnail" width="300px" src="{{ $dish->image }}">
                    @error('image')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Loại món ăn</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="0">Chọn loại món ăn</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == old('category_id', $dish->category_id)) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Giá tiền</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $dish->price) }}">
                    @error('price')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Giảm giá</label>
                    <input type="number" name="discount" class="form-control"
                        value="{{ old('discount', $dish->discount) }}">
                    @error('discount')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Hiển thị</label>
                    <select name="display" class="form-control">
                        <option value="1" @if (old('display', $dish->display)) selected @endif>Hiển thị</option>
                        <option value="0" @if (!old('display', $dish->display)) selected @endif>Không hiển thị</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="description" class="ckeditor" id="" cols="30"
                        rows="10"> {{ old('description', $dish->description) }} </textarea>
                </div>

            </form>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-edit">Thêm</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/page_dish.js')) }}"></script>
@endsection
