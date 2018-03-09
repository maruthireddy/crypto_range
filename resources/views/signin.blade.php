@include('header')
	<!--/w3_short-->
	<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
	
	@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
	@endif

	@if($errors->any())
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
          	<li>{{ $error }}</li>
     	@endforeach
    </div>
	@endif

	<!--//w3_short-->
	<!-- /inner_content -->
	<div class="banner-bottom">
		<center><div class="container" style="padding:75px;">
			<div class="tittle_head_w3layouts">

				<h3 class="tittle three">SignIn to <span>your Account </span></h3><br/>
			</div>
			<div class="inner_sec_info_agileits_w3">
				<div class="signin-form">
					<div class="login-form-rec">
						<form action="/login" method="post">
							{{ csrf_field() }}
							<input type="email" class="form-control" name="email" placeholder="E-mail" required=""><br/>
							<input type="password" class="form-control" name="password" placeholder="Password" required=""><br/>
							<div class="tp">
								<div class="g-recaptcha" data-sitekey="6LcFaEcUAAAAAB88-l1aH7WGEXn_q5fvOdicYLay"></div>
								<input type="submit" class="btn btn-theme btn-curved btn-block form-control" value="Signin">
							</div>
						</form>
					</div>
					<!--//<div class="login-social-grids">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>-->
					<h4><a href="/signup" style="color:#000"> Don't have an account?</a></h4>
					<h4><a href="/forgot_password" style="color:#000"> Forgot Password?</a></h4>
				</div>
			</div>
		</div></center>
	</div>

           
	@include('footer')
	<!-- js -->

	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
	<!-- password-script -->
	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
