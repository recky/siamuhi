
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
            window.location="index.php?content=dtpegawai&cari="+cari+"&key="+key;
        });
    }
</script>
<table width="100%" class="table table-bordered table-striped">
    <tr><td colspan="5" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td colspan="2">
        Berdasarkan <select name="key" onclick="cari()" id="key">
        <option value=" ">Pilihlah</option>
        <option value="nik">NIK</option>
        <option value="nama">Nama</option>
        <option value="jk">Jenis Kelamin</option>
        <option value="alamat">Alamat</option>
        <option value="jabatan">Jabatan</option>

    </select>
    </td></tr>
    <tr align="center" style="background: #0074c7;">
        <th width=""><strong><center>No </center></strong></th>
        <th width=""><strong><center>NIK </center></strong></th>
        <th width=""><strong><center>Nama</center></strong></th>
        <th width=""><strong><center>Jenis Kelamin</center></strong></th>
        <th width=""><strong><center>Alamat</center></strong></th>
        <th width=""><strong><center>No HP</center></strong></th>
        <th width=""><strong><center>Jabatan</center></strong></th>
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
            case 'nik':$query="Select * from staff where nik like '%$cr%'order by nama asc";
                break;
            case 'nama':$query="Select * from staff where nama like '%$cr%' order by nama asc";
                break;
            case 'jk':
                switch($cr){
                    case "laki-laki":$st='L';
                        break;
                    case "perempuan":$st='P';
                        break;
                }

                $query="Select * from staff where jk like '%$st%' order by nama asc";
                break;
            case 'alamat':$query="Select * from staff where alamat like '%$cr%' order by nama asc";
                break;
            case 'jabatan':$query="Select * from staff where jabatan like '%$cr%' order by nama asc";
                break;
        }

    }else{$query="Select * from staff order by nama asc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=1;
    while($row=mysql_fetch_array($hasil))
    {if($row['jk']=='L'){$jk='Laki-laki';}elseif($row['jk']=='P'){$jk='Perempuan';}else{$jk='';}
        echo"<tr><td>$no</font></td>".
            "<td>$row[nik]</td>".
            "<td>$row[nama]</td>".
            "<td>$jk</td>".
            "<td>$row[alamat]</td>".
            "<td>$row[hp]</td>".
            "<td>$row[jabatan]</td>".
            "<td width='10%'> <a href='#' onclick='hapus($row[nik])' class='btn btn-xs btn-danger' title='Hapus'><i class='icon-trash'></i></a> <a href='?content=dtpegawai&mod=pegawaidtl&id=$row[nik]#edprof'  class='btn btn-xs btn-success' title='Selengkapnya'><i class='icon-zoom-in'></i></a></td></tr>";
        $no=$no+1;
    }


    ?>

</table>
    <?php
$jmldata = mysql_num_rows(mysql_query("Select * from staff order by nama asc"));

$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";
?>