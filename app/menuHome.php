<header id="header">
    <!-- <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                    <ul>
                        <li><a href="#">Visit Us</a></li>
                        <li><a href="#">Buy Tickets</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                    <div class="header-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="kukio" style=""></div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="<?=$base_url?>">HOME</a></li>
                    <li class="menu-has-children"><a href="">RENTAL MOBIL</a>
                        <ul>
                            <li><a href="daily-rent-service">Daily Rent Service</a></li>
                            <li><a href="transfer-in-out">Transfer In Out</a></li>
                            <li><a href="wedding-car">Wedding Car</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">PAKET TOUR JOGJA</a>
                        <ul>
                            <?php
                                $tete = $db->read("tour_kategori","*", "pien ='tour-jogja' ")->fetchAll();
                                foreach($tete as $m):
                            ?>
                            <li><a
                                    href="kategori-tour-<?=$m['judul_seo']."-".$m['id_tour_kategori']?>"><?=$m['judul']?></a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">PAKET TOUR LAINNYA</a>
                        <ul>
                            <?php
                                $tete = $db->read("tour_kategori","*", "pien ='tour-lain' ")->fetchAll();
                                foreach($tete as $m):
                            ?>
                            <li><a
                                    href="kategori-tour-<?=$m['judul_seo']."-".$m['id_tour_kategori']?>"><?=$m['judul']?></a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <!-- <li class="menu-has-children"><a href="">Pages</a>
                            <ul>
                                <li><a href="elements.html">Elements</a></li>
                                <li class="menu-has-children"><a href="">Level 2 </a>
                                    <ul>
                                        <li><a href="#">Item One</a></li>
                                        <li><a href="#">Item Two</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                    <li class="menu-has-children"><a href="">GALERI</a>
                        <ul>
                            <li><a href="video">Video</a></li>
                            <li><a href="foto">Foto</a></li>
                        </ul>
                    </li>
                    <li><a href="blog">BLOG</a></li>
                    <li><a href="kontak">KONTAK</a></li>
                    <li><a href="custom-tour">TOUR CUSTOM</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>