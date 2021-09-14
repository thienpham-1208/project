@extends('admin.layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.dish.index.css') }}">
@endsection
@section('pageName')
    <h2>Quản lí món ăn</h2>
@endsection

@section('content')
    <div class="group-button">
        <a href="{{ route('admin.dish.index') }}" class="btn btn-item active-primary">Quản lí món ăn</a>
        <a href="{{ route('admin.dish.create') }}" class="btn btn-item">Thêm món ăn</a>
        <a href="#" class="btn btn-item disabled">Sửa món ăn</a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-shadown" id="table-list-dish">
                <thead>
                    <th width="3%">STT</th>
                    <th width="15%">Tên món</th>
                    <th>Ảnh</th>
                    <th>Thể loại</th>
                    <th width="8%">Giá</th>
                    <th width="3%">Giảm giá</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                        $page = $_GET['page'] ?? 1;
                    @endphp
                    @foreach ($dishes as $index => $dish)
                        <tr>
                            <td>{{ $index + 1 + ($page - 1) * $perPage }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>
                                <img src="{{ asset($dish->image) }}" alt="">
                            </td>
                            <td>{{ $dish->category_name }}</td>
                            <td>{{ number_format($dish->price) }}VNĐ</td>
                            <td>{{ $dish->discount ?? 0 }}%</td>
                            <td>
                                <div class="link-action">
                                    <a href="{{ route('admin.dish.edit', $dish->id) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <span>
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        <form action="{{ route('admin.dish.delete', $dish->id) }}" method="POST"
                                            class="form-delete-dish">
                                            @csrf
                                        </form>
                                    </span>
                                    <span attr-dish-id="{{ $dish->id }}">
                                        <i class="fa fa-lock" aria-hidden="true" @if ($dish->display) style="display:none" @endif></i>
                                        <i class="fa fa-unlock-alt" aria-hidden="true" @if (!$dish->display) style="display:none" @endif></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dishes->links() }}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/page_dish.js')) }}"></script>
@endsection
