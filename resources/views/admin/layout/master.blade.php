<!DOCTYPE html>
<html lang="en">
@include('admin.layout.common.head')
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<div class="m-grid m-grid--hor m-grid--root m-page">
	@include('admin.layout.common.header')
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		<div class="m-grid__item m-grid__item--fluid m-wrapper">
			@yield('content-page')
		</div>
	</div>
	@include('admin.layout.common.footer')
</div>
@include('admin.layout.common.sidebar')
@include('admin.layout.common.bottom')
@yield('script')
</body>
</html>