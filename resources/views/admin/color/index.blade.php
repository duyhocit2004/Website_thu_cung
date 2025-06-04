@extends('admin.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Danh sách màu sắc</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('color.create') }}" class="btn btn btn-outline-primary mb-3">
                    Thêm mới
                </a>

                <div class="card">
                    <div>
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
                                            @forelse ($color as $key => $color)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $color->name }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="{{ route('color.edit', $color->id) }}"
                                                                class="btn btn-outline-warning" type="button"
                                                                data-original-title="btn btn-outline-danger-2x">
                                                                <i class="bi bi-gear-fill"></i>
                                                            </a>

                                                            <a href="{{ route('color.delete', $color->id) }}"
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
                    </div>
                </div>
            </div>
        </div>
    @endsection
