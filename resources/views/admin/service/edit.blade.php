@extends('admin.layout.master')
@section('title-page')
	Chỉnh sửa thông tin dịch vụ
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
                        <a class="m-nav__link" href="{{route('service.index')}}">
                            <span class="m-nav__link-text">
                                Danh sách dịch vụ
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a class="m-nav__link" href="{{route('service.edit',$service->id)}}">
                            <span class="m-nav__link-text">
                                Chỉnh sửa thông tin dịch vụ
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
                                    Chỉnh sửa thông tin dịch vụ
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--tab">
                        <form action="{{route('service.update',$service->id)}}" class="m-form m-form--fit m-form--label-align-right" method="post">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Những trường có dấu (*) là những trường bắt buộc
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="name">
                                        Tên dịch vụ
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <input class="form-control m-input" id="name" name="name" placeholder="Nhập tên trình độ" type="text" value="{{ $service->name }}">
                                    </input>
                                    @if ($errors->has('name'))
                                        <p class="text-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="description">
                                        Mô tả ngắn
                                    </label>
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description" name="description" rows="4" value="{{ old('description') }}">{{ $service->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <p class="text-danger">
                                            {{ $errors->first('description') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="status">
                                        Trạng thái dịch vụ
                                    </label>
                                    <select name="status" id="status" class="form-control m-input">
                                        @foreach($status as $key => $item)
                                            <option value="{{$key}}"
                                                @if ($key === $service->status)
                                                    selected 
                                                @endif
                                            >{{$item}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('description'))
                                        <p class="text-danger">
                                            {{ $errors->first('description') }}
                                        </p>
                                    @endif
                                </div>
                                <input type="hidden" name="id" value="{{ $service->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <button class="btn btn-primary" type="submit">
                                                    Cập nhật
                                                </button>
                                                <button class="btn btn-danger" type="reset">
                                                    Hủy
                                                </button>
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