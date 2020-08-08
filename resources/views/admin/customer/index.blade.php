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
                <table class="table table-striped- table-bordered table-hover table-checkable" id="customers" style="width:100%">
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        var dataTable = $('#customers').DataTable({
            processing: true,
            serverSide: true,
            language: {
                processing: "<div id='loader'><h4>ĐANG TẢI...</h4></div>"
            },
            
            ajax: {
                url:'{{route('customer.datatables')}}',
                type: 'GET',
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'phone', name: 'phone' },
                { data: 'code', name: 'code' },
                { data: 'action', name: 'action' }
            ],
        });
    });
</script>
@endsection