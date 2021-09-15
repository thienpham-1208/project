@extends('admin.layouts.default')

@inject('mTable', 'App\Models\Table')

@section('css')
    <link rel="stylesheet" href="{{ asset(mix('css/admin.table.index.css')) }}">
@endsection

@section('pageName')
    <h2>Quản lí bàn ăn</h2>
@endsection
@section('content')
    <div class="group-button">
        <a href="{{ route('admin.table.index') }}" class="btn btn-item">Quản lí bàn ăn</a>
        <a href="#" class="btn btn-item active-primary">Sửa bàn ăn</a>
    </div>
    <div class="row">
        <div class="col col-lg-5 col-md-5">
            <form action="{{ route('admin.table.update', $table->id) }}" method="post" id="form-edit-table">
                @csrf
                <div class="form-group">
                    <label for="">Tên bàn ăn</label>
                    <input type="text" required name="name" class="form-control" value="{{ old('name', $table->name) }}">
                </div>
                @error('name')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
                <div class="form-group">
                    <label for="">Số lượng người</label>
                    <input type="number" min="1" name="number" class="form-control"
                        value="{{ old('number', $table->number) }}">
                </div>
                @error('number')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
                <div class="form-group">
                    <label for="">Tình trạng</label>
                    <select name="status" id="" class="form-control">
                        <option value="1" @if (old('status', $table->status) == $mTable::BOOKED) selected @endif>Đã đặt</option>
                        <option value="0" @if (old('status', $table->status) == $mTable::UN_BOOKED) selected @endif>Chưa đặt</option>
                    </select>
                </div>
            </form>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-edit">Sửa</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/page_table.js')) }}"></script>
@endsection
