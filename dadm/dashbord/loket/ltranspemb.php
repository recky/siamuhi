
<script type="text/javascript">
    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=transpemb&cari="+cari+"&key="+key;
        });
    }
</script>
<center><h3>Pembayaran Siswa</h3></center>
<table width="100%" class="table table-bordered table-striped">
    <tr><td colspan="5" align="right">Pencarian <input type="text" name="cari" class="input-xlarge" placeholder="Masukan kata kunci" id="cari"/> </td><td colspan="4">
        Berdasarkan <select name="key" onclick="cari()" id="key">
        <option value=" ">Pilihlah</option>
        <option value="nis">NIS</option>
        <option value="nama">Nama</option>
        <option value="kelas">Kelas</option>
        <option value="ta">Tahun Ajaran</option>
        <option value="semester">Semester</option>
        <option value="teller">Teller</option>


    </select>
    </td></tr>
    <tr align="center" style="background: #0074c7;">
        <th width=""><strong><center>No Transaksi </center></strong></th>
        <th width=""><strong><center>NIS </center></strong></th>
        <th width=""><strong><center>Nama</center></strong></th>
        <th width=""><strong><center>Kelas</center></strong></th>
        <th width=""><strong><center>Semester</center></strong></th>
        <th width=""><strong><center>Tahun Ajaran</center></strong></th>
        <th width=""><strong><center>Bulan</center></strong></th>
        <th width=""><strong><center>Jenis</center></strong></th>
        <th width=""><strong><center>Biaya</center></strong></th>
        <th width=""><strong><center>Teller</center></strong></th>
        <th width=""><strong><center>Status</center></strong></th>
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
            case 'nis':$query="Select *,info_bayar.status as stus from info_bayar,info_form,ta t where info_bayar.nis=info_form.nis and info_bayar.teller!='' and info_bayar.ta=t.ta and t.status=1 and info_form.nis like '%$cr%'order by tanggal desc";
                break;
            case 'nama':$query="Select *,info_bayar.status as stus from info_bayar,info_form,ta t where info_bayar.nis=info_form.nis and info_bayar.teller!='' and info_bayar.ta=t.ta and t.status=1 and info_form.nama like '%$cr%'order by tanggal desc";
                break;
            case 'kelas':
                $query="Select *,info_bayar.status as stus from info_bayar,info_form,ta t where info_bayar.nis=info_form.nis and info_bayar.teller!=''and info_bayar.ta=t.ta and t.status=1 and info_bayar.idkelas like '%$cr%'order by tanggal desc";
                break;
            case 'ta':$query="Select *,info_bayar.status as stus from info_bayar,info_form,ta t where info_bayar.nis=info_form.nis and info_bayar.teller!='' and info_bayar.ta=t.ta and t.status=1 and info_bayar.ta like '%$cr%'order by tanggal desc";
                break;
            case 'semester':$query="Select *,info_bayar.status as stus from info_bayar,info_form,ta t where info_bayar.nis=info_form.nis and info_bayar.teller!='' and info_bayar.ta=t.ta and t.status=1 and info_bayar.idsmtr like '%$cr%'order by tanggal desc";
                break;
            case 'teller':$query="Select *,info_bayar.status as stus from info_bayar,info_form,ta t where info_bayar.nis=info_form.nis and info_bayar.teller!='' and info_bayar.ta=t.ta and t.status=1 and info_bayar.teller like '%$cr%'order by tanggal desc";
                break;
        }

    }else{$query="Select *,info_bayar.status as stus from info_bayar,info_form,ta t where info_bayar.nis=info_form.nis and info_bayar.teller!='' and info_bayar.ta=t.ta and t.status=1 order by tanggal desc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=1+$posisi;
    while($row=mysql_fetch_array($hasil))
    {
        if($row['stus']==1){$jk="<i class='icon-ok text-success'></i>";}else{$jk="<i class='icon-remove text-danger'></i>";}
        echo"<tr><td>$row[jenis]$row[kelas]$row[notrans]</font></td>".
            "<td>$row[nis]</td>".
            "<td>$row[nama]</td>".
            "<td>$row[idkelas]</td>".
            "<td>$row[smtr]</td>".
            "<td>$row[ta]</td>".
            "<td>$row[bulan]</td>".
            "<td>$row[jenis]</td>".
            "<td>$row[biaya]</td>".
            "<td>$row[teller]</td>".
            "<td>$jk</td></tr>";
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