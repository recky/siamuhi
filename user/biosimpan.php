<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 9/30/13
 * Time: 12:57 PM
 * To change this template use File | Settings | File Templates.
 */
include "../konek.php";
$folder="foto/";
$gambar=$folder .basename($_FILES['foto']['name']);
$sukses=move_uploaded_file($_FILES['foto']['tmp_name'],$gambar);

$qkodepos="select kodepos from kodepos where kab='$_POST[kab]' and kec='$_POST[kec]'";
$crkodepos=mysql_query($qkodepos);
while($hslkodepos=mysql_fetch_array($crkodepos)){
    $kodepos=$hslkodepos['kodepos'];
}

if($_POST['jk']!=""){$jk=$_POST['jk'];}else{$jk="P";}
if($kodepos!=""){$kodepos=$kodepos;}else{$kodepos=null;}
if(!$sukses){$gambar=$folder .basename($_FILES['foto']['default.png']);}
session_start();
$id=($_SESSION['id']);
$query="insert into biodata values ('$_POST[nis]','$_POST[nama]','$jk','$_POST[tempat]','$_POST[tgl]','$_POST[noijasah]','$_POST[noskhun]','$_POST[agama]','$_POST[status]','$_POST[alamat]','$kodepos','$_POST[tlp]','$_POST[cita]','$_POST[hobi]','$_POST[jarak]','$_POST[transportasi]','$_POST[idjurusan]','$_POST[angkatan]','$id','$gambar')";
$row=mysql_query($query);

$querysekolah="insert into asalsekolah (IdAsSekolah,Sekolah,AlamatSekolah,NIS) values('','$_POST[sekolah]','$_POST[alsekolah]','$_POST[nis]')";
$rowsekolah=mysql_query($querysekolah);

$qortu="insert into ortu values('','$_POST[namaibu]','$_POST[namaayah]','$_POST[pkrjayah]','$_POST[pkrjibu]','$_POST[pndayah]','$_POST[pndibu]','$_POST[golgaji]','$_POST[nmwali]','$_POST[alwali]','$_POST[tlpwali]','$_POST[nis]')";
$rowortu=mysql_query($qortu);



if($row&&$rowsekolah&&$sukses&&$rowortu){
    print"<script>alert('Penyimpanan Berhasil');
javascript:window.location='index.php';</script>";

}
else{
    print"<script>alert('Penyimpnan Tidak Sempurna');
javascript:window.location='index.php';</script>";
}
?>