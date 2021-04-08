<?php $this->layout('template') ?>
<section class="mainn elytra cta aos-init aos-animate  d-flex align-items-center py-5"
    style="background: url('images/<?=$data['gambar']?>') no-repeat fixed ;background-size: cover;background-position: center;"
    data-aos="fade-up">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="gallary-header ">
                    <h2 class="text-center text-white"><strong class="">Pencarian</strong></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container owl-wrap">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-2">Hasil Pencarian</h2>
                <hr>
            </div>
        </div>
        <div class="row " >
            <?php foreach($berita as $r) : ?>
            <div class="col-md-3">
                <div class="rt-course-box">
                    <div class="rtin-thumbnail hvr-bounce-to-right">
                        <picture>
                            <source media="(min-width: 651px)" srcset="images/artikel/<?=$r['gambar']?>">
                            <source media="(max-width: 650px)" srcset="images/artikel/small/<?=$r['gambar']?>">
                            <img style="min-height:176px" class="w-100 lazyOwl" data-src="images/artikel/<?=$r['gambar']?>">
                        </picture>
                        <a href="berita-<?=$r['judul_seo']."-".$r['id_artikel']?>" title="<?=$r['judul']?>"><i
                                class="fa fa-link" aria-hidden="true"></i></a>
                        <div class="rtin-price"><span class="rt-lp-price"><ins>Free</ins></span></div>
                    </div>
                    <div class="rtin-content-wrap">
                        <div class="rtin-content">
                            <h3 class="rtin-title"><a class="text-dark" href="berita-<?=$r['judul_seo']."-".$r['id_artikel']?>"
                                    title="<?=$r['judul']?>"><?=$r['judul']?></a></h3>
                            <div class="d-flex justify-content-start">
                                <div class="rtin-author"><i class="fa fa-calendar" style="color:red" aria-hidden="true"></i><a class="text-dark" href="#"> <?=tgl2($r['tgl'])?>
                                        </a></div>
                                <div style="margin-left:10px" class=""><i class="fa fa-eye" style="color:red" aria-hidden="true"></i><span>
                                            <?=$r['dilihat']?></span></div>
                            </div>
                            <div class="rtin-description"><?=limit_desc($r['deskripsi'],200)?></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
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