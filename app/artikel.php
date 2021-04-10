<?php $this->layout('template') ?>
<section class="banner hero-wrap hero-wrap-2" style="background-image: url('images/<?=$head['gambar']?>');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container image">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">News & Event</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>News & Event<i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row d-flex mb-5 contact-info std_content ">
            <div class="col-md-4 d-flex">
                <div class="asside">
                    <h1>Products</h1>
                    <nav>
                        <?php foreach($kategori as $r) : ?>
                        <a href="kategori-<?=$r['judul_seo']."-".$r['id_kategori']?>"><span class="l_left"
                                style="height: 0px;"></span><span class="hover" style="width: 0px;"></span><span
                                style="position:relative"><?=$r['judul']?></span></a>
                        <?php endforeach ?>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8 page">
                <div class="breadcrumb">
                    <a href="<?=$base_url?>">Home</a>
                    <a href="produk">News & Event</a>
                </div>
                <div class="row d-flex mb-5">
                    <div class="col-lg-12">
                        <div class="std_content">
                            <h1>News & Event</h1>
                            <p><?=$header['deskripsi']?></p>
                        </div>
                    </div>
                </div>
                <div class="row  mb-5">
                    <?php foreach($data as $r) : ?>
                    <div class="col-md-6">
                        <div class="blog-entry justify-content-end item">

                            <a href="artikel-<?=$r['judul_seo']."-".$r['id_artikel']?>">
                                <div class="img d-flex align-items-center justify-content-center img-hover-zoom">
                                    <img src="images/artikel/<?=$r['gambar']?>">
                                </div>
                            </a>
                            <div class="dec">
                                <h4><?=$r['judul']?></h4>
                                <div class="hov">
                                    <a href="artikel-<?=$r['judul_seo']."-".$r['id_artikel']?>" class="more">Read</a>
                                </div>
                                <span><i class="fa fa-calendar" aria-hidden="true"> </i>
                                    <?=$r['day']?> <?=$r['month']?> <?=$r['year']?>
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