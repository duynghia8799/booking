<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Đặt lịch</title>
	<link href="{{asset('/template/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

	<link href="{{asset('/template/metronic/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

	<link href="{{asset('/template/metronic/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link rel="icon" href="https://massagetamsen.vn/wp-content/uploads/2018/08/favicon-massage-tam-sen.png" type="image/png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js">
	<style>
		body {
			font-size: 14px;
			font-family: Arial, Helvetica, sans-serif;
			color: white;
		}

		.row {
			margin: 0px;
		}

		.w-100 {
			width: 100%;
		}

		.text-muted {
			color: gray !important;
		}

		.wrapper {
			width: 1200px;
			max-width: 100%;
			margin: 0 auto;
		}

		a {
			font-weight: 600;
		}

		a:hover {
			text-decoration: none;
		}

		.logo a img {
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 160px;
			max-width: 100%;
		}

		.header {
			background-color: white;
			display: flex;
		}

		.header a {
			font-size: 16px;
			text-align: center;
			padding: 15px;
			padding-top: 25px;
			width: 50%;
			text-decoration: none;
			color: white;
			border: white solid 1px;
		}

		.header a:hover {
			transition: all ease 1s;
			background-color: #F67538;
		}

		.header a.left {
			border-bottom-left-radius: 18px;
			border-right: white 1px solid;
		}

		.header a.right {
			border-left: white 1px solid;
			border-bottom-right-radius: 18px;
		}

		.content {
			width: 100%;
			min-height: 500px;
			border-top: white solid 2px;
			border-top-left-radius: 18px;
			border-top-right-radius: 18px;
			padding-bottom: 10px;
		}

		.step-wrapper {
			margin: 16px;
			margin-top: 25px;
		}

		.step-title {
			font-size: 20px;
			margin-top: 20px !important;
		}

		.form-group {
			margin: 10px;
		}

		.form-control {
			border-radius: 25px;
		}

		.btn-styled {
			font-weight: 600;
			padding: 10px;
			border: white solid 1px;
			margin: 15px;
			border-radius: 25px;
		}

		.btn-styled:hover {
			transition: all ease 1s;
		}

		.btn-action-step-1 {
			color: white;
			background-color: #B44025;
		}

		.btn-action-step-1:hover {
			color: #B44025;
			background-color: white;
		}

		.white-divide {
			height: 2px;
			width: 70%;
			margin: 0 auto;
			margin-top: 20px;
			margin-bottom: 25px;
			background-color: white;
		}

		.treatment,
		.staff {
			background-color: white;
			color: #F57132;
			margin: 5px 2px;
			border-radius: 30px;
			font-weight: 700;
			cursor: pointer;
			border: white solid 1px;
			padding: 6px;
		}

		.treatment.choosen,
		.staff.choosen {
			background-color: #00AEEF;
			color: white;
			border: white solid 1px;
		}

		.treatment span,
		.staff span {
			display: block;
		}

		.action-direct-step .float-left {
			position: absolute;
			bottom: 18px;
			left: 10px;
		}

		.action-direct-step .float-right {
			position: absolute;
			bottom: 18px;
			right: 10px;
		}

		.action-direct-step a {
			background-color: #00AEEF;
			color: white;
			border: white solid 1px;
			width: 100px;
			text-align: center;
			margin: 2px;
		}

		.bg-ts {
			background-color: #F26522;
		}

		.bg-black {
			background-color: #3C2415 !important;
		}

		.text-ts {
			color: #F26522;
		}


		.footer {
			border-top: white solid 2px;
		}

		.hotline {
			background-color: #00AEEF;
			color: white;
			border: white solid 1px;
			width: 100px;
		}

		iframe {
			max-width: 100%;
			height: 200px;
		}

		.fb-link a img {
			width: 32px;
			margin: 5px;
		}

		.confirm-item {
			font-weight: 400;
		}

		.border-bottom-ts {
			border-bottom: #F26522 solid 1px;
		}

		.dotted-border-bottom-ts {
			border-bottom: #F26522 dotted 1px;
		}

		.border-top-ts {
			border-top: #F26522 solid 1px;
		}

		.success-section .success-section-wrapper {
			margin-top: 40px;
			height: auto;
			padding: 20px 0px;
		}
	</style>
</head>

<body>
	<div class="row m-0">
		<div class="col-12 col-md-3 logo">
			<a href="https://massagetamsen.vn/"><img src="{{ asset(config('common.image.logo')) }}" alt="Logo" /></a>
		</div>
		<div class="col-12 col-md-6 p-0">
			<div class="header">
				<a class="left bg-ts" href="https://massagetamsen.vn/">Giới thiệu</a>
				<a class="right bg-ts" href="https://massagetamsen.vn/dich-vu-va-bang-gia/">Bảng giá</a>
			</div>
			<div class="content bg-ts">
				<div class="order-section">
					<!-- first step -->
					<div class="step step-1" data-step="1">
						<div class="step-wrapper">
							<div class="text-center m-3 step-title">
								NHẬP SỐ ĐIỆN THOẠI CỦA BẠN
							</div>
							<div class="row">
								<div class="col-12 col-md-8 offset-md-2">
									<div class="form-group">
										<input type="text" class="form-control" id="data-phone" name="data-phone" placeholder="VD: 0985 XXX XXX" value="0974081997">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-md-8 offset-md-2">
									<div class="form-group">
										<input type="text" class="form-control" id="data-code" name="data-code" placeholder="Giành cho xem lịch sử">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-md-8 offset-md-2">
									<div class="d-flex text-center">
										<a class="flex-fill btn-styled btn-action-step-1 next-step" href="javascript:void(0)">ĐẶT LỊCH MỚI</a>
										<a class="flex-fill btn-styled btn-action-step-1 view-history" href="javascript:void(0)">LỊCH ĐÃ ĐẶT</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- choose service step -->
					<div class="step step-2 d-none" data-step="2">
						<div class="step-wrapper">
							<div class="row">
								<div class="col-6 col-md-5 offset-md-1">
									<label for="fullname">HỌ TÊN</label>
								</div>
								<div class="col-6 col-md-5">
									<label for="partner">SỐ NGƯỜI</label>
								</div>
							</div>
							<div class="row">
								<div class="col-6 col-md-5 offset-md-1">
									<input type="text" class="form-control" id="data-fullname" name="data-fullname" value="Nguyễn Văn Mạnh">
								</div>
								<div class="col-6 col-md-5">
									<input type="text" class="form-control" id="data-partner" name="data-partner" value="8">
								</div>
							</div>
						</div>
						<div class="white-divide">
						</div>
						<div class="step-wrapper mt-0">
							<div class="text-center step-title">
								<b>CHỌN LIỆU TRÌNH </b>
							</div>
							<div class="treatments text-center">
								@if (sizeof($services)>0)
								<div class="d-flex">
									<div class="treatment flex-fill" data-id="{{$services[0]->id}}">
										<span>{{$services[0]->name}}</span>
										<small>{{$services[0]->description}}</small>
									</div>
								</div>
								@endif
								<div class="d-flex">
									@if (sizeof($services)>1)
									<div class="treatment flex-fill" data-id="{{$services[1]->id}}">
										<span>{{$services[1]->name}}</span>
										<small>{{$services[1]->description}}</small>
									</div>
									@endif
									@if (sizeof($services)>2)
									<div class="treatment flex-fill" data-id="{{$services[2]->id}}">
										<span>{{$services[2]->name}}</span>
										<small>{{$services[2]->description}}</small>
									</div>
									@endif
								</div>
								@if (sizeof($services)>3)
								<div class="d-flex">
									@foreach ($services as $service)
									@if ($loop->index>2)
									<div class="treatment flex-fill" data-id="{{$service->id}}">
										<span>{{$service->name}}</span>
										<small>{{$service->description}}</small>
									</div>
									@endif
									@if (($loop->index+1)%3==0)
								</div>
								<div class="d-flex">
									@endif
									@endforeach
								</div>
								@endif
							</div>
						</div>
						<div class="white-divide mb-0">
						</div>
						<div class="step-wrapper" style="margin-bottom: 70px;">
							<div class="text-center step-title m-0 mb-1">
								<b>DỊCH VỤ THÊM</b>
							</div>
							<div class="treatments text-center">
								<div class="d-flex">
									@foreach ($extraservices as $extraservice)
									<div class="treatment flex-fill" data-id="{{$extraservice->id}}">
										<span>{{$extraservice->name}}</span>
										<small>{{$extraservice->description}}</small>
									</div>
									@if (($loop->index+1)%3==0)
								</div>
								<div class="d-flex">
									@endif
									@endforeach
								</div>
							</div>
						</div>
						<div class="action-direct-step clearfix">
							<div class="float-left">
								<b style="font-size: 18px; font-weight: 900;">&lt;&lt;</b>
								<a class="flex-fill btn-styled previous-step" href="javascript:void(0)">QUAY LẠI</a>
							</div>
							<div class="float-right">
								<a class="flex-fill btn-styled next-step" href="javascript:void(0)">CHỌN TIẾP</a>
								<b style="font-size: 18px; font-weight: 900;">&gt;&gt;</b>
							</div>
						</div>
					</div>
					<!-- end choose service step -->
					<!-- choose time step -->
					<div class="step step-3 d-none" data-step="3">
						<div class="step-wrapper">
							<div class="text-center step-title m-0 m-t-3">
								<div class="customer-name"></div>
								<div class="customer-phone"></div>
								<div><small class="number-partner"></small></div>
							</div>
							<div class="white-divide"></div>
							<div class="text-center step-title m-0 m-t-3">
								CHỌN THỜI GIAN
							</div>

							<div class="row">
								<div class="col-12 col-md-8 offset-md-2">
									<div class="d-flex text-center">
										<a class="flex-fill btn-styled bg-white text-ts" href="javascript:void(0)" class="date" id="btn-pick-date" data-date-format="yyyy-mm-dd">CHỌN NGÀY</a>
										<a class="flex-fill btn-styled bg-white text-ts" href="javascript:void(0)" id="btn-pick-time">CHỌN GIỜ</a>
									</div>
								</div>
							</div>

							<div class="action-direct-step">
								<div class="float-left">
									<b style="font-size: 18px; font-weight: 900;">&lt;&lt;</b>
									<a class="flex-fill btn-styled previous-step" href="javascript:void(0)">QUAY LẠI</a>
								</div>
								<div class="float-right">
									<a class="flex-fill btn-styled next-step" href="javascript:void(0)">CHỌN TIẾP</a>
									<b style="font-size: 18px; font-weight: 900;">&gt;&gt;</b>
								</div>
							</div>
						</div>
					</div>
					<!-- end choose time step -->

					<!-- choose staffs step -->
					<div class="step step-4 d-none" data-step="4">
						<div class="step-wrapper">
							<div class="text-center step-title m-0 m-t-3">
								<div class="customer-name"></div>
								<div class="customer-phone"></div>
								<div><small class="number-partner"></small></div>
								<div><small class="display-start-at"></small></div>
							</div>
							<div class="white-divide"></div>

							<div class="step-wrapper mt-0">
								<div class="text-center step-title m-0 mt-3 mb-3">
									CHỌN KỸ THUẬT VIÊN
								</div>
								<div class="staffs text-center row">
									<div class="col-12 col-md-10 offset-md-1 p-0">
										<div class="row">
											@foreach ($staffs as $staff)
											<div class="col-4" style="padding: 0px;">
												<div class="staff" data-id="{{$staff->id}}">
													<span style="white-space: nowrap;">{{$staff->name}}</span>
												</div>
											</div>
											@if (($loop->index+1)%3==0)
										</div>
										<div class="row">
											@endif
											@endforeach
										</div>
									</div>
								</div>
							</div>
							<div class="action-direct-step">
								<div class="float-left">
									<b style="font-size: 18px; font-weight: 900;">&lt;&lt;</b>
									<a class="flex-fill btn-styled previous-step" href="javascript:void(0)">QUAY LẠI</a>
								</div>
								<div class="float-right">
									<a class="flex-fill btn-styled next-step" href="javascript:void(0)">CHỌN TIẾP</a>
									<b style="font-size: 18px; font-weight: 900;">&gt;&gt;</b>
								</div>
							</div>
						</div>
					</div>
					<!-- end choose staffs step -->

					<!-- confirm step -->
					<div class="step step-5 d-none" data-step="5">
						<div class="step-wrapper">
							<div class="d-flex justify-content-center ">
								<div class="btn-styled bg-white text-ts mb-0">
									XÁC NHẬN THÔNG TIN
								</div>
							</div>
							<div class="text-center m-0" style="font-size: 20px;">
								<div class="customer-name"></div>
								<div class="customer-phone"></div>
								<div><small class="number-partner"></small></div>
								<div><small class="display-start-at"></small></div>
							</div>
							<div class="row">
								<div class="text-ts col-12 col-md-8 offset-md-2">
									<div class="btn-styled bg-white text-ts p-3 confirm-list">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-8 offset-2 col-md-4 offset-md-4">
									<div class="d-flex text-center">
										<a class="flex-fill btn-styled mb-0 text-white bg-black btn-confirm-order" href="javascript:void(0)">ĐẶT LỊCH</a>
									</div>
									<!-- <div class="text-center"><a class="text-white" href="javascript:void(0)" onclick="changeStep(1)">Quay lại bước 1</a></div> -->
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="text-center" style="color: #FFDFB9;">Bạn có thể</div>
									<div class="text-center">
										<a class="text-white previous-step" href="javascript:void(0)">Quay lại</a>
										<small style="color: #FFDFB9;"> hoặc </small>
										<a class="text-white" href="javascript:void(0)" onclick="changeStep(1)">Quay lại bước 1</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end confirm step -->
				</div>

				<div class="success-section d-none">
					<div class="btn-styled text-center bg-white success-section-wrapper">
						<div class="m-3" style="color: #27AAE1;">CẢM ƠN QUÝ KHÁCH ĐÃ ĐẶT LỊCH</div>
						<div class="text-ts d-block">
							<small class="d-block">Nhân viên tư vấn sẽ liên hệ</small>
							<small>xác nhận lịch hẹn với quý khách trong vòng 15 phút</small>
						</div>
						<div class="text-ts m-2">TÂM SEN HÂN HẠNH PHỤC VỤ</div>
						<div class="row">
							<div class="col-12 col-md-8 offset-md-2">
								<div class="d-flex text-center">
									<a class="flex-fill btn-styled show-order-section btn-action-step-1" href="javascript:void(0)">ĐẶT THÊM LỊCH</a>
									<a style="background-color: #27AAE1;" class="flex-fill btn-styled text-white close-tab" href="javascript:void(0)">XONG</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="history-section" class="d-none">
					<div class="step-wrapper">
						<div class="text-center step-title">
							<b>THÔNG TIN ĐÃ ĐẶT</b>
						</div>
						<div class="text-center m-0" style="font-size: 20px;">
							<div class="history-customer-name"></div>
							<div class="history-customer-phone"></div>
						</div>
						<div class="row">
							<div id="history-list" class="text-ts col-12 col-md-8 offset-md-2">
							</div>
						</div>
						<div class="row">
							<div class="col-8 offset-2 col-md-4 offset-md-4">
								<div class="d-flex text-center">
									<a class="flex-fill btn-styled mb-0 text-white bg-black" href="/">ĐẶT LỊCH MỚI</a>
								</div>
								<!-- <div class="text-center"><a class="text-white" href="javascript:void(0)" onclick="changeStep(1)">Quay lại bước 1</a></div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-3"></div>
	</div>
	<div class="footer bg-ts">
		<div class="wrapper row">
			<div class="col-12 col-md-3 pb-3 row">
				<div class="mt-3 col-7 col-md-12 p-0">
					<div class="text-center"><b>TÌM HIỂU CHÚNG TÔI TRÊN FACEBOOK</b></div>
					<div class="text-center fb-link">
						<a href="https://massagetamsen.vn">
							<img src="{{asset('/template/metronic/assets/app/media/img/icons/fb-logo.webp')}}" alt=""></a>
						<a href="https://massagetamsen.vn"><img src="{{asset('/template/metronic/assets/app/media/img/icons/fb-logo.webp')}}" alt=""></a>
					</div>
				</div>
				<div class="text-center mt-3 col-5 col-md-12 p-0">
					<div class="mb-3">
						<b>HOTLINE HỖ TRỢ</b>
					</div>
					<a href="tel:0929358668" class="hotline btn-styled m-0">092&nbsp;935&nbsp;86&nbsp;68</a>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="mt-3 mb-1">
					<div class="text-center m-2"> <b>CHỈ ĐƯỜNG TRÊN GOOGLE MAP</b> </div>
					<div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.95238074428!2d105.765692615535!3d21.034591284403266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454be50f7894d%3A0x77ace9a6cc7e867!2sA2%20Vinhomes%20Gardenia!5e0!3m2!1sen!2s!4v1596635329515!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-3 pb-3">
				<div class="mt-3 mb-1">
					<b>TRUNG TÂM CHĂM SÓC SỨC KHOẺ TÂM SEN</b><br /><br />
					Địa chỉ<br />
					Biệt thự B15-9 Vinhomes Gardenia,<br />
					P. Cầu Diễn, Q Nam Từ Liêm, Hà Nội<br /><br />
					Giờ mở cửa:<br />
					10:00 ~ 22:00 (từ thứ 2 đến thứ 6)<br />
					09:00 ~ 22:00 (thứ 7 và chủ nhật)<br />
				</div>
			</div>
		</div>
	</div>
	<form class="text-ts" action="{{route('booking')}}" method="post" id="form-booking">
		@csrf
		<input id="phone" name="phone">
		<input id="partner" name="partner">
		<input id="fullname" name="fullname">
		<input class="form-control" id="start_at" name="start_at">
		@foreach($staffs as $staff)
		<input class="staff" type="checkbox" value="{{$staff->id}}" data-name="{{$staff->name}}" name="staff[]">{{$staff->name}}<br />
		@endforeach<br />
		@foreach($services as $service)
		<input class="service" type="checkbox" value="{{$service->id}}" data-name="{{$service->name}}" name="service[]">{{$service->name}}<br />
		@endforeach
	</form>
	<form class="d-none" action="{{route('history')}}" method="post" id="form-history">
		@csrf
		<input type="hidden" id="phone_history" name="phone_history">
		<input type="hidden" id="code_history" name="code_history">
	</form>
	<script src="{{asset('/template/metronic/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('/template/metronic/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
	<script src="{{asset('/template/metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
	<script>
		$('.btn-confirm-order').on('click', function() {
			$('#form-booking').submit();
		});
		$('.view-history').on('click', function() {
			var phone = $('#data-phone').val();
			phone = phone.replace(/ /g, '');
			if (/^\d{3}-?\d{3}-?\d{4}$/g.test(phone)) {
				$('#phone_history').val(phone);
			} else {
				$('#phone_history').focus();
				alert('Vui lòng nhập số điện thoại!')
				return;
			}
			var data = {};
			data['phone_history'] = phone;
			data['data-code'] = $('#data-code').val();
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: 'http://localhost:5035/public/json-history',
				type: 'POST',
				data: JSON.stringify(data),
				contentType: 'application/json',
				success: function(result) {
					if (!result.key) {
						alert(result.value);
					}
					if (result.key) {
						if (result.value.length === 0) {
							alert('Lịch sử đặt lịch của bạn đang trống');
							return;
						}
						var orders = result.value;
						$.each(orders, function(i, order) {
							var orderDetails = [];
							for (var i; i < order.detailServices.length; i++) {
								var orderDetail = {};
								orderDetail.serviceID = order.detailServices[i];
								orderDetail.staffID = order.detailStaffs[i] ? order.detailStaffs[i] : null;
								orderDetails.push(orderDetail);
							}
							order.orderDetails = orderDetails;
						});
						historyOrder = orders;
						$('.history-customer-name').html(orders[0].customer.name);
						$('.history-customer-phone').html(orders[0].customer.phone);
						var historyListHtml = buildHistoryListHtml(orders);
						$('#history-list').html(historyListHtml);
						$('#history-section').removeClass('d-none');
						$('.order-section').addClass('d-none');
					}
				},
				error: function(err) {
					alert('Đã có lỗi xảy ra! Xin hãy thử lại sau.');
				}
			});

		});
		$('#btn-pick-date').datepicker("setDate", new Date())
			.on('changeDate', function(ev) {
				$('#btn-pick-time').datetimepicker('update', ev.date);
				if ($("#start_at").val()) {
					var time = moment($("#start_at").val()).format("HH:mm");
					var date = moment(ev.date).format("YYYY/MM/DD");
					var startAtString = date + ' ' + time;
					var startAt = new Date(startAtString);
					var t = startAt.getTime() - new Date();
					if (t <= 0) {
						alert('Thời gian không hợp lệ')
					} else {
						$("#start_at").val(startAtString);
					}
				}
				$('#btn-pick-date').datepicker('hide');
			});
		var timePicker = $('#btn-pick-time').datetimepicker({
			pickDate: true,
			minuteStep: 15,
			pickerPosition: 'bottom-left',
			format: 'HH:mm',
			autoclose: true,
			startView: 1,
			maxView: 1
		}).on('changeDate', function(ev) {
			var t = ev.date.getTime() - new Date();
			if (t <= 0) {
				alert('Thời gian không hợp lệ')
			} else {
				var startAt = moment(ev.date).format('YYYY/MM/DD HH:mm');
				$("#start_at").val(startAt);
			}
		});
	</script>
	<script>
		$(document).on('click', '.re-order', function() {
			var orderId = $(this).parents('.history-item').data('orderid');
			var order = historyOrder.find(item => item.id === orderId);
			$('#data-phone').val(order.customer.phone);
			$('#data-fullname').val(order.customer.name);
			$('#data-partner').val(order.number_person);
			$('.treatment').removeClass('choosen');
			$('.treatment').each(function(i, v) {
				var id = $(v).data('id');
				if (id && order.serviceIDs.indexOf(id.toString()) !== -1) {
					$(v).addClass('choosen');
				}
			});
			$('.staff').removeClass('choosen');
			$('.staff').each(function(i, v) {
				var id = $(v).data('id');
				if (id && order.staffIDs.indexOf(id.toString()) !== -1) {
					$(v).addClass('choosen');
				}
			});
			$('.order-section').removeClass('d-none');
			$('#history-section').addClass('d-none');
			changeStep(3);
			// changeStep(4);
		});
	</script>
	<script>
		var historyOrder = [];
		var step = 0;
		changeStep(1);

		function changeStep(st) {
			if (st < 1 || st > 5) {
				return;
			}
			switch (step) {
				case 1: {
					var phone = $('#data-phone').val();
					phone = phone.replace(/ /g, '');
					if (/^\d{3}-?\d{3}-?\d{4}$/g.test(phone)) {
						$('#phone').val(phone);
						break;
					} else {
						$('#data-phone').focus();
						alert('Vui lòng nhập số điện thoại!')
						return;
					}
				}
				case 2: {
					var fullname = $('#data-fullname').val();
					var partner = $('#data-partner').val();
					if (!fullname) {
						$('#data-fullname').focus();
						alert('Hãy nhận tên của bạn');
					}
					if ($('.treatment.choosen').length < 1) {
						alert('Mời lựa chọn dịch vụ');
						return;
					}
					$('input.service').prop('checked', false);
					$('.treatment.choosen').each(function(i, v) {
						let id = $(v).data('id');
						$('input[name="service[]"][type="checkbox"][value=' + id + ']').prop('checked', true);
					});
					if (!partner) {
						partner = 1;
					}
					$('#fullname').val(fullname);
					$('#partner').val(partner);
					break;
				}
				case 3: {
					if (!$("#start_at").val() && st > step) {
						alert('Mời chọn thời gian');
						return;
					}
					break;
				}
				case 4: {
					$('input.staff').prop('checked', false);
					$('.staff.choosen').each(function(i, v) {
						var id = $(v).data('id');
						$('input[name="staff[]"][type="checkbox"][value=' + id + ']').prop('checked', true);
					});
					break;
				}
				case 5: {
					break;
				}
			}

			$('.step').removeClass('d-none');
			$('.step').addClass('d-none');
			$('.step[data-step=' + st + ']').removeClass('d-none');
			step = st;
			switch (step) {
				case 3: {
					var customerName = $('#fullname').val();
					var customerPhone = $('#phone').val();
					var partner = $('#partner').val();
					$('.customer-name').html(customerName);
					$('.customer-phone').html(customerPhone);
					$('.number-partner').html('(' + partner + ' người)');
					break;
				}
				case 4: {
					var startAt = $('#start_at').val();
					if (startAt) {
						var date = moment(startAt).format("DD/MM/YYYY");
						var time = moment(startAt).format("HH:mm");
						$('.display-start-at').html(time + ' - ' + date);
					}
					break;
				}
				case 5: {
					var services = [];
					var staffs = [];
					$('input[name="service[]"][type="checkbox"]:checked').each(function(i, v) {
						var service = {};
						service.id = $(v).val();
						service.name = $(v).data('name');
						services.push(service);
					});
					var ckbStaffs = $('input[name="staff[]"][type="checkbox"]:checked');
					$.each(ckbStaffs, function(i, v) {
						var staff = {};
						staff.id = $(v).val();
						staff.name = $(v).data('name');
						staffs.push(staff);
					});


					var confirmList = [];
					for (var i = 0; i < services.length; i++) {
						var item = {};
						item.serviceID = services[i];
						item.staffID = typeof staffs[i] === "undefined" ? null : staffs[i];
						confirmList.push(item);
					}
					var confirmListHtml = '';
					$.each(confirmList, function(i, v) {
						confirmListHtml += '<div class="clearfix ' + ((confirmList.length !== i + 1) ? 'border-bottom-ts ' : '') + 'mb-1 p-2 confirm-item">' +
							'<div class="pull-left">' + v.serviceID.name + '</div>' +
							'<div class="pull-right"><small>' + (!v.staffID ? '' : v.staffID.name) + '</small></div>' +
							'</div>';
					});
					$('.confirm-list').html(confirmListHtml);
				}
			}
		}
		$('.next-step').on('click', function() {
			changeStep(step + 1);
			$('html, body').animate({
				scrollTop: $(".content").offset().top
			}, 1000);
		});
		$('.previous-step').on('click', function() {
			changeStep(step - 1);
			$('html, body').animate({
				scrollTop: $(".content").offset().top
			}, 1000);
		});
		$('.treatment').on('click', function() {
			if ($(this).hasClass('choosen')) {
				$(this).removeClass('choosen');
			} else {
				$(this).addClass('choosen');
			}
		});
		$('.staff').on('click', function() {
			if ($(this).hasClass('choosen')) {
				$(this).removeClass('choosen');
			} else {
				$(this).addClass('choosen');
			}
		});
	</script>
	<script>
		var services = <?php echo json_encode($services); ?>;
		var staffs = <?php echo json_encode($staffs); ?>;
	</script>
	<script>
		@if(session('success'))
		$('.order-section').addClass('d-none');
		$('.success-section').removeClass('d-none');
		@endif
		@if(session('error'))
		swal('{{ session('
			error ') }}', '', 'error');
		@endif
	</script>
	<script>
		function buildHistoryListHtml(orders) {
			var html = '';
			$.each(orders, function(i, order) {
				var historyTime = moment(order.start_at).format("HH:mm");
				var historyDate = moment(order.start_at).format("DD/MM/YYYY");
				html += '<div class="btn-styled bg-white text-ts p-3 history-item" data-orderid="' + order.id + '">' +
					'<div class="clearfix mb-1 p-2 border-bottom-ts">' +
					'<div class="pull-left history-time">Hẹn: ' + historyTime + '</div>' +
					'<div class="pull-right history-date">' + historyDate + '</div>' +
					'</div>' +
					'<div class="list-detail">' +
					buildOrderHtmlItem(order.orderDetails) +
					'</div>' +
					'<div class="clearfix">' +
					'<a class="btn-styled text-white bg-black pull-right m-0 mt-1 pt-1 pb-1 re-order" href="javascript:void(0)">ĐẶT LẠI</a>' +
					'</div>' +
					'</div>';
			});
			return html;
		}

		function buildOrderHtmlItem(orderDetails) {
			var htmlDetail = '';
			$.each(orderDetails, function(i, orderDetail) {
				htmlDetail += '<div class="clearfix p-2 dotted-border-bottom-ts">' +
					'<div class="pull-left">' + orderDetail.serviceID.name + '</div>' +
					'<div class="pull-right"><small>' + (orderDetail.staffID ? orderDetail.staffID.name : '') + '</small></div>' +
					'</div>';
			});
			return htmlDetail;
		}
		$('.close-tab').on('click', function() {
			window.close('', '_self');
			window.close();
		});
	</script>
</body>

</html>