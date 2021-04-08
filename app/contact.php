<?php $this->layout('template') ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg.jpg');"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9  pb-5 text-center">
				<h1 class="mb-3 bread">Konsultasi</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
								class="ion-ios-arrow-forward"></i></a></span> <span>Konsultasi<i
							class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section">
	<div class="container">
		<div class="row block-9 ">
			<div class="col-lg-6">
				<form method="POST" action="contact" class="bg-light p-5 contact-form">
					<div class="form-group">
						<?=$csrf->input('contact-csrf');?>
						<input name="name" type="text" placeholder="Nama Depan" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="text" name="name_belakang" class="form-control" placeholder="Nama Belakang" required>
					</div>
					<div class="form-group">
						<input name="email" type="email" class="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" name="phone" class="form-control" placeholder="Nomor Telepon" required>
					</div>
					<div class="form-group">
						<textarea name="alamat" id="" cols="30" rows="4" class="form-control"
							placeholder="Alamat"></textarea>
					</div>
					<div class="form-group">
						<textarea name="message" id="" cols="30" rows="7" class="form-control"
							placeholder="Persoalan Hukum"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary py-3 px-5" type="submit">Kirim</button>
					</div>
				</form>
			</div>
			<div class="col-lg-6">
				<?=$data[deskripsi]?>
			</div>
		</div>
	</div>
</section>

<!-- Contact section  -->
<!-- <section class="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="contact-text">
					<h3>Get in touch</h3>
					<?=$deskrip[80]?>
				</div>
			</div>
			<div class="col-lg-8">
				<form method="POST" action="contact" class="contact-form">
					<div class="row">
						<div class="col-lg-6">
							<?=$csrf->input('contact-csrf');?>
							<input name="name" type="text" placeholder="Your Name" required>
						</div>
						<div class="col-lg-6">
							<input name="email" type="email" placeholder="Your Email" required>
						</div>
						<div class="col-lg-4">
						</div>
						<div class="col-lg-12">
							<input type="text" name="subject" placeholder="Subject">
							<textarea class="text-msg" name="message" placeholder="Message"></textarea>
							<button class="site-btn" type="submit">send message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> -->
</section>
<!-- Contact section end  -->
<!-- <style>
	.table td,
	.table th {
		padding: .75rem;
		vertical-align: top;
		border-top: 1px solid transparent;
	}
</style> -->