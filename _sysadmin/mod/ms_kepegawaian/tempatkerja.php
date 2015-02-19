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
			<label class="control-label" for="tNama">Nama</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="tNama" name="tNama" value="<?php echo $e['tNama'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tAlamat">Alamat</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" id="tAlamat" name="tAlamat" value="<?php echo $e['tAlamat'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tTelp">Telp</label>
			<div class="controls">
				<input class="input-medium" type="text" id="tTelp" name="tTelp" value="<?php echo $e['tTelp'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tUnit">Unit</label>
			<div class="controls">
				<select class="span5 chosen-select" name="tUnit" id="tUnit">
					<?php
						$qsp = mysql_query("SELECT * FROM m_unitkerja ORDER BY uId ASC");
						while ($s=mysql_fetch_array($qsp)) {
							$induk = getValue("uNama","m_indukunit","uId='$s[uInduk]'");
							if ($e['tUnit']==$s['uId']){
								echo "<option value='$s[uId]' selected>$s[uNama] | $induk</option>";	
							}else{
								echo "<option value='$s[uId]'>$s[uNama] | $induk</option>";
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
		  	$q = mysql_query("INSERT INTO m_t4kerja (tNama,tAlamat,tTelp,tUnit)
		  											VALUES('$_POST[tNama]','$_POST[tAlamat]','$_POST[tTelp]','$_POST[tUnit]')
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
$e = mysql_fetch_array(mysql_query("SELECT * FROM m_t4kerja WHERE tId='$_GET[id]'"));
$idx = $e['tId'];
?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Edit</h2></div>
<div class="widget-body">
<div class="widget-main">
	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="idx" value="<?php echo $idx;?>">
		<div class="control-group">
			<label class="control-label" for="tNama">Nama</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="tNama" name="tNama" value="<?php echo $e['tNama'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tAlamat">Alamat</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" id="tAlamat" name="tAlamat" value="<?php echo $e['tAlamat'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tTelp">Telp</label>
			<div class="controls">
				<input class="input-medium" type="text" id="tTelp" name="tTelp" value="<?php echo $e['tTelp'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="tUnit">Unit</label>
			<div class="controls">
				<select class="span5 chosen-select" name="tUnit" id="tUnit">
					<?php
						$qsp = mysql_query("SELECT * FROM m_unitkerja ORDER BY uId ASC");
						while ($s=mysql_fetch_array($qsp)) {
							$induk = getValue("uNama","m_indukunit","uId='$s[uInduk]'");
							if ($e['tUnit']==$s['uId']){
								echo "<option value='$s[uId]' selected>$s[uNama] | $induk</option>";	
							}else{
								echo "<option value='$s[uId]'>$s[uNama] | $induk</option>";
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
			
			$q = mysql_query("UPDATE m_t4kerja SET tNama ='$_POST[tNama]',
																tAlamat ='$_POST[tAlamat]',
																tTelp ='$_POST[tTelp]',
																tUnit ='$_POST[tUnit]',
																onUpdate=NOW()
			                      					WHERE tId = '$_POST[idx]'");
			
		  	
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
			mysql_query("DELETE FROM m_t4kerja WHERE tId='$_GET[id]'");
			echo "<script>
				 		notifsukses('Sukses','Data Telah Dihapus..!!');
				  		setTimeout('window.location.href=\"media.php?page=$page\"', 1000)
				   </script>";
		}
	?>
	<div class="table-header">
	   DATA TEMPAT KERJA
	</div>
	<div class="row-fluid">
	<table id="myTable" class="table table-striped table-bordered table-hover">
	<thead>
	    <tr>
	    <th class="center" width="40px">No</th>
	    <th class="center">Nama</th>
	    <th class="center">Alamat / Telp</th>
	    <th class="center">Unit</th>
	    <th class="center">Induk Unit</th>
	    <th class="center" width="40px">Aksi</th>
	    </tr>
	</thead>
	<tbody>
	 <?php
	    $qry = mysql_query("SELECT * FROM m_t4kerja");
		while ($d = mysql_fetch_array($qry)){
	      $no++;
	      $unit = getData("uNama,uInduk","m_unitkerja","uId='$d[tUnit]'");
	      $induk = getValue("uNama","m_indukunit","uId='$unit[uInduk]'");

	      echo "
	      <tr>
	      <td class='center'>$no</td>
	      <td class='left'>$d[tNama]</td>
	      <td class='left'>
	      	Alamat : $d[tAlamat]<br>
	      	Telp : $d[tTelp]
	      </td>
	      <td class='center'>$unit[uNama]</td>
	      <td class='center'>$induk</td>
	      <td class='center'>
            <div class='inline position-relative'>
              <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-cog icon-only bigger-110'></i></button>
              <ul class='dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close'>
                  <li>
                  	<a href='?page=$page&act=edit&id=$d[tId]' class='tooltip-success' data-rel='tooltip' data-original-title='Edit'>
                     	<span class='green'><i class='icon-edit bigger-120'></i></span>
                     	</a>
                  </li>
                  <li>
                  	<a href='?page=$page&mode=hapus&id=$d[tId]' onclick='return qh();' class='tooltip-error' data-rel='tooltip' data-original-title='Delete'>
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