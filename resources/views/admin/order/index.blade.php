@extends('admin.layout.master')
@section('title-page')
	Danh sách lịch hẹn
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
                        <a class="m-nav__link" href="{{route('staff.index')}}">
                            <span class="m-nav__link-text">
                                Danh sách các lịch hẹn
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-list-2">
                            </i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Tất cả lịch hẹn
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="levels" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                Khách hàng
                            </th>
                            <th>
                                Số điện thoại
                            </th>
                            <th>
                                Thời gian hẹn
                            </th>
                            <th>
                                Ghi chú
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>
                                Tùy chọn
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <span style="text-transform: uppercase;" class="text-success">
                                        {{$order->customer->name}}
                                    </span>
                                </td>
                                <td>
                                    {{$order->customer->phone}}
                                </td>
                                <td>
                                    Ngày {{date('d/m/Y', strtotime($order->start_at))}} vào lúc {{date('H:i:s', strtotime($order->start_at))}}
                                </td>
                                <td>
                                	@if ($order->note == null)
                                        Không có ghi chú!
                                    @else
                                        {{$order->note}}
                                    @endif
                                </td>
                                <td>
                                    @if ($order -> status == config('common.status.active'))
                                        <p class="text-success">Đã xác nhận</p>
                                    @else
                                        <p class="text-danger">Chưa xác nhận</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <span aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
                                            <i class="flaticon-folder">
                                            </i>
                                        </span>
                                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -125px, 0px);" x-placement="top-start">
                                            <a class="dropdown-item" href="{{route('order.update',$order->id)}}">
                                                <i class="flaticon-interface-1 text-success">
                                                </i>
                                                Xác nhận duyệt
                                            </a>
                                            <a class="dropdown-item" href="{{route('order.detail',$order->id)}}">
                                                <i class="la la-edit text-success">
                                                </i>
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- end:: Body -->
@endsection
@section('script')
<script>
    $('.btn-remove').on('click', function(){
        var removeUrl = $(this).attr('linkurl');
        swal({
            title: 'Bạn có chắc chắn muốn xóa nhân viên này không?',
            text: "Sau khi xóa, bạn sẽ không thể khôi phục lại dữ liệu!",
            type: 'warning',
            showCancelButton: !0,
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy',
            dangerMode: true
        }).then((result) => {
            if (result.value) {
                window.location.href = removeUrl;
            }
        });
    });
</script>
@endsection