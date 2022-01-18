<?php

require_once '../config/conn.php';

function GetAll(){
  $query = "SELECT * FROM subkeg";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('sub_id' => $data['sub_id'],
		'sub_pagu' => $data['sub_pagu'],
		'sub_nodpa' => $data['sub_nodpa'],
		'sub_nama' => $data['sub_nama'],
		'sub_jenis' => $data['sub_jenis'],
		'id_keg' => $data['id_keg'],
		'alias' => $data['alias'],
		
    );
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `subkeg` WHERE  `sub_id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('sub_id' => $data['sub_id'], 
		'sub_pagu' => $data['sub_pagu'], 
		'sub_nodpa' => $data['sub_nodpa'], 
		'sub_nama' => $data['sub_nama'], 
		'sub_jenis' => $data['sub_jenis'], 
		'id_keg' => $data['id_keg'], 
		'alias' => $data['alias'], 
		
    );
  }
return $datas;
}

function Insert(){
  $sub_pagu=$_POST['sub_pagu']; 
		$sub_nodpa=$_POST['sub_nodpa']; 
		$sub_nama=$_POST['sub_nama']; 
		$sub_jenis=$_POST['sub_jenis']; 
		$id_keg=$_POST['id_keg']; 
		$alias=$_POST['alias']; 
		
  $query = "INSERT INTO `subkeg` (`sub_id`,`sub_pagu`,`sub_nodpa`,`sub_nama`,`sub_jenis`,`id_keg`,`alias`)
VALUES (NULL,'$sub_pagu','$sub_nodpa','$sub_nama','$sub_jenis','$id_keg','$alias')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    header("Location: index.php");
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    header("Location: index.php");
  }
}
function Update($id){
  $sub_pagu=$_POST['sub_pagu']; 
		$sub_nodpa=$_POST['sub_nodpa']; 
		$sub_nama=$_POST['sub_nama']; 
		$sub_jenis=$_POST['sub_jenis']; 
		$id_keg=$_POST['id_keg']; 
		$alias=$_POST['alias']; 
		
  $query = "UPDATE `subkeg` SET `sub_pagu` = '$sub_pagu',`sub_nodpa` = '$sub_nodpa',`sub_nama` = '$sub_nama',`sub_jenis` = '$sub_jenis',`id_keg` = '$id_keg',`alias` = '$alias' WHERE  `sub_id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    header("Location: index.php");
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    header("Location: index.php");
  }
}
function Delete($id){
  $query = "DELETE FROM `subkeg` WHERE `sub_id` = '$id'";
  $exe = mysqli_query(Connect(),$query);
    if($exe){
      // kalau berhasil
      $_SESSION['message'] = " Data Sudah dihapus ";
      $_SESSION['mType'] = "success ";
      header("Location: index.php");
    }
    else{
      $_SESSION['message'] = " Data Gagal dihapus ";
      $_SESSION['mType'] = "danger ";
      header("Location: index.php");
    }
}


function Duplicate($id){
    $one = GetOne($id);
  $sub_pagu=$one[0]["sub_pagu"]; 
		$sub_nodpa=$one[0]["sub_nodpa"]; 
		$sub_nama=$one[0]["sub_nama"]; 
		$sub_jenis=$one[0]["sub_jenis"]; 
		$id_keg=$one[0]["id_keg"]; 
		$alias=$one[0]["alias"]; 
		
   $query = "INSERT INTO `subkeg` (`sub_pagu`,`sub_nodpa`,`sub_nama`,`sub_jenis`,`id_keg`,`alias`)
VALUES ('$sub_pagu','$sub_nodpa','$sub_nama','$sub_jenis','$id_keg','$alias')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    header("Location: index.php");
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    header("Location: index.php");
  }
}
if(isset($_POST['insert'])){
  Insert();
}
else if(isset($_POST['update'])){
  Update($_POST['sub_id']);
}
else if(isset($_POST['delete'])){
  Delete($_POST['sub_id']);
}
else if(isset($_POST['duplicate'])){
  Duplicate($_POST['sub_id']);
}
?>
