<?php $this->layout('template') ?>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info std_content ">
            <div class="col-lg-12">
                <div class="breadcrumb">
                    <a href="<?=$base_url?>">Home</a>
                    <a href="#">Dealers</a>
                </div>
                <h1>Dealers</h1>
                <div class="row d-flex mb-5 contact-info">
                    <?php foreach($data as $r) : ?>

                    <div class="row justify-content-center std_content list_dealer">
                        <div class="col-lg-4">
                            <img src="images/partner/<?=$r['gambar']?>" style="width: 100%">
                        </div>
                        <div class="col-lg-4">
                            <h2 class="block"><?=$r['judul']?></h2>
                            <p><?=$r['deskripsi']?></p>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="block">Product</h2>
                            <?php foreach($kategori as $r) : ?>
                                <p><a href="kategori-<?=$r['judul_seo']."-".$r['id_kategori']?>"><?=$r['judul']?></a></p>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>