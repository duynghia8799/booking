@extends('admin.layout.master')
@section('title-page')
	Chi tiết lịch hẹn
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
                        <a class="m-nav__link" href="{{route('order.index')}}">
                            <span class="m-nav__link-text">
                                Danh sách lịch hẹn
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a class="m-nav__link" href="">
                            <span class="m-nav__link-text">
                                Chi tiết lịch hẹn
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
            <div class="col-md-12">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="flaticon-list-3">
                                    </i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Chi tiết lịch hẹn
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head" style="background-image: url(../../assets/app/media/img//logos/bg-6.jpg);">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="m-invoice__logo">
                                        <a class="text-left">
                                            <h1>Lịch hẹn</h1>
                                        </a>
                                    </div>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">TÊN KHÁCH HÀNG</span>
                                            <span class="m-invoice__text">{{$orders->customer->name}}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">SỐ ĐIỆN THOẠI</span>
                                            <span class="m-invoice__text">{{$orders->customer->phone}}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">GHI CHÚ DỊCH VỤ THÊM</span>
                                            <span class="m-invoice__text">
                                                @if ($orders->note == null)
                                                    Không có ghi chú!
                                                @else
                                                    @foreach($choose as $value)
                                                        {{$value}} <br>
                                                    @endforeach 
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-invoice__body m-invoice__body--centered">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Thời gian đến</th>
                                                <th>Số người đi cùng</th>
                                                <th>Dịch vụ</th>
                                                <th>Nhân viên</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Ngày {{date('d/m/Y', strtotime($orders->start_at))}} vào lúc {{date('H:i:s', strtotime($orders->start_at))}}
                                                </td>
                                                <td>
                                                    @if ($orders->number_person == null)
                                                        Trên 10 người
                                                    @else
                                                        {{$orders->number_person}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($services as $key => $service)
                                                        {{$service->name}} <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($staffs != '')
                                                        @foreach ($staffs as $key => $staff)
                                                            {{$staff->name}} <br>
                                                        @endforeach
                                                    @else 
                                                        Chưa chọn
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{route('order.index')}}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                            <div class="m-invoice__footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->
@endsection