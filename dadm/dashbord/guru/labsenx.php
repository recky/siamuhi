
<script type="text/javascript">


    function cari(){
        $('#key').change(function(){
            var cari =$("#cari").val();
            var key =$("#key").val();
            //alert($("#ThnAjar").val());
            window.location="index.php?content=abklsx&mod=l&key="+key;
        });
    }
</script>
<form method="post" action="../dashbord/guru/udproab.php" enctype="multipart/form-data">
             <center><h3>Lihat Absensi Siswa</h3></center>
            <table width="100%" class="table table-bordered table-striped">
                <tr><td colspan="11">
                        Kelas <select name="key" onclick="cari()" id="key" class="input-large">
                        <option value=" ">Pilih Kelas</option>
                        <?php
                        $qkls=mysql_query("SELECT *FROM dafkelas WHERE substr( IdKelas, 1, 2 ) = '10'");
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
                    <th width=""><strong><center>Tahun Ajaran</center></strong></th>
                    <th width=""><strong><center>Bulan</center></strong></th>
                    <th width=""><strong><center>Pertemuan</center></strong></th>
                    <th width=""><strong><center>Kehadiran</center></strong></th>
                    <th width=""><strong><center>Sakit</center></strong></th>
                    <th width=""><strong><center>Ijin</center></strong></th>
                    <th width=""><strong><center>Absen</center></strong></th>

                </tr>

                <?php
                include "konek.php";
                $key=($_GET['key']);
                if($key!=''){
                    $query="Select * from info_biodata b,info_absensi a where b.nis=a.nis and a.idkelas='$key' order by b.nis asc";
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
                        "<td>$row[ta]</td>".
                        "<td><input type='text' class='input-small' value='$row[bulan]' name='bulan$no''/></td>".
                        "<td><input type='text' class='input-small' value='$row[pertemuan]' name='pertemuan$no''/></td>".
                        "<td><input type='text' class='input-small' value='$row[kehadiran]' name='hadir$no''/></td>".
                        "<td><input type='text' class='input-small' value='$row[s]' name='s$no''/></td>".
                        "<td><input type='text' class='input-small' value='$row[i]' name='i$no''/></td>".
                        "<td><input type='text' class='input-small' value='$row[a]' name='a$no''/></td></tr>";

                    echo"<input type='text' name='idab$no' value='$row[idabsensi]' class='hidden'/>";
                    $no=$no+1;
                }
                echo"<input type='text' name='jml' value='$no' class='hidden'/>";

                ?>
                <tr><td colspan="11"><a href="?content=abklsx" class="btn btn-success"><i class="icon-backward"></i>KEMBALI</a> <button type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> SIMPAN</button> </td></tr>
            </table>
        </form>