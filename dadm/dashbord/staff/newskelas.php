<form class="form-horizontal" method='get' action='index.php?' enctype="multipart/form-data">

    <div style="margin: auto;width: 60%;border: 2px solid #c0c0c0;padding: 2%;">
        <center><h3>Input Kelas Siswa Baru</h3></center>
        <div class="control-group">
            <input type="text" name="content" value="kelas" class="hidden"/>
            <input type="text" name="mod" value="new" class="hidden"/>
            <label class="control-label">Jumlah yang akan dimasukkan</label>
            <div class="controls">
             <input type="text" class="input-large" name="juml"/>
            </div>
        </div>

        <div class="control-group">
            <div class="control">
                <button type="submit" class="btn btn-primary input-large"><i class="icon-check"></i>PROSES</button>
            </div>
        </div>
</form>
    <?php if($_GET['juml']!=''){?>
    <form method="post" action="../dashbord/staff/innewkelas.php" enctype="multipart/form-data">
        <input name="jumlah" value="<?php echo $_GET['juml']?>" class="hidden"/>
<div class="control-group">
    <div class="controls">
        <?php
        $jm=$_GET['juml'];
        $mlai=1;
        while($mlai<=$jm){
            echo"<input type='text' class='input-xlarge' name='nis$mlai' placeholder='$mlai.NIS'/>";
            $mlai++;
        }
        ?>
    </div>
</div>

        <select name="kelas" class="input-large">
            <option>Pilih Kelas</option>
            <?php
            $qhsl=mysql_query("select IdKelas from dafkelas");
            while($hsl=mysql_fetch_array($qhsl)){
                echo"<option value='$hsl[IdKelas]'>$hsl[IdKelas]</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-warning input-large"><i class="icon-check"></i> SIMPAN</button>
    </form>
    </div>
<?php
}
?>
