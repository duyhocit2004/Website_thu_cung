@extends('admin.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Danh sách màu sắc</h3>
            </div>
        </div><a href="{{ route('size.create') }}" class="btn btn-primary">Thêm Size Mới</a>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên màu sắc</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sizes as $key => $size)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $size->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('size.edit', $size->id) }}" class="btn btn-outline-warning"
                                                type="button" data-original-title="btn btn-outline-danger-2x">
                                                <i class="bi bi-gear-fill"></i>
                                            </a>

                                            <a href="{{ route('size.delete', $size->id) }}"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')"
                                                class="btn btn-outline-danger" type="button"
                                                data-original-title="btn btn-outline-danger-2x">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Không có người dùng nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @endsection
