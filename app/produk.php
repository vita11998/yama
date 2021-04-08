<?php $this->layout('template') ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Layanan Hukum</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Layanan Hukum<i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php foreach($data as $r) : ?>
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