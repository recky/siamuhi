<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>

<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksijrs.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=jurusan';
        }
    }
</script>

<table width="100%" class="table table-bordered table-striped">
    <tr>
        <td><strong>No</strong></td>
        <td><strong>Kode Jurusan</strong></td>
        <td><strong>Program Studi</strong></td>
        <td><strong>Bidang Keahlian</strong></td>
        <td><strong>Aksi</strong></td>
    </tr>
    <?php
    include "konek.php";
    $qsnik="select * from jurusan";
    $hasil=mysql_query($qsnik);
    $no=1;
    while($row=mysql_fetch_array($hasil))
    {
        $t=$row['IdJurusan'];
        echo"<tr><td>$no</font></td>".
            "<td>$row[IdJurusan]</td>".
            "<td>$row[Program]</td>".
            "<td>$row[Bidang]</td>";?>
            <td width="10%"><a href="#" onclick="hapus('<?php echo $t?>')" class="btn btn-xs btn-danger" title="Hapus"><i class='icon-trash'></i></a>
        <?php

        echo"<a href='?content=jurusan&id=$row[IdJurusan]&edit=1' class='btn btn-xs btn-primary' title='Edit'><i class='icon-pencil'></i></a> </td></tr>";

        $no=$no+1;
    }

    ?>


</table>
<?php
}else {
    header("location:../index.php");
}
?>