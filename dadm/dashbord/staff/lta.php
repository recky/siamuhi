<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>

<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksita.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=ta';
        }
    }
</script>

<table width="100%" class="table table-bordered table-striped">
    <tr>
        <td><strong>No</strong></td>
        <td><strong>Tahun Ajaran</strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Aksi</strong></td>
    </tr>
    <?php
    include "konek.php";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $qsnik="select * from ta limit $posisi,$batas";
    $hasil=mysql_query($qsnik);
    $no=$posisi+1;
    while($row=mysql_fetch_array($hasil))
    {
        if($row['status']==1){$st="Aktif";$col='"text-success"';}else{$st="Tidak Aktif";$col='"text-danger"';}
        $t=$row['ta'];
        echo"<tr><td>$no</font></td>".
            "<td>$row[ta]</td>".
            "<td><label class=$col>$st</td>";?>
            <td width="10%"><a href="#" onclick="hapus('<?php echo $t?>')" class="btn btn-xs btn-danger" title="Hapus"><i class='icon-trash'></i></a>
        <?php

        echo"<a href='../dashbord/staff/aksita.php?id=$row[ta]&aksi=akti' class='btn btn-xs btn-warning' title='Aktif/Tidak'><i class='icon-ban-circle'></i></a></td></tr>";

        $no=$no+1;
    }

    ?>


</table>
<?php
    $jmldata = mysql_num_rows(mysql_query("select * from ta"));

    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal : $linkHalaman</div><br>";

}else {
    header("location:../index.php");
}
?>