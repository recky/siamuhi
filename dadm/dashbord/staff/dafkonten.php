
<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksiktn.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=editor';
        }
    }

    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=editor&cari="+cari+"&key="+key;
        });
    }
    </script>
<table width="100%" class="table table-bordered table-striped">
    <tr><td colspan="5" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td colspan="2">
        Berdasarkan <select name="key" onclick="cari()" id="key">
        <option>Pilihlah</option>
        <option value="judul">Judul</option>
          <option value="hak">Hak Akses</option>
        <option value="publikasi">Publikasi</option>
    </select>
    </td></tr>
    <tr align="center" style="background: #0074c7;">
        <th width=""><strong><center>No </center></strong></th>
        <th width=""><strong><center>Judul </center></strong></th>
        <th width=""><strong><center>Penulis</center></strong></th>
        <th width=""><strong><center>Tanggal</center></strong></th>
        <th width=""><strong><center>Hak Akses</center></strong></th>
        <th width=""><strong><center>Publikasi</center></strong></th>
        <th width=""><strong><center>Aksi</center></strong></th>
    </tr>

    <?php
    include "konek.php";
    $id=$_SESSION['id'];
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $qsnik="select * from info_staff where id=$id";
    $ronik=mysql_fetch_array(mysql_query($qsnik));

    $nik=$ronik['nik'];
    $key=($_GET['key']);
    $cr=(strtolower($_GET['cari']));

    if($cr!=''){
        switch($key){
            case 'judul':$query="Select * from info_konten where judul like '%$cr%' and nik='$nik' order by tgl desc";
                break;
            case 'hak':$query="Select * from info_konten where hak like '%$cr%' and nik='$nik' order by tgl desc";
                break;
            case 'publikasi':
                switch($cr){
                    case "ya":$st=1;
                        break;
                    case "tidak":$st=0;
                        break;
                }

                $query="Select * from info_konten where status=$st and nik='$nik' order by tgl desc";
                break;
        }

    }else{$query="Select * from info_konten where nik='$nik' order by tgl desc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=$posisi+1;
    while($row=mysql_fetch_array($hasil))
    {
        if($row['status']==1){$status="Ya";$col='"text-success"';}else{$status="Tidak";$col='"text-danger"';}
        echo"<tr><td>$no</font></td>".
            "<td>$row[judul]</td>".
            "<td>$row[nama]</td>".
            "<td>$row[tgl]</td>".
            "<td>$row[akses]</td>".
            "<td><label class=$col>$status</label></td>".
            "<td width='10%'> <a href='#' onclick='hapus($row[id])' class='btn btn-xs btn-danger' title='Hapus'><i class='icon-trash'></i></a> <a href='?content=editor&id=$row[id]&edit=1' class='btn btn-xs btn-primary' title='Edit'><i class='icon-pencil'></i></a> <a href='../dashbord/staff/aksiktn.php?id=$row[id]&aksi=unpub' class='btn btn-xs btn-warning' title='Publish/Unpublish'><i class='icon-ban-circle'></i></a> </td></tr>";
        $no=$no+1;
    }


    ?>

</table>
    <?php
$jmldata = mysql_num_rows(mysql_query("Select * from info_konten where nik='$nik' order by tgl desc"));

$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";
?>