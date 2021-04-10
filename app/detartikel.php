<?php $this->layout('template') ?>
<section class="banner hero-wrap hero-wrap-2" style="background-image: url('images/artikel/<?=$data['gambar']?>');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <!-- <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9  pb-5 text-center">
                <h1 class="mb-3 bread">Artikel</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Artikel<i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div> -->
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-lg-12">
            <div class="breadcrumb">
                    <a href="<?=$base_url?>">Home</a>
                    <a href="artikel">News & Event</a>
                    <a href="#"><?php echo $data['judul'] ?></a>
                </div>
                <div class="std_content">
                    <h1 style="margin: 0;"><?=$data['judul']?></h1>
                    <p><i class="fa fa-calendar"> </i> <?=$data['day']?> <?=$data['month']?> <?=$data['year']?></p>
                </div>
            </div>
        </div>
        <div class="row d-flex mb-5 contact-info std_content">
            <div class="col-md-12 d-flex">
                <div class="about-text">
                    <?=$data['deskripsi']?>
                </div>
            </div>
        </div>

        <div class="share">
            <span>Share :</span>
            <div class="addthis_inline_share_toolbox mt-3"></div>
        </div>
    </div>
</section>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59dc9d30b368b392"></script>