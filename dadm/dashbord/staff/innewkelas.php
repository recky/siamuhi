<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$ta=mysql_fetch_array(mysql_query("select ta from ta where ta.status=1"));
$ul=$_POST['jumlah'];
$point=1;
while($point<=$ul){
    $ns="nis$point";
    $ikelas=$_POST['kelas'];
    $pkls=substr($ikelas,0,2);
    echo" test $pkls";
    $jenis=mysql_query("select k.idkeu,k.Jenis from keuangan k,ta t where k.Kelas='$pkls' and t.ta=k.ta and t.status=1 group by k.Jenis");
    while($hjns=mysql_fetch_array($jenis)){
        if($hjns['Jenis']=='SPP'){
            echo" test $pkls $hjns[Jenis]";
            for($i=1;$i<=12;$i++){
                if($i<=7&&$i>=2){$smt='GNP';}else{$smt='GJL';}
                $qpm="insert into pembayaran values ('','$_POST[$ns]','$hjns[idkeu]','$smt','$ta[ta]',$i,'','','')";
                $hpm=mysql_query($qpm);
            }
        }else{
            $qpm="insert into pembayaran values ('','$_POST[$ns]','$hjns[idkeu]','GJL','$ta[ta]','','','','')";
            $hpm=mysql_query($qpm);
            $qpm="insert into pembayaran values ('','$_POST[$ns]','$hjns[idkeu]','GNP','$ta[ta]','','','','')";
            $hpm=mysql_query($qpm);
        }

    }
    $idsmt=mysql_fetch_array(mysql_query("select IdSmtr from semester where status=1"));
    $kdmapel=mysql_query("select m.kodemapel from mapel m, jadwal j where m.kodemapel=j.kodemapel and idkelas='$ikelas'");
    while($mapel=mysql_fetch_array($kdmapel)){
                $inmapel="insert into transkip values ('','$_POST[$ns]','$ikelas','$idsmt[IdSmtr]','$ta[ta]','$mapel[kodemapel]','','','')";
                $hmapel=mysql_query($inmapel);
            }

    $qin="insert into kelas values ('','$_POST[kelas]','$_POST[$ns]','$ta[ta]')";
    $hslin=mysql_query($qin);
    $point++;
}

if($hslin&&$hpm&&$inmapel){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=kelas&mod=new'</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); window.location='../index.php?content=kelas&mod=new'</script>";
}
?>
