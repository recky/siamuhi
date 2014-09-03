<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>

<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksijpemb.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=jpemb';
        }
    }

    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=jpemb&cari="+cari+"&key="+key;
        });
    }
</script>

<table  class="table table-bordered table-striped">
    <tr><td colspan="5" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td colspan="3">
        Berdasarkan <select name="key" onclick="cari()" id="key">
        <option>Pilihlah</option>
        <option value="jenis">Jenis</option>
        <option value="kelas">Kelas</option>
        <option value="ta">Tahun Ajaran</option>

    </select>
    </td></tr>
    <tr align="center" style="background: #0074c7;">

        <td width="3%"><strong>No</strong></td>
        <td ><strong>Jenis</strong></td>
        <td width="10%"><strong>Kelas</strong></td>
        <td colspan="2" width="10%"><strong>Biaya (Rp.)</strong></td>
        <td width="10%"><strong>Tahun Ajaran</strong></td>
        <td width="15%"><strong>Batas Tanggal Pembayaran</strong></td>
        <td width="3%"><strong>Aksi</strong></td>
    </tr>
    <?php
    include "konek.php";
    $id=$_SESSION['id'];
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $key=($_GET['key']);
    $cr=(strtolower($_GET['cari']));

    if($cr!=''){
        switch($key){
            case 'jenis':$query="Select * from keuangan where Jenis like '%$cr%' order by kelas asc";
                break;
            case 'kelas':$query="Select * from keuangan where Kelas like '%$cr%' order by kelas asc";
                break;
            case 'ta':$query="Select * from keuangan  where TA like '%$cr%' order by kelas asc";
                break;
        }
    }else
    {$query="select * from keuangan order by kelas asc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=$posisi+1;
    while($row=mysql_fetch_array($hasil))
    {
        $t=$row['IdKeu'];
        echo"<tr><td>$no</font></td>".
            "<td>$row[Jenis]</td>".
            "<td>$row[Kelas]</td>".
            "<td>Rp.</td>".
            "<td align='right'>$row[Biaya]</td>".
            "<td align='center'>$row[TA]</td>".
            "<td>$row[Batas]</td>";?>
            <td width="10%"><a href="#" onclick="hapus('<?php echo $t?>')" class="btn btn-xs btn-danger" title="Hapus"><i class='icon-trash'></i></a>
        <?php

        echo"<a href='?content=jpemb&id=$row[IdKeu]&edit=1' class='btn btn-xs btn-primary' title='Edit'><i class='icon-pencil'></i></a> </td></tr>";

        $no=$no+1;
    }

    ?>


</table>
<?php
    $jmldata = mysql_num_rows(mysql_query("select * from keuangan order by kelas asc"));

    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal : $linkHalaman</div><br>";

}else {
    header("location:../index.php");
}
?>