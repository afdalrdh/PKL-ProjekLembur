<html>
<head><title> Login </title>

  <link href="<?php echo base_url()."assets/css/"; ?>util.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url()."assets/css/"; ?>main.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url()."assets/css/"; ?>bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

</head>
<body style="font-family: 'Ubuntu', sans-serif;">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid" style="height:55px;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="" class="navbar-brand">Pengajuan Lembur</a>
      </div>
      <div class="id=#bs-example-navbar-collapse-l">
        <ul class="nav navbar-nav navbar-right" style="padding-top:7px; padding-right:25px;">
          <img src="<?php echo base_url()."assets/images/";?>cobalogo.png">
        </ul>
      </div>
    </div>
  </nav>

  <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/wall.jpg');">
			<div class="wrap-login100">
  				<form action="<?php echo base_url('login/aksi_login'); ?>" method="post"  class="login100-form validate-form p-l-55 p-r-55 p-t-120">
					<span class="login100-form-title">
						Sign In
					</span>

          <label for="inisial" style="padding-bottom:5px;">Masukkan Inisial :</label>
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="inisial" placeholder="inisial" required>
            <span class="focus-input100"></span>
					</div>

          <label for="inisial" style="padding-bottom:5px; padding-top:10px;">Masukkan Password :</label>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23"></div>
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="SUBMIT">
					</div>

				</form>

			</div>
		</div>
	</div>
</body>
</html>
