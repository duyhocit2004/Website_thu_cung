@extends('admin.layout.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Thêm tài khoản</h3>
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
                                    <form class="theme-form" method="POST" action="{{ route('users.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="first-name">Tên</label>
                                            <input class="form-control" id="first-name" type="text" name="name" placeholder="Tên"
                                                aria-label="First name">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Email</label>
                                            <input class="form-control" id="exampleFormControlInput1" name="email" type="email"
                                                placeholder="name@example.com">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Số điện
                                                thoại</label>
                                            <input class="form-control" id="exampleFormControlInput1" name="phone" type="phone"
                                                placeholder="Số điện thoại">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Địa chỉ</label>
                                            <input class="form-control" id="exampleFormControlInput1" name="address" type="address"
                                                placeholder="Địa chỉ">
                                        </div>

                                        <div class="mb-3">
                                            <label class="col-sm-12 col-form-label" for="inputPassword2">Mật
                                                khẩu</label>
                                            <input class="form-control" id="inputPassword2" name="password" type="password">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationDefault04">Vai trò</label>
                                            <select class="form-select" id="validationDefault04" name="role" required="">
                                                <option selected="" disabled="" value="">Chọn vai trò
                                                </option>
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
        </div>
@endsection
