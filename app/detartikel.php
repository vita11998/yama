<?php $this->layout('template') ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9  pb-5 text-center">
                <h1 class="mb-3 bread">Artikel</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Artikel<i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-6 d-flex">
                <img src="images/produk/<?=$data['gambar']?>" style="width: 100%">
            </div>
            <div class="col-lg-6 ">
                <div class="about-text">
                    <h3 style="margin-top:10px; font-weight: bold; font-size: 35px;"><?php echo $data['judul'] ?></h3>
                    <div class="addthis_inline_share_toolbox mt-3"></div>
                    <hr style="border-top: 5px solid #015786;margin-top:10px; margin-bottom: 20px;">
                    <?=$data['deskripsi']?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ">
                <h2>Layanan Lainnya</h2>
            </div>
        </div>
        <div class="row d-flex">
            <?php foreach($artikel as $r) : ?>
                <div class="col-md-4 d-flex ">
                <div class="blog-entry justify-content-end">
                    <div class="text px-4 py-4">
                        <h3 class="heading mb-0"><a href="#"><?=$r['judul']?></a></h3>
                    </div>
                    <a href="artikel-<?php echo $r['judul_seo']?>-<?php echo $r['id_artikel']?>" class="block-20" style="background-image: url('images/artikel/<?=$r['gambar']?>');">
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
                        <p><a href="artikel-<?php echo $r['judul_seo']?>-<?php echo $r['id_artikel']?>" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59dc9d30b368b392"></script>