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
			<label class="control-label" for="jNama">Nama</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" id="jNama" name="jNama" value="<?php echo $e['jNama'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="jEselon">Eselon</label>
			<div class="controls">
				<select class="span2" name="jEselon" id="jEselon">
					<?php
						$qsp = mysql_query("SELECT * FROM _eselon ORDER BY eId ASC");
						while ($s=mysql_fetch_array($qsp)) {
							if ($e['jEselon']==$s['eId']){
								echo "<option value='$s[eId]' selected>$s[eNama]</option>";	
							}else{
								echo "<option value='$s[eId]'>$s[eNama]</option>";
							}
							
						}
					?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="jJenis">Jenis</label>
			<div class="controls">
				<select class="span3" name="jJenis" id="jJenis">
					<?php
						$qsp = mysql_query("SELECT * FROM _jjabatan ORDER BY jId ASC");
						while ($s=mysql_fetch_array($qsp)) {
							if ($e['jJenis']==$s['jId']){
								echo "<option value='$s[jId]' selected>$s[jNama]</option>";	
							}else{
								echo "<option value='$s[jId]'>$s[jNama]</option>";
							}
							
						}
					?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="jPensiun">Usia Pensiun</label>
			<div class="controls">
				<input class="input-mini" type="number" id="jPensiun" name="jPensiun" value="<?php echo $e['jPensiun'];?>" required>
				<span class="help-inline">Thn</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="jKompetensi">Kompetensi</label>
			<div class="controls">
				<textarea class="ckeditor" name="jKompetensi" rows="4"><?php echo $e['jKompetensi'];?></textarea>
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
		  	$q = mysql_query("INSERT INTO m_jabatan (jNama,jEselon,jJenis,
		  														  jPensiun,jKompetensi)
		  											VALUES('$_POST[jNama]','$_POST[jEselon]','$_POST[jJenis]',
		  													 '$_POST[jPensiun]','$_POST[jKompetensi]')
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
$e = mysql_fetch_array(mysql_query("SELECT * FROM m_jabatan WHERE jId='$_GET[id]'"));
$idx = $e['jId'];
?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Edit</h2></div>
<div class="widget-body">
<div class="widget-main">
	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="idx" value="<?php echo $idx;?>">
		<div class="control-group">
			<label class="control-label" for="jNama">Nama</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" id="jNama" name="jNama" value="<?php echo $e['jNama'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="jEselon">Eselon</label>
			<div class="controls">
				<select class="span2" name="jEselon" id="jEselon">
					<?php
						$qsp = mysql_query("SELECT * FROM _eselon ORDER BY eId ASC");
						while ($s=mysql_fetch_array($qsp)) {
							if ($e['jEselon']==$s['eId']){
								echo "<option value='$s[eId]' selected>$s[eNama]</option>";	
							}else{
								echo "<option value='$s[eId]'>$s[eNama]</option>";
							}
							
						}
					?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="jJenis">Jenis</label>
			<div class="controls">
				<select class="span3" name="jJenis" id="jJenis">
					<?php
						$qsp = mysql_query("SELECT * FROM _jjabatan ORDER BY jId ASC");
						while ($s=mysql_fetch_array($qsp)) {
							if ($e['jJenis']==$s['jId']){
								echo "<option value='$s[jId]' selected>$s[jNama]</option>";	
							}else{
								echo "<option value='$s[jId]'>$s[jNama]</option>";
							}
							
						}
					?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="jPensiun">Usia Pensiun</label>
			<div class="controls">
				<input class="input-mini" type="number" id="jPensiun" name="jPensiun" value="<?php echo $e['jPensiun'];?>" required>
				<span class="help-inline">Thn</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="jKompetensi">Kompetensi</label>
			<div class="controls">
				<textarea class="ckeditor" name="jKompetensi" rows="4"><?php echo $e['jKompetensi'];?></textarea>
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
			
			$q = mysql_query("UPDATE m_jabatan SET jNama ='$_POST[jNama]',
																jEselon ='$_POST[jEselon]',
																jJenis ='$_POST[jJenis]',
																jKompetensi ='$_POST[jKompetensi]',
																onUpdate=NOW()
			                      					WHERE jId = '$_POST[idx]'");
			
		  	
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
	   DATA JABATAN
	</div>
	<div class="row-fluid">
	<table id="myTable" class="table table-striped table-bordered table-hover">
	<thead>
	    <tr>
	    <th class="center" width="40px">No</th>
	    <th class="center">Nama Jabatan</th>
	    <th class="center">Eselon</th>
	    <th class="center">Jenis Jabatan</th>
	    <th class="center" width="40px">Aksi</th>
	    </tr>
	</thead>
	<tbody>
	 <?php
	    $qry = mysql_query("SELECT * FROM m_jabatan");
		while ($d = mysql_fetch_array($qry)){
	      $no++;
	      $eselon = getValue("eNama","_eselon","eId='$d[jEselon]'");
	      $jenis = getValue("jNama","_jjabatan","jId='$d[jJenis]'");
	      echo "
	      <tr>
	      <td class='center'>$no</td>
	      <td class='left'>$d[jNama]</td>
	      <td class='center'>$eselon</td>
	      <td class='center'>$jenis</td>
	      <td class='center'>
            <div class='inline position-relative'>
              <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-cog icon-only bigger-110'></i></button>
              <ul class='dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close'>
                  <li>
                  	<a href='?page=$page&act=edit&id=$d[jId]' class='tooltip-success' data-rel='tooltip' data-original-title='Edit'>
                     	<span class='green'><i class='icon-edit bigger-120'></i></span>
                     	</a>
                  </li>
                  <li>
                  	<a href='?page=$page&mode=hapus&id=$d[jId]' onclick='return qh();' class='tooltip-error' data-rel='tooltip' data-original-title='Delete'>
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