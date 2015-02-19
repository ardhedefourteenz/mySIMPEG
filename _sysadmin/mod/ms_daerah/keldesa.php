<div class="row-fluid">
<div class="span12">
<?php
$page = $_GET['page'];
if($_GET['act']=="tambah"){
?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Tambah</h2></div>
<div class="widget-body">
<div class="widget-main">
	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="kNama">Nama</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="kNama" name="kNama" value="<?php echo $e['kNama'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="kPos">Kode POS</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="kPos" name="kPos" value="<?php echo $e['kPos'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="kKec">Kecamatan</label>
			<div class="controls">
				<select class="span3 chosen-select" name="kKec" id="kKec">
					<?php
						$qsp = mysql_query("SELECT * FROM m_kec ORDER BY kId ASC");
						while ($s=mysql_fetch_array($qsp)) {
							if ($e['kKec']==$s['kId']){
								echo "<option value='$s[kId]' selected>$s[kNama]</option>";	
							}else{
								echo "<option value='$s[kId]'>$s[kNama]</option>";
							}
							
						}
					?>
				</select>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-info" type="submit" name="simpan">
				<i class="icon-save bigger-110"></i>Simpan
			</button>
			<a class="btn" href="media.php?page=<?php echo $page;?>">
				<i class="icon-undo bigger-110"></i>Batal
			</a>
		</div>
	</form>
	<!-- FORM -->
	<?php
		if (isset($_POST['simpan'])){
		  	$q = mysql_query("INSERT INTO m_keldesa (kNama,kPos,kKec)
		  											VALUES('$_POST[kNama]','$_POST[kPos]','$_POST[kKec]')
		                    ");
			if ($q){
			echo "<script>
			 		notifsukses('Sukses','Data Telah Tersimpan..!!');
			  		setTimeout('window.location.href=\"media.php?page=$page\"', 1000)
			      </script>";
			}else{
			echo "<script>
			      notiferror('Gagal','Data Gagal Tersimpan, pastikan data yang diinput telah benar ..!!');
			  		setTimeout(function() { history.go(-1); }, 1000);
			      </script>";
			}

		}
	?>
</div>
</div>
</div>	
<?php
}elseif($_GET['act']=="edit"){
$e = mysql_fetch_array(mysql_query("SELECT * FROM m_keldesa WHERE kId='$_GET[id]'"));
$idx = $e['kId'];
?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Edit</h2></div>
<div class="widget-body">
<div class="widget-main">
	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="idx" value="<?php echo $idx;?>">
		<div class="control-group">
			<label class="control-label" for="kNama">Nama</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" id="kNama" name="kNama" value="<?php echo $e['kNama'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="kPos">Kode POS</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="kPos" name="kPos" value="<?php echo $e['kPos'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="kKec">Kecamatan</label>
			<div class="controls">
				<select class="span3 chosen-select" name="kKec" id="kKec">
					<?php
						$qsp = mysql_query("SELECT * FROM m_kec ORDER BY kId ASC");
						while ($s=mysql_fetch_array($qsp)) {
							if ($e['kKec']==$s['kId']){
								echo "<option value='$s[kId]' selected>$s[kNama]</option>";	
							}else{
								echo "<option value='$s[kId]'>$s[kNama]</option>";
							}
							
						}
					?>
				</select>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-info" type="submit" name="simpan">
				<i class="icon-save bigger-110"></i>Simpan
			</button>
			<a class="btn" href="media.php?page=<?php echo $page;?>">
				<i class="icon-undo bigger-110"></i>Batal
			</a>
		</div>
	</form>
	<!-- FORM -->
	<?php
		if (isset($_POST['simpan'])){
			
			$q = mysql_query("UPDATE m_keldesa SET kNama ='$_POST[kNama]',
																kPos ='$_POST[kPos]',
																kKec ='$_POST[kKec]',
																onUpdate=NOW()
			                      					WHERE kId = '$_POST[idx]'");
			
		  	
			if ($q){
			echo "<script>
			 		notifsukses('Sukses','Data Telah Tersimpan..!!');
			  		setTimeout('window.location.href=\"media.php?page=$page\"', 1000)
			      </script>";
			}else{
			echo "<script>
			      notiferror('Gagal','Data Gagal Tersimpan, pastikan data yang diinput telah benar ..!!');
			  		setTimeout(function() { history.go(-1); }, 1000);
			      </script>";
			}
		}
	?>
</div>
</div>
</div>	
<?php
}else{
?>
	<a href="?page=<?php echo $page;?>&act=tambah" class="btn btn-primary">
		<i class="icon-download-alt bigger-100"></i>Tambah
	</a><br><br>
	<?php
		if ($_GET['mode']=="hapus"){
			mysql_query("DELETE FROM m_keldesa WHERE kId='$_GET[id]'");
			echo "<script>
				 		notifsukses('Sukses','Data Telah Dihapus..!!');
				  		setTimeout('window.location.href=\"media.php?page=$page\"', 1000)
				   </script>";
		}
	?>
	<div class="table-header">
	   DATA KELURAHAN/DESA
	</div>
	<div class="row-fluid">
	<table id="myTable" class="table table-striped table-bordered table-hover">
	<thead>
	    <tr>
	    <th class="center" width="40px">No</th>
	    <th class="center">Nama</th>
	    <th class="center">Kode POS</th>
	    <th class="center">Kecamatan</th>
	    <th class="center" width="40px">Aksi</th>
	    </tr>
	</thead>
	<tbody>
	 <?php
	    $qry = mysql_query("SELECT * FROM m_keldesa");
		while ($d = mysql_fetch_array($qry)){
	      $no++;
	      $kec = getValue("kNama","m_kec","kId='$d[kKec]'");
	      echo "
	      <tr>
	      <td class='center'>$no</td>
	      <td class='left'>$d[kNama]</td>
	      <td class='center'>$d[kPos]</td>
	      <td class='center'>$kec</td>
	      <td class='center'>
            <div class='inline position-relative'>
              <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-cog icon-only bigger-110'></i></button>
              <ul class='dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close'>
                  <li>
                  	<a href='?page=$page&act=edit&id=$d[kId]' class='tooltip-success' data-rel='tooltip' data-original-title='Edit'>
                     	<span class='green'><i class='icon-edit bigger-120'></i></span>
                     	</a>
                  </li>
                  <li>
                  	<a href='?page=$page&mode=hapus&id=$d[kId]' onclick='return qh();' class='tooltip-error' data-rel='tooltip' data-original-title='Delete'>
                     	<span class='red'><i class='icon-trash bigger-120'></i></span>
                     	</a>
                  </li>
              </ul>
            </div>
	      </td>";
	      ?>
	     </tr>
	    <?php
	       }
	    ?>
	</tbody>
	</table>
	</div>
<?php
}
?>
</div>
</div>