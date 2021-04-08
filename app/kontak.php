<?php $this->layout('template') ?>
<div class="d-none d-md-block">
    <section class="mainn elytra cta aos-init aos-animate  d-flex align-items-center py-5"
        style="background: url('images/<?=$data['gambar']?>') no-repeat fixed ;background-size: 1349px 1200px;background-position: center;"
        data-aos="fade-up">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="gallary-header ">
                        <h2 class="text-center text-white"><strong class=""><?=$data['judul']?></strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="d-sm-none">
    <section class="mainn elytra cta aos-init aos-animate  d-flex align-items-center py-5"
        style="background: url('images/<?=$data['gambar']?>') no-repeat  ;background-size: 100%;background-position: center;"
        data-aos="fade-up">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="gallary-header ">
                        <h2 class="text-center text-white"><strong class=""><?=$data['judul']?></strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="contact" class="contact-info-area bg-gray default-padding pt-5">
    <div class="container">
        <div class="row">
            <!-- Start Maps & Contact Form -->
            <div class="col-md-12 maps-form">
                <div class="row">
                    <div class="col-md-6 maps">
                        <h3>Denah Lokasi</h3>
                        <div class="google-maps">
                            <?=$deskrip[81]?>
                        </div>
                    </div>
                    <div class="col-md-6 form">
                        <div class="heading f-item address">
                            <h3 >Kontak</h3>
                            <!-- <p>
                                Occasional terminated insensible and inhabiting gay. So know do fond to half on. Now who promise was justice new winding
                            </p> -->
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <p>Email <br><span><a
                                                href="mailto:<?=$sosmed[5]['link']?>"><?=$sosmed[5]['link']?></a></span>
                                    </p>
                                </li>
                                <li>
                                    <i class="fa fa-map"></i>
                                    <p>Address <br><span>Jl. Perjuangan No.5, Kota Pinang, Kab. Labuhanbatu Selatan, Sumatera Utara 21511</span></p>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <p>Phone <br><span><?=$deskrip[82]?></span></p>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Maps & Contact Form -->

        </div>
        <div class="row">
            <div class="maps-form col-md-12 form" id="kotaksaran">
                <div class="">
                    <br><br>
                    <div class="col-md-12 heading">
                        <h3 class=" wow slideInRight animated" data-wow-duration="10s" data-wow-delay="5s">Kotak Saran</h3>
                    </div>
                    <form action="kontak" method="POST">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" placeholder="Nama" type="text">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                <span class="alert-error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="form-group">
                                <input class="form-control" id="phone" name="phone" placeholder="Nomor Telephone"
                                    type="text">
                                <span class="alert-error"></span>
                            </div>

                        </div>
                        <div class="col-md-12">

                            <div class="form-group comments">
                                <textarea class="form-control" id="comments" name="message"
                                    placeholder="Pesan *"></textarea>
                            </div>

                        </div>
                        <div class="col-md-12">

                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                Kirim Pesan <i class="fa fa-paper-plane"></i>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>