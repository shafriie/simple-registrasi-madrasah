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
	<style type="text/css">
		#form-daftar i{
			font-size: 16px;font-weight: bold
		}
	</style>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<?php $this->load->view('Layout/header', ['cond'=>2]); ?>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Daftar</h2>
						<p>Lengkapi form registrasi untuk mendaftar menjadi siswa.</p>
					</header>
					<div class="box">
						<form id="form-daftar" method="POST" action="<?= site_url('daftar/submit'); ?>">
							
							<div class="row gtr-50 gtr-uniform">
								<?php if ($this->session->flashdata('message')): ?>
									<div class="col-12">
									<b style="color:<?= $this->session->flashdata('color'); ?>"><?= $this->session->flashdata('message'); ?></b>
									</div>
								<?php endif ?>
								
								<div class="col-4 col-12-mobilep">

									<input type="text" name="username" id="username" value="<?= set_value('username'); ?>" placeholder="Username" />
									<?php if ($this->session->flashdata('error_username')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_username'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-4 col-12-mobilep">

									<input  type="text" name="nisn" id="nisn" value="<?= set_value('nisn'); ?>" placeholder="NISN" />
									<?php if ($this->session->flashdata('error_nisn')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_nisn'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-4 col-12-mobilep">
									<input  type="password" name="password" id="password" value="<?= set_value('password'); ?>" placeholder="Password" />
									<?php if ($this->session->flashdata('error_password')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_password'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-6 col-12-mobilep">
									<input  type="text" name="nama" id="nama" value="<?= set_value('nama'); ?>" placeholder="Nama Lengkap" />
									<?php if ($this->session->flashdata('error_nama')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_nama'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-6 col-12-mobilep">
									<input  type="text" name="asal_sekolah" id="asal_sekolah" value="<?= set_value('asal_sekolah'); ?>" placeholder="Asal Sekolah" />
									<?php if ($this->session->flashdata('error_asal')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_asal'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-6 col-12-mobilep">
									<input  type="email" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="Email" />
									<?php if ($this->session->flashdata('error_email')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_email'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-6 col-12-mobilep">
									<select name="jurusan" id="jurusan" >
										<option value="">Ambil Jurusan</option>
										<option value="IPA" <?= set_value('jurusan') == 'IPA'?'selected':'' ?> >IPA</option>
										<option value="IPS" <?= set_value('jurusan') == 'IPS'?'selected':'' ?> >IPS</option>
										<option value="Agama Islam" <?= set_value('jurusan') == 'Agama Islam'?'selected':'' ?> >Agama Islam</option>
									</select>
									<?php if ($this->session->flashdata('error_jurusan')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_jurusan'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-4 col-12-mobilep">
									<input  type="text" name="no_telp" id="no_telp" value="<?= set_value('no_telp'); ?>" placeholder="No Telepon" />
									<?php if ($this->session->flashdata('error_no_telp')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_no_telp'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-4 col-12-mobilep">
									<input  type="text" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" placeholder="Tempat Lahir" />
									<?php if ($this->session->flashdata('error_tempat_lahir')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_tempat_lahir'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-4 col-12-mobilep">
									<input   type="text" name="tgl_lahir" id="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" placeholder="Tanggal Lahir" />
									<?php if ($this->session->flashdata('error_tgl_lahir')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_tgl_lahir'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-12">
									<textarea placeholder="Alamat" name="alamat" id="alamat" rows="4"><?= set_value('alamat'); ?></textarea>
									<?php if ($this->session->flashdata('error_alamat')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_alamat'); ?></i>
									<?php endif ?>
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