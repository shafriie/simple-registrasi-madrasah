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
						<h2>Upload Berkas</h2>
						<p>Lengkapi dokumen atau berkas untuk pendaftaran siswa.</p>
					</header>
					<div class="box">
						<form method="post" action="<?= site_url('berkas/submit'); ?>" enctype="multipart/form-data">
							<div class="row gtr-50 gtr-uniform">
								<?php if ($this->session->flashdata('message')): ?>
								<div class="col-12">
									<p style="color:<?= $this->session->flashdata('color'); ?>"><?= $this->session->flashdata('message'); ?></p>
								</div>	
								<?php endif ?>
								
								<div class="col-6 col-12-mobilep">
									<label for="kk">Kartu Keluarga</label>

									<input type="file" name="kk" id="kk" required />
									<?php if (@$berkas->kk): ?>
									<br><br>
									<a target="_blank" class="button alt small" href="<?= base_url('upload/'.$berkas->kk); ?>">Lihat Berkas</a>	
									<?php endif ?>
									
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="ijazah">Ijazah</label>
									<input type="file" name="ijazah" id="ijazah" required/>
									<?php if (@$berkas->ijazah): ?>
									<br><br>
									<a target="_blank" class="button alt small" href="<?= base_url('upload/'.$berkas->ijazah); ?>">Lihat Berkas</a>	
									<?php endif ?>
									
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="akte">Akte</label>
									<input type="file" name="akte" id="akte" required/>
									<?php if (@$berkas->akte): ?>
									<br><br>
									<a target="_blank" class="button alt small" href="<?= base_url('upload/'.$berkas->akte); ?>">Lihat Berkas</a>	
									<?php endif ?>
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="skhun">SKHUN</label>
									<input type="file" name="skhun" id="skhun" required/>
									<?php if (@$berkas->skhun): ?>
									<br><br>
									<a target="_blank" class="button alt small" href="<?= base_url('upload/'.$berkas->skhun); ?>">Lihat Berkas</a>	
									<?php endif ?>
									
								</div>
								<div class="col-12">
									<span style="color:red;font-weight: bold">Note: kami hanya menerima format .jpg, .png, .jpeg</span>
								</div>
								<div class="col-12" style="margin-top: 20px">
									<ul class="actions special">
										<li><input type="submit" value="Upload" /></li>
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