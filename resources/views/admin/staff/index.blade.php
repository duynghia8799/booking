@extends('admin.layout.master')
@section('title-page')
	Danh sách nhân viên
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
                                Danh sách nhân viên
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
                            Tất cả nhân viên
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
                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                            <a class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air" href="{{route('staff.create')}}">
                                <span>
                                    <i class="flaticon-add">
                                    </i>
                                    <span>
                                        Thêm mới
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
                <table class="table table-striped- table-bordered table-hover table-checkable" id="staffs" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                Tên nhân viên
                            </th>
                            <th>
                                Mô tả ngắn
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
        var dataTable = $('#staffs').DataTable({
            processing: true,
            serverSide: true,
            language: {
                processing: "<div id='loader'><h4>ĐANG TẢI...</h4></div>"
            },
            
            ajax: {
                url:'{{route('staff.datatables')}}',
                type: 'GET',
                data: function (e) {
                    e.searchByStatus = $('#searchByStatus').val();
                    console.log(e.searchByStatus);
                }
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ],
            drawCallback: function( settings ) {
                $('#staffs tbody #deleteStaff').on('click', function () {
                    var removeUrl = $(this).attr('linkurl');
                    swal({
                        title: 'Bạn có chắc chắn muốn xóa nhân viên này không?',
                        text: "Sau khi xóa bạn sẽ không thể khôi phục lại dữ liệu",
                        type: 'warning',
                        showCancelButton: !0,
                        cancelButtonColor: '#dc3545',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy',
                        dangerMode: true
                    }).then((willDelete) => {
                        if (willDelete.value) {
                            $.ajax({
                                url: removeUrl,
                                type: "POST",
                                dataType: "JSON",
                                success: function(resp){
                                    console.log('resp');
                                    setTimeout(function() {
                                        $('#staffs').DataTable().ajax.reload();
                                        swal('Xóa thành công!','','success');
                                    },2000);
                                }
                            })
                        }
                    });
                });
            }
        });
        $('#searchByStatus').change(function(){
            dataTable.draw(true);
        });
    });
</script>
@endsection