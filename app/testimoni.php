<?php $this->layout('template') ?>
<!-- About section  -->
<section class="article-section" style="background-color: #F4F4F4;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="py-4 px-4">
                    <h2 class="font-weight-bold"><span style="color:#10802c">Kata Pelanggan</span> Label Klambi</h2>
                    <hr>
                </div>
            </div>
            <?php foreach($data as $r) : ?>
            <div class="col-md-3 mb-4">
                <div class="box-testi">
                <a href="images/testimoni/<?=$r['gambar']?>" data-toggle="lightbox">
                    <img class="w-100" src="images/testimoni/<?=$r['gambar']?>" alt="<?=$r['judul']?>">
                </a>   
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- About section end  -->