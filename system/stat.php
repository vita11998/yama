<?php
	//error_reporting(0);
	// Statistik user
	$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
	$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
	$waktu   = time(); // 
	
	$bataswaktu       = time() - 300;
	
	$stmtc = $db->connection("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
	$row_count = $stmtc->rowCount();
	// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
	// Kalau belum ada, simpan data user tersebut ke database
	if($row_count == 0){
		
				
				$datas = array(
				    'ip' => $ip,
				    'tanggal' => $tanggal,
				    'hits' => 1,
				    'online' => $waktu
				);
				
				$db->insert('statistik', $datas);
				 
				
	}else{

		$results = $stmtc->fetch(PDO::FETCH_ASSOC);
				
				$datas = array(
				    'ip' => $ip,
				    'hits' => $results['hits']+1,
				    'online' => $waktu
				);
				
				$db->update('statistik', $datas, "id= '$results[id]' ");
				
		
		
		
	}

  
	$edit1 = $db->connection("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip ASC");
	$edit2 = $db->connection("SELECT COUNT(hits) as totalz FROM statistik");
	$edit3 = $db->connection("SELECT hits FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal ASC");
	$edit4 = $db->connection("SELECT SUM(hits) as totalz FROM statistik");
	$edit5 = $db->connection("SELECT * FROM statistik WHERE online > '$bataswaktu'");
	
	
	$row_count1 = $edit1->rowCount();
	$row_count3 = $edit3->rowCount();
	$row_count5 = $edit3->rowCount();

	$pengunjung       = $row_count1;
	$totalpengunjung  = $edit2->fetch(PDO::FETCH_ASSOC);
	$hits             = $row_count3;
	$totalhits        = $edit4->fetch(PDO::FETCH_ASSOC);
	$tothitsgbr       = $edit4->fetch(PDO::FETCH_ASSOC);
	$online = $row_count5;
	
	
	 
// 	echo "
//     <small>Today Visitors: $pengunjung
//     Total Visitors:  $totalpengunjung[totalz]
//     Online Visitors: <b>$online </b></small> "; 
?>