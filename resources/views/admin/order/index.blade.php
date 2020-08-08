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
                <!--begin: Search Form -->
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="form-group m-form__group">
                                        <label for="searchByStatus">
                                            Trạng thái:
                                        </label>
                                        <select class="form-control m-input m-input--solid" name="searchByStatus" id="searchByStatus">
                                            <option value="">
                                                All
                                            </option>
                                            @foreach ($status as $key => $value)
                                            <option value="{{$key}}">
                                                {{$value}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Search Form -->
                <!--begin: Datatable -->
                <table id="orders" class="table table-striped- table-bordered table-hover table-checkable" id="levels" style="width:100%">
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
        var dataTable = $('#orders').DataTable({
            processing: true,
            serverSide: true,
            language: {
                processing: "<div class='text-center' id='loader'><h4>ĐANG TẢI...</h4></div>"
            },
            
            ajax: {
                url:'{{route('order.datatables')}}',
                type: 'GET',
                data: function (e) {
                    e.searchByStatus = $('#searchByStatus').val();
                    console.log($('#searchByStatus').val());
                }
            },
            columns: [
                { data: 'name_customer', name: 'name_customer' },
                { data: 'phone_customer', name: 'phone_customer' },
                { data: 'start_at', name: 'start_at' },
                { data: 'note', name: 'note' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ],
        });
        $('#searchByStatus').change(function(){
            dataTable.draw(true);
            console.log('zo');
        });
    });
</script>
@endsection