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
				<section id="main" class="container">
					<header>
						<h2>Data Ujian Siswa</h2>
						<!-- <p>Tanyakan apa yang membuat kalian bingung.</p> -->
					</header>
					<div class="box">
						<?php if ($this->session->flashdata('message')): ?>
							<p align="center" style="font-weight:bold;color:<?= $this->session->flashdata('color'); ?>"><?= $this->session->flashdata('message'); ?></p>
						<?php endif ?>
						<table>
							<tr>
								<th>No</th>
								<th>NISN</th>
								<th>Nama Lengkap</th>
								<th>File Ujian</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<?php foreach ($ujian as $key => $value): ?>
							<tr>
								<td><?= $key+1 ?></td>
								<td><?= $value->nisn ?></td>
								<td><?= $value->nama ?></td>
								<td><a target="_blank" href="<?= base_url('upload_ujian/'.$value->file_ujian); ?>">Lihat Jawaban</a></td>
								<th>
									<?php if ($value->status == 0): ?>
										<b style="color: orange">Pending</b>
									<?php elseif ($value->status == 1): ?>
										<b style="color:green">Lolos</b>
									<?php else: ?>
										<b style="color:red">Tidak Lolos</b>
									<?php endif ?>
								</th>
								<td>
									<?php if ($value->status == 0): ?>
										<a class="button alt small" href="<?= site_url('ujian/status/'.base64_encode($value->id_ujian).'/1'); ?>">Acc</a> <a class="button alt small" href="<?= site_url('berkas/status/'.$value->id_ujian.'/2'); ?>">Reject</a>
									<?php elseif ($value->status == 1): ?>
										<a class="button alt small" href="<?= site_url('ujian/status/'.base64_encode($value->id_ujian).'/2'); ?>">Reject</a>
									<?php elseif ($value->status == 2): ?>
										<a class="button alt small" href="<?= site_url('ujian/status/'.base64_encode($value->id_ujian).'/1'); ?>">Acc</a>
									<?php endif ?>
									<a class="button alt small" href="<?= site_url('ujian/delete/'.base64_encode($value->id_ujian)) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');">Delete</a>
								</td>
							</tr>	
							<?php endforeach ?>
							
						</table>
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