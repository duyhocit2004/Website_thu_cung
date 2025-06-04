@extends('admin.index')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Chi tiết Size</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong>
                        <p>{{ $size->id }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Tên Size:</strong>
                        <p>{{ $size->name }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Ngày tạo:</strong>
                        <p>{{ $size->created_at->format('d/m/Y H:i:s') }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Cập nhật lần cuối:</strong>
                        <p>{{ $size->updated_at->format('d/m/Y H:i:s') }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('size.index') }}" class="btn btn-secondary">Quay lại</a>
                        <div>
                            <a href="{{ route('size.edit', $size) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('size.destroy', $size) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
