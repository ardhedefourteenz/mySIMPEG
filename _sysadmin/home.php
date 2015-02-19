<script src="../assets/chart/Chart.js"></script>
<style type="text/css">
canvas {
   width: 100% !important;
   max-width: 800px;
   height: auto !important;
}
</style>
<?php
	$hari_s = getHari(date("w"));
	$infologin =  "$hari_s, ".getTglIndo(date('Y m d'))." | ".date('H:i:s');
?>
<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>
	<i class="icon-ok green"></i>
		Hai,, <strong class="blue"><?php echo $_SESSION[medNama];?></strong>, 
		selamat datang di halaman Administrator.<br> Silahkan klik menu pilihan yang berada 
		di sebelah kiri untuk mengelola konten website anda.
		<small class="red">
			<p>&nbsp;</p<p>&nbsp;</p>
			<p>Login : <?php echo $infologin;?> WITA</p>
		</small>
</div>
<!--PAGE CONTENT BEGINS-->
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h5 class="lighter smaller"><i class="icon-group no-hover red"></i>Grafik Jumlah Mahasiswa</h5>
				<div class="widget-toolbar">
					<span class="label label-important">Laki-Laki</span>
					<span class="label label-info">Perempuan</span>
				</div>
			</div>
			<div class="widget-body">
				<div class="widget-main center padding-4">
					<canvas id="kanvasmhs" width="800" height="300"></canvas>
				</div>
			</div><!--/widget-body-->
		</div><!--/widget-box-->
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box" id="recent-box">
			<div class="widget-header">
				<h5 class="lighter smaller">
					<i class="icon-rss orange"></i>
					Last Login
				</h5>
				<div class="widget-toolbar no-border">
					<ul class="nav nav-tabs" id="recent-tab">
						<li class="active">
							<a data-toggle="tab" href="#logmhs-tab">Mahasiswa</a>
						</li>

						<li class="">
							<a data-toggle="tab" href="#logsup-tab">Supervisor</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="widget-body">
				<div class="widget-main padding-4">
					<div class="tab-content padding-8 overflow-visible">
						<div id="logmhs-tab" class="tab-pane active">
							<div class="clearfix">
								<?php
									$qlog = mysql_query("SELECT mNim,mNama,mFoto,mLog FROM mahasiswa WHERE mLog!='' ORDER BY mLog DESC LIMIT 0,12");
									while ($dlog = mysql_fetch_array($qlog)){
										$fmhs = ((empty($dlog['mFoto'])) ? "../images/photo.jpg" : "../foto_mahasiswa/$dlog[mFoto]");
										$tlog = getTglIndo(substr($dlog['mLog'], 0,10));
		      						$jlog = substr($dlog['mLog'], 11,8);
										
										echo "
										<div class='itemdiv memberdiv'>
											<div class='user' data-rel='tooltip' data-original-title='$dlog[mNama]'><img alt='$dlog[mNama]' src='$fmhs'></div>
											<div class='body'>
												<div class='name'><a href='?page=dmhs&nim=$dlog[mNim]&v=d'>$dlog[mNim]</a></div>
												<div class='time'><i class='icon-calendar'></i><span class='red'> $tlog</span></div>
												<div class='time'><i class='icon-time'></i><span class='green'> $jlog</span></div>
											</div>
										</div>";
									}
								?>
							</div>
							<div class="hr hr-double hr8"></div>
						</div><!--member-tab-->
						<div id="logsup-tab" class="tab-pane">
							<div class="clearfix">
								<?php
									$qlog = mysql_query("SELECT sNip,sNama,sFoto,sLog FROM supervisor WHERE sLog!='' ORDER BY sLog DESC LIMIT 0,12");
									while ($dlog = mysql_fetch_array($qlog)){
										$fmhs = ((empty($dlog['sFoto'])) ? "../images/photo.jpg" : "../foto_supervisor/$dlog[sFoto]");
										$tlog = getTglIndo(substr($dlog['sLog'], 0,10));
		      						$jlog = substr($dlog['sLog'], 11,8);
										
										echo "
										<div class='itemdiv memberdiv'>
											<div class='user' data-rel='tooltip' data-original-title='$dlog[sNama]'><img alt='$dlog[sNama]' src='$fmhs'></div>
											<div class='body'>
												<div class='name'><a href='?page=dsup&nip=$dlog[sNip]&v=d'>$dlog[sNip]</a></div>
												<div class='time'><i class='icon-calendar'></i><span class='red'> $tlog</span></div>
												<div class='time'><i class='icon-time'></i><span class='green'> $jlog</span></div>
											</div>
										</div>";
									}
								?>
							</div>
							<div class="hr hr-double hr8"></div>
						</div><!--member-tab-->
					</div>
				</div><!--/widget-main-->
			</div><!--/widget-body-->
		</div><!--/widget-box-->
	</div><!--/span-->

<div class="hr hr32 hr-dotted hr-double"></div>
</div>
<!--PAGE CONTENT ENDS-->


<?php
	$qjum = mysql_query("SELECT a.pId, a.pPeriode AS PRD,
								(SELECT COUNT(b.mNim) FROM mahasiswa b WHERE ((b.mJK = 'L') and (b.mPeriode = a.pId))) AS L,
								(SELECT COUNT(c.mNim) FROM mahasiswa c WHERE ((c.mJK = 'P') and (c.mPeriode = a.pId))) AS P
								FROM periode a");
	$arPR = array();
	$arL = array();
	$arP = array();
	while ($dj=mysql_fetch_array($qjum)) {
		array_push($arPR, $dj[PRD]);
		array_push($arL, (int)$dj[L]);
		array_push($arP, (int)$dj[P]);
	}	
?>

<script type="text/javascript">
	var barDataMhs = {
         labels : <?php echo json_encode($arPR);?>,
         datasets : [
            {
               fillColor : "#ff5b5b",
               strokeColor : "#ff3232",
               data : <?php echo json_encode($arL);?>
            },
            {
         	   fillColor : "#398eb5",
            	strokeColor : "#066c90",
               data : <?php echo json_encode($arP);?>
            }
         ]
   }
   var barMhs = new Chart(document.getElementById("kanvasmhs").getContext("2d")).Bar(barDataMhs);
</script>