@extends('admin.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Thêm danh mục</h3>
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
                                    <form class="theme-form" method="POST" action="{{ route('category.store') }}">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="first-name">Tên danh mục</label>
                                            <input class="form-control" id="first-name" type="text" name="name" placeholder="Tên danh mục"
                                                aria-label="Tên danh mục">
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
