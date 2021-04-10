<?php
$default 	= "Yamamoto";
$judul  	= "Yamamoto";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
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
                        <i class="fa fa-phone"> </i> <?=$deskrip['10']?>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=<?=$deskrip[7]?>&text=<?=$textBtnWa?>"
                        target="blank"><i class="fab fa-whatsapp"> </i> <?=$deskrip['10']?></a>
                </div>
                <div class="right">
                    <a href="<?=$sosmed[3]['link']?>" target="_blank">
                        <i class="fab fa-instagram"> </i>
                    </a>
                    <a href="<?=$sosmed[1]['link']?>" target="_blank">
                        <i class="fab fa-twitter"> </i>
                    </a>
                    <a href="<?=$sosmed[0]['link']?>" target="_blank">
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
                                <li>
                                    <a href="about" target="_self">About Us</a>
                                </li>

                                <li class="have_child product">
                                    <a href="#" target="_self">
                                        Products <i class="fa fa-chevron-down" aria-hidden="true"> </i>
                                    </a>
                                    <div class="sub prod" style="display: none; opacity: 0;">
                                        <div class="wrapper w16">
                                            <ul>
                                                <?php foreach($kategori as $r) : ?>
                                                <li>
                                                    <a href="kategori-<?=$r['judul_seo']."-".$r['id_kategori']?>">
                                                        <img src="images/kategori/<?=$r['gambar']?>">
                                                        <span><?=$r['judul']?></span>
                                                    </a>
                                                </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <a href="dealers" target="_self">Dealers</a>
                                </li>

                                <li>
                                    <a href="promotion" target="_self">Promotion</a>
                                </li>

                                <li>
                                    <a href="artikel" target="_self">News &amp; Events</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                    <div class="menu_mobile">
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
                    <a href="career" target="_self">Career</a>
                    <a href="sitemap" target="_self">Sitemap</a>
                </nav>
            </div>
            <div class="block">
                <?=$deskrip[3]?>
                <div class="socmed">
                    <a target="_blank" rel="nofollow" href="<?=$sosmed[0]['link']?>" class="fb"><i
                            class="fab fa-facebook"> </i></a>
                    <a target="_blank" rel="nofollow" href="<?=$sosmed[3]['link']?>" class="instag"><i
                            class="fab fa-instagram"> </i></a>
                    <a target="_blank" rel="nofollow" href="<?=$sosmed[1]['link']?>" class="yt"><i
                            class="fab fa-twitter"> </i></a>

                </div>
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
    <script src="assets/js/main.js?4"></script>
    <script src="assets/js/main.min.js?2"></script>



</body>

</html>