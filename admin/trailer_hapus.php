<?php
include "../koneksi.php";
$id=isset($_GET["id"]) ? $_GET["id"] : "";
if (empty($id)){
    die ("Menghapus Data Gagal Karena ID Kosong");
}
$id = htmlentities(strip_tags(trim($id)));
$id = mysqli_real_escape_string($connection,$id);
$query="DELETE FROM trailer where id_trailer='".$id."'";
$hasil=mysqli_query($connection,$query);
if(!$hasil){
    die ("kesalahan query".mysqli_error($connection));

}
else{
    header("location:trailer_admin.php");
      
}
?>