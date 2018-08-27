<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?= titleHelper() ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?= base_url('asset/assets/') ?>css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<?php $this->load->view('Layout/header', ['cond'=>2]); ?>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Login</h2>
						<!-- <p>Login sebagai siswa atau admin</p> -->
					</header>
					<div class="box">
						<form method="post" action="<?= site_url('login/submit'); ?>">
							<?php if ($this->session->flashdata('message')): ?>
								<p style="color:<?= $this->session->flashdata('color'); ?>"><?= $this->session->flashdata('message'); ?></p>
							<?php endif ?>
							<div class="row gtr-50 gtr-uniform">
								<div class="col-6 col-12-mobilep">
									<input type="text" name="username" id="username" value="<?= set_value('username'); ?>" placeholder="Username atau NISN" required />
								</div>
								<div class="col-6 col-12-mobilep">
									<input required type="password" name="password" id="password" value="<?= set_value('password'); ?>" placeholder="Password" />
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li>
											<input type="submit" value="Submit" />
										</li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>

			<!-- Footer -->
			<?php $this->load->view('Layout/footer'); ?>

		</div>

		<!-- Scripts -->
			<script src="<?= base_url('asset/assets/') ?>js/jquery.min.js"></script>
			<script src="<?= base_url('asset/assets/') ?>js/jquery.dropotron.min.js"></script>
			<script src="<?= base_url('asset/assets/') ?>js/jquery.scrollex.min.js"></script>
			<script src="<?= base_url('asset/assets/') ?>js/browser.min.js"></script>
			<script src="<?= base_url('asset/assets/') ?>js/breakpoints.min.js"></script>
			<script src="<?= base_url('asset/assets/') ?>js/util.js"></script>
			<script src="<?= base_url('asset/assets/') ?>js/main.js"></script>

	</body>
</html>