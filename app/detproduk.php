<?php $this->layout('template') ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9  pb-5 text-center">
                <h1 class="mb-3 bread">Layanan Hukum</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Layanan Hukum<i
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
            <?php foreach($produk as $r) : ?>
                <div class="col-md-4">
                <div class="case img d-flex align-items-center justify-content-center"
                    style="background-image: url(images/produk/<?=$r['gambar']?>);">
                    <div class="text text-center">
                        <h3><a href="produk-<?=$r['judul_seo']."-".$r['id_produk']?>"><?=$r['judul']?></a></h3>
                        <span><?=$namaweb?></span>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59dc9d30b368b392"></script>