@extends('admin.layout.master')
@section('title-page')
    Chỉnh sửa thông tin cơ bản
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
                        <a class="m-nav__link" href="{{route('setting')}}">
                            <span class="m-nav__link-text">
                                Chỉnh sửa thông tin cơ bản
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
                                    Chỉnh sửa thông tin cơ bản
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--tab">
                        <form action="{{route('setting.update', $inforWeb->id)}}" class="m-form m-form--fit m-form--label-align-right" method="post">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="email">
                                        Email nhận thông báo đặt lịch
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <input class="form-control m-input" id="email" name="email" placeholder="Nhập email" type="text" value="{{ old('email', $inforWeb->email) }}">
                                    </input>
                                    @if ($errors->has('email'))
                                        <p class="text-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="hotline">
                                        Hotline
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <input class="form-control m-input" id="hotline" name="hotline" placeholder="Nhập số điện thoại" type="text" value="{{ old('hotline', $inforWeb->hotline) }}">
                                    </input>
                                    @if ($errors->has('hotline'))
                                        <p class="text-danger">
                                            {{ $errors->first('hotline') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="address">
                                        Địa chỉ
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="address" name="address" rows="4" value="{{ old('address') }}">{{ $inforWeb->address }}</textarea>
                                    @if ($errors->has('address'))
                                        <p class="text-danger">
                                            {{ $errors->first('address') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="time_open">
                                        Thời gian mở cửa
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="time_open" name="time_open" rows="4" value="{{ old('address') }}">{{ $inforWeb->time_open }}</textarea>
                                    @if ($errors->has('time_open'))
                                        <p class="text-danger">
                                            {{ $errors->first('time_open') }}
                                        </p>
                                    @endif
                                </div>
                                 <div class="form-group m-form__group">
                                    <label for="google_map">
                                        Google Map
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="google_map" name="google_map" rows="4" value="{{ old('google_map') }}">{{ $inforWeb->google_map }}</textarea>
                                    @if ($errors->has('google_map'))
                                        <p class="text-danger">
                                            {{ $errors->first('google_map') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="link_fb">
                                        Link Facebook
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>
                                    <input class="form-control m-input" id="link_fb" name="link_fb" placeholder="Nhập số điện thoại" type="text" value="{{ old('link_fb', $inforWeb->link_fb) }}">
                                    </input>
                                    @if ($errors->has('link_fb'))
                                        <p class="text-danger">
                                            {{ $errors->first('link_fb') }}
                                        </p>
                                    @endif
                                </div>
                                <input type="hidden" name="id" value="{{$inforWeb->id}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <button class="btn btn-primary" type="submit">
                                                    Lưu lại
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