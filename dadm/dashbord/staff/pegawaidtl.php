
<script type="text/javascript">
    function hilange(){
        $("#editprof").hide("slow");
        history.back(0);
    }

</script>

<div class="container-fluid">
    <div class="row-fluid">
        <div id="editprof" style="margin: auto;width: 40%;border: 2px solid #c0c0c0;padding: 2%">
                <a href="#" onclick="hilange()"><img src="assets/img/clear.png" /></a>

                <center><h3>Profile</h3></center>
                <input type="text" name="id" value="<?php echo $row['id'];?>" class="hide"/>
                <div class="control-group">
                    <div class="control">
                        <?php
                        include "konek.php";
                        $id=$_GET["id"];
                        $qprof="select * from staff where nik=$id";
                        $hslpro=mysql_query($qprof);
                        $rowpro=mysql_fetch_array($hslpro);
                        if($rowpro['url']!=''){
                            $alfoto=$rowpro['url'];
                        }else{
                            $alfoto="foto/default.png";
                        }

                        ?>

                        <img src="<?php echo $alfoto ?>" width="100%" />

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">NIK</label>
                    <div class="controls">
                        <input type="text" name="nik" class="input-xxlarge" value="<?php echo $rowpro['nik'];?>" readonly="true"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Nama</label>
                    <div class="controls">
                        <input type="text" name="nama" class="input-xxlarge" placeholder="Wajib diisi..." value="<?php echo $rowpro['nama'];?>" readonly="true"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <div class="controls">
                        <select name="jk" class="input-xxlarge" disabled="disabled">
                            <option <?php if ($rowpro['jk']=='Pil'){echo 'selected=selected';}?>> Pilihlah</option>
                            <option value="L" <?php if ($rowpro['jk']=='L'){echo 'selected=selected';}?>> Laki-laki</option>
                            <option value="P" <?php if ($rowpro['jk']=='P'){echo 'selected=selected';}?>> Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Alamat</label>
                    <div class="controls">
                        <input type="text" name="alamat" class="input-xxlarge" placeholder="Wajib diisi..." value="<?php echo $rowpro['alamat'];?>" readonly="true"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Telp / HP</label>
                    <div class="controls">
                        <input type="text" name="hp" class="input-xxlarge" placeholder="Wajib diisi..." value="<?php echo $rowpro['hp'];?>" readonly="true"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Jabatan</label>
                    <div class="controls">
                        <input type="text" name="jabatan" class="input-xxlarge" placeholder="Wajib diisi..." value="<?php echo $rowpro['jabatan'];?>" readonly="true"/>
                    </div>
                </div>
                <br/>
                <div class="control-group">
                    <div class="control">
                        <a href="?content=dtpegawai" class="btn btn-primary input-xxlarge"><i class="icon-backward"></i>KEMBALI</a>
                    </div>
                </div>


        </div>
    </div>
</div>