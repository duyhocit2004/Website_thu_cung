@extends('admin.layout.index')

@section('main')
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-sm-6">
                <h3>Cập nhật màu sắc</h3>
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
                                    <form class="theme-form" method="POST" action="{{ route('color.update', $color->id) }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label" for="first-name">Tên màu sắc</label>
                                            <input class="form-control" type="text" name="name" value="{{ $color->name }}">
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
