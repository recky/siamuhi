<head>
    <script type="text/javascript">
        $(document).ready(function(){
            var
                    snd =$("#ThnAjar").val();
            $('#ThnAjar').change(function(){
                snd =$("#ThnAjar").val();
                //alert($("#ThnAjar").val());
                window.location="index.php?content=bayar&zoner=rekappembayaran&TA="+snd;
            })
        })
    </script>

</head>
    <body>
<div class="container-fluid">
    <br/><br/>
    <center><h3>Rekap Pembayaran</h3></center>
   <div class="pull-right"> <b>Tahun Ajaran
<select name='TA' class='input-medium'id='ThnAjar'>
    <option value="">Semua</option>;
       <? $id=($_SESSION['id']);

       $qu="SELECT distinct ta from info_bayar,info_form where info_bayar.nis=info_form.nis and info_bayar.status='1' and info_form.iduser='$id'";
       $hsl=mysql_query($qu);

       while($ta=mysql_fetch_array($hsl)){
           if($_GET['TA']==$ta['ta']){$sel="selected='selected'";}else{$sel="";}
           echo '<option value="'.$ta['ta'].'"'.$sel.'>'.$ta[ta].'</option>';
       }
       ?>
       </select>
</div>
</div>
<table width="100%" class="table">
            <tr align="center" style="background: #0074c7;">
                <th width=""><strong><p align="center">No Transaksi</strong></th>
                <th width=""><strong><p align="center">Kelas </strong></th>
                <th width=""><strong><p align="center">Semester</strong></th>
                <th width=""><strong><p align="center">TA</strong></th>
                <th width=""><strong><p align="center">Bulan</strong></th>
                <th width=""><strong><p align="center">Tanggal</strong></th>
                <th width=""><strong><p align="center">Batas</strong></th>
                <th width=""><strong><p align="center">Jenis</strong></th>
                <th width=""colspan="2"><strong><p align="center">Biaya</strong></th>
                <th width=""><strong><p align="center">Teller</strong></th>
                <th width=""><strong><p align="center">Status</strong></th>
            </tr>
            <?php
            include "../konek.php";
            $p      = new Paging;
            $batas  = 10;
            $posisi = $p->cariPosisi($batas);

            $id=($_SESSION['id']);
            $CTA=$_GET['TA'];
            if($CTA==''){
                $query="Select * from info_bayar,info_form where info_bayar.nis=info_form.nis and info_bayar.status='1' and info_form.iduser='$id' order by idkelas desc";
            }else{
                $query="Select * from info_bayar,info_form where info_bayar.nis=info_form.nis and info_bayar.status='1' and info_form.iduser='$id' and info_bayar.ta='$CTA'";
            }
            $query1=$p->buatLimit($query,$posisi,$batas);
            $hasil=mysql_query($query1);
            $total=0;
            while($row=mysql_fetch_array($hasil))
            {
                switch($row['bulan']){
                    case 1:$bulan="Januari";
                    break;
                    case 2:$bulan="Februari";
                        break;
                    case 3:$bulan="Maret";
                        break;
                    case 4:$bulan="April";
                        break;
                    case 5:$bulan="Mei";
                        break;
                    case 6:$bulan="Juni";
                        break;
                    case 7:$bulan="Juli";
                        break;
                    case 8:$bulan="Agustus";
                        break;
                    case 9:$bulan="September";
                        break;
                    case 10:$bulan="Oktober";
                        break;
                    case 11:$bulan="November";
                        break;
                    case 12:$bulan="Desember";
                        break;
                }
                if($row['smtr']=="Ganjil"){
                    $bts=substr($row['ta'],0,4)." - ".$row['bulan']." - ".$row['batas'];
                }else{
                    $bts=substr($row['ta'],5,4)." - ".$row['bulan']." - ".$row['batas'];
                }
                if($row['status']==1){$status="LUNAS";}
                echo"<tr><td>$row[jenis]$row[kelas]$row[notrans]</font></td>".
                    "<td>$row[idkelas]</td>".
                    "<td>$row[smtr]</td>".
                    "<td>$row[ta]</td>".
                    "<td>$bulan</td>".
                    "<td>$row[tanggal]</td>".
                    "<td>$bts</td>".
                    "<td>$row[jenis]</td>".
                    "<td>Rp. </td>".
                    "<td><p align='right'>$row[biaya]</td>".
                    "<td>$row[teller]</td>".
                    "<td><p align='center'>$status</p></td></tr>";
                $total=$total+$row['biaya'];
            }


            ?>
    <tr><td colspan="2"><b>T O T A L</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Rp.</td>
        <td><b><p align="right"><?php echo $total?></b></td>
        <td></td>
        <td></td>
        <td></td>
</tr>
        </table></div>
<?php
$jmldata = mysql_num_rows(mysql_query($query));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

echo "<div id=paging>Hal : $linkHalaman</div><br>";

?>
    </body>