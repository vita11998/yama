<?php
	use \Gumlet\ImageResize;

	if($hal = ''){
		$hal = "data ";
	}
	if($act=='update'){
		if(isset($_FILES['lopoFile']['name'])){
			$lokasi_file 	= $_FILES['lopoFile']['tmp_name'];
			$nama_file   	= $_FILES['lopoFile']['name'];
			$tipe_file   	= $_FILES['lopoFile']['type'];
			$ukuran   		= $_FILES['lopoFile']['size'];
			$tipe_file2   	= seo2($tipe_file);
			$seojdul        = seo($_POST["judul"]);
			$acak           = rand(00,99);
			$nama_file_unik = $seojdul."-".$acak.".".$tipe_file2;
			$judul_seo     	= seo(trim($_POST['judul']));
		}
		
		
		if(empty($nama_file)){
			try {
				$datas = array(
					'judul' => $_POST["judul"],
					'deskripsi' => $_POST["deskripsi"],
					'title' => $_POST["title"],
					'keyword' => $_POST["keyword"],
					'description' => $_POST["description"],
					'tgl_update' => date('Y-m-d')
				);

				$updated = $db->update("page", $datas, "id_page = $_POST[id_page] ");
				$msg->success('Data berhasil diubah');
				echo "<script>window.location = 'page-edit-$_POST[id_page]'</script>";
			}catch(PDOException $e){
				$msg->error('Data gagal diubah ');
				echo "<script>window.location = 'page-edit-$_POST[id_page]'</script>";
			}
		}else{
			if( ($ukuran==0) OR ($ukuran>9060817) ){
				echo "<script>window.alert('Gagal Upload Gambar, ukuran gambar lebih dari 2 MB !'); window.location(history.back(-1))</script>";
			}else{
				$edit = $db->connection("SELECT gambar FROM page WHERE id_page='$_POST[id_page]'");
				$tedit = $edit->fetch(PDO::FETCH_ASSOC);
				unlink("images/$tedit[gambar]");
                if ( empty( $lokasi_file ) ) {
					$gambar = $_POST['gambar'];
				} else {
					UploadPagan( $nama_file_unik );
					$gambar = $nama_file_unik;

                    $pathSmall = 'images/' . $nama_file_unik;

                    $image = new ImageResize($pathSmall);
                    $image->resizeToWidth(1280);
                    $image->save($pathSmall);

				}
				// $res = lopoUpload( $seojdul.'-'.$acak, 'page' );
				//unlink("images/$nama_file_unik");
				
				try {
					$datas = array(
						'judul' => $_POST["judul"],
						'deskripsi' => $_POST["deskripsi"],
						'title' => $_POST["title"],
						'keyword' => $_POST["keyword"],
						'description' => $_POST["description"],
						'gambar'	=> $gambar,
						'tgl_update' => date('Y-m-d')
					);
	
					$updated = $db->update("page", $datas, "id_page = $_POST[id_page] ");
					
					$msg->success('Data berhasil diubah');
					echo "<script>window.location = 'page-edit-$_POST[id_page]'</script>";
				}catch(PDOException $e){
					$msg->error('Data gagal diubah');
					echo "<script>window.location = 'page-edit-$_POST[id_page] '</script>";
				}
			}
		}
	}
	
	
	elseif($module==$module2 AND $act=='romoveimg'){
		$gambar = '';
		$edit = $db->connection("SELECT gambar FROM page WHERE id_page='$_GET[id]'");
		$tedit = $edit->fetch(PDO::FETCH_ASSOC);
		unlink("../../../images/$imgname1-$tedit[gambar]");
			
				$data = array(
					'gambar' => $gambar
				);
				$updaed = $db->update("page", $data, "id_page = $_GET[id] ");

		$msg->success('Data berhasil dihapus');
		header('location:../../page-edit-'.$_GET["id"]);
	}

?>
