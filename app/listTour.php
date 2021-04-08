<?php $this->layout('template') ?>
<style>
.bg-kat {
    background-image: url("images/tour_kategori/<?=$kategori['gambar']?>");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
}
</style>
<section class="martip d-flex justify-content-center py-4 bg-kat">
    <div class="kat-background-overlay"></div>
    <div class="elementor-shape elementor-shape-bottom" data-negative="false"> <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 283.5 19.6" preserveAspectRatio="none">
            <path class="elementor-shape-fill" style="opacity:0.33" d="M0 0L0 18.8 141.8 4.1 283.5 18.8 283.5 0z">
            </path>
            <path class="elementor-shape-fill" style="opacity:0.33" d="M0 0L0 12.6 141.8 4 283.5 12.6 283.5 0z"></path>
            <path class="elementor-shape-fill" style="opacity:0.33" d="M0 0L0 6.4 141.8 4 283.5 6.4 283.5 0z"></path>
            <path class="elementor-shape-fill" d="M0 0L0 1.2 141.8 4 283.5 1.2 283.5 0z"></path>
        </svg></div>
    <div>
        <div class="container hebi">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-white mb-4"><?=$kategori['judul']?></h1>
                    <p class="text-white"><?=$kategori['deskripsi']?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container my-4">
        <div class="row">
            <?php foreach($tour as $r) : ?>
            <div class="col-md-6 mb-4">
                <div class="card p-2" style="box-shadow: 2px 0px 5px 0px rgba(0,0,0,0.75);">
                    <div class="package-item package-fadein">
                        <div class="square">
                            <div class="square-content">
                                <div class="img-wrap">
                                    <figure class="effect-zoom">
                                        <div class="package-price">
                                            <small>Mulai dari</small>
                                            <span>Rp <?=$r['harga_mulai']?></span>
                                        </div>
                                        <div class="package-star2 text-right">
                                            <ul class="package-category2">
                                                <li><a class="badge2" href="kategori-one-day-trip-5"><?=$r['judul']?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#">
                                            <picture>
                                                <source media="(min-width: 651px)"
                                                    srcset="images/tour/<?=$r['gambar']?>">
                                                <source media="(max-width: 650px)"
                                                    srcset="images/tour/small/<?=$r['gambar']?>">
                                                <img src="images/tour/<?=$r['gambar']?>" class="landscape grow">
                                            </picture>
                                        </a>
                                        <figcaption>
                                            <a href="#"
                                                class="package-title"><?=$r['destinasi']?></a>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="package-duration"><?=$kategori['judul']?></p>
                                                
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="harga-tab" data-toggle="tab" href="#h<?=$r['id_tour']?>" role="tab"
                                aria-controls="home" aria-selected="true">Harga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="fasilitas-tab" data-toggle="tab" href="#f<?=$r['id_tour']?>" role="tab"
                                aria-controls="fasilitas" aria-selected="false">Fasilitas</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="h<?=$r['id_tour']?>" role="tabpanel" aria-labelledby="harga-tab">
                            <div class="p-2">
                            <?=$r['harga']?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="f<?=$r['id_tour']?>" role="tabpanel" aria-labelledby="fasilitas-tab">
                            <div class="p-2">
                            <?=$r['fasilitas']?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                        <a href="https://api.whatsapp.com/send?phone=<?=$deskrip[7]?>&text=Hallo%20Citra%20Tour%20Saya%20tertarik%20untuk%20memesan%20paket%20wisata%20<?=$r['judul']?>%20dengan%20destinasi%20<?=$r['destinasi']?>" class="btn btn-info btn-block">Pesan Sekarang !</a>
                        </div>
                    </div>
                </div><!-- Card -->
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>