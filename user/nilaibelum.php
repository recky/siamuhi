<head>

</head>
<body></body>
<center><h3>Nilai Belum Masuk</h3></center>
<table width="100%" class="table">
    <tr align="center" style="background: #0074c7;">
        <th width=""><strong>No </strong></th>
        <th width=""><strong>Kelas </strong></th>
        <th width=""><strong>Semester</strong></th>
        <th width=""><strong>TA</strong></th>
        <th width=""><strong>Mapel</strong></th>
        <th width=""><strong>UTS</strong></th>
        <th width=""><strong>UAS</strong></th>
        <th width=""><strong>Nilai</strong></th>
        <th width=""><strong>Status</strong></th>

    </tr>
    <?php
    include "../konek.php";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $id=($_SESSION['id']);
    $query="Select * from info_nilai,info_form where info_nilai.nis=info_form.nis and info_nilai.nilai='' and info_form.iduser='$id' order by idkelas desc";
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=1+$posisi;
    while($row=mysql_fetch_array($hasil))
    {
        if($row['nilai']<$row['kkm']){$status="Belum";$col='bgcolor=#b94a48';}else{$status="Lulus";}
        echo"<tr $col><td>$no</font></td>".
            "<td>$row[idkelas]</td>".
            "<td>$row[Smtr]</td>".
            "<td>$row[ta]</td>".
            "<td>$row[mapel]</td>".
            "<td>$row[uts]</td>".
            "<td>$row[uas]</td>".
            "<td>$row[nilai]</td>".
            "<td><p align='center'>$status</p></td></tr>";
        $no=$no+1;
    }


    ?>

</table>
<?php
$jmldata = mysql_num_rows(mysql_query($query));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";

?>
</div>

</body>