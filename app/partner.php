<?php $this->layout('template') ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Tim Partner</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Tim Partner<i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <?php foreach($data as $r) : ?>
    <?php if($r['id_partner'] % 2 == 0) { ?>
        <div class="container-fluid container-blue">
    <?php }else{ ?>
        <div class="container-fluid container-white">
    <?php } ?>
    
            <div class="row justify-content-center nopad nomar ctr">
                <div class="col-lg-5 nopad nomar ctr">
                <a href="partner-<?=$r['judul_seo']."-".$r['id_partner']?>">
                    <div class="staff-image-1" style="background-image: url(images/partner/<?=$r['gambar']?>);">
                    </div></a>
                </div>
                <div class="col-lg-7 nopad nomar ctr">
                <a href="partner-<?=$r['judul_seo']."-".$r['id_partner']?>"><h2><?=$r['judul']?></h2></a>
                    <h6><?=$r['kode_produk']?></h6>
                    <p><?=$r['deskripsi']?></p>
                </div>
            </div>
            
        </div>
        <?php endforeach ?>
</section>