<?php
// -- FUNGSI UPLOAD FOTO MHS --//
function UploadMhs($fupload_name){
  $j = $_SESSION['sesLevel'];
  if (($j=='2')||($j=='3')){
    $vdir_upload = "foto_mahasiswa/";                    //direktori penyimpanan gambar
  }else{
    $vdir_upload = "../foto_mahasiswa/";                    //direktori penyimpanan gambar  
  }
  
  $vfile_upload = $vdir_upload . $fupload_name;       //direktori penyimpanan gambar + namafile
  $tipe_file   = $_FILES['fupload']['type'];          //tipe file dari gambar yang diupload
    
  //membuat gambar dari gambar yang diupload
  if ($tipe_file=="image/jpeg" ){    
    $im_src = imagecreatefromjpeg($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/png" ){
    $im_src = imagecreatefrompng($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/gif" ){
    $im_src = imagecreatefromgif($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/wbmp" ){
    $im_src = imagecreatefromwbmp($_FILES["fupload"]["tmp_name"]);
  }

  //membuat ukuran X dan Y dari gambar yang diupload
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //mengambil ukuran X dan Y dari gambar menjadi 120x140
  $dst_width = 120;
  $dst_height = 140;

  //proses perubahan cloning gambar dan perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //simpan gambar hasil cloning
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
    imagejpeg($im,$vfile_upload);
  }elseif ($_FILES["fupload"]["type"]=="image/png" ){
    imagepng($im,$vfile_upload);
  }elseif ($_FILES["fupload"]["type"]=="image/gif" ){
    imagegif($im,$vfile_upload);
  }elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
    imagewbmp($im,$vfile_upload);
  }

  //hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
// -- FUNGSI UPLOAD FOTO MHS --//


// -- FUNGSI UPLOAD FOTO SPV --//
function UploadSupervisor($fupload_name){
  $j = $_SESSION['sesLevel'];
  if (($j=='2')||($j=='3')){
    $vdir_upload = "foto_supervisor/";                    //direktori penyimpanan gambar  
  }else{
    $vdir_upload = "../foto_supervisor/";                    //direktori penyimpanan gambar
  }
  
  $vfile_upload = $vdir_upload . $fupload_name;       //direktori penyimpanan gambar + namafile
  $tipe_file   = $_FILES['fupload']['type'];          //tipe file dari gambar yang diupload
    
  //membuat gambar dari gambar yang diupload
  if ($tipe_file=="image/jpeg" ){    
    $im_src = imagecreatefromjpeg($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/png" ){
    $im_src = imagecreatefrompng($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/gif" ){
    $im_src = imagecreatefromgif($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/wbmp" ){
    $im_src = imagecreatefromwbmp($_FILES["fupload"]["tmp_name"]);
  }

  //membuat ukuran X dan Y dari gambar yang diupload
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //mengambil ukuran X dan Y dari gambar menjadi 120x140
  $dst_width = 120;
  $dst_height = 140;

  //proses perubahan cloning gambar dan perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //simpan gambar hasil cloning
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
    imagejpeg($im,$vfile_upload);
  }elseif ($_FILES["fupload"]["type"]=="image/png" ){
    imagepng($im,$vfile_upload);
  }elseif ($_FILES["fupload"]["type"]=="image/gif" ){
    imagegif($im,$vfile_upload);
  }elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
    imagewbmp($im,$vfile_upload);
  }

  //hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
// -- FUNGSI UPLOAD FOTO SPV --//


// -- FUNGSI UPLOAD FOTO KEG --//
function UploadKegiatan($fupload_name){
  $j = $_SESSION['sesLevel'];
  if (($j=='2')||($j=='3')){
    $vdir_upload = "foto_kegiatan/";                    //direktori penyimpanan gambar  
  }else{
    $vdir_upload = "../foto_kegiatan/";                    //direktori penyimpanan gambar
  }
  
  $vfile_upload = $vdir_upload . $fupload_name;       //direktori penyimpanan gambar + namafile
  $tipe_file   = $_FILES['fupload']['type'];          //tipe file dari gambar yang diupload
    
  //membuat gambar dari gambar yang diupload
  if ($tipe_file=="image/jpeg" ){    
    $im_src = imagecreatefromjpeg($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/png" ){
    $im_src = imagecreatefrompng($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/gif" ){
    $im_src = imagecreatefromgif($_FILES["fupload"]["tmp_name"]);
  }elseif ($tipe_file=="image/wbmp" ){
    $im_src = imagecreatefromwbmp($_FILES["fupload"]["tmp_name"]);
  }

  //membuat ukuran X dan Y dari gambar yang diupload
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //mengambil ukuran X dan Y dari gambar menjadi 120x140
  $dst_width = 200;
  $dst_height = 200;

  //proses perubahan cloning gambar dan perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //simpan gambar hasil cloning
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
    imagejpeg($im,$vfile_upload);
  }elseif ($_FILES["fupload"]["type"]=="image/png" ){
    imagepng($im,$vfile_upload);
  }elseif ($_FILES["fupload"]["type"]=="image/gif" ){
    imagegif($im,$vfile_upload);
  }elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
    imagewbmp($im,$vfile_upload);
  }

  //hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
// -- FUNGSI UPLOAD FOTO KEG --//


// -- FUNGSI UPLOAD FILE --//
function UploadFile($fupload_name){
  $vdir_upload = "file/";
  $vfile_upload = $vdir_upload . $fupload_name;
  //simpan file
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
// -- FUNGSI UPLOAD FILE --//
?>