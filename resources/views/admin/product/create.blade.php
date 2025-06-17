@extends('admin.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Thêm sản phẩm</h3>
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
                                    <form class="theme-form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Tên sản phẩm</label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Giá</label>
                                            <input class="form-control" type="number" name="price" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mô tả</label>
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ảnh</label>
                                            <input class="form-control" type="file" name="image">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Danh mục</label>
                                            <select class="form-control" name="category_id">
                                                <option selected>Chọn danh mục</option>
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label class="form-label">Số lượng</label>
                                            <input class="form-control" type="number" name="quantity" min="1">
                                        </div> --}}

                                        <div class="mb-3">
                                            <label class="form-label">Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Hiển thị</option>
                                                <option value="0">Ẩn</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                                        </div>
                                    </form>

                                    {{-- <div class="mb-3">
                                        <label class="form-label">Biến thể sản phẩm</label>
                                        <div id="variant-wrapper">
                                            <div class="row mb-2 variant-row">
                                                <div class="col-md-4">
                                                    <select class="form-control" name="variants[0][color_id]" required>
                                                        <option value="">Chọn màu sắc</option>
                                                        @foreach ($color as $color)
                                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="variants[0][size_id]" required>
                                                        <option value="">Chọn kích thước</option>
                                                        @foreach ($size as $size)
                                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <input class="form-control" type="number" name="variants[0][quantity]"
                                                        min="1" placeholder="Số lượng" required>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger btn-remove-variant"
                                                        style="display:none;">X</button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success" id="add-variant">+ Thêm biến
                                            thể</button>
                                    </div>

                                    @php
                                        $colorOptions = '';
                                        foreach ($color as $c) {
                                            $colorOptions .= '<option value="' . $c->id . '">' . $c->name . '</option>';
                                        }

                                        $sizeOptions = '';
                                        foreach ($size as $s) {
                                            $sizeOptions .= '<option value="' . $s->id . '">' . $s->name . '</option>';
                                        }
                                    @endphp


                                    @push('scripts')
                                        <script>
                                            let variantIndex = 1;
                                            const colorOptions = `{!! $colorOptions !!}`;
                                            const sizeOptions = `{!! $sizeOptions !!}`;

                                            document.getElementById('add-variant').onclick = function() {
                                                let wrapper = document.getElementById('variant-wrapper');
                                                let row = document.createElement('div');
                                                row.className = 'row mb-2 variant-row';
                                                row.innerHTML = `

                                                <div class="col-md-4">
                                                    <select class="form-control" name="variants[${variantIndex}][color_id]" required>
                                                        <option value="">Chọn màu sắc</option>
                                                        ${colorOptions}
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <select class="form-control" name="variants[${variantIndex}][size_id]" required>
                                                        <option value="">Chọn kích thước</option>
                                                        ${sizeOptions}
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <input class="form-control" type="number" name="variants[${variantIndex}][quantity]" min="1" placeholder="Số lượng" required>
                                                </div>

                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger btn-remove-variant">X</button>
                                                </div>
                                            `;
                                                wrapper.appendChild(row);
                                                variantIndex++;
                                                updateRemoveButtons();
                                            };

                                            function updateRemoveButtons() {
                                                let buttons = document.querySelectorAll('.btn-remove-variant');
                                                buttons.forEach(btn => {
                                                    btn.style.display = buttons.length > 1 ? 'block' : 'none';
                                                    btn.onclick = function() {
                                                        btn.closest('.variant-row').remove();
                                                        updateRemoveButtons();
                                                    }
                                                });
                                            }
                                            updateRemoveButtons();
                                        </script>
                                    @endpush --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
