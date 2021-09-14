@extends('admin.layouts.default')

@section('pageName')
    <h2>Quản lí món ăn</h2>
@endsection

@section('content')
    <div class="group-button">
        <a href="{{ route('admin.dish.index') }}" class="btn btn-item">Quản lí món ăn</a>
        <a href="{{ route('admin.dish.create') }}" class="btn btn-item active-primary">Thêm món ăn</a>
        <a href="#" class="btn btn-item disabled">Sửa món ăn</a>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 pl-0">
            <form action="{{ route('admin.dish.store') }}" id="form-create-dish" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên món ăn</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên món ăn..."
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Ảnh</label>
                    <br>
                    <input id="img" type="file" name="image" class="form-control hidden" value="{{ old('image') }}"
                        readonly>
                    <img id="avatar" class="thumbnail" width="300px"
                        src="{{ old('image') ?? asset('images/icons/click.png') }}">
                    @error('image')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Loại món ăn</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="0">Chọn loại món ăn</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Giá tiền</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Giảm giá</label>
                    <input type="number" name="discount" class="form-control" value="{{ old('discount') }}">
                    @error('discount')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Hiển thị</label>
                    <select name="display" class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Không hiển thị</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="description" class="ckeditor" id="" cols="30"
                        rows="10">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/page_dish.js')) }}"></script>
@endsection
