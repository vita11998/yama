<?php
error_reporting(0);

$application_folder = 'app';
$system_path = 'system';
$admin_folder = 'admin';

if (($_temp = realpath($system_path)) !== FALSE)
{
    $system_path = $_temp.DIRECTORY_SEPARATOR;
}

// Path to the system directory
define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);
define('BASEPATH', $system_path);
define('ADMPATH', $admin_folder.DIRECTORY_SEPARATOR);

require_once __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once BASEPATH.'jogjamediaweb.php';


// Custom 404 Handler
// $router->set404(function () use ($base_url) {
//         header('location:  '.$base_url.'404');
// });


/*
 * ------------------------------------------------------
 *  Router Front End
 * ------------------------------------------------------
 */

$router->get('/', function () use ($templates,$db) {

    // SEO
    $templates->addData(['seo' => 'home']);
    
    $header  = $db->connection('SELECT * FROM page  WHERE id_page = 1 ')->fetch();

    $welcome  = $db->connection('SELECT * FROM page  WHERE id_page = 0 ')->fetch();

    $keunggulan  = $db->connection("SELECT * FROM transportasi ")->fetchAll();

    $keuntungan  = $db->connection("SELECT * FROM keuntungan ORDER BY id_keuntungan ASC LIMIT 3")->fetchAll();

    $keuntungan2  = $db->connection("SELECT * FROM keuntungan WHERE id_keuntungan = 8")->fetch();

    $produk  = $db->connection("SELECT * FROM produk ")->fetchAll();
    $slider  = $db->connection("SELECT * FROM slider ")->fetchAll();
    $foto  = $db->connection("SELECT * FROM foto ")->fetchAll();
    $partner = $db->connection("SELECT * FROM partner LIMIT 4")->fetchAll();
    $client  = $db->connection('SELECT * FROM client')->fetchAll();

    $gallery  = $db->connection('SELECT * FROM gallery')->fetchAll();
    $artikel  = $db->connection('SELECT *,DAY(tgl) as day, MONTHNAME(tgl) as month, YEAR(tgl) as year FROM artikel LIMIT 3')->fetchAll();
    $lokasi  = $db->connection('SELECT * FROM page WHERE id_page = 2 ')->fetch();

    $data = array(
        'header'    => $header,
        'welcome'    => $welcome,
        'produk'    => $produk,
        'foto'    => $foto,
        'artikel'    => $artikel,
        'partner'    => $partner,
        'keunggulan'    => $keunggulan,
        'keuntungan' => $keuntungan,
        'keuntungan2' => $keuntungan2,
        'client'  => $client,
        'gallery' => $gallery,
        'lokasi' => $lokasi,
        'slider' => $slider
    );
    echo $templates->render('home', $data);

});

$router->get('/404', function () use ($templates,$db) {

    echo $templates->render('404');

});


$router->get('/custom-tour', function () use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'detpage','id' => 15]);

    $lokasi     = $db->connection('SELECT * FROM lokasi');
    $prakata        = $db->read('page','*', 'id_page = 14')->fetch(PDO::FETCH_ASSOC);
    $syarat        = $db->read('page','*', 'id_page = 15')->fetch(PDO::FETCH_ASSOC);
    echo $templates->render('customTour', ['prakata' => $prakata,'lokasi'=>$lokasi,'syarat'=>$syarat]);

});

$router->get('/kontak', function () use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'detpage','id' => 8]);

    $data        = $db->read('page','*', 'id_page = 8')->fetch(PDO::FETCH_ASSOC);
    echo $templates->render('page', ['data' => $data,]);

});


$router->get('/produk', function () use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'produk']);

    $data        = $db->connection('SELECT * FROM produk')->fetchAll();
    
    echo $templates->render('produk', ['data' => $data,]);

});

$router->get('/produk-(.*)-(\d+)', function ($slug,$id) use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'detproduk', 'id_seo' => $id]);

    $datas        = $db->read('produk', '*', "id_produk = $id ")->fetch();
    $dilihat = $datas['dilihat'] + 1;
    $db->update('produk',array('dilihat' => $dilihat), "id_produk = $datas[id_produk]");

    $multi        = $db->connection("SELECT * FROM gallery_produk WHERE id_produk = $id ")->fetchAll();
    
    $produk       = $db->connection("SELECT * FROM produk WHERE id_produk != $id ORDER BY id_produk DESC LIMIT 4  ")->fetchAll();
    echo $templates->render('detproduk', ['data' => $datas, 'produk' =>$produk,'multi'=> $multi] );

});

$router->get('/pricelist', function () use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'detpage','id' => 12]);

    $data        = $db->read('page','*', 'id_page = 12')->fetch(PDO::FETCH_ASSOC);
    echo $templates->render('page', ['data' => $data,]);

});


$router->get('/profile', function () use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'detpage','id' => 4]);

    $data        = $db->read('page','*', 'id_page = 4')->fetch(PDO::FETCH_ASSOC);
    echo $templates->render('page', ['data' => $data,]);

});




$router->get('/galeri', function () use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'galeri', 'id_seo' => $id]);

    $gallery      = $db->connection("SELECT * FROM gallery  ");
    echo $templates->render('detfoto', [ 'gallery'=> $gallery] );

});


$router->get('/blog', function () use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'detpage','id' => 9]);

    /** Paging foto */
    $page   	    = new pagingAll;
    $batas 		    = 12;
    $idPag          = 1;
    $posisi 	    = $page->cariPosisi($batas,$idPag);
    $jmldata        = $db->connection('SELECT * FROM artikel   ')->rowCount();
	$jmlhalaman     = $page->jmlhalaman($jmldata, $batas);
    $linkHalaman    = $page->navHalaman($idPag, $jmlhalaman,'blog');
    $pagination     = array(
        'batas'         => $batas,
        'jmldata'       => $jmldata,
        'jmlhalaman'    => $jmlhalaman,
        'linkHalaman'   => $linkHalaman
    );

    $foto  = $db->connection("SELECT * FROM artikel  ORDER BY tgl DESC LIMIT $posisi,$batas ")->fetchAll();

    $data  = $db->connection("SELECT * FROM page  WHERE id_page = 9 ")->fetch(PDO::FETCH_ASSOC);
    
    echo $templates->render('artikel', ['blog' => $foto,'pagination' => $pagination, 'data' => $data]);

});

$router->get('/blog-page-(\d+)', function ($id) use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'detpage','id' => 9]);

    /** Paging foto */
    $page   	    = new pagingAll;
    $batas 		    = 12;
    $idPag          = $id;
    $posisi 	    = $page->cariPosisi($batas,$idPag);
    $jmldata        = $db->connection('SELECT * FROM artikel   ')->rowCount();
	$jmlhalaman     = $page->jmlhalaman($jmldata, $batas);
    $linkHalaman    = $page->navHalaman($idPag, $jmlhalaman,'blog');
    $pagination     = array(
        'batas'         => $batas,
        'jmldata'       => $jmldata,
        'jmlhalaman'    => $jmlhalaman,
        'linkHalaman'   => $linkHalaman
    );

    $foto  = $db->connection("SELECT * FROM artikel  ORDER BY tgl DESC LIMIT $posisi,$batas ")->fetchAll();

    $data  = $db->connection("SELECT * FROM page  WHERE id_page = 9 ")->fetch(PDO::FETCH_ASSOC);
    
    echo $templates->render('artikel', ['blog' => $foto,'pagination' => $pagination, 'data' => $data]);

});


$router->get('/contact', function () use ($templates,$db) {

    /** SEO */
    $templates->addData(['seo' => 'contact']);
    $data        = $db->read('page','*', 'id_page = 8')->fetch(PDO::FETCH_ASSOC);
    echo $templates->render('contact', ['data' => $data]);
});

$router->post('/contact', function () use ($templates,$db,$csrf) {

    // Validate that a correct token was given
        $datas = array(
            'name' => $_POST['name'],
            'name_belakang' => $_POST['name_belakang'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'alamat' => $_POST['alamat'],
            'message' => $_POST['message'],
        );
        $sender = array(
            'host' => $_ENV['MAIL_HOST'],
            'user' => $_ENV['MAIL_USER'],
            'pass' => $_ENV['MAIL_PASS'],
            'from' => $_ENV['MAIL_FROM'],
            'subject'=>$_ENV['MAIL_SUBJECT'],
        );
        $admin = $db->connection("SELECT * FROM admin WHERE id = 2")->fetch();
        $res = sendEmail($datas,$admin,$sender);
        
        if($res){
            $db->insert("contact", $datas);
            echo "<script>window.alert('Pesan Berhasil Terkirim !'); window.location= 'contact'</script>";
        }else{
            echo "<script>window.alert('Pesan gagal dikirim !'); window.location(history.back(-1))</script>";
        }

});

$router->post('/cari', function () use ($templates,$db) {
    $data  = $db->connection("SELECT * FROM page  WHERE id_page = 9 ")->fetch(PDO::FETCH_ASSOC);
    $cari = $db->connection("SELECT * FROM artikel WHERE judul LIKE '%$_POST[cari]%' ")->fetchAll();
    echo $templates->render('cari', ['blog' => $cari, 'data' => $data] );
});


$router->get('/artikel', function () use ($templates,$db) {
    /** SEO */
    $templates->addData(['seo' => 'artikel']);

    $data     = $db->connection("SELECT *,DAY(tgl) as day, MONTHNAME(tgl) as month, YEAR(tgl) as year FROM artikel")->fetchAll();
    echo $templates->render('artikel',['data' => $data] );
});

$router->get('/artikel-page-(\d+)', function ($id) use ($templates,$db) {
});


$router->get('/artikel-(.*)-(\d+)', function ($slug,$id) use ($templates,$db) {
    /** SEO */
    $templates->addData(['seo' => 'detartikel', 'id_seo' => $id]);

    $datas      = $db->read('artikel', '*', "id_artikel = '$id' ")->fetch(PDO::FETCH_ASSOC);
    $artikel      = $db->connection("SELECT *,DAY(tgl) as day, MONTHNAME(tgl) as month, YEAR(tgl) as year FROM artikel WHERE id_artikel != $id LIMIT 3")->fetchAll();

    $dilihat = $datas['dilihat'] + 1;
    $db->update("artikel",array('dilihat' => $dilihat), "id_artikel = $datas[id_artikel]");

    echo $templates->render('detartikel', ['data' => $datas,'artikel' => $artikel] );
});

$router->get('/foto', function () use ($templates,$db) {
    /** SEO */
    $templates->addData(['seo' => 'foto']);

    $data     = $db->connection("SELECT * FROM foto ")->fetchAll();
    echo $templates->render('foto',['data' => $data] );
});

$router->get('/foto-(.*)-(\d+)', function ($slug,$id) use ($templates,$db) {
    /** SEO */
    $templates->addData(['seo' => 'detfoto', 'id_seo' => $id]);

    $datas      = $db->read('foto', '*', "id_foto = '$id' ")->fetch(PDO::FETCH_ASSOC);
    $foto      = $db->connection("SELECT * FROM foto WHERE id_foto != $id ")->fetchAll();

    $dilihat = $datas['dilihat'] + 1;
    $db->update("foto",array('dilihat' => $dilihat), "id_foto = $datas[id_foto]");

    echo $templates->render('detfoto', ['data' => $datas,'foto' => $foto] );
});

$router->get('/partner', function () use ($templates,$db) {
    /** SEO */
    $templates->addData(['seo' => 'partner']);

    $data     = $db->connection("SELECT * FROM partner ")->fetchAll();
    echo $templates->render('partner',['data' => $data] );
});

$router->get('/partner-(.*)-(\d+)', function ($slug,$id) use ($templates,$db) {
    /** SEO */
    $templates->addData(['seo' => 'detpartner', 'id_seo' => $id]);

    $datas      = $db->read('partner', '*', "id_partner = '$id' ")->fetch(PDO::FETCH_ASSOC);
    $partner      = $db->connection("SELECT * FROM partner WHERE id_partner != $id ")->fetchAll();

    $dilihat = $datas['dilihat'] + 1;
    $db->update("partner",array('dilihat' => $dilihat), "id_partner = $datas[id_partner]");

    echo $templates->render('detpartner', ['data' => $datas,'partner' => $partner] );
});
/*
 * ------------------------------------------------------
 *  Router Admin
 * ------------------------------------------------------
 */
include(APPPATH.'admin/router.php');

$router->run();