<?php $this->layout('template') ?>
<div id="cusCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <?php foreach($slider as $r) : ?>
        <?php if($r['id_slider'] == 1) { ?>
        <div class="carousel-item active">
            <?php }else{ ?>
            <div class="carousel-item">
                <?php } ?>

                <img class="d-block w-100" src="images/slider/<?=$r['gambar']?>" alt="First slide">
            </div>
            <?php endforeach ?>
        </div>
        <a class="carousel-control-prev" href="#cusCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#cusCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');display:none"
        data-stellar-background-ratio="0.5">
        <!-- <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate">
                <h2 class="subheading">Welcome To Legalcare</h2>
                <h1>Attorneys Fighting For Your
                    <span class="txt-rotate" data-period="2000"
                        data-rotate='[ "Freedom.", "Rights.", "Case.", "Custody." ]'></span>
                </h1>
                <h1 class="mb-4">Attorneys Fighting For Your Freedom</h1>
                <p class="mb-4">We have help thousands of people to get relief from national wide fights wrongfull
                    denials. Now they trusted legalcare attorneys</p>
                <p><a href="#" class="btn btn-primary mr-md-4 py-2 px-4">Get Legal Advice <span
                            class="ion-ios-arrow-forward"></span></a></p>
            </div>
        </div>
    </div> -->
    </div>

    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 py-5">
                    <div class="heading-section ftco-animate">
                        <span class="subheading"><?=$namaweb?></span>
                        <h2 class="mb-4">Pencapaian Kami</h2>
                    </div>
                </div>
                <div class="col-lg-9 services-wrap px-4 pt-5">
                    <div class="row pt-md-3">
                        <?php foreach($keuntungan as $keuntungan) : ?>
                        <div class="col-md-4 d-flex align-items-stretch">
                            <div class="services text-center">
                                <div class="text">
                                    <h3><span class="number mr-2" data-number="<?=$keuntungan['deskripsi']?>">0</span>
                                    </h3>
                                    <p><?=$keuntungan['judul']?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 d-flex">
                    <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end"
                        style="background-image:url(images/<?=$welcome['gambar']?>);">
                        <a href="<?=$header[deskripsi]?>"
                            class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                            <span class="icon-play"></span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 pl-md-5">
                    <div class="row justify-content-start pt-3 pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <span class="subheading">Welcome to <?=$namaweb?></span>
                            <?=$welcome['deskripsi']?>
                            <div class="years d-flex mt-4 mt-md-5">
                                <h4>
                                    <span class="number mr-2" data-number="<?=$keuntungan2['deskripsi']?>">0</span>
                                    <span>Years of Experienced</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container px-md-5">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Tim Kami</span>
                    <h2 class="mb-4">Tim Astungkara</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach($foto as $r) : ?>
                <div class="col-lg-4 col-sm-6">
                    <a href="foto-<?=$r['judul_seo']."-".$r['id_foto']?>">
                        <div class="block-2 ftco-animate">
                            <div class="flipper mb-5">
                                <div class="front" style="background-image: url(images/foto/<?=$r['gambar']?>);">
                                    <div class="box">
                                        <h2><?=$r['judul']?></h2>
                                        <p><?=$r['kode_produk']?></p>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="image align-self-center">
                                        <img src="images/<?=$deskrip[1]?>" alt="" style="width: 100%">
                                    </div>
                                    <div class="author d-flex">
                                        <div class="name align-self-center ml-3"><?=$r['judul']?><span
                                                class="position"><?=$r['kode_produk']?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container px-md-5">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Tim Partner</span>
                    <h2 class="mb-4">Partner Astungkara</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach($partner as $r) : ?>
                <div class="col-lg-3 col-sm-6">
                    <a href="partner-<?=$r['judul_seo']."-".$r['id_partner']?>">
                        <div class="" style="background-image: url(images/partner/<?=$r['gambar']?>);">
                            <div class="box">
                                <h2><?=$r['judul']?></h2>
                                <p><?=$r['kode_produk']?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-10 text-center heading-section ftco-animate">
                    <span class="subheading"><?=$namaweb?></span>
                    <h2 class="mb-4">Layanan Hukum</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach($produk as $r) : ?>
                <div class="col-md-4">
                    <div class="case img d-flex align-items-center justify-content-center"
                        style="background: linear-gradient(0deg, rgba(82, 43, 48, 0.70), rgba(82, 43, 48, 0.40)), url(images/produk/<?=$r['gambar']?>);">
                        <div class="text text-center">
                            <h3><a href="produk-<?=$r['judul_seo']."-".$r['id_produk']?>"><?=$r['judul']?></a></h3>
                            <span><?=$namaweb?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <div class="col-md-12 text-center mt-4">
                    <a href="produk" class="btn btn-primary px-5">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimoni</span>
                    <h2 class="mb-4">Dukungan & Testimoni</h2>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <?php foreach($keunggulan as $r) : ?>
                <div class="col-md-4 py-4 justify-content-center">
                    <div class="testimony-wrap py-4 justify-content-center ">
                        <div class="user-img text-center justify-content-center"
                            style="background-image: url(images/transportasi/<?=$r['gambar']?>)"></div>
                        <div class="text">
                            <div class="d-flex align-items-center">
                                <div class="pl-3">
                                    <p class="name"><?=$r['judul']?></p>
                                    <span class="position"><?=$r['harga_mulai']?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="mb-4"><?=$r['deskripsi']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Artikel</span>
                    <h2>Artikel Terbaru</h2>
                </div>
            </div>
            <div class="row d-flex">
                <?php foreach($artikel as $r) : ?>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text px-4 py-4">
                            <h3 class="heading mb-0"><a href="#"><?=$r['judul']?></a></h3>
                        </div>
                        <a href="artikel-<?php echo $r['judul_seo']?>-<?php echo $r['id_artikel']?>" class="block-20"
                            style="background-image: url('images/artikel/<?=$r['gambar']?>');">
                        </a>
                        <div class="text p-4 float-right d-block">
                            <div class="topper d-flex align-items-center">
                                <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                    <span class="day"><?=$r['day']?></span>
                                </div>
                                <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                    <span class="yr"><?=$r['year']?></span>
                                    <span class="mos"><?=$r['month']?></span>
                                </div>
                            </div>
                            <p><?php echo limit_desc($r['deskripsi'],150) ?></p>
                            <p><a href="artikel-<?php echo $r['judul_seo']?>-<?php echo $r['id_artikel']?>"
                                    class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>