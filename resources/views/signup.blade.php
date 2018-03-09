@include('header')
	<!--/w3_short-->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
	<!--//w3_short-->
	<!-- /inner_content -->
	<div class="banner-bottom">
		<center><div class="container" style="padding:75px;">
				<div class="tittle_head_w3layouts">
				<h3 class="tittle three">Sign Up <span>Now </span></h3>
			</div>
			<div class="inner_sec_info_agileits_w3">
				@if($errors->any())
				 @foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	 @endforeach
				@endif
				<div class="signin-form">
					<div class="login-form-rec">
						<form method="POST" action="/register">
								{{ csrf_field() }}
							<input type="text" class="form-control" name="first_name" placeholder="First Name" required=""><br/>
							<input type="text" class="form-control" name="last_name" placeholder="Last Name" required=""><br/>
							<input type="email" class="form-control" name="email" placeholder="Email" required=""><br/>
							<input type="password" class="form-control" name="password" id="password1" placeholder="Password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br/>
							<input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password" required=""><br/>

							@if(isset($referral_id))
								<input type="text" class="form-control" name="refer" placeholder="Referral code" value="{{$referral_id}}"><br/>
							@else
								<input type="text" class="form-control" name="refer" placeholder="Referral code" value="" ><br/>
							@endif
							<div class="g-recaptcha" data-sitekey="6LcFaEcUAAAAAB88-l1aH7WGEXn_q5fvOdicYLay"></div><br/>
							<input type="submit" class="btn btn-theme btn-curved btn-block form-control form-control" value="Sign Up">
						</form>
					</div>
                    <p class="reg"><a href="#"> <strong style="color:#000;">By clicking Signup, I agree to your terms</strong></a></p>

				</div>
			</div>
            </div></center>
	</div>
    
	@include('footer')
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
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

	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>
