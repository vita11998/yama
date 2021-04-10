<?php $this->layout('template') ?>

<section class="banner home">
    <div class="slide_home">
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
        </div>
    </div>
</section>

<div class="middle">
    <section class="prod_feature ftco-section">
        <div class="wrapper w16">
            <div class="box_feature"
                style="background: url('images/<?=$prakata['gambar']?>') no-repeat right top !important;">
                <h1 class="text-white">Featured Product</h1>
                <div class="short">
                    <p><?=$prakata['deskripsi']?></p>
                </div>
                <a href="produk" class="more">More Product</a>
            </div>
            <div class="list_feature">
                <div class="bx-wrapper" style="max-width: 810px; margin: 0px auto;">
                    <div class="row ftco-animate">
                        <div class="col-md-12">
                            <div class="carousel-testimony owl-carousel ftco-owl">
                                <?php foreach($produk as $r) : ?>
                                <div class="item">
                                <a href="produk-<?=$r['judul_seo']."-".$r['id_produk']?>">
                                    <div class="testimony-wrap py-4">
                                        <img src="images/produk/<?=$r['gambar']?>">
                                        <div class="kilian">
                                            <h4><?=$r['judul']?></h4>
                                            <p><?=$r['promo']?></p>
                                        </div>
                                    </div>
                                </a>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section corporate">
        <div class="block about" type-anim="top" anim-delay="0.1" style="top: 0px; opacity: 1;">
            <div class="img ty">
                <img src="images/<?=$welcome['gambar']?>">
            </div>
            <div class="text">
                <h1 class="text-white">ABOUT US</h1>
                <div class="short_dec">
                    <p><?=$welcome['deskripsi']?></p>

                </div>
                <div class="link">

                </div>
            </div>
        </div>
        <div class="block maintenance" type-anim="top" anim-delay="0.1" style="top: 0px; opacity: 1;">
            <div class="img ty">
                <img src="images/<?=$header['gambar']?>">
            </div>
            <div class="text">
                <h1 class="text-white">MAINTENANCE & REPAIR</h1>
                <div class="short_dec">
                    <p><?=$header['deskripsi']?></p>

                </div>
                <div class="link">

                </div>
            </div>
        </div>
    </section>
</div>


<section class="ftco-section">
    <div class="container-fluid">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Latest News</h2>
                <a href="artikel" class="ab">
                    See All
                </a>
            </div>
        </div>
        <div class="row d-flex">
            <?php foreach($artikel as $r) : ?>
            <div class="col-md-4">
                <div class="blog-entry justify-content-end">

                    <a href="artikel-<?php echo $r['judul_seo']?>-<?php echo $r['id_artikel']?>">
                        <div class="img d-flex align-items-center justify-content-center img-hover-zoom tb">
                            <img src="images/artikel/<?=$r['gambar']?>">
                        </div>
                    </a>
                    <div class="text px-4 py-4">
                        <h3 class="heading mb-5"><a href="#"><?=$r['judul']?></a></h3>
                        <a href="artikel-<?php echo $r['judul_seo']?>-<?php echo $r['id_artikel']?>" class="ab">
                            Read
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>