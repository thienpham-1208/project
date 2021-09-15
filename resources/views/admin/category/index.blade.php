@extends('admin.layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset(mix('css/admin.category.index.css')) }}">
@endsection

@section('pageName')
    <h2>Quản lí thể loại món ăn</h2>
@endsection
@section('content')
    <div class="group-button">
        <a href="{{ route('admin.category.index') }}" class="btn btn-item active-primary">Quản lí loại món ăn</a>
        <a href="#" class="btn btn-item disabled">Sửa loại món ăn</a>
    </div>
    <div class="row">
        <div class="col col-md-4 col-lg-4">
            <div class="wrap-form">
                <form action="{{ route('admin.category.create') }}" method="POST" id="form-create-category">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên loại món ăn</label>
                        <input type="text" required name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Nhập tên loại món ăn...">
                    </div>
                    @error('name')
                        <p class="error">
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-save">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8 col-lg-8 table-category">
            <div class="table-responsive">
                <table class="table table-hover table-shadown">
                    <thead>
                        <th>STT</th>
                        <th>Tên loại món ăn</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    {{ $category->slug }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    &nbsp;
                                    <a href="" class="link-delete-category">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.category.delete', $category->id) }}" method="POST"
                                        class="form-delete-category">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/page_category.js')) }}"></script>
@endsection
