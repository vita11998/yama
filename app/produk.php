<?php $this->layout('template') ?>

<section class="banner hero-wrap hero-wrap-2" style="background-image: url('images/kategori/<?=$header['gambar_mobile']?>');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container images">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread"><?=$header['judul']?></h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span>
                    <span><a href="produk">Products <i class="ion-ios-arrow-forward"></i></a></span>
                    <span><?=$header['judul']?><i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-no-pt contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
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
                    <a href="produk">Products</a>
                    <a href="kategori-<?=$header['judul_seo']."-".$header['id_kategori']?>"><?=$header['judul']?></a>
                </div>
                <div class="row d-flex mb-5">
                    <div class="col-lg-12">
                        <div class="std_content">
                            <h1><?=$header['judul']?></h1>
                            <p><?=$header['deskripsi']?></p>
                        </div>
                    </div>
                </div>
                <?php foreach($produk as $r) : ?>
                <div class="row d-flex mb-5 contact-info box">
                    <div class="col-lg-4">
                        <img src="images/produk/<?=$r['gambar']?>" style="width: 100%">
                    </div>
                    <div class="col-lg-8">
                        <div class="about-text">
                            <div class="std_content">
                                <h4><?php echo $r['judul'] ?></h4>
                                <p><?=$r['promo']?></p>
                            </div>
                        </div>
                        <a href="produk-<?=$r['judul_seo']."-".$r['id_produk']?>" class="btn-red"><span>Learn
                                More</span></a>

                    </div>
                </div>
                <?php endforeach ?>
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
        </div>
    </div>
</section>