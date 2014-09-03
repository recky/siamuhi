
<script type="text/javascript">


    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=abklsx&key="+key;
        });
    }
</script>
    <?php
$mod=$_GET['mod'];
switch($mod){
    default:
?>
<form method="post" action="../dashbord/guru/inproab.php" enctype="multipart/form-data">
    <center><h3>Absensi Siswa</h3></center>
    <table width="100%" class="table table-bordered table-striped">
        <tr><td colspan="2" align="right">Kelas : <?php echo"$_GET[key]"; ?> </td>
            <td colspan="2" align="right">
                <select name="bulan">
                    <option value="">Pilih Bulan</option>
                    <?php
                    $sm=mysql_fetch_array(mysql_query("select IdSmtr from semester where status=1"));
                    switch($sm['IdSmtr']){
                        case 'GJL':
                            ?>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                            <option value="1">Januari</option>
                            <?php break;
                        case 'GNP':
                            ?>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <?php
                            break;
                    }
                    ?>
                </select></td><td><input type="text" name="pertemuan" placeholder="Jumlah Pertemuan"/></td>
            <td colspan="2">
            Kelas <select name="key" onclick="cari()" id="key" class="input-large">
            <option value=" ">Pilih Kelas</option>
            <?php
            $qkls=mysql_query("SELECT *FROM dafkelas WHERE substr( IdKelas, 1, 2 ) = '10'");
            while($rows=mysql_fetch_array($qkls)){
                echo"<option value=$rows[IdKelas]>$rows[IdKelas]</option>";
            }
            ?>
        </select>
        </td><td><a href="?content=abklsx&mod=l" class="btn btn-success"><i class="icon-zoom-in"></i>Lihat</a></td></tr>
        <tr align="center" style="background: #0074c7;">
            <th width=""><strong><center>No </center></strong></th>
            <th width=""><strong><center>NIS </center></strong></th>
            <th width=""><strong><center>Nama</center></strong></th>
            <th width=""><strong><center>Jenis Kelamin</center></strong></th>
            <th width=""><strong><center>Kehadiran</center></strong></th>
            <th width=""><strong><center>Sakit</center></strong></th>
            <th width=""><strong><center>Ijin</center></strong></th>
            <th width=""><strong><center>Absen</center></strong></th>
        </tr>

        <?php
        include "konek.php";
        $key=($_GET['key']);
        if($key!=''){
            $query="Select * from info_biodata b,kelas k,semester s,ta t where b.nis=k.nis and k.ta=t.ta and t.status=1 and s.status=1 and k.idkelas='$key' order by b.nis asc";
        }

        $hasil=mysql_query($query);
        $no=1;
        while($row=mysql_fetch_array($hasil))
        {

            if($row['JK']=='L'){$jk='Laki-laki';}elseif($row['JK']=='P'){$jk='Perempuan';}else{$jk='';}
            echo"<tr><td>$no</font></td>".
                "<td>$row[NIS]</td>".
                "<td>$row[nama]</td>".
                "<td>$jk</td>".
                "<td><input type='text' name='hadir$no' /></td>".
                "<td><input type='text' name='s$no' /></td>".
                "<td><input type='text' name='i$no'/></td>".
                "<td><input type='text' name='a$no'/></td>".
                "</tr>";
            echo"<input type='text' name='nis$no' value='$row[NIS]' class='hidden'/>";
            $no=$no+1;
        }
        echo"<input type='text' name='kelas' value='$_GET[key]' class='hidden'/>";
        echo"<input type='text' name='jml' value='$no' class='hidden'/>";

        ?>
        <tr><td colspan="8"><button type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> SIMPAN</button> </td></tr>
    </table>
</form>
        <?php
break;
    case 'l':
        include"labsenx.php";
        break;

}
?>