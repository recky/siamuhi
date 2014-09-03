
<script type="text/javascript">
    function hapus(id){
        var cek=confirm('Anda yakin akan menghapus?');
        if(cek==true){
            window.location='../dashbord/staff/aksisiswa.php?id='+id+'&aksi=hapus';
        }else{
            window.location='?content=aksiswa';
        }

    }

    function reset(id){
        var cek=confirm('Anda yakin akan mereset password?');
        if(cek==true){
            window.location='../dashbord/staff/aksisiswa.php?id='+id+'&aksi=reset';
        }else{
            window.location='?content=aksiswa';
        }
    }

    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=aksiswa&cari="+cari+"&key="+key;
        });
    }
</script>
<table width="100%" class="table table-bordered table-striped">
    <tr><td colspan="5" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td colspan="2">
        Berdasarkan <select name="key" onclick="cari()" id="key">
        <option value=" ">Pilihlah</option>
        <option value="username">Username</option>
        <option value="nama">Nama</option>
        <option value="status">Status</option>
    </select>
    </td></tr>
    <tr align="center" style="background: #0074c7;">
        <th width=""><strong><center>No </center></strong></th>
        <th width=""><strong><center>Nis </center></strong></th>
        <th width=""><strong><center>Username</center></strong></th>
        <th width=""><strong><center>Nama</center></strong></th>
        <th width=""><strong><center>Biodata</center></strong></th>
        <th width=""><strong><center>Status</center></strong></th>
        <th width=""><strong><center>Aksi</center></strong></th>
    </tr>

    <?php
    include "konek.php";
    $key=($_GET['key']);
    $cr=(strtolower($_GET['cari']));
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    if($cr!=''){
        switch($key){
            case 'username':$query="Select * from userlogin where Username like '%$cr%'order by username asc";
                break;
            case 'nama':$query="Select * from userlogin u, info_form i where i.nama like '%$cr%' and u.Username=i.nis order by u.Username asc";
                break;
            case 'status':
                switch($cr){
                    case "aktif":$st=1;
                        break;
                    case "tidak":$st=0;
                        break;
                }

                $query="Select * from userlogin where status like '%$st%' order by Username asc";
                break;

        }

    }else{$query="Select * from userlogin order by Username asc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=$posisi+1;
    while($row=mysql_fetch_array($hasil))
    {
        $qb="select nis,nama from info_form where nis='$row[Username]'";
        $hb=mysql_fetch_array(mysql_query($qb));
        if($hb){$b="<i class='icon-ok text-success'></i>";}else{$b="<i class='icon-remove text-danger'></i>";}
        if($row['status']==1){$status="Aktif";$col='"text-success"';}else{$status="Tidak";$col='"text-danger"';}
        echo"<tr><td>$no</font></td>".
            "<td>$row[Username]</td>".
            "<td>$row[Username]</td>".
            "<td>$hb[nama]</td>".
            "<td width='5%' align='center'>$b</td>".
            "<td width='8%' align='center'><label class=$col>$status</label></td>".
            "<td width='10%'> <a href='#' onclick='hapus($row[IdUser])' class='btn btn-xs btn-danger' title='Hapus'><i class='icon-trash'></i></a> <a href='../dashbord/staff/aksisiswa.php?id=$row[IdUser]&aksi=akti' class='btn btn-xs btn-warning' title='Aktif/Tidak'><i class='icon-ban-circle'></i></a> <a href='#'  onclick='reset($row[IdUser])' class='btn btn-xs btn-success' title='Reset Password'><i class='icon-refresh'></i></a></td></tr>";
        $no=$no+1;
    }

    ?>

</table>
<?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM userlogin"));

$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";

?>