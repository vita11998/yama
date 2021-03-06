<?php $this->layout('template') ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Detail Profil</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Detail Profil<i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-6 d-flex">
                <img src="images/partner/<?=$data['gambar']?>" style="width: 100%">
            </div>
            <div class="col-lg-6 ">
                <div class="about-text">
                    <?=$data['deskripsi']?>
                </div>
            </div>
        </div>
    </div>
</section>