@extends('admin.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Sửa tài khoản</h3>
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
                                                <option value="admin">admin</option>
                                                <option value="user">user</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>~
    @endsection
