<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 1/6/14
 * Time: 3:29 PM
 * To change this template use File | Settings | File Templates.
 */
include "konek.php";
$i=1;
$d=$_POST['jml'];
while($i<$d){
    $uts="uts$i";
    $uas="uas$i";
    $nilai="nilai$i";
    $itrans="idtranskip$i";
    $qin="update transkip set uts='$_POST[$uts]', uas='$_POST[$uas]', nilai='$_POST[$nilai]' where IdTranskip='$_POST[$itrans]'";
    $hslin=mysql_query($qin);
    $i++;
}
if($hslin){
    echo"<script>alert('Data berhasil tersimpan'); history.back(0)</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";
}
?>
