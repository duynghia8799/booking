@extends('admin.layout.master')
@section('title-page')
	Danh sách khách hàng
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
                            Tất cả các khách hàng
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Search Form -->
                <div class="m-form m-form--label-align-left m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-4 order-1 order-xl-2 m--align-left">
                            <a class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air" href="{{route('customer.updateCode')}}">
                                <span>
                                    <i class="flaticon-cancel">
                                    </i>
                                    <span>
                                        Hủy mã code khách hàng
                                    </span>
                                </span>
                            </a>
                            <div class="m-separator m-separator--dashed d-xl-none">
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Search Form -->
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="levels" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                Họ và tên khách
                            </th>
                            <th>
                                Số điện thoại
                            </th>
                            <th>
                                Mã Code
                            </th>
                            <th>
                                Tùy chọn
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <span style="text-transform: uppercase;">
                                        {{$customer -> name}}
                                    </span>
                                </td>
                                <td>
                                    {{$customer -> phone}}
                                </td>
                                <td>
                                	@if ($customer -> code != null)
										<p class="text-success">{{$customer -> code}}</p>
                                	@else
										<p class="text-danger">Chưa có mã code</p>
                                	@endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <span aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
                                            <i class="flaticon-folder">
                                            </i>
                                        </span>
                                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -125px, 0px);" x-placement="top-start">
                                            <a class="dropdown-item" href="{{route('customer.edit',$customer->id)}}">
                                                <i class="la la-edit text-success">
                                                </i>
                                                Tạo/Hủy mã code
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
            title: 'Bạn có chắc chắn muốn xóa khách hàng này không?',
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