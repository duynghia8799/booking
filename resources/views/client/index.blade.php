<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Đặt lịch</title>
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
		<div class="m-portlet m-portlet--tabs">
			<div class="m-portlet__head">
				<div class="m-portlet__head-tools">
					<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--right m-tabs-line-danger" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_portlet_tab_1_1" role="tab" aria-selected="true">
								Đặt lịch
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_portlet_tab_1_2" role="tab" aria-selected="false">
								Xem lịch sử
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="tab-content">
					<div class="tab-pane active show" id="m_portlet_tab_1_1">
						<div class="form-booking">
							<div class="logo">
								<a href="https://massagetamsen.vn/"><img src="{{ asset(config('common.image.logo')) }}" alt="Logo" height="100" /></a>
							</div> 
							<div class="title">
								<h2>
									Đặt lịch sử dụng dịch vụ của Tâm Sen
								</h2>
							</div>
							<form class="m-form m-form--fit m-form--label-align-right" action="{{route('booking')}}" method="post" id="form-booking">
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
													<label for="fullname">Số điện thoại/Phone</label>
													<input type="text" class="form-control m-input" id="phone" name="phone" placeholder="Số điện thoại/Phone">
													<span class="m-form__help text-danger">
														@if ($errors->has('phone'))
							                                <p class="text-danger">
							                                    {{ $errors->first('phone') }}
							                                </p>
							                            @endif
													</span>
												</div>
												<div class="form-group m-form__group">
													<label for="fullname">Họ và tên/Full name</label>
													<input type="text" class="form-control m-input" id="fullname" name="fullname" placeholder="Họ và tên/Full name">
													<span class="m-form__help text-danger">
														@if ($errors->has('fullname'))
							                                <p class="text-danger">
							                                    {{ $errors->first('fullname') }}
							                                </p>
							                            @endif
													</span>
												</div>
												<div class="form-group m-form__group">
													<label for="staff">Khung giờ đến/Time</label>
													<input type="text" class="form-control" id="m_datetimepicker_1" name="start_at" placeholder="Chọn ngày và thời gian/Select date &amp; time">
													<span class="m-form__help text-danger">
														@if ($errors->has('start_at'))
							                                <p class="text-danger">
							                                    {{ $errors->first('start_at') }}
							                                </p>
							                            @endif
													</span>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group m-form__group">
													<label for="fullname">Số người đi cùng/Number partner</label>
													<input type="text" class="form-control m-input" id="partner" name="partner" placeholder="Số người đi cùng/Number partner">
													<span class="m-form__help text-danger">
														@if ($errors->has('number_person'))
							                                <p class="text-danger">
							                                    {{ $errors->first('number_person') }}
							                                </p>
							                            @endif
													</span>
												</div>
												<div class="form-group m-form__group">
													<label for="staff">Nhân viên/Staff</label>
													<div class="m-checkbox-list">
														@foreach($staffs as $staff)
														<label class="m-checkbox m-checkbox--check-bold">
															<input type="checkbox" value="{{$staff->id}}" name="staff[]"> {{$staff->name}}
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
												<div class="form-group m-form__group">
													<label for="service">Dịch vụ/Service</label>
													<div class="m-checkbox-list">
														@foreach($services as $service)
														<label class="m-checkbox m-checkbox--check-bold">
															<input type="checkbox" value="{{$service->id}}" name="service[]"> {{$service->name}}
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
											<div class="col-xl-12">
												<div class="form-group m-form__group">
													<label for="note">Ghi chú/Note</label>
													<textarea class="form-control m-input" name="note" id="note" rows="3"></textarea>
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
														<button type="submit" class="btn btn-primary">Đặt lịch</button>
														<button type="reset" class="btn btn-secondary">Cancel</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="tab-pane" id="m_portlet_tab_1_2">
						<div class="form-booking">
							<div class="logo">
								<a href="https://massagetamsen.vn/"><img src="{{ asset(config('common.image.logo')) }}" alt="Logo" height="100" /></a>
							</div>
							<div class="title">
								<h2>
									Xem lịch sử của bạn
								</h2>
							</div>
							<form class="m-form m-form--fit m-form--label-align-right" action="{{route('history')}}" method="post" id="form-history">
								@csrf
								<div class="m-portlet__body">
									<div class="form-group m-form__group m--margin-top-10">
										<div class="alert m-alert m-alert--default" role="alert">
											Vui lòng điền đầy đủ các thông tin dưới đây để xem lịch sử
										</div>
									</div>
									<div class="container">
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group m-form__group">
													<label for="fullname">Số điện thoại/Phone</label>
													<input type="text" class="form-control m-input" id="phone_history" name="phone_history" placeholder="Số điện thoại/Phone">
													<span class="m-form__help text-danger">
														@if ($errors->has('phone'))
							                                <p class="text-danger">
							                                    {{ $errors->first('phone') }}
							                                </p>
							                            @endif
													</span>
												</div>
												<div class="form-group m-form__group">
													<label for="fullname">Mã Code/Your Code</label>
													<input type="text" class="form-control m-input" id="code_history" name="code_history" placeholder="Mã Code/Your Code">
													<span class="m-form__help text-danger">
														@if ($errors->has('fullname'))
							                                <p class="text-danger">
							                                    {{ $errors->first('fullname') }}
							                                </p>
							                            @endif
													</span>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<button type="submit" class="btn btn-primary">Tra cứu</button>
														<button type="reset" class="btn btn-secondary">Cancel</button>
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