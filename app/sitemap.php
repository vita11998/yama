<?php $this->layout('template') ?>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info std_content ">
            <div class="col-md-4">
                <h1>Sitemap</h1>
                <p>
                    <a href="about" target="_self">About Us</a>
                </p>

                <p>
                    <a href="#" target="_self">
                        Products
                    </a>
                    <?php foreach($kategori as $r) : ?>
                    <p>
                        <a href="kategori-<?=$r['judul_seo']."-".$r['id_kategori']?>">
                            <span>- <?=$r['judul']?></span>
                        </a>
                    </p>
                    <?php endforeach ?>
                </p>


                <p>
                    <a href="dealers" target="_self">Dealers</a>
                </p>

                <p>
                    <a href="promotion" target="_self">Promotion</a>
                </p>

                <p>
                    <a href="artikel" target="_self">News &amp; Events</a>
                </p>

                <p>
                    <a href="kontak" target="_self">Contact Us</a>
                </p>

                <p>
                    <a href="career" target="_self">Career</a>
                </p>

            </div>
        </div>
    </div>
</section>