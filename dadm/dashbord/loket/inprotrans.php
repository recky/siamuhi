<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 1/6/14
 * Time: 3:29 PM
 * To change this template use File | Settings | File Templates.
 */
include "konek.php";
session_start();
$id=$_SESSION['id'];
$nis=$_POST['nis'];
$tel=mysql_fetch_array(mysql_query("select nik from ad_login where id=$id"));
$kls=mysql_fetch_array(mysql_query("select k.IdKelas, t.ta from kelas k, ta t where k.ta=t.ta and t.status=1 and k.nis='$nis'"));
$kel=substr($kls['IdKelas'],0,2);
$idekeu=mysql_fetch_array(mysql_query("select IdKeu from keuangan where kelas='$kel' and ta='$kls[ta]'"));
$tanggal = date("Ymd");
$qpemb="select NoTrans from pembayaran where NIS='$nis' and IdSmtr='$_POST[semester]' and ta='$_POST[ta]' and Bulan='$_POST[bulan]'";
$idpemb=mysql_fetch_array(mysql_query($qpemb));
    $qin="update pembayaran set Tanggal='$tanggal', Teller='$tel[nik]', status=1 where NoTrans='$idpemb[NoTrans]'";
    $hslin=mysql_query($qin);
if($hslin){
    echo"$idpemb[NoTrans]";
    echo"<script>alert('Data berhasil tersimpan'); history.back(0)</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";
}
?>
