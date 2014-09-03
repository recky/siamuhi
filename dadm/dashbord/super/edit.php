
<?php
include "konek.php";
$ide=$_GET['id'];
$query="Select * from ad_login where id=$ide";
$hasil=mysql_query($query);
$row=mysql_fetch_array($hasil);
?>


<script type="text/javascript">
    function hilang(){
        $("#edit").hide("slow");
        window.location="?content=lihat"
    }

</script>

  <div class="container-fluid">
    <div class="row-fluid">

        <form  class="form-horizontal  well" method='post' action='../dashbord/super/edproses.php' enctype="multipart/form-data">
            <a href="#" onclick="hilang()"><img src="assets/img/clear.png"  onload="hilang()"/></a>
            <div id="edit" style="margin: auto;width: 30%;border: 2px solid #c0c0c0;padding: 2%">
                <center><h3>Input User</h3></center>
                <input type="text" name="id" value="<?php echo $row['id'];?>" class="hide"/>
                <div class="control-group">
                    <label class="control-label">NIK</label>
                    <div class="controls">

                        <select tabindex="5" class="chzn-select input-xlarge" name="nik"data-placeholder="Pilih NIK">
                            <option value=""></option>
                            <?php
                            include ("konek.php");
                            $qnik="select * from staff";
                            $hslnik=mysql_query($qnik);
                            while($rownik=mysql_fetch_array($hslnik)){
                                if ($row[nik]==$rownik[nik]){$sel="selected='selected'";}else{$sel='';}

                                echo "<option value='$rownik[nik]' $sel >$rownik[nik]</option>";


                            };

                            ?>

                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Username</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="username" placeholder="Wajib diisi..." value="<?php echo $row['username']?>"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Hak Akses</label>
                    <div class="controls">
                        <select class="input-xlarge" name="hak">
                            <option value="">Pilih Akses</option>
                            <option value="0"<?php if($row['hak']==0){echo'selected=selected';}?>>Super Admin</option>
                            <option value="1"<?php if($row['hak']==1){echo'selected=selected';}?>>Staff Tata Usaha</option>
                            <option value="2"<?php if($row['hak']==2){echo'selected=selected';}?>>Guru</option>
                            <option value="3"<?php if($row['hak']==3){echo'selected=selected';}?>>Loker Pembayaran</option>
                        </select>
                    </div>
                </div>
                <br/>
                <div class="control-group">
                    <div class="control">
                        <button type="submit" class="btn btn-primary input-xlarge"><i class="icon-check"></i>SIMPAN</button>
                    </div>
                </div>

            </div>
        </form>


    </div>
</div>

