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
                                    @foreach ($orders as $order)
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">TÊN KHÁCH HÀNG</span>
                                            <span class="m-invoice__text">{{$order->customer->name}}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">SỐ ĐIỆN THOẠI</span>
                                            <span class="m-invoice__text">{{$order->customer->phone}}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">GHI CHÚ</span>
                                            <span class="m-invoice__text">
                                                @if ($order->note == null)
                                                    Không có ghi chú!
                                                @else
                                                    {{$order->note}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
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
                                                @foreach ($orders as $order)
                                                    <td>{{$order->start_at}}</td>
                                                    <td>{{$order->number_person}}</td>
                                                    <td>
                                                        @foreach ($services as $key => $service)
                                                            {{$service->name}} <br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($staffs as $key => $staff)
                                                            {{$staff->name}} <br>
                                                        @endforeach
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
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