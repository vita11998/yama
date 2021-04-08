<?php
$default 	= "Astungkara Law";
$judul  	= "Astungkara Law";
if($seo=='home' ){
	$tseo = $db->connection("SELECT * FROM page WHERE id_page='0' ");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);
	$judul= "$seo[title]   ";
}
elseif($seo=='about'){
	$tseo = $db->connection("SELECT * FROM page WHERE id_page='1' ");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);
	$judul= "$seo[title]  ";
}
elseif($seo=='contact'){
	$tseo = $db->connection("SELECT * FROM page WHERE id_page= 8 ");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);
	
	$judul= "$seo[title]  | $default ";
}elseif($seo=='detpage'){
	$tirl = $db->connection("SELECT * FROM page WHERE id_page= $id ");
	$ttirl = $tirl->fetch(PDO::FETCH_ASSOC);

	$judul= "$ttirl[judul] | $default";
}else{
	$judul= $default;
}
?>
<!DOCTYPE html>
<html lang="id" class="no-js">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">

    <?=$this->insert('seo')?>
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#FFCB01">
    <meta name="msapplication-TileColor" content="#FFCB01">
    <meta name="theme-color" content="#FFCB01">

    <!-- CSS only -->
    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css?v<?=date('i:s')?>" />
    <link rel="stylesheet" href="assets/css/styles.min.css?v<?=date('i:s')?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <?=$deskrip[84]?>
</head>

<body>
    <header>
        <div class="top_head">
            <div class="wrapper w16">
                <div class="left">
                    <a href="" class="login">Monday - Friday</a>
                    <a href="" target="_self">
                    <i class="fa fa-clock"> </i> 08.00 - 16.00
                    </a>
                    <a href="tel:<?=$deskrip['82']?>" target="_blank">
                        <i class="fa fa-phone"> </i> <?=$deskrip['82']?>
                    </a>
                    <a href="<?=$base_url?>/en/service-support/documents"><i class="fab fa-whatsapp"> </i> <?=$deskrip['82']?></a>
                </div>
                <div class="right">
                    <a href="http://en.honda-powerproducts.com/" target="_blank">
                    <i class="fab fa-instagram"> </i>
                    </a>
                    <a href="http://en.honda-powerproducts.com/" target="_blank">
                    <i class="fab fa-twitter"> </i>
                    </a>
                    <a href="http://en.honda-powerproducts.com/" target="_blank">
                    <i class="fab fa-facebook"> </i>
                    </a>
                </div>
            </div>
        </div>
        <div class="main_head">
            <div class="wrapper w16">
                <div class="logo">
                    <a href="<?=$base_url?>">
                        <img src="images/<?=$deskrip[1]?>">
                    </a>
                </div>
                <div class="nav_menu">
                    <nav>
                        <div class="nav_content">
                            <ul>
                                <li class="have_child">
                                    <a href="tentang"
                                        target="_self">About Us</a>
                                </li>

                                <li class="have_child product">
                                    <a href="#" target="_self">
                                        Products
                                    </a>
                                    <div class="sub prod" style="display: none; opacity: 0;">
                                        <div class="wrapper w16">
                                            <ul>
                                            <?php foreach($kategori as $r) : ?>
                                                <li>
                                                    <a href="kategori-<?=$r['judul_seo']."-".$r['id_kategori']?>"
                                                        class="one">
                                                        <img
                                                            src="images/kategori/<?=$r['gambar']?>">
                                                        <span><?=$r['judul']?></span>
                                                    </a>
                                                    <div class="sub2">
                                                        <a href="" class="back_sub"><span></span><?=$r['judul']?></a>
                                                </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <a href="<?=$base_url?>/dealer" target="_self">Dealers</a>
                                </li>

                                <li>
                                    <a href="artikel"
                                        target="_self">Promotion</a>
                                </li>

                                <li class="have_child">
                                    <a href="artikel"
                                        target="_self">News &amp; Events</a>
                                </li>

                            </ul>
                            <div class="btm_nav">

                                <div class="list">
                                    <a href="<?=$base_url?>/contact-us" target="_self">
                                        Contact Us
                                    </a>
                                    <a href="http://sustainability.honda.asia/" target="_blank">
                                        Sustainability Campaign
                                    </a>

                                    <a href="http://en.honda-powerproducts.com/" target="_blank">
                                        HONDA POWER PRODUCTS WORLDWIDE
                                    </a>
                                </div>
                                <div class="src_lang">
                                    <div class="lang">
                                        <a href="<?=$base_url?>/en/service-support/documents"
                                            class="active">English</a>
                                        <a
                                            href="<?=$base_url?>/id/service-support/documents">Indonesia</a>
                                    </div>
                                    <div class="src_mob">
                                        <form method="get" action="<?=$base_url?>/search"
                                            id="searchForm">
                                            <input type="text" name="keyword" placeholder="Search">
                                            <input type="submit" name="" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </nav>
                    <span class="ico_src"></span>
                    <form class="head_src" method="get" action="<?=$base_url?>/search"
                        id="searchForm" style="width: 993px;">
                        <input type="text" name="keyword" placeholder="Search...">
                        <span class="ico_close"></span>
                    </form>
                    <div class="menu_mobile">
                        <div class="src_mob">
                            <span class="ico_src"></span>
                            <form method="get" action="<?=$base_url?>/search" id="searchForm">
                                <input type="text" name="keyword" placeholder="Search">
                                <input type="submit" name="" value="">
                            </form>
                        </div>
                        <div class="lang">
                            <a href="<?=$base_url?>/en/service-support/documents"
                                class="active">English</a>
                            <a href="<?=$base_url?>/id/service-support/documents">Indonesia</a>
                        </div>
                        <div class="mob_login">
                            <a href="" class="login">Dealer Login </a>
                            <div class="box_login">
                                <h4>DEALER LOGIN</h4>
                                <form method="POST" action="<?=$base_url?>/dealers/login"
                                    accept-charset="UTF-8"><input name="_token" type="hidden"
                                        value="hMnJi9HUEO6aruIXameRmkeLERkAprVoFJeSELXx">
                                    <input type="text" name="username" placeholder="Username">
                                    <input type="password" name="password" placeholder="Password">
                                    <div class="btn_2">
                                        <input type="submit" name="" value="Login">
                                    </div>
                                </form>
                                <p>Forgot your password? <a
                                        href="<?=$base_url?>/dealers/forgot">CLICK HERE</a></p>
                            </div>
                        </div>
                        <a href="" class="toggle_menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg_sub" style="display: none; opacity: 0;"></div>
        </div>
    </header>


    <?= $this->section('content')?>


    <footer>
        <div class="wrapper w16">
            <div class="block">
                <img src="images/<?=$deskrip[86]?>">
                <p>&copy;<script>
                            document.write(new Date().getFullYear());
                        </script> <?=$namaweb?>
                </p>
            </div>
            <div class="block">
                <nav class="foot">
                                    <a href="kontak" target="_self">Contact Us</a>
                                    <a href="<?=$base_url?>/karir" target="_self">Career</a>
                                    <a href="<?=$base_url?>/sitemap" target="_self">Sitemap</a>
                                    <a href="http://world.honda.com" target="_blank">Honda Global</a>
                                </nav>
                <div class="socmed">
                                    <a target="_blank" rel="nofollow" href="https://www.facebook.com/HondaPowerID/" class="fb"><i class="fab fa-facebook"> </i></a>
                                    <a target="_blank" rel="nofollow" href="https://www.instagram.com/hondapower.id/" class="instag"><i class="fab fa-instagram"> </i></a>
                                    <a target="_blank" rel="nofollow" href="https://www.youtube.com/channel/UCj_uJ_SdOSqURMShbMxuD9Q" class="yt"><i class="fab fa-twitter"> </i></a>
                                   
                </div>
            </div>
            <div class="block">
                <form class="sub" action="<?=$base_url?>/subscriber" method="post" id="subsForm">
                    <label>Subscribe now to receive daily updates</label>
                    <input type="email" id="emailID" name="email" placeholder="Email Address" required="required">
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="_token" value="hMnJi9HUEO6aruIXameRmkeLERkAprVoFJeSELXx">
                    <input type="submit" name="" value="">
                    <label id="success" class="subscriber-success" style=""></label>  
                </form>
            </div>
        </div>
    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">


    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.animateNumber.min.js"></script>
    <script src="assets/js/scrollax.min.js"></script>
    <script src="assets/js/main.js?2"></script>
    <script src="assets/js/main.min.js?2"></script>


</body>

</html>