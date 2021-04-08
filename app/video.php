<?php $this->layout('template') ?>
<section class="mainn elytra cta aos-init aos-animate  d-flex align-items-center py-5"
    style="background: url('images/<?=$data['gambar']?>') no-repeat fixed ;background-size: cover;"
    data-aos="fade-up">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="gallary-header ">
                    <h2 class="text-center text-white"><strong class="">Galeri Video</strong></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-abu py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Galeri Video</h2>
            </div>
        </div>
        <div class="row list-videos">
            <?php foreach($video as $r) : ?>
            <div class="col-md-3 col-6 mb-4">
                <figure class="item-video">
                    <div class="thumb-icon">
                        <i class="fa fa-play"></i>
                    </div>
                    <figcaption class="video-content">
                        <span class="title-video"><?=$r['nama']?> </span>
                        <a href="<?=$r['url']?>" class="kipo popup-youtube ">
                            <i class="fa fa-play-circle fa-3x"></i>
                        </a>
                    </figcaption>
                    <figure class="thumbnail-img"
                        style="background-image: url('images/banner/<?=$r['gambar']?>'); background-size: cover; background-position: center center;">
                        <img src="images/banner/<?=$r['gambar']?>" style="display: none;">
                    </figure>
                </figure>
            </div>
            <?php endforeach ?>
        </div>
        <div class="row">
            <?php if(  $pagination['jmldata'] > $pagination['batas'] ) : ?>
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px">
                <div class="wp-pagenavi">
                    <center><?= $pagination['linkHalaman'] ?></center>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</section>