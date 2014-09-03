<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>

<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksimapel.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=mapel';
        }
    }

    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=mapel&cari="+cari+"&key="+key;
        });
    }
</script>

<table width="100%" class="table table-bordered table-striped">
    <tr><td colspan="5" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td colspan="3">
        Berdasarkan <select name="key" onclick="cari()" id="key">
        <option>Pilihlah</option>
        <option value="kodemapel">Kode Mapel</option>
        <option value="mapel">Mata Pelajaran</option>
        <option value="kategori">Kategori</option>
        <option value="kelas">Kelas</option>
        <option value="jurusan">Jurusan</option>
        <option value="kkm">KKM</option>
    </select>
    </td></tr>
    <tr align="center" style="background: #0074c7;">

         <td width="3%"><strong>No</strong></td>
        <td><strong>Kode Mapel</strong></td>
        <td><strong>Mata Pelajaran</strong></td>
        <td width="10%"><strong>Kategori</strong></td>
        <td width="3%"><strong>Kelas</strong></td>
        <td width="20%"><strong>Jurusan</strong></td>
        <td width="3%"><strong>KKM</strong></td>
        <td><strong>Aksi</strong></td>
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
            case 'kodemapel':$query="Select * from info_mapel where KodeMapel like '%$cr%' order by kelas desc";
                break;
            case 'mapel':$query="Select * from info_mapel  where Mapel like '%$cr%' order by kelas desc";
                break;
            case 'kategori':$query="Select * from info_mapel  where kategori like '%$cr%' order by kelas desc";
                break;
            case 'kelas':$query="Select * from info_mapel  where Kelas like '%$cr%' order by kelas desc";
                break;
            case 'jurusan':$query="Select * from info_mapel  where program like '%$cr%' order by kelas desc";
                break;
            case 'kkm':$query="Select * from info_mapel  where kkm like '%$cr%' order by kelas desc";
                break;
        }

    }else
    {$query="select * from info_mapel order by kelas desc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=$posisi+1;
    while($row=mysql_fetch_array($hasil))
    {
        $t=$row['KodeMapel'];
        echo"<tr><td>$no</font></td>".
            "<td>$row[KodeMapel]</td>".
            "<td>$row[Mapel]</td>".
            "<td>$row[kategori]</td>".
            "<td>$row[Kelas]</td>".
            "<td>$row[program]</td>".
            "<td>$row[kkm]</td>";?>
            <td width="7%"><a href="#" onclick="hapus('<?php echo $t?>')" class="btn btn-xs btn-danger" title="Hapus"><i class='icon-trash'></i></a>
        <?php

        echo"<a href='?content=mapel&id=$row[KodeMapel]&edit=1' class='btn btn-xs btn-primary' title='Edit'><i class='icon-pencil'></i></a> </td></tr>";

        $no=$no+1;
    }

    ?>


</table>
<?php
    $jmldata = mysql_num_rows(mysql_query("select * from info_mapel order by kelas desc"));

    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal : $linkHalaman</div><br>";

}else {
    header("location:../index.php");
}
?>