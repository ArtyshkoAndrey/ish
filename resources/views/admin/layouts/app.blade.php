<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')
    <meta name=”robots” content="noindex, nofollow, noarchive" />
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
	@include('admin.layouts.header')
	@include('admin.layouts.sidebar')
	@section('main-content')
		@show
	@include('admin.layouts.footer')
    @yield('script')
</div>
</body>
</html>