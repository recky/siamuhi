
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
            window.location="index.php?content=kelas&mod=pk&cari="+cari+"&key="+key;
        });
    }
</script>
<center><h3>Data Siswa</h3></center>

<table width="100%" class="table table-bordered table-striped">
    <tr><td colspan="5" align="center">
        <h4>Tahun Ajaran <?php echo "$_GET[key]"?></h4> </td><td colspan="2">
        Kelas <select name="cari" id="cari">
        <option value="al">Pilih Kelas</option>
        <?php
        $hkls=mysql_query("SELECT IdKelas from dafkelas group by IdKelas");
        while($rowkls=mysql_fetch_array($hkls)){
        echo"<option value=$rowkls[IdKelas]>$rowkls[IdKelas]</option>";
        }
        ?>
    </select><td colspan="2">
        Tahun Ajaran<select name="key" onclick="cari()" id="key">
        <option value=" ">Pilih TA</option>
        <?php
        $hta=mysql_query("SELECT TA from TA group by TA");
        while($rowta=mysql_fetch_array($hta)){
            echo"<option value=$rowta[TA]>$rowta[TA]</option>";
        }
        ?>
    </select>
        <form action="../dashbord/staff/prokelas.php" method="post">
    </td></tr>
     <tr align="center" style="background: #0074c7;">
        <th width=""><strong><center>No </center></strong></th>
        <th width=""><strong><center>NIS </center></strong></th>
        <th width=""><strong><center>Nama</center></strong></th>
        <th width=""><strong><center>Jenis Kelamin</center></strong></th>
        <th width=""><strong><center>Jurusan</center></strong></th>
        <th width=""><strong><center>Angkatan</center></strong></th>
        <th width=""><strong><center>Kelas</center></strong></th>
        <th width=""><strong><center>Pilih Kelas</center></strong></th>
    </tr>

    <?php
    include "konek.php";
    $key=($_GET['key']);
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $cr=(strtolower($_GET['cari']));

    if($cr!=''){
        if($cr=='al'){
            $query="Select i.nis,i.nama,i.jk,j.program,k.idkelas,i.Angkatan from info_biodata i, jurusan j, kelas k,ta t where i.idjurusan=j.idjurusan and i.nis=k.nis and t.ta=k.ta and t.ta='$key' order by i.nis asc";
        }else{
            $query="Select i.nis,i.nama,i.jk,j.program,k.idkelas,i.Angkatan from info_biodata i, jurusan j, kelas k,ta t where i.idjurusan=j.idjurusan and i.nis=k.nis and t.ta=k.ta and t.ta='$key' and k.idkelas='$cr'order by i.nis asc";
        }



    }else{$query="Select i.nis,i.nama,i.jk,j.program,k.idkelas,i.Angkatan from info_biodata i, jurusan j, kelas k,ta t where i.idjurusan=j.idjurusan and i.nis=k.nis and t.ta=k.ta and t.status=1 order by i.nis asc";}
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=$posisi+1;
    while($row=mysql_fetch_array($hasil))
    {
       $pbd=substr($row['idkelas'],0,2);
        switch($pbd){
            case'10':  $qkle=mysql_query("select IdKelas from dafkelas where (substr(IdKelas,1,2))>=10 and (substr(IdKelas,1,2))<12 order by IdKelas");
                break;
            case'11':  $qkle=mysql_query("select IdKelas from dafkelas where (substr(IdKelas,1,2))>=11 and (substr(IdKelas,1,2))<=12 order by IdKelas");
                break;
            case'12':  $qkle=mysql_query("select IdKelas from dafkelas where (substr(IdKelas,1,2))>=12 order by IdKelas");
                break;
        }

        if($row['JK']=='L'){$jk='Laki-laki';}elseif($row['JK']=='P'){$jk='Perempuan';}else{$jk='';}

        echo"<input type='text' name=i$no value=$row[NIS] class='hidden'/>".
            "<tr><td>$no</font></td>".
            "<td>$row[NIS]</td>".
            "<td>$row[nama]</td>".
            "<td>$jk</td>".
            "<td>$row[program]</td>".
            "<td>$row[Angkatan]</td>".
            "<td>$row[idkelas]</td>".
            "<td><select name='kelas$no' class='input-medium'><option>Pilih Kelas</option>";
             while($kle=mysql_fetch_array($qkle)){
                 if($row['idkelas']==$kle['IdKelas']){$sel="selected=selected";}else{$sel='';}
                 echo"<option ".$sel." value='$kle[IdKelas]'>$kle[IdKelas]</option>";
            }
            echo "</select></td></tr>";

        $no=$no+1;
    }
    $no=$no-1;
       echo"<input type='text' name=total value=$no class='hidden'/>";

    ?>
 <tr>
     <td colspan="8"><button class="btn btn-primary pull-right" type="submit"><i class="icon-ok"></i> SIMPAN</button></td>
 </tr>
</table>
  <?php
$jmldata = mysql_num_rows(mysql_query("Select i.nis,i.nama,i.jk,j.program,k.idkelas,i.Angkatan from info_biodata i, jurusan j, kelas k,ta t where i.idjurusan=j.idjurusan and i.nis=k.nis and t.ta=k.ta and t.status=1 order by i.nis asc"));

$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman1($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";
?>
    </form>
