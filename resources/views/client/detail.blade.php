<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Lịch sử đặt chi tiết</title>
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
	                                            <h1>Lịch sử đặt lịch chi tiết</h1>
	                                        </a>
	                                    </div>
	                                    <div class="m-invoice__items">
	                                        <div class="m-invoice__item">
	                                            <span class="m-invoice__subtitle">HỌ VÀ TÊN</span>
	                                            <span class="m-invoice__text">{{$orders->customer->name}}</span>
	                                        </div>
	                                        <div class="m-invoice__item">
	                                            <span class="m-invoice__subtitle">SỐ ĐIỆN THOẠI</span>
	                                            <span class="m-invoice__text">{{$orders->customer->phone}}</span>
	                                        </div>
	                                        <div class="m-invoice__item">
	                                            <span class="m-invoice__subtitle">GHI CHÚ</span>
	                                            <span class="m-invoice__text">
	                                                @if ($orders->note == null)
	                                                    Không có ghi chú!
	                                                @else
	                                                    {{$orders->note}}
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
	                                                <th>Thời gian hẹn</th>
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
		                                                    0
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
                                                        @foreach ($staffs as $key => $staff)
                                                            {{$staff->name}} <br>
                                                        @endforeach
                                                    </td>
	                                            </tr>
	                                        </tbody>
	                                    </table>
	                                </div>
	                            	<a style="margin-bottom: 3rem;" class="btn btn-primary" href="{{route('re-booking',$orders->id)}}">Đặt lại lịch này</a>
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