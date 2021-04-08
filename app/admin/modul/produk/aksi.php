<?php
use \Gumlet\ImageResize;
    // Update modul
    if ( $act == 'update' ) {

        $jdl2 				 = substr( $_POST['judul'], 0, 80 );
        $tipe_file   	 	 = $_FILES['lopoFile']['type'];
        $nama_file   		 = $_FILES['lopoFile']['name'];
        $ukuran   			 = $_FILES['lopoFile']['size'];
        $tipe_file2   	 	 = seo2( $tipe_file );
        $judul_seo 		 	 = seo( $_POST['judul'] );
        $acak           	 = rand( 00, 99 );
        $nama_file_unik 	 = $judul_seo.'-'.$acak.'.'.$tipe_file2;

        $tgl_post = convertDate('/', $_POST['tgl']);

        if ( !empty( $nama_file ) ) {
            if ( ( $ukuran == 0 ) OR ( $ukuran == 02 ) OR ( $ukuran>9060817 ) ) {
                echo "<script>window.alert('Gagal Upload Gambar, ukuran gambar lebih dari 2 MB !'); window.location(history.back(-1))</script>";
            } else {
                $edit = $db->connection( "SELECT gambar FROM produk WHERE id_produk='$_POST[id_produk]'" );
                $tedit = $edit->fetch( PDO::FETCH_ASSOC );
                unlink( "images/produk/$tedit[gambar]" );
                unlink( "images/produk/small/$tedit[gambar]" );

                // Upload Image
                $res = lopoUpload( $judul_seo.'-'.$acak, 'produk' );
                if ( $res == true ) {
                    try {

                        $datas = array(
                            'judul' => $_POST['judul'],
                            'judul_seo' => $judul_seo,
                            'deskripsi' => $_POST['deskripsi'],
                            'id_admin' => $_SESSION['id_admin'],
                            'id_kategori' => $_POST['id_kategori'],
                            'stok' => $_POST['stok'],
                            'promo' => $_POST['promo'],
                            'keyword' => $_POST['keyword'],
                            'description' => $_POST['description'],
                            'gambar' => $nama_file_unik,
                            'tgl' => $tgl_post

                        );
                        $saved = $db->update( 'produk', $datas, "id_produk = '$_POST[id_produk]' " );
                        $pathToImage = 'images/produk/'.$nama_file_unik;
                        $pathSmall   =  'images/produk/small/'.$nama_file_unik;
                        lopoCompress( 'produk', $pathToImage, $tipe_file2, 1 );
                        lopoCompress( 'produk/small', $pathToImage, $tipe_file2, 6 );
                        
                        $image = new ImageResize($pathSmall);
                        $image->resizeToBestFit(448, 336);
                        $image->save($pathSmall);

                        $image2 = new ImageResize($pathToImage);
                        $image2->resizeToBestFit(640, 480);
                        $image2->save($pathToImage);
                        $msg->info('Data berhasil diubah');
                        echo "<script>window.location = '$hal-edit-$_POST[id_produk]'</script>";
                    } catch( PDOException $e ) {
                        $msg->warning("$hal Gagal diedit!");
                        echo "<script> window.location = '$hal-edit-$_POST[id_produk]'</script>";
                    }
                } else {
                    $msg->warning('Something error with this image');
                    echo "<script>window.location = '$hal-edit-$_POST[id_produk]'</script>";
                }

            }
        } else {
            try {
                $datas = array(
                    'judul' => $_POST['judul'],
                    'id_admin' => $_SESSION['id_admin'],
                    'judul_seo' => $judul_seo,
                    'deskripsi' => $_POST['deskripsi'],
                    'id_kategori' => $_POST['id_kategori'],
                    'stok' => $_POST['stok'],
                    'promo' => $_POST['promo'],
                    'keyword' => $_POST['keyword'],
                    'description' => $_POST['description'],
                    'tgl' => $tgl_post

                );
                $saved = $db->update( 'produk', $datas, "id_produk = '$_POST[id_produk]' " );
                $msg->info('Data berhasil diubah');
                echo "<script>window.location = '$hal-edit-$_POST[id_produk]'</script>";
            } catch( PDOException $e ) {
                $msg->error('Data gagal diubah');
                echo "<script>window.location = '$hal-edit-$_POST[id_produk]'</script>";
            }
        }
    }

    // add modul
    elseif (  $act == 'add' ) {
        $jdl2 				 = substr( $_POST['judul'], 0, 80 );
        $tipe_file   	 	 = $_FILES['lopoFile']['type'];
        $tipe_file2   	 	 = seo2( $tipe_file );
        $judul_seo 		 	 = seo( $_POST['judul'] );
        $acak           	 = rand( 00, 99 );
        $nama_file_unik 	 = $judul_seo.'-'.$acak.'.'.$tipe_file2;

        //$tgl_post = convertDate('/', $_POST['tgl']);
        

        // Upload Image
        $res = lopoUpload( $judul_seo.'-'.$acak, 'produk' );
        if ( $res == false ) {
            $msg->warning('Gambar Tidak Boleh Kosong Atau melebihi 2 MB');
            echo "<script>window.location(history.back(-1))</script>";
        } else {
            try {
                $datas = array(
                    'id_admin' => $_SESSION['id_admin'],
                    'judul' => $_POST['judul'],
                    'judul_seo' => $judul_seo,
                    'id_kategori' => $_POST['id_kategori'],
                    'deskripsi' => $_POST['deskripsi'],
                    'keyword' => $_POST['keyword'],
                    'description' => $_POST['description'],
                    'gambar' => $nama_file_unik,
                    'tgl' => date('Y-m-d')
                );
                $saved = $db->insert( 'produk', $datas );
                $insertId = $db->lastId();


                $pathToImage = 'images/produk/'.$nama_file_unik;
                $pathSmall   =  'images/produk/small/'.$nama_file_unik;

                lopoCompress( 'produk', $pathToImage, $tipe_file2, 1 );
                lopoCompress( 'produk/small', $pathToImage, $tipe_file2, 6 );
                
                $image = new ImageResize($pathSmall);
                $image->resizeToBestFit(448, 336);
                $image->save($pathSmall);
                        
                $image2 = new ImageResize($pathToImage);
                $image2->resizeToBestFit(640, 480);
                $image2->save($pathToImage);

                $msg->success('Data berhasil ditambah');

                echo "<script>window.location = '$hal-edit-$insertId'</script>";

            } catch( PDOException $e ) {
                $msg->error('Data gagal ditambah');
                echo "<script>window.location = '$hal'</script>";
            }
        }

    }

    // remove modul
    elseif ( $act == 'remove' ) {
        $edit = $db->connection( "SELECT gambar FROM produk WHERE id_produk='$id'" );
        $rr = $edit->fetch( PDO::FETCH_ASSOC );
        unlink( "images/produk/$rr[gambar]" );
        unlink( "images/produk/small/$rr[gambar]" );

        $del = $db->delete( 'produk', "id_produk='$id'" );
        $msg->success('Data berhasil dihapus');
        echo "<script>window.location = '$hal'</script>";
    }

    elseif($act=='addgallery'){
        $edit = $db->connection("SELECT judul FROM produk WHERE id_produk='$_POST[ids]'");
        $tedit = $edit->fetch(PDO::FETCH_ASSOC);
		
        $lokasi_file 	= $_FILES['nyanpload']['tmp_name'];
        $nama_file   	= $_FILES['nyanpload']['name'];
        $tipe_file   	= $_FILES['nyanpload']['type'];
        $tipe_file2   	= seo2($tipe_file);
        $seojdul        = seo($tedit["judul"]);
        $acak           = rand(00,99);
        $nama_file_unik = $seojdul.$acak.".".$tipe_file2;
        $idku = $_POST['ids'];
        if (empty($lokasi_file)){
            echo "<script>window.alert('Belum ada Gambar yang Dimasukan!');
            window.location(history.back(-1))</script>";
        }else{
			try{
				UploadNyan($nama_file_unik,'gallery_produk');
				
				$datas = array(
				    'id_produk' => $idku,
				    'gambar'    => $nama_file_unik,
				    'judul'     => $_POST['judul']
				);
				$db->insert('gallery_produk', $datas);
	
				unlink("images/gallery_produk/$nama_file_unik");
				$msg->success('Gambar berhasil ditambah');
				echo "<script>window.location = 'produk-edit-$idku'</script>";
			}catch(PDOException $e){
					echo "$e";
				}
           
        }
    }

    elseif($act=='editgallery'){
        $edit = $db->connection("SELECT judul FROM produk WHERE id_produk='$_POST[idm]'");
		$tedit = $edit->fetch(PDO::FETCH_ASSOC);
		$idku = $_POST['idm'];

        $lokasi_file 	= $_FILES['nyanpload']['tmp_name'];
        $nama_file   	= $_FILES['nyanpload']['name'];
        $tipe_file   	= $_FILES['nyanpload']['type'];
        $tipe_file2   	= seo2($tipe_file);
        $seojdul        = seo($tedit["judul"]);
        $acak           = rand(00,99);
        $nama_file_unik = $seojdul.$acak.".".$tipe_file2;

        if (empty($lokasi_file)){
            $datas = array(
				'id_produk' => $idku,
				'judul'     => $_POST['judul']
			);
			$db->update('gallery_produk', $datas, " id_gallery = '$_POST[id]' ");
			echo "<script>alert('Slider gambar berhasil diedit!'); window.location = 'produk-edit-$_POST[idm]#sliderproduk'</script>";
        }else{

            UploadNyan($nama_file_unik,'gallery_produk');

            $edit = $db->connection("SELECT gambar FROM gallery_produk WHERE id_gallery ='$_POST[id]'");
            $tedit = $edit->fetch(PDO::FETCH_ASSOC);

            unlink("images/gallery_produk/$imgname1-$tedit[gambar]");
            unlink("images/gallery_produk/small/$imgname1-$tedit[gambar]");

            $datas = array(
				    'id_produk' => $idku,
				    'gambar'    => $nama_file_unik,
				    'judul'     => $_POST['judul']
				);
				$db->update('gallery_produk', $datas, " id_gallery = '$_POST[id]' ");

            unlink("images/gallery_produk/$nama_file_unik");

            $msg->info('Gambar berhasil diubah');
            echo "<script> window.location = 'produk-edit-$_POST[idm]#sliderproduk'</script>";
        }
    }

    elseif($act=='removegallery'){
        $edit = $db->connection("SELECT id_gallery, gambar FROM gallery_produk WHERE id_gallery=$id ");
        $tedit = $edit->fetch(PDO::FETCH_ASSOC);
        unlink("images/gallery_produk/$imgname1-$tedit[gambar]");
        unlink("images/gallery_produk/small/$imgname1-$tedit[gambar]");
        $id = $tedit['id_gallery'];

        $del = $db->connection("DELETE FROM gallery_produk WHERE id_gallery=$id ");
        $del->execute();

        //echo "<script>alert('Gambar berhasil dimasukan!'); window.location = 'produk-edit-$_POST[id]'</script>";
        $msg->info('Data berhasil dihapus');
        header('location:produk-edit-'.$id_produk.'#sliderproduk');
	}
?>
