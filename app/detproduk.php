<?php $this->layout('template') ?>
<?php 
    $header = $db->connection("SELECT gambar_mobile FROM kategori  WHERE id_kategori = $data[id_kategori] ")->fetchColumn();
    $jdl = $db->connection("SELECT judul_seo FROM kategori  WHERE id_kategori = $data[id_kategori] ")->fetchColumn();
    $kat = $db->connection("SELECT judul FROM kategori  WHERE id_kategori = $data[id_kategori] ")->fetchColumn();
?>

<section class="banner hero-wrap hero-wrap-2" style="background-image: url('images/kategori/<?=$header?>');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container image">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9  pb-5 text-center">
                <h1 class="mb-3 bread"><?php echo $data['judul'] ?></h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="home">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $data['judul'] ?><i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section ftco-no-pt contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4 d-flex">
                <div class="asside">
                    <h1>Products</h1>
                    <nav>
                    <?php foreach($kategori as $r) : ?>
                        <a href="kategori-<?=$r['judul_seo']."-".$r['id_kategori']?>"><span class="l_left"
                                style="height: 0px;"></span><span class="hover" style="width: 0px;"></span><span
                                style="position:relative"><?=$r['judul']?></span></a>
                    <?php endforeach ?>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8 page">
                <div class="breadcrumb">
                    <a href="<?=$base_url?>">Home</a>
                    <a href="produk">Products</a>
                    <a href="kategori-<?=$jdl."-".$data['id_kategori']?>"><?php echo $kat?></a>
                    <a href="#"><?php echo $data['judul'] ?></a>
                </div>
                <div class="row d-flex mb-5 contact-info">
                    <div class="col-lg-4">
                        <img src="images/produk/<?=$data['gambar']?>" style="width: 100%">
                    </div>
                    <div class="col-lg-8 d-flex">
                        <div class="about-text">
                            <div class="std_content">
                                <h1><?php echo $data['judul'] ?></h1>
                                <p><?=$data['promo']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="specs_product">
                            <p class="bo">Specifications</p>
                            <?=$data['deskripsi']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
