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
                $edit = $db->connection( "SELECT gambar FROM artikel WHERE id_artikel='$_POST[id_artikel]'" );
                $tedit = $edit->fetch( PDO::FETCH_ASSOC );
                unlink( "images/artikel/$tedit[gambar]" );
                unlink( "images/artikel/small/$tedit[gambar]" );

                // Upload Image
                $res = lopoUpload( $judul_seo.'-'.$acak, 'artikel' );
                if ( $res == true ) {
                    try {

                        $datas = array(
                            'judul' => $_POST['judul'],
                            'judul_seo' => $judul_seo,
                            'deskripsi' => $_POST['deskripsi'],
                            'id_admin' => $_SESSION['id_admin'],
                            'status' => $_POST['status'],
                            'keyword' => $_POST['keyword'],
                            'description' => $_POST['description'],
                            'gambar' => $nama_file_unik,
                            'tgl' => $tgl_post

                        );
                        $saved = $db->update( 'artikel', $datas, "id_artikel = '$_POST[id_artikel]' " );
                        $pathToImage = 'images/artikel/'.$nama_file_unik;
                        $pathSmall   =  'images/artikel/small/'.$nama_file_unik;
                        lopoCompress( 'artikel', $pathToImage, $tipe_file2, 1 );
                        lopoCompress( 'artikel/small', $pathToImage, $tipe_file2, 6 );
                        
                        $image = new ImageResize($pathSmall);
                        $image->resize(675, 350);
                        $image->save($pathSmall);

                        $image2 = new ImageResize($pathToImage);
                        $image2->resize(1349, 700);
                        $image2->save($pathToImage);

                        echo "<script>alert('$hal Berhasil diedit'); window.location = '$hal-edit-$_POST[id_artikel]'</script>";
                    } catch( PDOException $e ) {
                        echo "<script>alert('$hal Gagal diedit!'); window.location = '$hal-edit-$_POST[id_artikel]'</script>";
                    }
                } else {
                    echo "<script>alert('Something error with this image'); window.location = '$hal-edit-$_POST[id_artikel]'</script>";
                }

            }
        } else {
            try {
                $datas = array(
                    'judul' => $_POST['judul'],
                    'id_admin' => $_SESSION['id_admin'],
                    'judul_seo' => $judul_seo,
                    'deskripsi' => $_POST['deskripsi'],
                    'status' => $_POST['status'],
                    'keyword' => $_POST['keyword'],
                    'description' => $_POST['description'],
                    'tgl' => $tgl_post

                );
                $saved = $db->update( 'artikel', $datas, "id_artikel = '$_POST[id_artikel]' " );

                echo "<script>alert('$hal Berhasil diedit'); window.location = '$hal-edit-$_POST[id_artikel]'</script>";
            } catch( PDOException $e ) {
                echo "<script>alert('$hal Gagal diedit!'); window.location = '$hal-edit-$_POST[id_artikel]'</script>";
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
        $res = lopoUpload( $judul_seo.'-'.$acak, 'artikel' );
        if ( $res == false ) {
            echo "<script>window.alert('Gambar Tidak Boleh Kosong Atau melebihi 2 MB'); window.location(history.back(-1))</script>";
        } else {
            try {
                $datas = array(
                    'judul' => $_POST['judul'],
                    'id_admin' => $_SESSION['id_admin'],
                    'judul_seo' => $judul_seo,
                    'deskripsi' => $_POST['deskripsi'],
                    'status' => $_POST['status'],
                    'keyword' => $_POST['keyword'],
                    'description' => $_POST['description'],
                    'gambar' => $nama_file_unik,
                    'tgl' => $tgl_post
                );
                $saved = $db->insert( 'artikel', $datas );
                $insertId = $db->lastId();

                $pathToImage = 'images/artikel/'.$nama_file_unik;
                $pathSmall   =  'images/artikel/small/'.$nama_file_unik;

                lopoCompress( 'artikel', $pathToImage, $tipe_file2, 1 );
                lopoCompress( 'artikel/small', $pathToImage, $tipe_file2, 6 );
                
                $image = new ImageResize($pathSmall);
                $image->resize(675, 350);
                $image->save($pathSmall);
                        
                $image2 = new ImageResize($pathToImage);
                $image2->resize(1349, 700);
                $image2->save($pathToImage);

                echo "<script>alert('$hal Berhasil ditambah'); window.location = '$hal-edit-$insertId'</script>";

            } catch( PDOException $e ) {
                echo "<script>alert('$hal Gagal diedit!'); window.location = '$hal'</script>";
            }
        }

    }

    // remove modul
    elseif ( $act == 'remove' ) {
        $edit = $db->connection( "SELECT gambar FROM artikel WHERE id_artikel='$id'" );
        $rr = $edit->fetch( PDO::FETCH_ASSOC );
        unlink( "images/artikel/$rr[gambar]" );
        unlink( "images/artikel/small/$rr[gambar]" );

        $del = $db->delete( 'artikel', "id_artikel='$id'" );

        echo "<script>alert('$hal Berhasil dihapus'); window.location = '$hal'</script>";
    }
?>
