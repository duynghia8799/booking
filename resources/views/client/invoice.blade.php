<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Lịch sử đặt</title>
	<link href="{{asset('/template/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('/template/metronic/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('/template/metronic/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<style>
		body {
			background: url('/images/bg_body.jpg');
    		background-repeat: no-repeat;
    		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
		}
		#wrapper {
			width: 60%;
			height: 100vh;
		    margin: 5% auto;
		    
		}
		.form-booking {
			width: 100%;
			display: flex;
		    flex-direction: column;
		    align-items: center;
			justify-content: center;
		}
		.title {
			padding: 20px 0;
			text-align: center;
			text-transform: uppercase;
		}
		form {
			width: 100%;
		}
		#wrapper .form-booking form .m-checkbox-list .m-checkbox {
			display: inline-block;
			padding-right: 20px;
		}
		#wrapper .form-booking form .m-checkbox-list .m-checkbox:last-child {
			padding-right: 0;
		}
		.m-form .m-form__group {
			padding-bottom: 0;
		    padding-top: 0;
		}
		.m-form.m-form--fit .m-form__content, .m-form.m-form--fit .m-form__group, .m-form.m-form--fit .m-form__heading {
			padding-left: 0;
			padding-right: 0;
		}
		.m-form .m-form__actions {
			padding: 30px 0;
		}
		@media only screen and (max-width: 768px) {
			#wrapper {
				width: 90%;
			}
			.m-portlet .m-portlet__body {
				padding: 0;
			}
		}
	</style>
</head>
<body>
	<div id="wrapper">
		@if (isset($orders))
			<div class="form-booking">
				<div class="m-content" style="width: 100%;">
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
			                                Số người đi cùng bạn
			                            </th>
			                            <th>
			                                Thời gian bắt đầu bạn đã chọn
			                            </th>
			                            <th>
			                                Ghi chú bạn để lại
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
			                                    @if ($order->number_person == null)
                                                    0
                                                @else
                                                    {{$order->number_person}}
                                                @endif
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
			                                    <div class="dropdown">
			                                        <span aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">
			                                            <i class="flaticon-folder">
			                                            </i>
			                                        </span>
			                                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -125px, 0px);" x-placement="top-start">
			                                            <a class="dropdown-item" href="{{route('invoice',$order->id)}}">
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
                        	<a style="margin-bottom: 3rem;" class="btn btn-secondary" href="{{route('homepage')}}">Quay lại đặt lịch</a>
			            </div>
			        </div>
			        <!-- END EXAMPLE TABLE PORTLET-->
			    </div>
			</div>
		@else
		<div class="form-booking">
			<div class="m-content" style="width: 100%;">
				<h3 class="m-portlet__head-text">
	                Không có dữ liệu
	            </h3>
	        </div>
        </div>
		@endif
	</div>
	<script src="{{asset('/template/metronic/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('/template/metronic/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('/template/metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
	<script>
    @if(session('success'))
        swal('{{ session('success') }}', '', 'success');
    @endif
    @if(session('error'))
    swal('{{ session('error') }}', '', 'error');
    @endif
	</script>
</body>
</html>