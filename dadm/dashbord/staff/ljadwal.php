<?php

if ((!isset($_SESSION["id"]))and(!isset($_SESSION["hak"]))) {
    header("location:index.php");
} elseif ((isset($_SESSION["id"]))and(($_SESSION["hak"])==1)) {
    ?>

<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksijadwal.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=pengajar';
        }
    }

    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=jadwal&cari="+cari+"&key="+key;
        });
    }
</script>

<table width="100%" class="table table-bordered table-striped">
    <tr><td colspan="4" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td colspan="3">
        Berdasarkan <select name="key" onclick="cari()" id="key">
        <option>Pilihlah</option>
        <option value="kodemapel">Kode Mapel</option>
        <option value="pengajar">Pengajar</option>
        <option value="kelas">Kelas</option>
    </select>
    </td></tr>
    <tr align="center" style="background: #0074c7;">

         <td width="3%"><strong>No</strong></td>
        <td width="3%"><strong>Kelas</strong></td>
        <td><strong>Kode Mapel</strong></td>
        <td><strong>Mata Pelajaran</strong></td>
        <td><strong>Pengajar</strong></td>
         <td><strong>Aksi</strong></td>
    </tr>
    <?php
    include "konek.php";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $key=($_GET['key']);
    $cr=(strtolower($_GET['cari']));

    if($cr!=''){
        switch($key){
            case 'kodemapel':$query="select j.id, d.IdKelas, j.KodeMapel, m.Mapel, s.nama from dafkelas d, mapel m, pengajar p, jadwal j, staff s where m.KodeMapel=p.KodeMapel and m.KodeMapel=j.KodeMapel and s.nik=p.nik and d.IdKelas=j.IdKelas and  m.KodeMapel like '%$cr%' order by d.IdKelas asc";
                 break;
            case 'pengajar':$query="select j.id, d.IdKelas, j.KodeMapel, m.Mapel, s.nama from dafkelas d, mapel m, pengajar p, jadwal j, staff s where m.KodeMapel=p.KodeMapel and m.KodeMapel=j.KodeMapel and s.nik=p.nik and d.IdKelas=j.IdKelas and  s.nama like '%$cr%' order by d.IdKelas asc";
                break;
            case 'kelas':$query="select j.id, d.IdKelas, j.KodeMapel, m.Mapel, s.nama from dafkelas d, mapel m, pengajar p, jadwal j, staff s where m.KodeMapel=p.KodeMapel and m.KodeMapel=j.KodeMapel and s.nik=p.nik and d.IdKelas=j.IdKelas and d.IdKelas like '%$cr%' order by d.IdKelas asc";
                break;
            }

    }else
    {$query="select j.id, d.IdKelas, j.KodeMapel, m.Mapel, s.nama from dafkelas d, mapel m, pengajar p, jadwal j, staff s where m.KodeMapel=p.KodeMapel and m.KodeMapel=j.KodeMapel and s.nik=p.nik and d.IdKelas=j.IdKelas order by d.idkelas asc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=$posisi+1;
    while($row=mysql_fetch_array($hasil))
    {
        $t=$row['id'];
        echo"<tr><td>$no</font></td>".
            "<td>$row[IdKelas]</td>".
            "<td>$row[KodeMapel]</td>".
            "<td>$row[Mapel]</td>".
            "<td>$row[nama]</td>";?>
            <td width="7%"><a href="#" onclick="hapus('<?php echo $t?>')" class="btn btn-xs btn-danger" title="Hapus"><i class='icon-trash'></i></a>
        <?php

        echo"<a href='?content=jadwal&id=$t&edit=1' class='btn btn-xs btn-primary' title='Edit'><i class='icon-pencil'></i></a> </td></tr>";

        $no=$no+1;
    }

    ?>


</table>
<?php
    $jmldata = mysql_num_rows(mysql_query("select j.id, d.IdKelas, j.KodeMapel, m.Mapel, s.nama from dafkelas d, mapel m, pengajar p, jadwal j, staff s where m.KodeMapel=p.KodeMapel and m.KodeMapel=j.KodeMapel and s.nik=p.nik and d.IdKelas=j.IdKelas order by d.idkelas asc"));

    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal : $linkHalaman</div><br>";

}else {
    header("location:../index.php");
}
?>