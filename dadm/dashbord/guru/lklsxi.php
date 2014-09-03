
<script type="text/javascript">


    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=inklsxi&key="+key;
        });
    }
</script>
<form method="post" action="../dashbord/guru/inproni.php" enctype="multipart/form-data">
    <center><h3>Nilai Siswa</h3></center>
    <table width="100%" class="table table-bordered table-striped">
        <tr><td colspan="6" align="right"> </td><td colspan="2">
            Kelas <select name="key" onclick="cari()" id="key" class="input-large">
            <option value=" ">Pilih Kelas</option>
            <?php
            $qkls=mysql_query("SELECT *FROM dafkelas WHERE substr( IdKelas, 1, 2 ) = '11'");
            while($rows=mysql_fetch_array($qkls)){
                echo"<option value=$rows[IdKelas]>$rows[IdKelas]</option>";
            }
            ?>
        </select>
        </td></tr>
        <tr align="center" style="background: #0074c7;">
            <th width=""><strong><center>No </center></strong></th>
            <th width=""><strong><center>NIS </center></strong></th>
            <th width=""><strong><center>Nama</center></strong></th>
            <th width=""><strong><center>Jenis Kelamin</center></strong></th>
            <th width=""><strong><center>Mata Pelajaran</center></strong></th>
            <th width=""><strong><center>Nilai UTS</center></strong></th>
            <th width=""><strong><center>Nilai UAS</center></strong></th>
            <th width=""><strong><center>Nilai Akhir</center></strong></th>
        </tr>

        <?php
        include "konek.php";
        $p      = new Paging;
        $batas  = 10;
        $posisi = $p->cariPosisi($batas);
        session_start();
        $id=$_SESSION['id'];
        $nik=mysql_fetch_array(mysql_query("select nik from ad_login where id='$id'"));
        $key=($_GET['key']);
        if($key!=''){
            $query="Select * from transkip n,info_biodata b, jadwal j,pengajar p,mapel m where b.nis=n.nis and n.idkelas=j.idkelas and n.kodemapel=j.kodemapel and p.kodemapel=n.kodemapel and m.kodemapel=n.kodemapel and p.nik='$nik[nik]' and n.idkelas='$key' order by b.nis asc";
        }
        $query1=$p->buatLimit($query,$posisi,$batas);
        $hasil=mysql_query($query1);
        $no=1+$posisi;
        while($row=mysql_fetch_array($hasil))
        {

            if($row['JK']=='L'){$jk='Laki-laki';}elseif($row['JK']=='P'){$jk='Perempuan';}else{$jk='';}
            echo"<tr><td>$no</font></td>".
                "<td>$row[NIS]</td>".
                "<td>$row[nama]</td>".
                "<td>$jk</td>".
                "<td>$row[Mapel]</td>".
                "<td><input type='text' name='uts$no' value='$row[UTS]'/></td>".
                "<td><input type='text' name='uas$no'value='$row[UAS]'/></td>".
                "<td><input type='text' name='nilai$no'value='$row[Nilai]'/></td>".
                "</tr>";
            echo"<input type='text' name='idtranskip$no' value='$row[IdTranskip]' class='hidden'/>";
            $no=$no+1;
        }
        echo"<input type='text' name='jml' value='$no' class='hidden'/>";

        ?>
        <tr><td colspan="8"><button type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> SIMPAN</button> </td></tr>
    </table>
    <?php
    $jmldata = mysql_num_rows(mysql_query($query));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal : $linkHalaman</div><br>";

    ?>
</form>