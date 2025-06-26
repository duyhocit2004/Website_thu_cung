@extends('admin.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Cập nhật tài khoản</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-body custom-input checkbox-checked">
                                    <form class="theme-form" method="POST" action="{{ route('users.update', $user->id) }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="first-name">Tên tài khoản</label>
                                            <input class="form-control" disabled id="first-name" type="text"
                                                name="name" value="{{ $user->name }}" placeholder="Tên">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Email</label>
                                            <input class="form-control" disabled id="exampleFormControlInput1"
                                                name="email" value="{{ $user->email }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Số điện
                                                thoại</label>
                                            <input class="form-control" disabled id="exampleFormControlInput1"
                                                name="phone_number" value="{{ $user->phone }}" type="tel">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Địa chỉ</label>
                                            <input disabled class="form-control" id="exampleFormControlInput1"
                                                value="{{ $user->address }}" type="address" placeholder="Địa chỉ">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationDefault04">Vai trò</label>
                                            <select class="form-select" id="validationDefault04" name="role"
                                                required="">
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin
                                                </option>
                                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationDefault04">Trạng thái</label>
                                            <select class="form-select" id="validationDefault04" name="status"
                                                required="" {{ auth()->id() == $user->id ? 'disabled' : '' }}>
                                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Hoạt động
                                                </option>
                                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Khóa
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            @if (auth()->id() != $user->id)
                                                <button class="btn btn-primary" type="submit">Cập nhật</button>
                                            @else
                                                <div class="alert alert-warning">
                                                    Bạn không thể chỉnh sửa tài khoản của chính mình
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
