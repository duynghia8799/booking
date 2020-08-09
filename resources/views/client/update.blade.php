<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Đặt lại lịch hẹn</title>
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
		<div class="m-portlet m-portlet--tabs">
			<div class="m-portlet__body">
				<div class="form-booking">
					<div class="logo">
						<a href="https://massagetamsen.vn/"><img src="{{ asset(config('common.image.logo')) }}" alt="Logo" height="100" /></a>
					</div> 
					<div class="title">
						<h2>
							Nếu có thay đổi, quý khách vui lòng cập nhật thông tin sau đó lưu lại
						</h2>
					</div>
					<form class="m-form m-form--fit m-form--label-align-right" action="{{route('re-update',$order->id)}}" method="post" id="form-booking">
						@csrf
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<div class="alert m-alert m-alert--default" role="alert">
									Vui lòng điền đầy đủ các thông tin dưới đây. Chúng tôi sẽ liên lạc lại trong 24h làm việc.
								</div>
							</div>
							<div class="container">
								<div class="row">
									<div class="col-xl-6">
										<div class="form-group m-form__group">
											<label for="staff">Khung giờ đến/Time</label>
											<input type="text" class="form-control" id="m_datetimepicker_1" name="start_at" placeholder="Chọn ngày và thời gian/Select date &amp; time" autocomplete="off">
											<span class="m-form__help text-danger">
												@if ($errors->has('start_at'))
					                                <p class="text-danger">
					                                    {{ $errors->first('start_at') }}
					                                </p>
					                            @endif
											</span>
										</div>
										<div class="form-group m-form__group">
											<label for="fullname">Số người đi cùng/Number partner</label>
											<input type="text" class="form-control m-input" id="partner" name="partner" placeholder="Số người đi cùng/Number partner" value="{{$order->number_person}}">
											<span class="m-form__help text-danger">
												@if ($errors->has('number_person'))
					                                <p class="text-danger">
					                                    {{ $errors->first('number_person') }}
					                                </p>
					                            @endif
											</span>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group m-form__group">
											<div class="row">
												<div class="col-lg-6">
													<label for="staff">Chọn nhân viên/Staff</label>
													<div class="m-checkbox-list">
														@foreach($staffs as $staff)
														<label class="m-checkbox m-checkbox--check-bold">
															<input type="checkbox" value="{{$staff->id}}" name="staff[]"
															@if($getStaff != '')
																@foreach ($getStaff as $checkStaff)
																	@if ($checkStaff->id === $staff->id)
																		checked
																	@endif
																@endforeach
															@endif
															> {{$staff->name}}
															<span></span>
														</label>
														@endforeach
													</div>
													<span class="m-form__help text-danger">
														@if ($errors->has('staff'))
							                                <p class="text-danger">
							                                    {{ $errors->first('staff') }}
							                                </p>
							                            @endif
													</span>
												</div>
												<div class="col-lg-6">
													<label for="service">Chọn dịch vụ/Service</label>
													<div class="m-checkbox-list">
														@foreach($services as $service)
														<label class="m-checkbox m-checkbox--check-bold">
															<input type="checkbox" value="{{$service->id}}" name="service[]"
																@foreach ($getService as $checkService)
																	@if ($checkService->id === $service->id)
																		checked
																	@endif
																@endforeach
															> {{$service->name}}
															<span></span>
														</label>
														@endforeach
													</div>
													<span class="m-form__help text-danger">
														@if ($errors->has('service'))
							                                <p class="text-danger">
							                                    {{ $errors->first('service') }}
							                                </p>
							                            @endif
													</span>
												</div>
											</div>
										</div>
										<div class="form-group m-form__group">
											<label for="note">Ghi chú/Note</label>
											<textarea class="form-control m-input" name="note" id="note" rows="3">{{$order->note}}</textarea>
											<span class="m-form__help text-danger">
												@if ($errors->has('note'))
					                                <p class="text-danger">
					                                    {{ $errors->first('note') }}
					                                </p>
					                            @endif
											</span>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<button type="submit" class="btn btn-primary">Lưu lại</button>
												<a href="{{route('invoice',$order->id)}}" class="btn btn-secondary">Quay lại</a>
												<a href="{{route('homepage')}}" class="btn btn-secondary">Quay lại đặt lịch</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
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