@extends('admin.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Danh sách tài khoản</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('users.create') }}" class="btn btn btn-outline-primary mb-3">
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
                                                <th scope="col">Tên tài khoản</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $key => $user)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>
                                                        <form action="{{ route('users.deactivate', $user->id) }}" method="POST">
                                                            @csrf
                                                            <div class="d-flex justify-content-center gap-2">
                                                                <button type="submit"
                                                                    onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản này không?')"
                                                                    class="btn btn-outline-danger" type="button"
                                                                    data-original-title="btn btn-outline-danger">
                                                                    <i class="bi bi-lock-fill"></i>
                                                                </button>
                                                            </div>
                                                        </form>
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
