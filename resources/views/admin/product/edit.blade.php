@extends('admin.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Cập nhật sản phẩm</h3>
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
                                    <form class="theme-form" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label class="form-label">Tên sản phẩm</label>
                                            <input class="form-control" type="text" name="name" value="{{ $product->name }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Giá</label>
                                            <input class="form-control" type="number" name="price" value="{{ $product->price }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mô tả</label>
                                            <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ảnh</label>
                                            <input class="form-control" type="file" name="image" accept="image/*">
                                            @if ($product->image)
                                                <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                                            @else
                                                <p class="text-muted">Không có ảnh sản phẩm</p>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Danh mục</label>
                                            <select class="form-control" name="category_id">
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label class="form-label">Số lượng</label>
                                            <input class="form-control" type="number" name="quantity" min="1" value="{{ $product->quantity }}">
                                        </div> --}}

                                        <div class="mb-3">
                                            <label class="form-label">Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Còn hàng</option>
                                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Hết hàng</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Cập nhật</button>
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
