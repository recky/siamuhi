
<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksidtpegawai.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=dtpegawai';
        }

    }

    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=lklsx&cari="+cari+"&key="+key;
        });
    }
</script>
    <center><h3>Data Siswa</h3></center>
<table width="100%" class="table table-bordered table-striped">
    <tr><td colspan="5" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td colspan="4">
        Berdasarkan <select name="key" onclick="cari()" id="key">
        <option value=" ">Pilihlah</option>
        <option value="nis">NIS</option>
        <option value="nama">Nama</option>
        <option value="jk">Jenis Kelamin</option>
        <option value="alamat">Alamat</option>
        <option value="kelas">Kelas</option>
        <option value="angkatan">Angkatan</option>


    </select>
    </td></tr>
    <tr align="center" style="background: #0074c7;">
        <th width=""><strong><center>No </center></strong></th>
        <th width=""><strong><center>NIS </center></strong></th>
        <th width=""><strong><center>Nama</center></strong></th>
        <th width=""><strong><center>Jenis Kelamin</center></strong></th>
        <th width=""><strong><center>Alamat</center></strong></th>
        <th width=""><strong><center>No Telp</center></strong></th>
        <th width=""><strong><center>Kelas</center></strong></th>
        <th width=""><strong><center>Angkatan</center></strong></th>
        <th width=""><strong><center>Aksi</center></strong></th>
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
            case 'nis':$query="Select i.*,k.idkelas from info_biodata i,kelas k,ta t where NIS like '%$cr%' and k.nis=i.nis and t.ta=k.ta and t.status=1 order by nis desc";
                break;
            case 'nama':$query="Select i.*,k.idkelas from info_biodata i,kelas k,ta t where nama like '%$cr%' and k.nis=i.nis and t.ta=k.ta and t.status=1 order by nis desc";
                break;
            case 'jk':
                switch($cr){
                    case "laki-laki":$st='L';
                        break;
                    case "perempuan":$st='P';
                        break;
                }

                $query="Select i.*,k.idkelas from info_biodata i,kelas k,ta t where jk like '%$st%' and k.nis=i.nis and t.ta=k.ta and t.status=1 order by nis desc";
                break;
            case 'kelas':$query="Select i.*,k.idkelas from info_biodata i,kelas k,ta t where idkelas like '%$cr%' and k.nis=i.nis and t.ta=k.ta and t.status=1 order by nis desc";
                break;
            case 'alamat':$query="Select i.*,k.idkelas from info_biodata i,kelas k,ta t where alamat like '%$cr%' and k.nis=i.nis and t.ta=k.ta and t.status=1 order by nis desc";
                break;
            case 'jurusan':$query="Select i.*,k.idkelas from info_biodata i,kelas k,ta t where idjurusan like '%$cr%' and k.nis=i.nis and t.ta=k.ta and t.status=1 order by nis desc";
                break;
            case 'angkatan':$query="Select i.*,k.idkelas from info_biodata i,kelas k,ta t where angkatan like '%$cr%'and k.nis=i.nis and t.ta=k.ta and t.status=1 order by nis desc";
                break;
        }

    }else{$query="Select *,k.idkelas from info_biodata i,kelas k,ta t where i.nis=k.nis and t.status=1 and t.ta=k.ta order by i.nis asc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=1+$posisi;
    while($row=mysql_fetch_array($hasil))
    {
        $qpro="select Program from jurusan where IdJurusan='$row[IdJurusan]'";
        $program=mysql_fetch_array(mysql_query($qpro));

        if($row['JK']=='L'){$jk='Laki-laki';}elseif($row['JK']=='P'){$jk='Perempuan';}else{$jk='';}
        echo"<tr><td>$no</font></td>".
            "<td>$row[NIS]</td>".
            "<td>$row[nama]</td>".
            "<td>$jk</td>".
            "<td>$row[Alamat]</td>".
            "<td>$row[NoTelp]</td>".
            "<td>$row[idkelas]</td>".
            "<td>$row[Angkatan]</td>".
            "<td width='10%'> <a href='?content=lklsx&mod=lsiswadtl&id=$row[NIS]#edprof'  class='btn btn-xs btn-success' title='Selengkapnya'><i class='icon-zoom-in'></i> Selengekapnya</a></td></tr>";
        $no=$no+1;
    }


    ?>

</table>
<?php
$jmldata = mysql_num_rows(mysql_query($query));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";

?>