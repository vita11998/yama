<header id="header" class="bg-dark">
    <div class="main-menu">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="<?=$base_url?>"><img style="height:50px" src="images/<?=$deskrip[1]?>"  /></a>
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
                                <li><a href="kategori-tour-<?=$m['judul_seo']."-".$m['id_tour_kategori']?>"><?=$m['judul']?></a></li>
                            <?php endforeach ?>
                            </ul>
                        </li>
                        <li class="menu-has-children"><a href="">PAKET TOUR LAINNYA</a>
                        <ul>
                            <?php
                                $tete = $db->read("tour_kategori","*", "pien ='tour-lain' ")->fetchAll();
                                foreach($tete as $m):
                            ?>
                                <li><a href="kategori-tour-<?=$m['judul_seo']."-".$m['id_tour_kategori']?>"><?=$m['judul']?></a></li>
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
    </div>
</header>