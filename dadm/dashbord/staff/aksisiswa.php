<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 9:12 PM
 * To change this template use File | Settings | File Templates.
 */
include"konek.php";
$aksi=$_GET['aksi'];
switch($aksi){
    case 'hapus':
        $qin="delete from userlogin where IdUser='$_GET[id]'";
        $hslin=mysql_query($qin);

        if($hslin){
            echo"<script>alert('Data berhasil terhapus'); window.location='../index.php?content=aksiswa' </script>";
        }else{
            echo"<script>alert('Data gagal terhapus'); window.location='../index.php?content=aksiswa'</script>";
        }
        break;
    case 'reset':
        $id=$_GET["id"];
        $np="select Username from userlogin where IdUser='$id'";
        $hp=mysql_fetch_array(mysql_query($np));

        $qs="update userlogin set Password='$hp[Username]' where IdUser='$id'";
        $hslin=mysql_query($qs);
        if($hslin){
            echo"<script>alert('Perubahan berhasil'); window.location='../index.php?content=aksiswa' </script>";
        }else{
            echo"<script>alert('Perubahan gagal'); window.location='../index.php?content=aksiswa'</script>";
        }
        break;
    case 'akti':
        $id=$_GET["id"];
        $np="select status from userlogin where IdUser='$id'";
        $hp=mysql_fetch_array(mysql_query($np));
        if($hp['status']==1){
            $qs="update userlogin set status='0' where IdUser='$id'";
        }else{
            $qs="update userlogin set status='1' where IdUser='$id'";
        }

        $hslin=mysql_query($qs);
        if($hslin){
            echo"<script>alert('Perubahan berhasil'); window.location='../index.php?content=aksiswa' </script>";
        }else{
            echo"<script>alert('Perubahan gagal'); window.location='../index.php?content=aksiswa'</script>";
        }
        break;
}

?>