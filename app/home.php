<?php $this->layout('template') ?>

<section class="banner home">
    <div class="slide_home">
        <div id="cusCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach($slider as $r) : ?>
                <?php if($r['id_slider'] == 1) { ?>
                <div class="carousel-item active">
                    <?php }else{ ?>
                    <div class="carousel-item">
                        <?php } ?>

                        <img class="d-block w-100" src="images/slider/<?=$r['gambar']?>" alt="First slide">
                    </div>
                    <?php endforeach ?>
                </div>
                <a class="carousel-control-prev" href="#cusCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#cusCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
</section>

<div class="middle">
    <section class="prod_feature" type-anim="top-load" anim-delay="0.1" style="top: 0px; opacity: 1;">
        <div class="wrapper w16">
            <div class="box_feature">
                <h1>Featured Product</h1>
                <div class="short">
                    <p>Honda's lineup of power products makes your life and your jobs so much easier.</p>

                </div>
                <a href=" https://www.hondapowerproducts.co.id/products " class="more">More Product</a>
            </div>
            <div class="list_feature">
                <div class="bx-wrapper" style="max-width: 810px; margin: 0px auto;">
                    <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 594px;">
                        <ul class="slide_feature"
                            style="width: 815%; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                            <li
                                style="float: left; list-style: none; position: relative; width: 230px; margin-right: 60px;">
                                <a
                                    href="https://www.hondapowerproducts.co.id/products/mesin-potong-ruput/brushcutter--umr435n ">
                                    <img
                                        src="https://www.hondapowerproducts.co.id/cfind/webp/images/products/Products_magnifier/thumb_190_190_contain_umrn.webp">
                                    <div class="dec">
                                        <h4>Brushcutter - UMR435N</h4>
                                        <ul>
                                            <p>Mini 4-stroke OHC engine, working through a full 360 degree with 2-blade
                                                cutter.</p>

                                            <p>Pipe Frame (Loop Handle), Flexible shaft reduces vibration, offers high
                                                durability and maximum torque power.</p>

                                            <p>with New Technology :&nbsp; Throttle Lever (Twin Throttle), Nut Cover,
                                                Gear Assy with ANTI DROP SYSTEM.</p>

                                        </ul>
                                    </div>
                                </a>
                            </li>
                            <li
                                style="float: left; list-style: none; position: relative; width: 230px; margin-right: 60px;">
                                <a href="https://www.hondapowerproducts.co.id/products/cultivator/tiller-f300 ">
                                    <img
                                        src="https://www.hondapowerproducts.co.id/cfind/webp/images/products/products/thumb_190_190_contain_f300.webp">
                                    <div class="dec">
                                        <h4>Tiller- F300</h4>
                                        <ul>
                                            <p>Honda F300 is provided a complete weeding solution for horticulture
                                                farmers in vegetable fields, plantations of sugar cane, cotton, bananas,
                                                flowers and fruit Maintenance / garden.</p>

                                            <p>37kg tiller is fitted with a powerful 4 Stroke, 1.5&nbsp; kW advanced OHV
                                                (over head valve) GX 80 petrol driven engine.</p>

                                        </ul>
                                    </div>
                                </a>
                            </li>
                            <li
                                style="float: left; list-style: none; position: relative; width: 230px; margin-right: 60px;">
                                <a href="https://www.hondapowerproducts.co.id/products/genset/genset--ez6500cxs ">
                                    <img
                                        src="https://www.hondapowerproducts.co.id/cfind/webp/images/products/products/thumb_190_190_contain_thumbnail_products_ez6500cxs.webp">
                                    <div class="dec">
                                        <h4>Generator - EZ6500CXS</h4>
                                        <ul>
                                            <p>Built to last, Honda generator EZ6500CXS&nbsp; delivers long-term
                                                reliability under the toughest working conditions. Easy handling, easy
                                                starting, safety, low vibration and exceptional build quality make Honda
                                                generators the perfect working partner for construction professionals,
                                                Home Use and Others.</p>

                                        </ul>
                                    </div>
                                </a>
                            </li>
                            <li
                                style="float: left; list-style: none; position: relative; width: 230px; margin-right: 60px;">
                                <a
                                    href="https://www.hondapowerproducts.co.id/products/mesin-tempel/mesin-tempel---bf20 ">
                                    <img
                                        src="https://www.hondapowerproducts.co.id/cfind/webp/images/products/products/thumb_190_190_contain_bf20.webp">
                                    <div class="dec">
                                        <h4>OUTBOARD - BF20</h4>
                                        <ul>
                                            <p>It's all about power, the Honda BF20 is the power king, with the largest
                                                displacement of any twenty-horsepower outboard in the industry-and it's
                                                also the lightest engine in its class.</p>

                                        </ul>
                                    </div>
                                </a>
                            </li>
                            <li
                                style="float: left; list-style: none; position: relative; width: 230px; margin-right: 60px;">
                                <a href="https://www.hondapowerproducts.co.id/products/genset/generator--ez3000cx ">
                                    <img
                                        src="https://www.hondapowerproducts.co.id/cfind/webp/images/products/products/thumb_190_190_contain_thumbnail_products_ez3000cx.webp">
                                    <div class="dec">
                                        <h4>Generator - EZ3000CX</h4>
                                        <ul>
                                            <p>The <em>Honda</em> EZ3000CX is an affordable and reliable generator with
                                                <em>Honda</em>'s basic features for light-use</p>

                                        </ul>
                                    </div>
                                </a>
                            </li>
                            <li
                                style="float: left; list-style: none; position: relative; width: 230px; margin-right: 60px;">
                                <a
                                    href="https://www.hondapowerproducts.co.id/products/mesin-serbaguna/engine-gx200t2lpg ">
                                    <img
                                        src="https://www.hondapowerproducts.co.id/cfind/webp/images/products/Products_magnifier/thumb_190_190_contain_GXLPG200.webp">
                                    <div class="dec">
                                        <h4>Engine- GX200T2LPG</h4>
                                        <ul>
                                            <p>Honda Technology LPG engine that can generate strong performance,
                                                environmentally friendly and highly economical for long term use.<br>
                                                <br>
                                                Lightweight design with compact shape facilitates installation of
                                                machinery for a wide range of equipment. Honda GX 4-Stroke engine series
                                                has become the international standard for versatile machine.</p>

                                        </ul>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="bx-controls bx-has-controls-direction">
                        <div class="bx-controls-direction"><a class="bx-prev" href="">Prev</a><a class="bx-next"
                                href="">Next</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="corporate">
        <div class="block about" type-anim="top" anim-delay="0.1" style="top: 0px; opacity: 1;">
            <div class="img">
                <img
                    src="https://www.hondapowerproducts.co.id/cfind/webp/images/banner/thumb_960_700_cover_home_a.webp">
            </div>
            <div class="text">
                <h1>ABOUT US</h1>
                <div class="short_dec">
                    <p>Thoughts of Founder are Origin of Honda Power Products In 1950, Soichiro Honda, the founder of
                        the company, started to think about ways to reduce the workload of people in Japan through
                        mechanization.</p>

                </div>
                <div class="link">

                </div>
            </div>
        </div>
        <div class="block maintenance" type-anim="top" anim-delay="0.1" style="top: 0px; opacity: 1;">
            <div class="img">
                <img
                    src="https://www.hondapowerproducts.co.id/cfind/webp/images/banner/thumb_960_700_cover_home_1.webp">
            </div>
            <div class="text">
                <h1>MAINTENANCE &amp; REPAIR</h1>
                <div class="short_dec">
                    <p>Our Honda Power Products and Honda Marine dealers have all the necessary tools for
                        <em>maintenance</em> and our qualified Honda technicians use Honda Genuine Parts to
                        <em>repair</em> your Honda Engine, Generator, Outboard, Tiller, Waterpump, Lawn Mower, Brush
                        Cutter.</p>

                </div>
                <div class="link">
                </div>
            </div>
        </div>
    </section>

    <section class="new_home">
        <div class="wrapper w16">
            <h1 type-anim="top" anim-delay="0.1">Latest News</h1>
            <div class="see_more" type-anim="top" anim-delay="0.1">
                <a href="https://www.hondapowerproducts.co.id/news-events/news-events" class="more">see all</a>
            </div>
            <div class="list_Hnews">
                <div class="item" type-anim="top" anim-delay="0.1" style="top: 0px; opacity: 1;">
                    <a
                        href="https://www.hondapowerproducts.co.id/news-events/news-events/pengumuman-pemenang-kuis-sosial-media">
                        <div class="img">
                            <img src="https://www.hondapowerproducts.co.id/webp?key=eyJpdiI6IkhIajNENHZzbzh2OG9LNUpQY0E2TXc9PSIsInZhbHVlIjoiWlV1SDJJbkZJczN0Uk5FamQwUVcwMjFqRjhTOHhpbjgxR0JpQURUbHJRZStVcjJSZldEWTZydkhXQ2ErSVlhUGRrbW1raFlKN0lQbmxwZFZrM00zS1pZZ29tU0dIWmxlY1ZXZlwvYjUxMmdONTVSWnBQV3d1cndTZEhTZU5YaEVBIiwibWFjIjoiYTAxMjczOTUxMjc2YzI1YTdjZTY1NzNkNjgyZTBiMWQwZWJkZmVhYzAxMzQxNDcyMTgyZjAwNjI5OTg2ZjRjNiJ9"
                                style="transform: matrix(1, 0, 0, 1, 0, 0);">
                        </div>
                    </a>
                    <div class="dec">
                        <a
                            href="https://www.hondapowerproducts.co.id/news-events/news-events/pengumuman-pemenang-kuis-sosial-media">
                            <p>SNS Giveaway Winner Announcement </p>
                        </a>
                        <a href="https://www.hondapowerproducts.co.id/news-events/news-events/pengumuman-pemenang-kuis-sosial-media"
                            class="more">Read</a>
                    </div>
                </div>
                <div class="item" type-anim="top" anim-delay="0.1" style="top: 0px; opacity: 1;">
                    <a
                        href="https://www.hondapowerproducts.co.id/news-events/news-events/honda-dengan-kualitas-dunia-pilihan-petani-dan-nelayan-indonesia">
                        <div class="img">
                            <img
                                src="https://www.hondapowerproducts.co.id/cfind/webp/images/news/news-events/thumb_520_250_cover_home_thumbnail_konversi_lpg.webp">
                        </div>
                    </a>
                    <div class="dec">
                        <a
                            href="https://www.hondapowerproducts.co.id/news-events/news-events/honda-dengan-kualitas-dunia-pilihan-petani-dan-nelayan-indonesia">
                            <p>Honda with World Quality, the Choice of Indonesian Farmers and Fishermen!</p>
                        </a>
                        <a href="https://www.hondapowerproducts.co.id/news-events/news-events/honda-dengan-kualitas-dunia-pilihan-petani-dan-nelayan-indonesia"
                            class="more">Read</a>
                    </div>
                </div>
                <div class="item" type-anim="top" anim-delay="0.1" style="top: 0px; opacity: 1;">
                    <a
                        href="https://www.hondapowerproducts.co.id/news-events/news-events/honda-a-partner-of-indonesian-food-heroes">
                        <div class="img">
                            <img
                                src="https://www.hondapowerproducts.co.id/cfind/webp/images/news/news-events/thumb_520_250_cover_home_pahlawan pangan.webp">
                        </div>
                    </a>
                    <div class="dec">
                        <a
                            href="https://www.hondapowerproducts.co.id/news-events/news-events/honda-a-partner-of-indonesian-food-heroes">
                            <p>Honda a Partner of Indonesian Food Heroes</p>
                        </a>
                        <a href="https://www.hondapowerproducts.co.id/news-events/news-events/honda-a-partner-of-indonesian-food-heroes"
                            class="more">Read</a>
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>



<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');display:none"
    data-stellar-background-ratio="0.5">
    <!-- <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate">
                <h2 class="subheading">Welcome To Legalcare</h2>
                <h1>Attorneys Fighting For Your
                    <span class="txt-rotate" data-period="2000"
                        data-rotate='[ "Freedom.", "Rights.", "Case.", "Custody." ]'></span>
                </h1>
                <h1 class="mb-4">Attorneys Fighting For Your Freedom</h1>
                <p class="mb-4">We have help thousands of people to get relief from national wide fights wrongfull
                    denials. Now they trusted legalcare attorneys</p>
                <p><a href="#" class="btn btn-primary mr-md-4 py-2 px-4">Get Legal Advice <span
                            class="ion-ios-arrow-forward"></span></a></p>
            </div>
        </div>
    </div> -->
</div>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 py-5">
                <div class="heading-section ftco-animate">
                    <span class="subheading"><?=$namaweb?></span>
                    <h2 class="mb-4">Pencapaian Kami</h2>
                </div>
            </div>
            <div class="col-lg-9 services-wrap px-4 pt-5">
                <div class="row pt-md-3">
                    <?php foreach($keuntungan as $keuntungan) : ?>
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="services text-center">
                            <div class="text">
                                <h3><span class="number mr-2" data-number="<?=$keuntungan['deskripsi']?>">0</span>
                                </h3>
                                <p><?=$keuntungan['judul']?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end"
                    style="background-image:url(images/<?=$welcome['gambar']?>);">
                    <a href="<?=$header[deskripsi]?>"
                        class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 pl-md-5">
                <div class="row justify-content-start pt-3 pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Welcome to <?=$namaweb?></span>
                        <?=$welcome['deskripsi']?>
                        <div class="years d-flex mt-4 mt-md-5">
                            <h4>
                                <span class="number mr-2" data-number="<?=$keuntungan2['deskripsi']?>">0</span>
                                <span>Years of Experienced</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container px-md-5">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Tim Kami</span>
                <h2 class="mb-4">Tim Astungkara</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach($foto as $r) : ?>
            <div class="col-lg-4 col-sm-6">
                <a href="foto-<?=$r['judul_seo']."-".$r['id_foto']?>">
                    <div class="block-2 ftco-animate">
                        <div class="flipper mb-5">
                            <div class="front" style="background-image: url(images/foto/<?=$r['gambar']?>);">
                                <div class="box">
                                    <h2><?=$r['judul']?></h2>
                                    <p><?=$r['kode_produk']?></p>
                                </div>
                            </div>
                            <div class="back">
                                <div class="image align-self-center">
                                    <img src="images/<?=$deskrip[1]?>" alt="" style="width: 100%">
                                </div>
                                <div class="author d-flex">
                                    <div class="name align-self-center ml-3"><?=$r['judul']?><span
                                            class="position"><?=$r['kode_produk']?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container px-md-5">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Tim Partner</span>
                <h2 class="mb-4">Partner Astungkara</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach($partner as $r) : ?>
            <div class="col-lg-3 col-sm-6">
                <a href="partner-<?=$r['judul_seo']."-".$r['id_partner']?>">
                    <div class="" style="background-image: url(images/partner/<?=$r['gambar']?>);">
                        <div class="box">
                            <h2><?=$r['judul']?></h2>
                            <p><?=$r['kode_produk']?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center heading-section ftco-animate">
                <span class="subheading"><?=$namaweb?></span>
                <h2 class="mb-4">Layanan Hukum</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach($produk as $r) : ?>
            <div class="col-md-4">
                <div class="case img d-flex align-items-center justify-content-center"
                    style="background: linear-gradient(0deg, rgba(82, 43, 48, 0.70), rgba(82, 43, 48, 0.40)), url(images/produk/<?=$r['gambar']?>);">
                    <div class="text text-center">
                        <h3><a href="produk-<?=$r['judul_seo']."-".$r['id_produk']?>"><?=$r['judul']?></a></h3>
                        <span><?=$namaweb?></span>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <div class="col-md-12 text-center mt-4">
                <a href="produk" class="btn btn-primary px-5">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimoni</span>
                <h2 class="mb-4">Dukungan & Testimoni</h2>
            </div>
        </div>
        <div class="row ftco-animate justify-content-center">
            <?php foreach($keunggulan as $r) : ?>
            <div class="col-md-4 py-4 justify-content-center">
                <div class="testimony-wrap py-4 justify-content-center ">
                    <div class="user-img text-center justify-content-center"
                        style="background-image: url(images/transportasi/<?=$r['gambar']?>)"></div>
                    <div class="text">
                        <div class="d-flex align-items-center">
                            <div class="pl-3">
                                <p class="name"><?=$r['judul']?></p>
                                <span class="position"><?=$r['harga_mulai']?></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-4"><?=$r['deskripsi']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Artikel</span>
                <h2>Artikel Terbaru</h2>
            </div>
        </div>
        <div class="row d-flex">
            <?php foreach($artikel as $r) : ?>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <div class="text px-4 py-4">
                        <h3 class="heading mb-0"><a href="#"><?=$r['judul']?></a></h3>
                    </div>
                    <a href="artikel-<?php echo $r['judul_seo']?>-<?php echo $r['id_artikel']?>" class="block-20"
                        style="background-image: url('images/artikel/<?=$r['gambar']?>');">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="topper d-flex align-items-center">
                            <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                <span class="day"><?=$r['day']?></span>
                            </div>
                            <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                <span class="yr"><?=$r['year']?></span>
                                <span class="mos"><?=$r['month']?></span>
                            </div>
                        </div>
                        <p><?php echo limit_desc($r['deskripsi'],150) ?></p>
                        <p><a href="artikel-<?php echo $r['judul_seo']?>-<?php echo $r['id_artikel']?>"
                                class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>