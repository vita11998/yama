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
                $edit = $db->connection( "SELECT gambar FROM partner WHERE id_partner='$_POST[id_partner]'" );
                $tedit = $edit->fetch( PDO::FETCH_ASSOC );
                unlink( "images/partner/$tedit[gambar]" );
                unlink( "images/partner/small/$tedit[gambar]" );

                // Upload Image
                $res = lopoUpload( $judul_seo.'-'.$acak, 'partner' );
                if ( $res == true ) {
                    try {

                        $datas = array(
                            'judul' => $_POST['judul'],
                            'judul_seo' => $judul_seo,
                            'id_admin' => $_SESSION['id_admin'],
                            'kode_produk' => $_POST['kode_produk'],
                            'deskripsi' => $_POST['deskripsi'],
                            'keyword' => $_POST['keyword'],
                            'description' => $_POST['description'],
                            'gambar' => $nama_file_unik,
                            'tgl' => $tgl_post

                        );
                        $saved = $db->update( 'partner', $datas, "id_partner = '$_POST[id_partner]' " );
                        $pathToImage = 'images/partner/'.$nama_file_unik;
                        $pathSmall   =  'images/partner/small/'.$nama_file_unik;
                        lopoCompress( 'partner', $pathToImage, $tipe_file2, 1 );
                        lopoCompress( 'partner/small', $pathToImage, $tipe_file2, 6 );
                        
                        $image = new ImageResize($pathSmall);
                        $image->resizeToBestFit(675, 350);
                        $image->save($pathSmall);

                        $image2 = new ImageResize($pathToImage);
                        $image2->resizeToBestFit(1349, 700);
                        $image2->save($pathToImage);

                        echo "<script>alert('$hal Berhasil diedit'); window.location = '$hal-edit-$_POST[id_partner]'</script>";
                    } catch( PDOException $e ) {
                        echo "<script>alert('$hal Gagal diedit!'); window.location = '$hal-edit-$_POST[id_partner]'</script>";
                    }
                } else {
                    echo "<script>alert('Something error with this image'); window.location = '$hal-edit-$_POST[id_partner]'</script>";
                }

            }
        } else {
            try {
                $datas = array(
                    'judul' => $_POST['judul'],
                    'id_admin' => $_SESSION['id_admin'],
                    'judul_seo' => $judul_seo,
                    'kode_produk' => $_POST['kode_produk'],
                    'keyword' => $_POST['keyword'],
                    'deskripsi' => $_POST['deskripsi'],
                    'description' => $_POST['description'],
                    'tgl' => $tgl_post

                );
                $saved = $db->update( 'partner', $datas, "id_partner = '$_POST[id_partner]' " );

                echo "<script>alert('$hal Berhasil diedit'); window.location = '$hal-edit-$_POST[id_partner]'</script>";
            } catch( PDOException $e ) {
                echo "<script>alert('$hal Gagal diedit!'); window.location = '$hal-edit-$_POST[id_partner]'</script>";
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

        $tgl_post = convertDate('/', $_POST['tgl']);
        

        // Upload Image
        $res = lopoUpload( $judul_seo.'-'.$acak, 'partner' );
        if ( $res == false ) {
            echo "<script>window.alert('Gambar Tidak Boleh Kosong Atau melebihi 2 MB'); window.location(history.back(-1))</script>";
        } else {
            try {
                $datas = array(
                    'id_admin' => $_SESSION['id_admin'],
                    'judul' => $_POST['judul'],
                    'judul_seo' => $judul_seo,
                    'kode_produk' => $_POST['kode_produk'],
                    'keyword' => $_POST['keyword'],
                    'deskripsi' => $_POST['deskripsi'],
                    'description' => $_POST['description'],
                    'gambar' => $nama_file_unik,
                    'tgl' => $tgl_post
                );
                $saved = $db->insert( 'partner', $datas );
                $insertId = $db->lastId();


                $pathToImage = 'images/partner/'.$nama_file_unik;
                $pathSmall   =  'images/partner/small/'.$nama_file_unik;

                lopoCompress( 'partner', $pathToImage, $tipe_file2, 1 );
                lopoCompress( 'partner/small', $pathToImage, $tipe_file2, 3 );
                
                $image = new ImageResize($pathSmall);
                $image->resizeToBestFit(675, 350);
                $image->save($pathSmall);
                        
                $image2 = new ImageResize($pathToImage);
                $image2->resizeToBestFit(1349, 700);
                $image2->save($pathToImage);

                echo "<script>alert('$hal Berhasil ditambah'); window.location = '$hal'</script>";

            } catch( PDOException $e ) {
                echo "<script>alert('$hal Gagal diedit!'); window.location = '$hal'</script>";
            }
        }

    }

    // remove modul
    elseif ( $act == 'remove' ) {
        $edit = $db->connection( "SELECT gambar FROM partner WHERE id_partner='$id'" );
        $rr = $edit->fetch( PDO::FETCH_ASSOC );
        unlink( "images/partner/$rr[gambar]" );
        unlink( "images/partner/small/$rr[gambar]" );

        $del = $db->delete( 'partner', "id_partner='$id'" );

        echo "<script>alert('$hal Berhasil dihapus'); window.location = '$hal'</script>";
    }

    elseif($act=='addgallery'){
        $edit = $db->connection("SELECT judul FROM partner WHERE id_partner='$_POST[ids]'");
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
				UploadNyan($nama_file_unik,'gallery_partner');
				
				$datas = array(
				    'id_partner' => $idku,
				    'gambar'    => $nama_file_unik,
				    'judul'     => $_POST['judul']
				);
				$db->insert('gallery_partner', $datas);
	
				unlink("images/gallery_partner/$nama_file_unik");
				
				echo "<script>alert('Gambar berhasil dimasukan!'); window.location = 'partner-edit-$idku'</script>";
			}catch(PDOException $e){
					echo "$e";
				}
           
        }
    }

    elseif($act=='editgallery'){
        $edit = $db->connection("SELECT judul FROM partner WHERE id_partner='$_POST[idm]'");
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
				'id_partner' => $idku,
				'judul'     => $_POST['judul']
			);
			$db->update('gallery_partner', $datas, " id_gallery = '$_POST[id]' ");
			echo "<script>alert('Slider gambar berhasil diedit!'); window.location = 'partner-edit-$_POST[idm]#sliderpartner'</script>";
        }else{

            UploadNyan($nama_file_unik,'gallery_partner');

            $edit = $db->connection("SELECT gambar FROM gallery_partner WHERE id_gallery ='$_POST[id]'");
            $tedit = $edit->fetch(PDO::FETCH_ASSOC);

            unlink("images/gallery_partner/$imgname1-$tedit[gambar]");
            unlink("images/gallery_partner/small/$imgname1-$tedit[gambar]");

            $datas = array(
				    'id_partner' => $idku,
				    'gambar'    => $nama_file_unik,
				    'judul'     => $_POST['judul']
				);
				$db->update('gallery_partner', $datas, " id_gallery = '$_POST[id]' ");

            unlink("images/gallery_partner/$nama_file_unik");

            echo "<script>alert('Slider gambar berhasil diedit!'); window.location = 'partner-edit-$_POST[idm]#sliderpartner'</script>";
        }
    }

    elseif($act=='removegallery'){
        $edit = $db->connection("SELECT id_gallery, gambar FROM gallery_partner WHERE id_gallery=$id ");
        $tedit = $edit->fetch(PDO::FETCH_ASSOC);
        unlink("images/gallery_partner/$imgname1-$tedit[gambar]");
        unlink("images/gallery_partner/small/$imgname1-$tedit[gambar]");
        $id = $tedit['id_gallery'];

        $del = $db->connection("DELETE FROM gallery_partner WHERE id_gallery=$id ");
        $del->execute();

        //echo "<script>alert('Gambar berhasil dimasukan!'); window.location = 'partner-edit-$_POST[id]'</script>";

        header('location:partner-edit-'.$id_partner.'#sliderpartner');
	}
?>
