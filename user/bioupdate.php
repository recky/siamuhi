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
$sukses=true;
if($gambar=="foto/"){
    $qsiswa="select b.url from biodata b,asalsekolah a,ortu o where b.nis=a.nis and b.nis=o.nis and b.nis='$_POST[nis]'";
    $hslsis=mysql_query($qsiswa);
    $rowsiswa=mysql_fetch_array($hslsis);
    $gambar=$rowsiswa['url'];
}else{
$sukses=move_uploaded_file($_FILES['foto']['tmp_name'],$gambar);
}

$qkodepos="select kodepos from kodepos where kab='$_POST[kab]' and kec='$_POST[kec]'";
$crkodepos=mysql_query($qkodepos);
while($hslkodepos=mysql_fetch_array($crkodepos)){
    $kodepos=$hslkodepos['kodepos'];
}
session_start();
$id=($_SESSION['id']);
$query="update biodata set nama='$_POST[nama]',JK='$_POST[jk]',Tmplahir='$_POST[tempat]',TglLahir='$_POST[tgl]',NoIjasah='$_POST[noijasah]',NoSKHUN='$_POST[noskhun]',Agama='$_POST[agama]',Status='$_POST[status]',Alamat='$_POST[alamat]',Kodepos=$kodepos,NoTelp='$_POST[tlp]',Cita='$_POST[cita]',Hobi='$_POST[hobi]', Jarak='$_POST[jarak]',Transportasi='$_POST[transportasi]',IdJurusan='$_POST[idjurusan]',Angkatan='$_POST[angkatan]',url='$gambar' where Nis='$_POST[nis]'";
$row=mysql_query($query);

$querysekolah="update asalsekolah set Sekolah='$_POST[sekolah]',AlamatSekolah='$_POST[alsekolah]' where Nis='$_POST[nis]'";
$rowsekolah=mysql_query($querysekolah);

$qortu="update ortu set NmIbu='$_POST[namaibu]',NmAyah='$_POST[namaayah]',PkrjAyah='$_POST[pkrjayah]',PkrjIbu='$_POST[pkrjibu]',PendAyah='$_POST[pndayah]',PendIbu='$_POST[pndibu]',GolGaji='$_POST[golgaji]',NmWali='$_POST[nmwali]',AlamatWali='$_POST[alwali]',NoTelpWali='$_POST[tlpwali]' where NIS='$_POST[nis]'";
$rowortu=mysql_query($qortu);



if($sukses&&$row&&$rowsekolah&&$rowortu){
    print"<script>alert('Penyimpanan Berhasil');
javascript:window.location='index.php';</script>";
}
else{
    print"<script>alert('Terjadi Beberapa Kegagalan Porses Penyimpanan');
javascript:window.location='index.php';</script>";
}
?>