<?php $this->layout('template') ?>
<section class="container">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="py-4 px-4">
                <h2 class="font-weight-bold"><?=$judul?></h2>
                <hr>
            </div>
        </div>
        <?php foreach($produk as $r) : ?>
        <div class="col-md-3 col-sm-4 col-6" style="margin-bottom:5px;padding: 5px;">
            <div class="service-widget border">
                <div class="post-media wow fadeIn ww">
                    <a href="label-baju-<?=$r['judul_seo']."-".$r['id_produk']?>">
                        <picture>
                            <source media="(max-width: 600px)" srcset="images/produk/small/<?=$r['gambar']?>">
                            <source media="(min-width: 768px)" srcset="images/produk/<?=$r['gambar']?>">
                            <img src="images/produk/<?=$r['gambar']?>" alt="" class="img-responsive grow wiu"
                                style="height: auto; overflow: hidden;">
                        </picture>
                    </a>
                </div>
                <div class="product-card-text">
                    <a href="label-baju-<?=$r['judul_seo']."-".$r['id_produk']?>">
                        <p class="product-card-name font-weight-bold" title="<?=$r['judul']?>"><?=$r['judul']?></p>
                    </a>
                    <p class="product-card-shop">Rp. <?=$r['harga']?></p>
                </div>
                <div class="product-card-text">
                    <a href="label-baju-<?=$r['judul_seo']."-".$r['id_produk']?>"
                        class="btn btn-secondary btn-md btn-block" item-id="52161">Detail</a>

                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <div class="row py-4">
        <?php if(  $pagination['jmldata'] > $pagination['batas'] ) : ?>
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px">
            <div class="wp-pagenavi">
                <center><?= $pagination['linkHalaman'] ?></center>
            </div>
        </div>
        <?php endif ?>
    </div>
</section>