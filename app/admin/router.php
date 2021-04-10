<?php
/*
 * ------------------------------------------------------
 *  Router Admin
 * ------------------------------------------------------
 */

$path = APPPATH . ADMPATH . 'modul/';

$router->get("/$_ENV[URL_LOGIN]", function () use ($login) {
    echo $login->render('login');
});

$router->post("/$_ENV[URL_LOGIN]", function () use ($login, $jmw, $db) {
    $username = $_POST['username'];
    $pass = md5($_POST['password']);
    $login = $db->read("admin", "*", "username='$username' AND password='$pass' AND status='Aktif'")->fetch();
    $ketemu = $db->read("admin", "COUNT(*)", "username='$username' AND password='$pass' AND status='Aktif'")->fetchColumn();
    $r = $login;
    if ($ketemu > 0) {
        $_SESSION['nama_admin']         = $r['username'];
        $_SESSION['email_admin']        = $r['email'];
        $_SESSION['namalengkapadmin']   = $r['nama_lengkap'];
        $_SESSION['passadmin']          = $r['password'];
        $_SESSION['leveladmin']         = $r['level'];
        $_SESSION['id_admin']           = $r['id'];
        $_SESSION['idsession']          = $r['id_session'];
        $_SESSION['halaman']            = 'Home';
        $_SESSION['IsAuthorized']       = true;
        header("location: ../$_ENV[URL_ADMIN]/dashboard");
    } else {
        header("location: ../$_ENV[URL_LOGIN]");
    }
});

/** Cek Keamanan **/
$router->before('GET|POST', "/$_ENV[URL_ADMIN]/.*", function () {
    if (!isset($_SESSION['nama_admin'])) {
            $getWholeUrl = "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . "";
            if (substr($getWholeUrl, -1) == '/') {
                header("location: ../$_ENV[URL_LOGIN]");
            } else {
                header("location: ../$_ENV[URL_LOGIN]");
            }
        exit();
    } 
});



/** Router dalam folder Admin **/
$router->mount("/$_ENV[URL_ADMIN]", function () use ($router, $db, $jmw, $path,$imgname1,$msg) {

    /** Security Lvl 2 **/
    $router->get('/', function () {
        if (!isset($_SESSION['nama_admin'])) {
            header("location: $_ENV[URL_LOGIN]");
            exit();
        } else {
            $getWholeUrl = "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . "";
            if (substr($getWholeUrl, -1) == '/') {
                header('location: dashboard');
            } else {
                header('location: ' . ADMPATH . 'dashboard');
            }

        }

    });

    /** Logout **/
    $router->get('/logout', function () use ($jmw, $db, $path) {
        session_start();
        session_destroy();
        header("location: ../$_ENV[URL_LOGIN]");
    });

    /** Url Setting **/
    $router->get('/setting', function () use ($jmw, $db, $path) {
        $data = $db->connection("SELECT * FROM admin WHERE id = $_SESSION[id_admin] ")->fetch();
        echo $jmw->render('modul/admin/index', ['act' => 'edit', 'tedit' => $data]);
    });

    /** Setting Updated **/
    $router->post('/setting', function () use ($jmw, $db, $path) {
        $act = "update";
        $hal = "setting";
        include ($path . 'admin/aksi.php');
    });

    /** Setting File Manager **/
    $router->get('/file-manager', function () use ($jmw, $db, $path) {
        echo $jmw->render('modul/filemanager/index');
    });

/*
 * ------------------------------------------------------
 *  Router Dashboard
 * ------------------------------------------------------
 */

    /** Halaman Dashboard **/
    $router->get('/dashboard', function () use ($jmw, $db) {

        $tanggal = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $bataswaktu = time() - 300;

        $pengunjung = $db->connection("SELECT COUNT(*) FROM statistik WHERE tanggal='$tanggal' GROUP BY ip ASC")->fetchColumn();
        $totalpengunjung = $db->connection("SELECT COUNT(hits) as totalz FROM statistik")->fetch();
        $pengunjungonline = $db->connection("SELECT hits FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal ASC")->rowCount();
        $totalhits = $db->connection("SELECT SUM(hits) as totalz FROM statistik")->rowCount();
        $hits = $db->connection("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal DESC LIMIT 1")->fetchColumn();

        echo $jmw->render('dashboard', ['pengunjung' => $pengunjung, 'totalpengunjung' => $totalpengunjung, 'pengunjungonline' => $pengunjungonline, 'totalhits' => $totalhits, 'hits' => $hits]);
    });


/*
 * ------------------------------------------------------
 *  Router Page
 * ------------------------------------------------------
 */

    /** Url Home SEO **/
    $router->get('/home', function () use ($jmw, $db, $path) {
        $data = $db->connection("SELECT * FROM page WHERE id_page = 0 ")->fetch();
        echo $jmw->render('modul/page/index', ['act' => 'edit', 'row' => $data]);
    });

    /** Url Page **/
    $router->get('/page-edit-(\d+)', function ($id) use ($jmw, $db,$msg) {
        $data = $db->connection("SELECT * FROM page WHERE id_page = $id ")->fetch();
        echo $jmw->render('modul/page/index', ['act' => 'edit', 'row' => $data]);
    });

    /** Update Page **/
    $router->post('/page', function () use ($jmw, $db, $path,$msg) {
        $id  = $_POST['id_page'];
        $act = "update";
        if($id == 0){$hal = "home";}
        elseif($id == 13){$hal = "quote";}
        elseif($id == 3){$hal = "prakata";}
        elseif($id == 14){$hal = "profile-video";}
        elseif($id == 8){$hal = "kontak";}
        
        include ('modul/page/aksi.php');
        
    });

/*
 * ------------------------------------------------------
 *  Router Module
 * ------------------------------------------------------
 */

    /** Url Module **/
    $router->get('/module', function () use ($jmw, $db,$path) {
        $data = $db->connection("SELECT * FROM modul WHERE tampil='Ya' ORDER BY no_urut ASC");
        echo $jmw->render('modul/modul/index', ['act' => 'list', 'tampil' => $data]);
    });

    /** Edit Module **/
    $router->get('/module-edit-(\d+)', function ($id) use ($jmw, $db,$path) {
        $edit = $db->connection("SELECT * FROM modul WHERE id_modul= $id ");
        echo $jmw->render('modul/modul/index', ['act' => 'edit', 'edit' => $edit]);
    });

    /** Update Module **/
    $router->post('/module', function () use ($jmw, $db, $path,$msg) {
        $act = "update";
        $hal = "module";
        include ('modul/modul/aksi.php');
    });


/*
 * ------------------------------------------------------
 *  Router Sosial Media
 * ------------------------------------------------------
 */

    /** Url Module **/
    $router->get('/social-media', function () use ($jmw, $db,$path) {
        $data = $db->connection("SELECT * FROM social_media  WHERE status ='on' ");
        echo $jmw->render('modul/social_media/index', ['act' => 'list', 'tampil' => $data]);
    });

    /** Edit Module **/
    $router->get('/social-media-edit-(\d+)', function ($id) use ($jmw, $db,$path) {
        $edit = $db->connection("SELECT * FROM social_media WHERE id_social_media= $id ")->fetch();
        echo $jmw->render('modul/social_media/index', ['act' => 'edit', 'data' => $edit]);
    });

    /** Update Module **/
    $router->post('/social-media', function () use ($jmw, $db, $path) {
        $act = "update";
        $hal = "social-media";
        include ('modul/social_media/aksi.php');
    });

/*
 * ------------------------------------------------------
 *  Router Foto
 * ------------------------------------------------------
 */

    /** Url foto **/
    $router->get('/foto', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM foto ORDER BY tgl ASC");
        echo $jmw->render('modul/foto/index', ['act' => 'list', 'tampil' => $dataku]);
    });

    /** Show Add Form foto **/
    $router->get('/foto-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/foto/index', ['act' => 'add']);
    });

    /** Show Edit Form foto **/
    $router->get('/foto-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data    = $db->connection("SELECT * FROM foto WHERE id_foto = $id ")->fetch();
        echo $jmw->render('modul/foto/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add foto  **/
    $router->post('/foto', function () use ($jmw, $db, $path) {
        if (isset($_POST['id_foto'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "foto";
        include ($path . 'foto/aksi.php');
    });

    /** Delete foto **/
    $router->get('/foto-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "foto";
        include ($path . 'foto/aksi.php');
    });


    /** Show Add Form client foto **/
    $router->get('/foto-addclient-(\d+)', function ($id) use ($jmw, $db) {
        echo $jmw->render('modul/foto/index', ['act' => 'addclient', 'id' => $id]);
    });


    /** Show Edit Form  client foto **/
    $router->get('/foto-editclient-(\d+)', function ($id) use ($jmw, $db) {
        $data    = $db->connection("SELECT * FROM client_foto WHERE id_client = $id ")->fetch();
        echo $jmw->render('modul/foto/index', ['act' => 'editclient', 'data' => $data]);
    });


    /** Update dan Add  client foto  **/
    $router->post('/foto-client', function () use ($jmw, $db, $path) {
        if (isset($_POST['id'])) {
            $act = "editclient";
        } else {
            $act = "addclient";
        }
        $hal = "foto";
        include ($path . 'foto/aksi.php');
    });


    /** Delete client foto **/
    $router->get('/foto-client-delete-(\d+)-(\d+)', function ($id,$id_foto) use ($jmw, $db, $path,$imgname1) {
        $act = "removeclient";
        $hal = "foto";
        include ($path . 'foto/aksi.php');
    });

    /*
 * ------------------------------------------------------
 *  Router partner
 * ------------------------------------------------------
 */

    /** Url partner **/
    $router->get('/partner', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM partner ORDER BY tgl ASC");
        echo $jmw->render('modul/partner/index', ['act' => 'list', 'tampil' => $dataku]);
    });

    /** Show Add Form partner **/
    $router->get('/partner-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/partner/index', ['act' => 'add']);
    });

    /** Show Edit Form partner **/
    $router->get('/partner-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data    = $db->connection("SELECT * FROM partner WHERE id_partner = $id ")->fetch();
        echo $jmw->render('modul/partner/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add partner  **/
    $router->post('/partner', function () use ($jmw, $db, $path) {
        if (isset($_POST['id_partner'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "partner";
        include ($path . 'partner/aksi.php');
    });

    /** Delete partner **/
    $router->get('/partner-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "partner";
        include ($path . 'partner/aksi.php');
    });


    /** Show Add Form client partner **/
    $router->get('/partner-addclient-(\d+)', function ($id) use ($jmw, $db) {
        echo $jmw->render('modul/partner/index', ['act' => 'addclient', 'id' => $id]);
    });


    /** Show Edit Form  client partner **/
    $router->get('/partner-editclient-(\d+)', function ($id) use ($jmw, $db) {
        $data    = $db->connection("SELECT * FROM client_partner WHERE id_client = $id ")->fetch();
        echo $jmw->render('modul/partner/index', ['act' => 'editclient', 'data' => $data]);
    });


    /** Update dan Add  client partner  **/
    $router->post('/partner-client', function () use ($jmw, $db, $path) {
        if (isset($_POST['id'])) {
            $act = "editclient";
        } else {
            $act = "addclient";
        }
        $hal = "partner";
        include ($path . 'partner/aksi.php');
    });


    /** Delete client partner **/
    $router->get('/partner-client-delete-(\d+)-(\d+)', function ($id,$id_partner) use ($jmw, $db, $path,$imgname1) {
        $act = "removeclient";
        $hal = "partner";
        include ($path . 'partner/aksi.php');
    });

/*
 * ------------------------------------------------------
 *  Router kategori
 * ------------------------------------------------------
 */

    /** Url kategori **/
    $router->get('/kategori', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM kategori")->fetchAll();
        echo $jmw->render('modul/kategori/index', ['act' => 'list', 'dataku' => $dataku]);
    });

    /** Show Add Form kategori **/
    $router->get('/kategori-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/kategori/index', ['act' => 'add']);
    });

    /** Show Edit Form kategori **/
    $router->get('/kategori-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM kategori WHERE id_kategori = $id ")->fetch();
        echo $jmw->render('modul/kategori/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add kategori  **/
    $router->post('/kategori', function () use ($jmw, $db, $path) {
        if (isset($_POST['id_kategori'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "kategori";
        include ($path . 'kategori/aksi.php');
    });

    /** Delete kategori **/
    $router->get('/kategori-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "kategori";
        include ($path . 'kategori/aksi.php');
    });

/*
 * ------------------------------------------------------
 *  Router Video
 * ------------------------------------------------------
 */

    /** Url video **/
    $router->get('/video', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM banner")->fetchAll();
        echo $jmw->render('modul/banner/index', ['act' => 'list', 'dataku' => $dataku]);
    });

    /** Show Add Form video **/
    $router->get('/video-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/banner/index', ['act' => 'add']);
    });

    /** Show Edit Form video **/
    $router->get('/video-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM banner WHERE id_banner = $id ")->fetch();
        echo $jmw->render('modul/banner/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add video  **/
    $router->post('/video', function () use ($jmw, $db, $path) {
        if (isset($_POST['id_banner'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "video";
        include ($path . 'banner/aksi.php');
    });

    /** Delete video **/
    $router->get('/video-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "video";
        include ($path . 'banner/aksi.php');
    });

/*
 * ------------------------------------------------------
 *  Router Transportasi
 * ------------------------------------------------------
 */

    /** Url Transportasi **/
    $router->get('/transportasi', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM transportasi")->fetchAll();
        echo $jmw->render('modul/transportasi/index', ['act' => 'list', 'dataku' => $dataku]);
    });

    /** Show Add Form Transportasi **/
    $router->get('/transportasi-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/transportasi/index', ['act' => 'add']);
    });

    /** Show Edit Form Transportasi **/
    $router->get('/transportasi-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM transportasi WHERE id_transportasi = $id ")->fetch();
        echo $jmw->render('modul/transportasi/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add Transportasi  **/
    $router->post('/transportasi', function () use ($jmw, $db, $path,$msg) {
        if (isset($_POST['id_transportasi'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "transportasi";
        include ($path . 'transportasi/aksi.php');
    });

    /** Delete Transportasi **/
    $router->get('/transportasi-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "transportasi";
        include ($path . 'transportasi/aksi.php');
    });


/*
 * ------------------------------------------------------
 *  Router Produk
 * ------------------------------------------------------
 */

    /** Url produk **/
    $router->get('/produk', function () use ($jmw, $db,$msg) {
        $dataku = $db->connection("SELECT * FROM produk  ORDER BY tgl ASC");
        echo $jmw->render('modul/produk/index', ['act' => 'list', 'tampil' => $dataku]);
    });

    /** Show Add Form produk **/
    $router->get('/produk-add', function () use ($jmw, $db,$msg) {
        $kat = $db->connection("SELECT * FROM kategori ORDER BY id_kategori ASC")->fetchAll();
        echo $jmw->render('modul/produk/index', ['act' => 'add','kat' => $kat]);
    });

    /** Show Edit Form produk **/
    $router->get('/produk-edit-(\d+)', function ($id) use ($jmw, $db,$msg) {
        $data    = $db->connection("SELECT * FROM produk WHERE id_produk = $id ")->fetch();
        $gallery = $db->connection("SELECT * FROM gallery_produk WHERE id_produk='$data[id_produk]' ORDER BY id_gallery ASC")->fetchAll();
        $kat = $db->connection("SELECT * FROM kategori ORDER BY id_kategori ASC")->fetchAll();
        echo $jmw->render('modul/produk/index', ['act' => 'edit', 'data' => $data,'kat' => $kat,'gallery' => $gallery]);
    });

    /** Update dan Add produk  **/
    $router->post('/produk', function () use ($jmw, $db, $path,$msg) {
        if (isset($_POST['id_produk'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "produk";
        include ($path . 'produk/aksi.php');
    });

    /** Delete produk **/
    $router->get('/produk-delete-(\d+)', function ($id) use ($jmw, $db, $path,$msg) {
        $act = "remove";
        $hal = "produk";
        include ($path . 'produk/aksi.php');
    });


    /** Show Add Form Gallery Produk **/
    $router->get('/produk-addgallery-(\d+)', function ($id) use ($jmw, $db,$msg) {
        echo $jmw->render('modul/produk/index', ['act' => 'addgallery', 'id' => $id]);
    });


    /** Show Edit Form  Gallery Produk **/
    $router->get('/produk-editgallery-(\d+)', function ($id) use ($jmw, $db,$msg) {
        $data    = $db->connection("SELECT * FROM gallery_produk WHERE id_gallery = $id ")->fetch();
        echo $jmw->render('modul/produk/index', ['act' => 'editgallery', 'data' => $data]);
    });


    /** Update dan Add  Gallery Produk  **/
    $router->post('/produk-gallery', function () use ($jmw, $db, $path,$msg,$imgname1) {
        if (isset($_POST['id'])) {
            $act = "editgallery";
        } else {
            $act = "addgallery";
        }
        $hal = "produk";
        include ($path . 'produk/aksi.php');
    });


    /** Delete Gallery Produk **/
    $router->get('/produk-gallery-delete-(\d+)-(\d+)', function ($id,$id_produk) use ($jmw, $db, $path,$imgname1,$msg) {
        $act = "removegallery";
        $hal = "produk";
        include ($path . 'produk/aksi.php');
    });


    

/*
 * ------------------------------------------------------
 *  Router Slider
 * ------------------------------------------------------
 */

    /** Url slider **/
    $router->get('/slider', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM slider")->fetchAll();
        echo $jmw->render('modul/slider/index', ['act' => 'list', 'dataku' => $dataku]);
    });

    /** Show Add Form slider **/
    $router->get('/slider-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/slider/index', ['act' => 'add']);
    });

    /** Show Edit Form slider **/
    $router->get('/slider-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM slider WHERE id_slider = $id ")->fetch();
        echo $jmw->render('modul/slider/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add slider  **/
    $router->post('/slider', function () use ($jmw, $db, $path) {
        if (isset($_POST['id_slider'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "slider";
        include ($path . 'slider/aksi.php');
    });

    /** Delete slider **/
    $router->get('/slider-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "slider";
        include ($path . 'slider/aksi.php');
    });
    
/*
 * ------------------------------------------------------
 *  Router Gallery
 * ------------------------------------------------------
 */

    /** Url gallery **/
    $router->get('/gallery', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM gallery")->fetchAll();
        echo $jmw->render('modul/gallery/index', ['act' => 'list', 'dataku' => $dataku]);
    });

    /** Show Add Form gallery **/
    $router->get('/gallery-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/gallery/index', ['act' => 'add']);
    });

    /** Show Edit Form gallery **/
    $router->get('/gallery-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM gallery WHERE id_gallery = $id ")->fetch();
        echo $jmw->render('modul/gallery/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add gallery  **/
    $router->post('/gallery', function () use ($jmw, $db, $path,$msg) {
        if (isset($_POST['id_gallery'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "gallery";
        include ($path . 'gallery/aksi.php');
    });

    /** Delete gallery **/
    $router->get('/gallery-delete-(\d+)', function ($id) use ($jmw, $db, $path ,$msg) {
        $act = "remove";
        $hal = "gallery";
        include ($path . 'gallery/aksi.php');
    });

/*
 * ------------------------------------------------------
 *  Router client
 * ------------------------------------------------------
 */

    /** Url client **/
    $router->get('/client', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM client")->fetchAll();
        echo $jmw->render('modul/client/index', ['act' => 'list', 'dataku' => $dataku]);
    });

    /** Show Add Form client **/
    $router->get('/client-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/client/index', ['act' => 'add']);
    });

    /** Show Edit Form client **/
    $router->get('/client-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM client WHERE id_client = $id ")->fetch();
        echo $jmw->render('modul/client/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add client  **/
    $router->post('/client', function () use ($jmw, $db, $path,$msg) {
        if (isset($_POST['id_client'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "client";
        include ($path . 'client/aksi.php');
    });

    /** Delete client **/
    $router->get('/client-delete-(\d+)', function ($id) use ($jmw, $db, $path,$msg) {
        $act = "remove";
        $hal = "client";
        include ($path . 'client/aksi.php');
    });


/*
 * ------------------------------------------------------
 *  Router Keuntungan
 * ------------------------------------------------------
 */

    /** Url keuntungan **/
    $router->get('/keuntungan', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM keuntungan")->fetchAll();
        $icons = $db->connection("SELECT * FROM icon")->fetchAll();
        echo $jmw->render('modul/keuntungan/index', ['act' => 'list', 'dataku' => $dataku, 'icons' => $icons]);
    });

    /** Show Add Form keuntungan **/
    $router->get('/keuntungan-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/keuntungan/index', ['act' => 'add']);
    });

    /** Show Edit Form keuntungan **/
    $router->get('/keuntungan-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM keuntungan WHERE id_keuntungan = $id ")->fetch();
        echo $jmw->render('modul/keuntungan/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add keuntungan  **/
    $router->post('/keuntungan', function () use ($jmw, $db, $path) {
        if (isset($_POST['id_keuntungan'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "keuntungan";
        include ($path . 'keuntungan/aksi.php');
    });

    /** Delete keuntungan **/
    $router->get('/keuntungan-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "keuntungan";
        include ($path . 'keuntungan/aksi.php');
    });


/*
 * ------------------------------------------------------
 *  Router Artikel
 * ------------------------------------------------------
 */

    /** Url Artikel **/
    $router->get('/artikel', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM artikel");
        echo $jmw->render('modul/artikel/index', ['act' => 'list', 'tampil' => $dataku]);
    });

    /** Show Add Form Artikel **/
    $router->get('/artikel-add', function () use ($jmw, $db) {
        echo $jmw->render('modul/artikel/index', ['act' => 'add']);
    });

    /** Show Edit Form Artikel **/
    $router->get('/artikel-edit-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM artikel WHERE id_artikel = $id ")->fetch();
        echo $jmw->render('modul/artikel/index', ['act' => 'edit', 'data' => $data]);
    });

    /** Update dan Add Artikel  **/
    $router->post('/artikel', function () use ($jmw, $db, $path) {
        if (isset($_POST['id_artikel'])) {
            $act = "update";
        } else {
            $act = "add";
        }
        $hal = "artikel";
        include ($path . 'artikel/aksi.php');
    });

    /** Delete Artikel **/
    $router->get('/artikel-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "artikel";
        include ($path . 'artikel/aksi.php');
    });




/*
 * ------------------------------------------------------
 *  Router Pesan Contact
 * ------------------------------------------------------
 */

    /** Url List Pesan **/
    $router->get('/pesan', function () use ($jmw, $db) {
        $dataku = $db->connection("SELECT * FROM contact ");
        echo $jmw->render('modul/pesan/index', ['act' => 'list', 'tampil' => $dataku]);
    });

    /** Show Detail Pesan **/
    $router->get('/pesan-view-(\d+)', function ($id) use ($jmw, $db) {
        $data = $db->connection("SELECT * FROM contact WHERE id_contact = $id ")->fetch();
        $db->update("contact" , array('is_read' => 1), "id_contact = $data[id_contact] " );
        echo $jmw->render('modul/pesan/index', ['act' => 'view', 'data' => $data]);
    });

    /** Delete Pesan **/
    $router->get('/pesan-delete-(\d+)', function ($id) use ($jmw, $db, $path) {
        $act = "remove";
        $hal = "pesan";
        include ($path . 'pesan/aksi.php');
    });

    

});