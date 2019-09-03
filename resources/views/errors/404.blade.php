 @include('BackEnd/dashboard/partials/header_css_js')

<body>

	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Error wrapper -->
					<div class="container-fluid text-center">
						<div class="icon-object border-warning-400 text-warning-400">
		                <i class="icon-warning"></i></div>
                						
                		<h1 class="error-title">404</h1>
						<h6 class="text-semibold content-group">Oops, an error has occurred. Page not found!</h6>

						<div class="row">
							<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
								<div class="row">
									<div class="col-sm-12">
										<a href="{{ url('/') }}" class="btn btn-primary btn-block content-group"><i class="icon-circle-left2 position-left"></i> Go to home</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /error wrapper -->


				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
