<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | XOXO Hotel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets_login/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets_login/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets_login/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets_login/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets_login/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/images/hm.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/hm.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<p class="lead"><h3>Login</h3></p>
							</div>
							<form class="form-auth-small" action="ceklogin.php" method="post">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="signin-email"  name="user" placeholder="Masukan Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" name="pass" placeholder="Masukan Password">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Hotel Dengan Harga Terjangkau dan Nyaman.</h1>
							<p>
								Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab, sint. Temporibus neque in magni, ut libero molestias, fuga delectus maxime beatae nulla illum accusantium corrupti saepe nostrum minus aliquid natus!
							</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
