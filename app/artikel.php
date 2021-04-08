<?php $this->layout('template') ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Artikel</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Artikel<i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            <?php foreach($data as $r) : ?>
            <div class="col-md-4 d-flex ftco-animate">
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