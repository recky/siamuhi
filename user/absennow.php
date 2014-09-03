<head>

</head>
<body>
<br/><br/>
<center><h3>Presensi Sekarang</h3></center>
<table width="100%" class="table">
    <tr align="center" style="background: #0074c7;">
        <th width=""><strong>No </strong></th>
        <th width=""><strong>Kelas</strong></th>
        <th width=""><strong>Semester</strong></th>
        <th width=""><strong>TA</strong></th>
        <th width=""><strong>Bulan</strong></th>
        <th width=""><strong>Pertemuan</strong></th>
        <th width=""><strong>Kehadiran</strong></th>
        <th width=""><strong>Sakit</strong></th>
        <th width=""><strong>Ijin</strong></th>
        <th width=""><strong>Absen</strong></th>

    </tr>
    <?php
    include "../konek.php";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
    $id=($_SESSION['id']);

        $query="Select * from info_absensi,info_form,ta where info_absensi.nis=info_form.nis and info_form.iduser='$id' and ta.ta=info_absensi.ta and ta.status=1 group by idkelas asc";

    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=1+$posisi;
    while($row=mysql_fetch_array($hasil))
    {
        switch($row['bulan']){
            case 1:$bulan="Januari";
                break;
            case 2:$bulan="Februari";
                break;
            case 3:$bulan="Maret";
                break;
            case 4:$bulan="April";
                break;
            case 5:$bulan="Mei";
                break;
            case 6:$bulan="Juni";
                break;
            case 7:$bulan="Juli";
                break;
            case 8:$bulan="Agustus";
                break;
            case 9:$bulan="September";
                break;
            case 10:$bulan="Oktober";
                break;
            case 11:$bulan="November";
                break;
            case 12:$bulan="Desember";
                break;
        }
        echo"<tr><td>$no</font></td>".
            "<td>$row[idkelas]</td>".
            "<td>$row[smtr]</td>".
            "<td>$row[ta]</td>".
            "<td>$bulan</td>".
            "<td>$row[pertemuan]</td>".
            "<td>$row[kehadiran]</td>".
            "<td>$row[s]</td>".
            "<td>$row[i]</td>".
            "<td>$row[a]</td>";
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