<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>

<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksisemester.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=semester';
        }
    }
</script>

<table width="100%" class="table table-bordered table-striped">
    <tr>
        <td><strong>No</strong></td>
        <td><strong>Kode Semester</strong></td>
        <td><strong>Semester</strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Aksi</strong></td>
    </tr>
    <?php
    include "konek.php";
    $qsnik="select * from semester";
    $hasil=mysql_query($qsnik);
    $no=1;
    while($row=mysql_fetch_array($hasil))
    {
        if($row['Status']==1){$st="Aktif";$col='"text-success"';}else{$st="Tidak Aktif";$col='"text-danger"';}
        $t=$row['IdSmtr'];
        echo"<tr><td>$no</font></td>".
            "<td>$row[IdSmtr]</td>".
            "<td>$row[Smtr]</td>".
            "<td><label class=$col>$st</td>";?>
            <td width="10%"><a href="#" onclick="hapus('<?php echo $t?>')" class="btn btn-xs btn-danger" title="Hapus"><i class='icon-trash'></i></a>
        <?php

        echo"<a href='?content=semester&id=$row[IdSmtr]&edit=1' class='btn btn-xs btn-primary' title='Edit'><i class='icon-pencil'></i></a> <a href='../dashbord/staff/aksisemester.php?id=$row[IdSmtr]&aksi=akti' class='btn btn-xs btn-warning' title='Aktif/Tidak'><i class='icon-ban-circle'></i></a></td></tr>";

        $no=$no+1;
    }

    ?>


</table>
<?php
}else {
    header("location:../index.php");
}
?>