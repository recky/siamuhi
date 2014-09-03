<head>
    <script type="text/javascript">
        $(document).ready(function(){
            var
                    snd =$("#Kelas").val();
            $('#Kelas').change(function(){
                snd =$("#Kelas").val();
                //alert($("#ThnAjar").val());
                window.location="index.php?content=nilai&zoner=transkipnilai&Kelas="+snd;
            })
        })
    </script>

</head>
<body>
<div class="container-fluid">
    <br/><br/>
    <center><h3>Transkip Nilai</h3></center>
    <div class="pull-right">
        <b>Kelas
        <select name='Kelas' class='input-medium'id='Kelas'>
            <option value="">Semua</option>;
            <? $id=($_SESSION['id']);

            $qu="SELECT distinct idkelas from info_nilai,info_form where info_nilai.nis=info_form.nis and info_nilai.nilai!='' and info_form.iduser='$id' order by idkelas asc";
            $hsl=mysql_query($qu);

            while($ta=mysql_fetch_array($hsl)){
                if($_GET['Kelas']==$ta['idkelas']){$sel="selected='selected'";}else{$sel="";}
                echo '<option value="'.$ta['idkelas'].'"'.$sel.'>'.$ta[idkelas].'</option>';
            }
            ?>
        </select>
    </div>
</div>
<table width="100%" class="table">
    <tr align="center" style="background: #0074c7;">
        <th width=""><strong>No </strong></th>
        <th width=""><strong>Kelas </strong></th>
        <th width=""><strong>Semester</strong></th>
        <th width=""><strong>TA</strong></th>
        <th width=""><strong>Mapel</strong></th>
        <th width=""><strong>UTS</strong></th>
        <th width=""><strong>UAS</strong></th>
        <th width=""><strong>Nilai</strong></th>
        <th width=""><strong>Status</strong></th>

    </tr>
    <?php
    include "../konek.php";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $id=($_SESSION['id']);
    $CTA=$_GET['Kelas'];
    if($CTA==''){
        $query="Select * from info_nilai,info_form where info_nilai.nis=info_form.nis and info_nilai.nilai!='' and info_form.iduser='$id' order by idkelas desc";
    }else{
        $query=" Select * from info_nilai,info_form where info_nilai.nis=info_form.nis and info_nilai.nilai!='' and info_form.iduser='$id' and info_nilai.idkelas='$CTA' order by idkelas asc";
         }
    $query1=$p->buatLimit($query,$posisi,$batas);
    $hasil=mysql_query($query1);
    $no=1+$posisi;
    $nil=0;
    while($row=mysql_fetch_array($hasil))
    {
        if($row['nilai']<$row['kkm']){$status="Belum";$col='bgcolor=#b94a48';}else{$status="Lulus";}
        echo"<tr $col><td>$no</font></td>".
            "<td>$row[idkelas]</td>".
            "<td>$row[Smtr]</td>".
            "<td>$row[ta]</td>".
            "<td>$row[mapel]</td>".
            "<td>$row[uts]</td>".
            "<td>$row[uas]</td>".
            "<td>$row[nilai]</td>".
            "<td><p align='center'>$status</p></td></tr>";
        $nil=$nil+$row['nilai'];
        $no=$no+1;

    }


    ?>
<tr><td colspan="2"><strong>Total Nilai : <?php echo $nil;?></strong></td><td colspan="2"><strong>Rata-rata Nilai : <?php echo round(($nil/($no-1)),2);?><strong></td> </tr>
</table>
<?php
$jmldata = mysql_num_rows(mysql_query($query));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";

?>
</div>

</body>