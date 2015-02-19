<?php
// ALL CONTENT
if ($_GET['page']=='home'){
	include 'home.php';
}elseif($_GET['page']=='cpass'){
	include 'cpass.php';
// ALL CONTENT

// DATA MASTER
}elseif($_GET['page']=='user'){
	include 'mod/user/user.php';
}

elseif($_GET['page']=='mprov'){
	include 'mod/ms_daerah/provinsi.php';
}elseif($_GET['page']=='mkabkota'){
	include 'mod/ms_daerah/kabkota.php';
}elseif($_GET['page']=='mkec'){
	include 'mod/ms_daerah/kecamatan.php';
}elseif($_GET['page']=='mkeldesa'){
	include 'mod/ms_daerah/keldesa.php';
}

elseif($_GET['page']=='muki'){
	include 'mod/ms_kepegawaian/indukunitkerja.php';
}elseif($_GET['page']=='muk'){
	include 'mod/ms_kepegawaian/unitkerja.php';
}elseif($_GET['page']=='mtk'){
	include 'mod/ms_kepegawaian/tempatkerja.php';
}elseif($_GET['page']=='mjabatan'){
	include 'mod/ms_kepegawaian/jabatan.php';
}


else{
	include 'error.php';
}
?>