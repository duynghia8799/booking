@extends('admin.layout.master')
@section('title-page')
	Chỉnh sửa mã code khách hàng
@endsection
@section('content-page')
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a class="m-nav__link m-nav__link--icon" href="{{route('dashboard')}}">
                            <i class="m-nav__link-icon la la-home">
                            </i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a class="m-nav__link" href="{{route('customer.index')}}">
                            <span class="m-nav__link-text">
                                Danh sách khách hàng
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a class="m-nav__link" href="{{route('customer.edit',$customer->id)}}">
                            <span class="m-nav__link-text">
                                Chỉnh sửa mã code khách hàng
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-md-6">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="flaticon-list-3">
                                    </i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Chỉnh sửa mã code khách hàng
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--tab">
                        <form action="{{route('customer.update',$customer->id)}}" class="m-form m-form--fit m-form--label-align-right" method="post">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="code">
                                        Mã code
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <input class="form-control m-input" id="code" name="code" placeholder="Chưa có thì nhập mới, nếu muốn hủy thì xóa đi và lưu lại" type="text" value="{{ $customer->code }}">
                                    </input>
                                    @if ($errors->has('code'))
                                        <p class="text-danger">
                                            {{ $errors->first('code') }}
                                        </p>
                                    @endif
                                </div>
                                <input type="hidden" name="id" value="{{ $customer->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <button class="btn btn-primary" type="submit">
                                                    Lưu lại
                                                </button>
                                                <a href="{{route('customer.index')}}" class="btn btn-danger">Quay lại</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->
@endsection