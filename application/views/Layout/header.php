<?php $status = $this->session->userdata('status'); ?>
<?php if ($cond == 1): ?>
<header id="header" class="alt">
					<h1><a href="<?= site_url(); ?>">Sistem Pendaftaran Online</a> <!-- MAN 113 --></h1>
					<nav id="nav">
						<ul>
							
							<?php if ($this->session->userdata('statusLoggedIn')): ?>
							<li><a href="<?= site_url(); ?>">Home</a></li>
							<li><a href="<?= site_url('berkas'); ?>"><?= $status == 2?'Upload':'Data' ?> Berkas</a></li>
							<li><a href="<?= site_url('ujian'); ?>"><?= $status == 2?'Upload':'Data' ?> Ujian</a></li>
							<li><a href="<?= site_url('profile'); ?>">My Profile</a></li>
							<li><a href="<?= site_url('logout'); ?>">Logout</a></li>
							<?php else: ?>
							<li><a href="<?= site_url(); ?>">Home</a></li>
							<li><a href="<?= site_url('daftar'); ?>">Mendaftar</a></li>
							<li><a href="<?= site_url('tentang'); ?>">Tentang Kami</a></li>
							<!-- <li><a href="<?= site_url('kontak'); ?>">Kontak Kami</a></li> -->
							<li><a href="<?= site_url('login'); ?>">Login</a></li>	
							<?php endif ?>
						</ul>
					</nav>
				</header>
<?php else: ?>
<header id="header">
					<h1><a href="<?= site_url(); ?>">Sistem Pendaftaran Online</a> <!-- MAN 113 --></h1>
					<nav id="nav">
						<ul>
							<?php if ($this->session->userdata('statusLoggedIn')): ?>
								<li><a href="<?= site_url(); ?>">Home</a></li>
							<li><a href="<?= site_url('berkas'); ?>"><?= $status == 2?'Upload':'Data' ?> Berkas</a></li>
							<li><a href="<?= site_url('ujian'); ?>"><?= $status == 2?'Upload':'Data' ?> Ujian</a></li>
							<li><a href="<?= site_url('profile'); ?>">My Profile</a></li>
							<li><a href="<?= site_url('logout'); ?>">Logout</a></li>
							<?php else: ?>
							<li><a href="<?= site_url(); ?>">Home</a></li>
							<li><a href="<?= site_url('daftar'); ?>">Mendaftar</a></li>
							<li><a href="<?= site_url('tentang'); ?>">Tentang Kami</a></li>
							<!-- <li><a href="<?= site_url('kontak'); ?>">Kontak Kami</a></li> -->
							<li><a href="<?= site_url('login'); ?>">Login</a></li>	
							<?php endif ?>
						</ul>
					</nav>
				</header>	
<?php endif ?>




