<?php $this->layout('template') ?>
    <!-- Portfolio section  -->
	<div class="portfolio-section">
	    <ul class="portfolio-filter controls text-center">
	        <li class="control" data-filter="all">All</li>
            <?php foreach($kategori as $r) : ?>
	        <li class="control" data-filter=".kat-<?=$r['id_portofolio_kategori']?>"><?=$r['judul']?></li>
	        <?php endforeach ?>
	    </ul>
	    <div class="row portfolio-gallery m-0">
            <?php foreach($porto as $r) : ?>
	        <div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 kat-<?=$r['id_portofolio_kategori']?>">
	            <a href="images/portofolio/<?=$r['gambar']?>" class="portfolio-item img-popup set-bg" data-setbg="images/portofolio/small/<?=$r['gambar']?>"></a>
	        </div>
	        <?php endforeach ?>
            <?php if(  $pagination['jmldata'] > $pagination['batas'] ) : ?>
                <div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0">
                    <?= $pagination['linkHalaman'] ?>
                </div>
            <?php endif ?>
	    </div>
	</div>
	<!-- Portfolio section end  -->