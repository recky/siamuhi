<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>

<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksikmp.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=kmp';
        }
    }
</script>

<table width="100%" class="table table-bordered table-striped">
    <tr>
        <td><strong>No</strong></td>
        <td><strong>Kelas</strong></td>
        <td><strong>Kuota</strong></td>
        <td width="25%"><strong>Aksi</strong></td>
    </tr>
    <?php
    include "konek.php";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $qsnik="select * from dafkelas order by IdKelas asc limit $posisi,$batas";
    $hasil=mysql_query($qsnik);
    $no=$posisi+1;
    while($row=mysql_fetch_array($hasil))
    {
        $t=$row['IdKelas'];
        echo"<tr><td>$no</font></td>".
            "<td>$row[IdKelas]</td>".
            "<td>$row[kuota]</td>";?>
            <td width="10%"><a href="#" onclick="hapus('<?php echo $t?>')" class="btn btn-xs btn-danger" title="Hapus"><i class='icon-trash'></i></a>
        <?php

        echo"<a href='?content=kelas&id=$row[IdKelas]&edit=1' class='btn btn-xs btn-primary' title='Edit'><i class='icon-pencil'></i></a> </td></tr>";

        $no=$no+1;
    }

    ?>


</table>
<?php
    $jmldata = mysql_num_rows(mysql_query("select * from dafkelas order by IdKelas asc"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal : $linkHalaman</div><br>";

}else {
    header("location:../index.php");
}
?>