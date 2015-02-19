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
			<label class="control-label" for="username">Username</label>
			<div class="controls">
				<input type="text" class="input-medium" id="username" name="username" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Nama</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lvl">Level</label>
			<div class="controls"> 
				<?php
				$arJK = array('0'=>'Administrator','1'=>'Operator');
				foreach ($arJK as $k => $v) {
					if ($e['uLevel']==$k){
						echo "<input name='lvl' type='radio' class='ace' value='$k' checked /> <span class='lbl'> $v</span><br>";
					}else{
						echo "<input name='lvl' type='radio' class='ace' value='$k' /> <span class='lbl'> $v</span><br>";
					}
				}
				?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telp">Telp</label>
			<div class="controls">
				<div class="input-append">
					<input class="input-medium" type="text" id="telp" name="telp" required>
					<span class="add-on"><i class="icon-phone"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<div class="input-append">
					<input class="input-xlarge" type="text" id="email" name="email" required>
					<span class="add-on"><i class="icon-envelope"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input type="password" class="input-medium" id="password" name="password" required>
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
		  	$pass = md5($_POST['password']);
		  	$q = mysql_query("INSERT INTO user (uUname,uNama,uLevel,uTelp,
		                                        uEmail,uPass
		                                       )VALUES(
		                                       '$_POST[username]','$_POST[nama]','$_POST[lvl]','$_POST[telp]',
		                                       '$_POST[email]','$pass')
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
$e = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE uUname='$_GET[id]'"));
?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Edit</h2></div>
<div class="widget-body">
<div class="widget-main">
	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="username">Username</label>
			<div class="controls">
				<input type="text" class="input-medium" id="username" name="username" value="<?php echo $e['uUname'];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Nama</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="<?php echo $e['uNama'];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lvl">Level</label>
			<div class="controls"> 
				<?php
				$arLvl = array('0'=>'Administrator','1'=>'Operator');
				foreach ($arLvl as $k => $v) {
					if ($e['uLevel']==$k){
						echo "<input name='lvl' type='radio' class='ace' value='$k' checked /> <span class='lbl'> $v</span><br>";
					}else{
						echo "<input name='lvl' type='radio' class='ace' value='$k' /> <span class='lbl'> $v</span><br>";
					}
				}
				?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telp">Telp</label>
			<div class="controls">
				<div class="input-append">
					<input class="input-medium" type="text" id="telp" name="telp" value="<?php echo $e['uTelp'];?>" required>
					<span class="add-on"><i class="icon-phone"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<div class="input-append">
					<input class="input-xlarge" type="text" id="email" name="email" value="<?php echo $e['uEmail'];?>" required>
					<span class="add-on"><i class="icon-envelope"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input type="password" class="input-medium" id="password" name="password">
				<span class="help-inline"> * Biarkan kosong jika password tak diubah</span>
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
			if (!empty($_POST['password'])){
				$pass = md5($_POST['password']);
				$q = mysql_query("UPDATE user SET uNama ='$_POST[nama]',
												  uLevel ='$_POST[lvl]',
				                          uTelp='$_POST[telp]',
				                          uEmail='$_POST[email]'
				                          uPass='$pass'
				                      WHERE uUname = '$_POST[username]'");
			}else{
				$q = mysql_query("UPDATE user SET uNama ='$_POST[nama]',
				                          uLevel ='$_POST[lvl]',
				                          uTelp='$_POST[telp]',
				                          uEmail='$_POST[email]'
				                      WHERE uUname = '$_POST[username]'");
			}  
		  	
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
			mysql_query("DELETE FROM user WHERE uUname='$_GET[id]'");
			echo "<script>
				 		notifsukses('Sukses','Data Telah Dihapus..!!');
				  		setTimeout('window.location.href=\"media.php?page=$page\"', 1000)
				   </script>";
		}
	?>
	<div class="table-header">
	    DATA USER
	</div>
	<div class="row-fluid">
	<table id="myTable" class="table table-striped table-bordered table-hover">
	<thead>
	    <tr>
	    <th class="center">No</th>
	    <th class='center'>Nama</th>
	    <th class="center hidden-phone">Level</th>
	    <th class="center hidden-480">Telp</th>
	    <th class="center hidden-480">Email</th>
	    <th class="center hidden-phone">Username</th>
	    <th class="center" width="40px">Aksi</th>
	    </tr>
	</thead>
	<tbody>
	 <?php
	    $qry = mysql_query("SELECT * FROM user ORDER BY uNama ASC");
		while ($d = mysql_fetch_array($qry)){
	      ?>
	      <tr>
	      <?php
	      $no++;
	      $arLvl = array('0'=>'Administrator','1'=>'Operator');
	      $dLvl = $d['uLevel'];
	      $ulvl = $arLvl[$dLvl];
	      echo "
	      <td class='center'>$no</td>
	      <td>$d[uNama]</td>
	      <td class='center hidden-phone'>$ulvl</td>
	      <td class='center hidden-480'>$d[uTelp]</td>
	      <td class='hidden-480'>$d[uEmail]</td>
	      <td class='center hidden-phone'>$d[uUname]</td>
	      <td class='center'>
            <div class='inline position-relative'>
              <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-cog icon-only bigger-110'></i></button>
              <ul class='dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close'>
                  <li>
                  	<a href='?page=$page&act=edit&id=$d[uUname]' class='tooltip-success' data-rel='tooltip' data-original-title='Edit'>
                     	<span class='green'><i class='icon-edit bigger-120'></i></span>
                     	</a>
                  </li>
                  <li>
                  	<a href='?page=$page&mode=hapus&id=$d[uUname]' onclick='return qh();' class='tooltip-error' data-rel='tooltip' data-original-title='Delete'>
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