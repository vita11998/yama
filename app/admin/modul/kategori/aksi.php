<?php
use \Gumlet\ImageResize;
// Update modul
if ($act == 'update') {
    $jdl2 = substr($_POST["judul"], 0, 100);

    $lokasi_file = $_FILES['lopoFile']['tmp_name'];
    $judul_file = $_FILES['lopoFile']['name'];
    $tipe_file = $_FILES['lopoFile']['type'];
    $ukuran = $_FILES['lopoFile']['size'];
    $tipe_file2 = seo2($tipe_file);
    $seojdul = seo($jdl2);
    $acak = rand(00, 99);
    $nama_file_unik = $seojdul . "-" . $acak . "." . $tipe_file2;
    $nama_file_unik = $seojdul . "-" . $acak . "." . $tipe_file2;
    $nama_seo = seo($_POST["judul"]);

    if (!empty($lokasi_file)) {
        if (($ukuran == 0) or ($ukuran == 02) or ($ukuran > 2060817)) {
            echo "<script>window.alert('Gagal Upload Gambar, ukuran gambar lebih dari 2 MB !'); window.location(history.back(-1))</script>";
        } else {
            $edit = $db->connection("SELECT gambar FROM kategori WHERE id_kategori='$_POST[id_kategori]'");
            $tedit = $edit->fetch(PDO::FETCH_ASSOC);

            unlink("images/kategori/$tedit[gambar]");
            unlink("images/kategori/small/$tedit[gambar]");

            $res = lopoUpload($seojdul . '-' . $acak, 'kategori');

            if ($res == true) {
                try {
                    $datas = array(
                        'judul' => $_POST["judul"],
                        'judul_seo' => $nama_seo,
                        'gambar' => $nama_file_unik,
                        'deskripsi' => $_POST["deskripsi"],
                    );
                    $db->update("kategori", $datas, "id_kategori= '$_POST[id_kategori]' ");

                    $pathToImage = 'images/kategori/' . $nama_file_unik;
                    $pathSmall = 'images/kategori/small/' . $nama_file_unik;
                    lopoCompress('kategori', $pathToImage, $tipe_file2);
                    lopoCompress('kategori/small', $pathToImage, $tipe_file2, 3);

                    $image = new ImageResize($pathSmall);
                    $image->resize(75, 75);
                    $image->save($pathSmall);

                    $image2 = new ImageResize($pathToImage);
                    
                    $image2->save($pathToImage);

                    echo "<script>alert('kategori Berhasil diedit'); window.location = '$hal-edit-$_POST[id_kategori]'</script>";
                } catch (PDOException $e) {
                    echo "<script>alert('kategori Gagal diedit!'); window.location = '$hal-edit-$_POST[id_kategori]'</script>";
                }
            } else {
                echo "<script>alert('Something error with this image'); window.location(history.back(-1))</script>";
            }
        }
    } else {
        try {

            $edit = $db->connection("SELECT gambar FROM kategori WHERE id_kategori='$_POST[id_kategori]'");
            $tedit = $edit->fetch(PDO::FETCH_ASSOC);
            $datas = array();

            $datas = array(
                'judul' => $_POST["judul"],
                'judul_seo' => $nama_seo,
                'deskripsi' => $_POST["deskripsi"],
            );
            $db->update("kategori", $datas, "id_kategori= '$_POST[id_kategori]' ");

            echo "<script>alert('kategori Berhasil diedit'); window.location = '$hal-edit-$_POST[id_kategori]'</script>";
        } catch (PDOException $e) {
            echo "<script>alert('kategori Gagal diedit!'); window.location = '$hal-edit-$_POST[id_kategori]'</script>";
        }
    }
}

// add modul
elseif ($act == 'add') {

    $lokasi_file = $_FILES['lopoFile']['tmp_name'];
    $judul_file = $_FILES['lopoFile']['name'];
    $tipe_file = $_FILES['lopoFile']['type'];
    $ukuran = $_FILES['lopoFile']['size'];
    $tipe_file2 = seo2($tipe_file);
    $seojdul = seo($_POST["judul"]);
    $acak = rand(00, 99);
    $nama_file_unik = $seojdul . "-" . $acak . "." . $tipe_file2;
    $nama_seo = seo($_POST["judul"]);
    date_default_timezone_set('Asia/Jakarta');



    if (empty($judul_file)) {
        echo "<script>window.alert('Gambar Tidak Boleh Kosong!'); window.location(history.back(-1))</script>";
    } else {
        if (($ukuran == 0) or ($ukuran == 02) or ($ukuran > 2060817)) {
            echo "<script>window.alert('Gagal Upload Gambar, ukuran gambar lebih dari 2 MB !'); window.location(history.back(-1))</script>";
        } else {
            $res = lopoUpload($seojdul . '-' . $acak, 'kategori');
            if ($res == true) {
                try {

                    $datas = array(
                        'judul' => $_POST["judul"],
                        'judul_seo' => $nama_seo,
                        'gambar' => $nama_file_unik,
                        'deskripsi' => $_POST["deskripsi"],
                    );
                    $saved = $db->insert('kategori', $datas);
                    $insertId = $db->lastId();

                    $pathToImage = 'images/kategori/' . $nama_file_unik;
                    $pathSmall = 'images/kategori/small/' . $nama_file_unik;
                    lopoCompress('kategori', $pathToImage, $tipe_file2, 1);
                    lopoCompress('kategori/small', $pathToImage, $tipe_file2, 3);

                    $image = new ImageResize($pathSmall);
                    $image->resize(75, 75);
                    $image->save($pathSmall);

                    $image2 = new ImageResize($pathToImage);
                    $image2->save($pathToImage);

                    echo "<script>alert('kategori Berhasil ditambah'); window.location = '$hal-edit-$insertId'</script>";

                } catch (PDOException $e) {
                    echo "$e";
                }
            } else {
                echo "<script>alert('Format Gambar Salah !'); window.location = '$hal'</script>";
            }
        }
    }
}

// remove modul
elseif ($act == 'remove') {
    $edit = $db->connection("SELECT gambar FROM kategori WHERE id_kategori=$id ");
    $rr = $edit->fetch(PDO::FETCH_ASSOC);
    unlink("images/kategori/$rr[gambar]");
    unlink("images/kategori/small/$rr[gambar]");

    $del = $db->delete("kategori", "id_kategori=$id ");

    echo "<script>alert('Data Berhasil dihapus'); window.location = '$hal'</script>";

} elseif ($module == $module2 and $act == 'addgallery') {
    $edit = $db->connection("SELECT judul FROM kategori WHERE id_kategori='$_POST[id]'");
    $tedit = $edit->fetch(PDO::FETCH_ASSOC);

    $lokasi_file = $_FILES['nyanpload']['tmp_name'];
    $judul_file = $_FILES['nyanpload']['name'];
    $tipe_file = $_FILES['nyanpload']['type'];
    $tipe_file2 = seo2($tipe_file);
    $seojdul = seo($tedit["judul"]);
    $acak = rand(00, 99);
    $nama_file_unik = $seojdul . $acak . "." . $tipe_file2;
    $idku = $_POST['id'];
    if (empty($lokasi_file)) {
        echo "<script>window.alert('Belum ada Gambar yang Dimasukan!');
            window.location(history.back(-1))</script>";
    } else {
        try {
            UploadNyan($nama_file_unik, 'gallery_kategori');

            $datas = array(
                'id_kategori' => $idku,
                'gambar' => $nama_file_unik,
                'judul' => $_POST['judul'],
            );
            $db->insert('gallery_kategori', $datas);

            unlink("../../../images/gallery_kategori/$nama_file_unik");

            echo "<script>alert('Gambar berhasil dimasukan!'); window.location = '../../$module-edit-$_POST[id]#gallery_kategori'</script>";
        } catch (PDOException $e) {
            echo "$e";
        }

    }
} elseif ($act == 'editgallery') {
    $edit = $db->connection("SELECT judul FROM kategori WHERE id_kategori='$_POST[idm]'");
    $tedit = $edit->fetch(PDO::FETCH_ASSOC);
    $idku = $_POST['idm'];

    $lokasi_file = $_FILES['nyanpload']['tmp_name'];
    $judul_file = $_FILES['nyanpload']['name'];
    $tipe_file = $_FILES['nyanpload']['type'];
    $tipe_file2 = seo2($tipe_file);
    $seojdul = seo($tedit["judul"]);
    $acak = rand(00, 99);
    $nama_file_unik = $seojdul . $acak . "." . $tipe_file2;

    if (empty($lokasi_file)) {
        echo "<script>window.alert('Belum ada Gambar yang Dimasukan!');
            window.location(history.back(-1))</script>";
    } else {

        UploadNyan($nama_file_unik, 'gallery_kategori');

        $edit = $db->connection("SELECT gambar FROM gallery_kategori WHERE id_gallery ='$_POST[id]'");
        $tedit = $edit->fetch(PDO::FETCH_ASSOC);

        unlink("../../../images/gallery_kategori/$imgname1-$tedit[gambar]");
        unlink("../../../images/gallery_kategori/small/$imgname2-$tedit[gambar]");

        $datas = array(
            'id_kategori' => $idku,
            'gambar' => $nama_file_unik,
            'judul' => $_POST['judul'],
        );
        $db->update('gallery_kategori', $datas, " id_gallery = '$_POST[id]' ");

        unlink("../../../images/gallery_kategori/$nama_file_unik");

        echo "<script>alert('kategori gambar berhasil diedit!'); window.location = '../../$module-edit-$_POST[idm]#kategorikategori'</script>";
    }
} elseif ($act == 'removegallery') {
    $edit = $db->connection("SELECT id_gallery, gambar FROM gallery_kategori WHERE id_gallery='$_GET[id]'");
    $tedit = $edit->fetch(PDO::FETCH_ASSOC);
    unlink("../../../images/gallery_kategori/$imgname1-$tedit[gambar]");
    unlink("../../../images/gallery_kategori/small/$imgname1-$tedit[gambar]");
    $id = $tedit['id_gallery_kategori'];

    $del = $db->connection("DELETE FROM gallery_kategori WHERE id_gallery='$_GET[id]'");
    $del->execute();

    header('location:../../' . $module . '-edit-' . $_GET['idm'] . '#kategorikategori');
}
