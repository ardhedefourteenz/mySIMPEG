<?php
if (isset($_SESSION['medId'])){
?>
<ul class="nav nav-list">
	<li class="active"><a href="?page=home"><i class="icon-home"></i><span class="menu-text">Beranda</span></a></li>
	<div class="sidebar-collapse" id=""></div>
	<li><a href="?page=peg" class="dropdown-toggle"><i class="icon-group"></i><span class="menu-text">Data Pegawai</span></a></li>
	<li><a href="?page=dpeg" class="dropdown-toggle"><i class="icon-inbox"></i><span class="menu-text">Detail Pegawai</span></a></li>
	<div class="sidebar-collapse" id=""></div>
	<!--
	<li><a href="?page=xlim" class="dropdown-toggle"><i class="icon-cloud-upload"></i><span class="menu-text">Import Data Pegawai</span></a></li>
	-->
	<li><a href="?page=lap" class="dropdown-toggle"><i class="icon-folder-close"></i><span class="menu-text">Laporan</span></a></li>
	<div class="sidebar-collapse" id=""></div>
	<li><a href="#" class="dropdown-toggle"><i class="icon-sort-by-attributes-alt"></i><span class="menu-text">Master Kepegawaian</span><b class="arrow icon-angle-down"></b></a>
		<ul class="submenu" style="display: none;">
			<li><a href="?page=muki"><i class="icon-double-angle-right"></i>Induk Unit Kerja</a></li>
			<li><a href="?page=muk"><i class="icon-double-angle-right"></i>Unit Kerja</a></li>
			<li><a href="?page=mtk"><i class="icon-double-angle-right"></i>Tempat Kerja</a></li>
			<li><a href="?page=mjabatan"><i class="icon-double-angle-right"></i>Jabatan Struktural & Fungsional</a></li>
		</ul>
	</li>
	<li><a href="#" class="dropdown-toggle"><i class="icon-globe"></i><span class="menu-text">Master Daerah</span><b class="arrow icon-angle-down"></b></a>
		<ul class="submenu" style="display: none;">
			<li><a href="?page=mprov"><i class="icon-double-angle-right"></i>Provinsi</a></li>
			<li><a href="?page=mkabkota"><i class="icon-double-angle-right"></i>Kabupaten/Kota</a></li>
			<li><a href="?page=mkec"><i class="icon-double-angle-right"></i>Kecamatan</a></li>
			<li><a href="?page=mkeldesa"><i class="icon-double-angle-right"></i>Kelurahan/Desa</a></li>
		</ul>
	</li>
	<li><a href="#" class="dropdown-toggle"><i class="icon-cog"></i><span class="menu-text">Setting</span><b class="arrow icon-angle-down"></b></a>
		<ul class="submenu" style="display: none;">
			<li><a href="?page=user"><i class="icon-double-angle-right"></i>User</a></li>
			<li><a href="?page=periode"><i class="icon-double-angle-right"></i>Periode</a></li>
		</ul>
	</li>
</ul><!--/.nav-list-->
<?php
}
?>