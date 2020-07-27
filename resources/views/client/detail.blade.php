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
			background-size: cover;
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
		}
		form {
			width: 100%;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		@if(isset($orders))
		<div class="m-content">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="m-portlet m-portlet--mobile">
	                    <div class="m-invoice-2">
	                        <div class="m-invoice__wrapper">
	                            <div class="m-invoice__head" style="background-image: url(../../assets/app/media/img//logos/bg-6.jpg);">
	                                <div class="m-invoice__container m-invoice__container--centered">
	                                    <div class="m-invoice__logo" style="padding-top: 3rem;">
	                                        <a class="text-left">
	                                            <h1>Lịch hẹn</h1>
	                                        </a>
	                                    </div>
	                                    @foreach ($orders as $order)
	                                    <div class="m-invoice__items">
	                                        <div class="m-invoice__item">
	                                            <span class="m-invoice__subtitle">TÊN BẠN DÙNG ĐĂNG KÝ</span>
	                                            <span class="m-invoice__text">{{$order->customer->name}}</span>
	                                        </div>
	                                        <div class="m-invoice__item">
	                                            <span class="m-invoice__subtitle">SỐ ĐIỆN THOẠI BẠN DÙNG ĐĂNG KÝ</span>
	                                            <span class="m-invoice__text">{{$order->customer->phone}}</span>
	                                        </div>
	                                        <div class="m-invoice__item">
	                                            <span class="m-invoice__subtitle">GHI CHÚ BẠN ĐỂ LẠI</span>
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
	                                                <th>Thời gian bắt đầu</th>
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
	                        </div>
	                    </div>
	                </div>
	            </div>
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