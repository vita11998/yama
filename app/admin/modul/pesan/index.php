<?php $this->layout('template', ['hal'=>'Pesan Contact']) ?>
<?php
    $module = 'pesan';
	switch($act){
		case "list":
	?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="my_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="2%" class="center">No</th>
                                <th width="23%" class="center">Nama</th>
                                <th width="23%" class="center">Subject</th>
                                <th width="10%" class="center">Dibaca</th>
                                <th width="20%" class="center">Tanggal Masuk</th>
                                <th width="18%" class="center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
						$no = 1;
						while($r = $tampil->fetch(PDO::FETCH_ASSOC)){
						?>
                            <tr>
                                <td align="center"><?php echo  $no; ?></td>
                                <td><?php echo  $r['name']; ?></td>
                                <td align="center"><?php echo  $r['subject']; ?></td>
                                <td align="center">
                                    <?php echo  ($r['is_read'] == 0)? '<p class="label label-danger">Belum</p>' : '<p class="label label-info">Sudah</p>'; ?>
                                </td>
                                <td align="center"><?php echo  tgl2($r['tgl']); ?></td>

                                <td align="center">
                                    <a href="<?php echo $module; ?>-view-<?php echo $r['id_contact']; ?>"
                                        class="btn btn-success btnadmin" role="button" aria-pressed="true"
                                        style="min-width: 50px;margin-bottom: 5px;">View</a>

                                    <a onClick="javascript: return confirm('Data yang Sudah di Hapus TIDAK BISA Dikembalikan Kembali. Apakah Anda yakin ingin Menghapus Data Ini!!');"
                                        href="modul/<?php echo $module; ?>-delete-<?php echo $row['id_contact']; ?>"
                                        class="btn btn-danger btnadmin" role="button" aria-pressed="true"
                                        style="min-width: 60px;margin-bottom: 5px;">Delete</a>
                                </td>

                            </tr>
                            <?php
						$no++;
						}
						?>
                        </tbody>
                    </table>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div>
    </div><!-- /.col -->
</section><!-- /.col -->


<?php
        $module = 'pesan';
		break;
		case "view":
?>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body no-padding">
                    <div class="mailcard-read-info">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td width="10px">:</td>
                                <td><?php echo $data['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td width="10px">:</td>
                                <td><?php echo $data['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td width="10px">:</td>
                                <td><?php echo $data['subject']; ?></td>
                            </tr>

                        </table>

                    </div><!-- /.mailcard-read-info -->
                    <div class="mailcard-read-message mt-4">
                    <?php echo $data['message']; ?>
                    </div><!-- /.mailcard-read-message -->
                </div><!-- /.card-body -->
                <div class="card-footer">
                    <!-- <div class="pull-right">
						<button class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
						<button class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
					  </div> -->
                    <a onClick="javascript: return confirm('Data yang Sudah di Hapus TIDAK BISA Dikembalikan Kembali. Apakah Anda yakin ingin Menghapus Data Ini!!');"
                        href="<?php echo $module; ?>-delete-<?php echo $data['id_contact']; ?>"
                        title="Hapus"><button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button></a>
                    <!-- <button class="btn btn-default"><i class="fa fa-print"></i> Print</button> -->

                    <input type="button" class="btn btn-success" value="Back" onclick="location.href='pesan'">
                </div><!-- /.card-footer -->
            </div><!-- /. card -->
        </div>
</section>
<?php
		break;  
	}
?>