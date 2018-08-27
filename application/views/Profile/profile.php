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
						<h2>My Profile</h2>
						<p>Disini anda bisa mengecek status verifikasi berkas dan verifikasi soal ujian.</p>
					</header>
					<div class="box">
						<form method="post" action="<?= site_url('profile/submit'); ?>">
							<div class="row gtr-50 gtr-uniform">
								<?php if ($this->session->flashdata('message')): ?>
									<div class="col-12">
									<b style="color:<?= $this->session->flashdata('color'); ?>"><?= $this->session->flashdata('message'); ?></b>
									</div>
								<?php endif ?>
								<div class="col-6">
									<label for="username" style="color:black;font-weight: bold">Status Verifikasi Berkas : <i style="color:<?= @$berkas['color'] ?>"><?= @$berkas['status'] ?></i> </label>
									
								</div>
								<div class="col-6">
									<label for="username" style="color:black;font-weight: bold">Status Verifikasi Ujian : <i style="color:<?= @$ujian['color'] ?>"><?= @$ujian['status'] ?></i> </label>
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="username">Username</label>
									<input readonly required type="text" name="username" id="username" value="<?= $profile->user_name ?>" placeholder="Username" />
									<i style="color:orange">Note : Username tidak bisa dirubah</i>
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="password">Password</label>
									<input required type="password" name="password" id="password" value="<?= $profile->pass_word ?>" placeholder="Password" />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="nisn">NISN</label>
									<input required type="text" name="nisn" id="nisn" value="<?= $profile->nisn ?>" readonly placeholder="NISN" />
									<i style="color:orange">Note : NISN tidak bisa dirubah</i>
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="nama">Nama Lengkap</label>
									<input required type="text" name="nama" id="nama" value="<?= $profile->nama ?>" placeholder="Nama Lengkap" />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="asal_sekolah">Asal Sekolah</label>
									<input required type="text" name="asal_sekolah" id="asal_sekolah" value="<?= $profile->asal_sekolah ?>" placeholder="Asal Sekolah" />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="email">Email</label>
									<input required type="email" name="email" id="email" value="<?= $profile->email ?>" placeholder="Email" />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="nama">Tertarik Jurusan</label>
									<select name="jurusan" id="jurusan" required>
										<option value="">-- Pilih --</option>
										<option value="IPA" <?= $profile->jurusan=='IPA'?'selected':'' ?>>IPA</option>
										<option value="IPS" <?= $profile->jurusan=='IPS'?'selected':'' ?>>IPS</option>
										<option value="Agama Islam" <?= $profile->jurusan=='Agama Islam'?'selected':'' ?>>Agama Islam</option>
									</select>
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="no_telp">Nomor Telepon</label>
									<input required type="text" name="no_telp" id="no_telp" value="<?= $profile->no_telepon ?>" placeholder="Nomor Telepon" />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="tempat_lahir">Tempat Lahir</label>
									<input required type="text" name="tempat_lahir" id="tempat_lahir" value="<?= $profile->tempat_lahir ?>" placeholder="Tempat Lahir" />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="tempat_lahir">Tanggal Lahir</label>
									<input required type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= date('d-m-Y',strtotime($profile->tanggal_lahir)) ?>" placeholder="Tanggal Lahir" />
									<?php if ($this->session->flashdata('error_tanggal_lahir')): ?>
										<i style="color:red"><?= $this->session->flashdata('error_tanggal_lahir'); ?></i>
									<?php endif ?>
								</div>
								<div class="col-12">
									<label for="alamat">Alamat</label>
									<textarea name="alamat" id="alamat" placeholder="Alamat" rows="6"><?= $profile->alamat ?></textarea>
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" value="Submit" /></li>
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