<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 1/6/14
 * Time: 3:29 PM
 * To change this template use File | Settings | File Templates.
 */
include "konek.php";
$ul=$_POST['total'];
$point=1;
$ta=mysql_fetch_array(mysql_query("select ta from ta where ta.status=1"));

while($point<=$ul){
    $kel="kelas$point";
    $ikelas=$_POST[$kel];
    $pkls=(substr($ikelas,0,2));
    $ids="i$point";
    $qcek=mysql_query("select * from kelas where NIS='$_POST[$ids]' and TA='$ta[ta]'");
    $cek=mysql_fetch_array($qcek);
    if(mysql_num_rows($qcek)>0){
        $qin="update kelas set IdKelas='$_POST[$kel]' where NIS='$_POST[$ids]'and TA='$ta[ta]'";
        $hslin=mysql_query($qin);
        echo" test $pkls";
        $hpm=true;
    } else{
        echo" test $pkls";
       $jenis=mysql_query("select k.idkeu,k.Jenis from keuangan k,ta t where k.Kelas='$pkls' and t.ta=k.ta and t.status=1 group by k.Jenis");
        while($hjns=mysql_fetch_array($jenis)){
            if($hjns['Jenis']=='SPP'){
                for($i=1;$i<=12;$i++){
                    if($i<=7&&$i>=2){$smt='GNP';}else{$smt='GJL';}
                    $qpm="insert into pembayaran values ('','$_POST[$ids]','$hjns[idkeu]','$smt','$ta[ta]',$i,'','','')";
                    $hpm=mysql_query($qpm);
                }
            }else{
                $qpm="insert into pembayaran values ('','$_POST[$ids]','$hjns[idkeu]','GJL','$ta[ta]','','','','')";
                $hpm=mysql_query($qpm);
                $qpm="insert into pembayaran values ('','$_POST[$ids]','$hjns[idkeu]','GNP','$ta[ta]','','','','')";
                $hpm=mysql_query($qpm);        }

        }
        $idsmt=mysql_fetch_array(mysql_query("select IdSmtr from semester where status=1"));
        $kdmapel=mysql_query("select m.kodemapel from mapel m, jadwal j where m.kodemapel=j.kodemapel and idkelas='$ikelas'");
        while($mapel=mysql_fetch_array($kdmapel)){
            $inmapel="insert into transkip values ('','$_POST[$ids]','$ikelas','$idsmt[IdSmtr]','$ta[ta]','$mapel[kodemapel]','','','')";
            $hmapel=mysql_query($inmapel);
        }
        $qin="insert into kelas values ('','$_POST[$kel]','$_POST[$ids]','$ta[ta]')";
        $hslin=mysql_query($qin);
    }
    $point++;
}
if($hslin&&$hpm&&$hmapel){
    echo"<script>alert('Data berhasil tersimpan'); history.back(0)</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";
}
?>
