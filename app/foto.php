<?php $this->layout('template') ?>
<section class="banner hero-wrap hero-wrap-2" style="background-image: url('images/<?=$promot['gambar']?>');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container image">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Promotion</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Promotion<i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info std_content ">
            <div class="col-lg-12">
                <div class="breadcrumb">
                    <a href="<?=$base_url?>">Home</a>
                    <a href="#">Promotion</a>
                </div>
                <h1>Promotion</h1>
                <div class="row d-flex mb-5 contact-info">
                    <?php foreach($data as $r) : ?>
                    <div class="col-md-4">
                        <div class="blog-entry justify-content-end item">

                            <a href="promotion-<?=$r['judul_seo']."-".$r['id_foto']?>">
                                <div class="img d-flex align-items-center justify-content-center img-hover-zoom">
                                    <img src="images/foto/<?=$r['gambar']?>">
                                </div>
                            </a>
                            <div class="dec">
                                <h4><?=$r['judul']?></h4>
                                <div class="hov">
                                    <a href="promotion-<?=$r['judul_seo']."-".$r['id_foto']?>"
                                        class="more">Read</a>
                                </div>
                                <span><i class="fa fa-calendar" aria-hidden="true"> </i> 
                                <?=$r['kode_produk']?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>