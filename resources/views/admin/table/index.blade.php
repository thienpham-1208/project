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
        <a href="{{ route('admin.table.index') }}" class="btn btn-item active-primary">Quản lí bàn ăn</a>
        <a href="#" class="btn btn-item disabled">Sửa bàn ăn</a>
    </div>
    <div class="row">
        <div class="col col-md-4 col-lg-4">
            <div class="wrap-form">
                <form action="{{ route('admin.table.create') }}" method="POST" id="form-create-table">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên loại món ăn</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Nhập tên bàn ăn...">
                    </div>
                    @error('name')
                        <p class="error">
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="form-group">
                        <label for="">Số lượng người</label>
                        <input type="number" name="number" class="form-control" value="{{ old('number') }}" min="1">
                    </div>
                    @error('number')
                        <p class="error">
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select name="status" id="" class="form-control">
                            <option value="0">Chưa đặt</option>
                            <option value="1">Đã đặt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-save">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8 col-lg-8">
            <div class="table-responsive">
                <table class="table table-hover table-shadown" id="table-list-table">
                    <thead>
                        <th width="3%">STT</th>
                        <th>Tên bàn ăn</th>
                        <th width="5%">Số lượng</th>
                        <th width="15%">Trạng thái</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($tables as $index => $table)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    {{ $table->name }}
                                </td>
                                <td>
                                    {{ $table->number }}
                                </td>
                                <td>
                                    @if ($table->status == $mTable::BOOKED)
                                        Đã đặt bàn
                                    @else
                                        Chưa đặt
                                    @endif
                                </td>
                                <td class="link-action">
                                    <a href="{{ route('admin.table.edit', $table->id) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <span>
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        <form action="{{ route('admin.table.delete', $table->id) }}" method="POST"
                                            class="form-delete-table">
                                            @csrf
                                        </form>
                                    </span>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tables->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/page_table.js')) }}"></script>
@endsection
