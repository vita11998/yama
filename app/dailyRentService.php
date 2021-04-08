<?php $this->layout('template') ?>
<section class="banner-area relative martip">
    <div class="overlay overlay-bg"></div>
    <ul id="slider-home">
        <?php foreach($slider as $r) : ?>
        <li style="max-height: 420px;overflow:hidden">
            <a href="#slide1"><img style="" src="images/daily_slider/<?=$r['gambar']?>"></a>
        </li>
        <?php endforeach ?>
    </ul>
</section>
<section>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <?=$prakata['deskripsi']?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container my-5">
        <div class="row">
            <?php foreach($cars as $k) : ?>
            <div class="col-md-12 text-center mb-4">
                <h2><?=$k['judul']?></h2>
            </div>
            <?php
             $mobil = $db->connection("SELECT * FROM daily_car WHERE id_daily_kategori = $k[id_daily_kategori] ");
             while($m = $mobil->fetch()) :
             $desc = $db->connection("SELECT * FROM daily_description WHERE id_daily_car = $m[id_daily_car] ")->fetchAll();
            ?>
            <div class="col-md-3 mb-4">
                <div class="card" style="box-shadow: 0 0 9px 1px rgb(0 0 0 / 10%)">
                    <img class="card-img-top" src="images/daily_car/<?=$m['gambar']?>" alt="<?=$m['judul']?>">
                    <div class="card-header text-center text-white" style="background-color:#3e6d99"><?=$m['judul']?></div>
                    <ul class="list-group list-group-flush text-center">
                        <?php foreach($desc as $d) : ?>
                        <li class="list-group-item"><?=$d['deskripsi']?></li>
                        <?php endforeach ?>
                    </ul>
                    <div class="card-body d-flex justify-content-center">
                        <a href="#" class="btn btn-warning">Booking Now</a>
                    </div>
                </div>
            </div>
            <?php endwhile;
            endforeach ?>
        </div>
    </div>
</section>
<section>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <?=$tips['deskripsi']?>
            </div>
        </div>
    </div>
</section>