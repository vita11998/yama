<?php $this->layout('template') ?>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-lg-12">
                <div class="std_content">
                    <h1 style="margin: 0;"><?=$data['judul']?></h1>
                    <p><i class="fa fa-calendar"> </i> <?=$data['kode_produk']?></p>
                </div>
            </div>
        </div>
        <div class="row d-flex mb-5 contact-info std_content">
            <div class="col-md-4 d-flex">
                <img src="images/foto/<?=$data['gambar']?>" style="width: 100%">
            </div>
            <div class="col-lg-8 ">
                <div class="about-text">
                    <p><?=$data['deskripsi']?></p>
                </div>
            </div>
        </div>
        <div class="share">
            <span>Share :</span>
            <div class="addthis_inline_share_toolbox mt-3"></div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ">
                <h2>Other Promo</h2>
            </div>
        </div>
        <div class="row d-flex">
            <?php foreach($foto as $r) : ?>
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
                            <a href="promotion-<?=$r['judul_seo']."-".$r['id_foto']?>" class="more">Read</a>
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
</section>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59dc9d30b368b392"></script>