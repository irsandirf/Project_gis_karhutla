<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="<?= base_url('assets/') ?>https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/login.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
            <?= $this->session->flashdata('message'); ?>

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>

						<form action="<?= base_url('Auth/cek_login'); ?>" method="POST">
					
					  <div class="form-group">
		      			<input type="text" name="email" class="form-control rounded-left" placeholder="Email" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="<?= site_url('Auth/register') ?>">Register</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">LOGIN</button>
	            </div>

	          </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('Auth/regis') ?>">Buat Akun!</a>
              </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/popper.js"></script>
  <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/main.js"></script>

	</body>
</html>

 