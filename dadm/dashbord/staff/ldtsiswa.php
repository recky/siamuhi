
<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksilsiswa.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=lsiswa';
        }

    }

    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=lsiswa&cari="+cari+"&key="+key;
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
        <option value="jurusan">Jurusan</option>
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
            case 'nis':$query="Select * from info_biodata where NIS like '%$cr%' order by nis desc";
                break;
            case 'nama':$query="Select * from info_biodata where nama like '%$cr%' order by nis desc";
                break;
            case 'jk':
                switch($cr){
                    case "laki-laki":$st='L';
                        break;
                    case "perempuan":$st='P';
                        break;
                }

                $query="Select * from info_biodata where jk like '%$st%'order by nis desc";
                break;
            case 'alamat':$query="Select * from info_biodata where alamat like '%$cr%'order by nis desc";
                break;
            case 'jurusan':$query="Select * from info_biodata where idjurusan like '%$cr%'order by nis desc";
                break;
            case 'angkatan':$query="Select * from info_biodata where angkatan like '%$cr%'order by nis desc";
                break;
        }

    }else{$query="Select * from info_biodata order by nis desc";}
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
            "<td>$program[Program]</td>".
            "<td>$row[Angkatan]</td>".
            "<td width='10%'> <a href='#' onclick='hapus($row[NIS])' class='btn btn-xs btn-danger' title='Hapus'><i class='icon-trash'></i></a> <a href='?content=lsiswa&mod=lsiswadtl&id=$row[NIS]#edprof'  class='btn btn-xs btn-success' title='Selengkapnya'><i class='icon-zoom-in'></i></a></td></tr>";
        $no=$no+1;
    }


    ?>

</table>
    <?php
$jmldata = mysql_num_rows(mysql_query("Select * from info_biodata order by nis desc"));

$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";

?>