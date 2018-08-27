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
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<?php $this->load->view('Layout/header', ['cond' => 1]); ?>

			<!-- Banner -->
				<section id="banner">
					<h2>Madrasah Aliyah Negeri 113</h2>
					<p>Pademangan Jakarta Utara</p>
					<ul class="actions special">
						<li><a href="<?= site_url('daftar'); ?>" class="button">Daftar Menjadi Siswa</a></li>
						<!-- <li><a href="#" class="button">Learn More</a></li> -->
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Mengapa harus sekolah disini?
							<br />
							<!-- for doing stuff with your phone --></h2>
							<p>Karena disini merupakan madrasah terbaik se dki jakarta dengan terakditasi A<br />
							

						</header>
						<span class="image featured"><img src="<?= base_url('asset/') ?>images/pic01.jpg" alt="" /></span>
					</section>

					<section class="box special features">
						<div class="features-row">
							<section>
								<span class="icon major fa-bolt accent2"></span>
								<h3>Lingkungan Nyaman</h3>
								<p>Suasana indah nan sejuk seperti di taman.</p>
							</section>
							<section>
								<span class="icon major fa-area-chart accent3"></span>
								<h3>Fasilitas Lengkap</h3>
								<p>Kami menyediakan layanan dan fasilitas dengan layak.</p>
							</section>
						</div>
						<div class="features-row">
							<section>
								<span class="icon major fa-cloud accent4"></span>
								<h3>Free Wifi</h3>
								<p>Disetiap sudut sekolah ada tempat khusus untuk area wifi</p>
							</section>
							<section>
								<span class="icon major fa-lock accent5"></span>
								<h3>Makanan Gratis</h3>
								<p>Khusus siswa yang tidak membawa uang jajang. Gausah khawatir kami menyediakan jajanan gratis untuk siswa tersebut.</p>
							</section>
						</div>
					</section>

				</section>

			<!-- CTA -->
				<section id="cta">

					<h2>Mendaftar menjadi subsriber kami</h2>
					<p>Silahkan isi email dengan benar dan pastikan menerima email dari kami dengan konten yang terbaru.</p>

					<form>
						<div class="row gtr-50 gtr-uniform">
							<div class="col-8 col-12-mobilep">
								<input type="email" name="email" id="email" placeholder="Email Address" />
							</div>
							<div class="col-4 col-12-mobilep">
								<input type="submit" value="Submit" class="fit" />
							</div>
						</div>
					</form>

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