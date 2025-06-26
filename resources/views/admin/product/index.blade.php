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
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm Sản phẩm</a>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên SP</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $key => $product)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $product->name }}</td>
                                                <td><img src="{{ asset($product->image) }}" height="100" alt="No Image"></td>
                                                <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>
                                                    @if ($product->status)
                                                        <span class="badge badge-success">Còn hàng</span>
                                                    @else
                                                        <span class="badge badge-danger">Hết hàng</span>
                                                    @endif
                                                <td>
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-outline-warning" type="button"
                                                        data-original-title="btn btn-outline-danger-2x">
                                                        <i class="bi bi-calendar2-event-fill"></i> </a>

                                                    <a href="{{ route('product.delete', $product->id) }}"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')"
                                                        class="btn btn-outline-danger" type="button"
                                                        data-original-title="btn btn-outline-danger-2x">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{-- {{ $products->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
