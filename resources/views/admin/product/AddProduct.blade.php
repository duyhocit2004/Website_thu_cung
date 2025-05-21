@extends('admin.index')
@section('main')
    <div class="container-fluid table-space basic_table">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Quản lý sản phẩm</h4>
                    </div>
                    <div class="card-header">
                        <a href=""  class="btn btn-primary">Thêm 31232Sản phẩm</a>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">tên</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">mã đơn hàng</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $key => $products)
                                            <tr>
                                                <th scope="row">{{$key + 1}}</th>
                                                <td>{{$products->name}}</td>
                                                <td>{{$products->image}}</td>
                                                <td class="font-danger">{{$products->SKU }}</td>
                                                <td>{{$products->name}}</td>
                                                <td>
                                                    <div class="wizard-footer d-flex gap-2 justify-content-end">
                                                        <a href="" class="btn alert-light-primary" id="backbtn">
                                                            Sửa</a>
                                                        <form action="" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" id="nextbtn">Xóa</button>
                                                        </form>

                                                    </div>

                                            </tr>
                                        @endforeach

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