

<script type="text/javascript">
    function hilange(){
        $("#editprof").hide("slow");
        history.back(0);
    }

</script>

<div class="container-fluid">
    <div class="row-fluid">
        <div id="editprof" style="margin: auto;width: 30%;border: 2px solid #c0c0c0;padding: 2%">
            <a href="#" onclick="hilange()"><img src="assets/img/clear.png" /></a>

            <center><h3>Profile</h3></center>

            <?php
            include "konek.php";
            $qsiswa="select * from info_biodata where NIS='$_GET[id]'";
            $hslsis=mysql_query($qsiswa);
            $rowsiswa=mysql_fetch_array($hslsis);

            if($rowsiswa['url']!=true){
                $alfoto="../../foto/default.png";
            }else{
                $alfoto="../../user/".$rowsiswa['url'];
            }
            ?>

            <center>
                <img src="<?php echo $alfoto;?>"width="150"/>
             </center>
            <br/>

            <div class="control-group">
                <label class="control-label">NIS</label>

                <div class="controls">
                    <?php
                    echo "<input type='text' class='input-xlarge' id='nis' name='nis' value='$rowsiswa[NIS]' readonly='true'>";

                    ?>


                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Nama Lengkap</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="nama" name="nama" value="<?php echo $rowsiswa['nama']?>">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Jenis Kelamin</label>

                <div class="controls input-xlarge">
                    <?php
                    if($rowsiswa['JK']=='L'){
                        echo "<input type='radio' name='jk' value='L' checked='checked'>&nbsp Laki-laki  ";
                        echo "<input type='radio' name='jk' value='P'>&nbsp Perempuan";
                    }else{
                        echo "<input type='radio' name='jk' value='L'>&nbsp Laki-laki  ";
                        echo "<input type='radio' name='jk' value='P' checked='checked'>&nbsp Perempuan";
                    }
                    ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Tempat, tanggal lahir</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="tempat" name="tempat" value="<?php echo $rowsiswa['Tmplahir']?>">,
                    <input type="text" class="input-xlarge" id="tanggal" name="tgl" value="<?php echo $rowsiswa['TglLahir']?>">


                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Jurusan</label>

                <div class="controls">
                    <select name="idjurusan" id="jurusan" class="input-xlarge">
                        <option value="">Pilih Jurusan</option>
                        <?php
                        include "konek.php";
                        $qjrs="select * from jurusan ";
                        $hsljur=mysql_query($qjrs);
                        while($rowjrs=mysql_fetch_array($hsljur)){
                            if ($rowsiswa[IdJurusan]==$rowjrs[IdJurusan]){$sel="selected='selected'";}else{$sel='';}

                            echo "<option value='$rowjrs[IdJurusan]' $sel >$rowjrs[Program]</option>";

                        };

                        ?>

                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Angkatan</label>

                <div class="controls">
                    <select name="angkatan" id="angkatan" class="input-xlarge">
                        <option value="">Pilih Angkatan</option>
                        <?php
                        $thn=2000;
                        while($thn!=2015){
                            if ($rowsiswa[Angkatan]==$thn){$sel1="selected='selected'";}else{$sel1='';}
                            echo "<option value='$thn' $sel1 >$thn</option>";
                            $thn++;
                        };
                        ?>

                    </select>

                </div>
            </div>


            <u><h3>Asal Sekolah :</h3></u><br/>

            <div class="control-group">
                <label class="control-label">SMP/MTS</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="sekolah" name="sekolah" value="<?php echo $rowsiswa['Sekolah']?>">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="alsekolah" name="alsekolah" value="<?php echo $rowsiswa['AlamatSekolah']?>">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Nomor Ijazah</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="noijasah" name="noijasah" value="<?php echo $rowsiswa['NoIjasah']?>">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Nomor SKHUN</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="noskhun" name="noskhun" value="<?php echo $rowsiswa['NoSKHUN']?>">

                </div>
            </div>


            <div class="control-group">
                <label class="control-label">Agama</label>

                <div class="controls">
                    <select name="agama" id="agama" class="input-xlarge">
                        <option value="">Agama</option>
                        <option value="islam" <?php if ($rowsiswa['Agama']=='islam') echo 'selected=selected'; ?> >Islam</option>
                        <option value="kristen" <?php if ($rowsiswa['Agama']=='kristen') echo 'selected=selected'; ?>>Kristen</option>
                        <option value="hindu" <?php if ($rowsiswa['Agama']=='hindu') echo 'selected=selected'; ?>>Hindu</option>
                        <option value="budha" <?php if ($rowsiswa['Agama']=='budha') echo 'selected=selected'; ?>>Budha</option>
                        <option value="tionghoa" <?php if ($rowsiswa['Agama']=='tionghoa') echo 'selected=selected'; ?>>Tionghoa</option>
                    </select>

                </div>

            </div>
            <div class="control-group">
                <label class="control-label">Status dalam keluarga / anak ke</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="status" name="status" value="<?php echo $rowsiswa['Status']?>">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="alamat" name="alamat" value="<?php echo $rowsiswa['Alamat']?>">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Kabupaten</label>

                <div class="controls">
                    <?php include('kodepos.php');?>
                </div>

            </div>


            <div class="control-group">
                <label class="control-label">No Telp / HP</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="tlp" name="tlp" value="<?php echo $rowsiswa['NoTelp']?>">

                </div>
            </div>



            <div class="control-group">
                <label class="control-label">Cita-cita</label>

                <div class="controls">
                    <select name="cita" id="cita" class="input-xlarge">
                        <option value="">Cita-Cita</option>
                        <option value="PNS" <?php if ($rowsiswa['Cita']=='PNS') echo 'selected=selected'; ?>>PNS</option>
                        <option value="TNI/POLRI" <?php if ($rowsiswa['Cita']=='TN/POLRI') echo 'selected=selected'; ?>>TNI/POLRI</option>
                        <option value="Guru/dosen" <?php if ($rowsiswa['Cita']=='Guru/dosen') echo 'selected=selected'; ?>>Guru/Dosen</option>
                        <option value="Dokter <?php if ($rowsiswa['Cita']=='Dokter') echo 'selected=selected'; ?>">Dokter</option>
                        <option value="Politikus" <?php if ($rowsiswa['Cita']=='Politikus') echo 'selected=selected'; ?>>Politikus</option>
                        <option value="Wiraswasta" <?php if ($rowsiswa['Cita']=='Wiraswasta') echo 'selected=selected'; ?>>Wiraswasta</option>
                        <option value="Seniman" <?php if ($rowsiswa['Cita']=='Seniman') echo 'selected=selected'; ?>>Seniman</option>
                        <option value="Lainnya" <?php if ($rowsiswa['Cita']=='Lainnya') echo 'selected=selected'; ?>>Lainnya</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Hobi</label>

                <div class="controls">
                    <select name="hobi" id="hobi" class="input-xlarge">
                        <option value="">Hobi</option>
                        <option value="Olahraga" <?php if ($rowsiswa['Hobi']=='Olahraga') echo 'selected=selected'; ?>>Olahraga</option>
                        <option value="Kesenian" <?php if ($rowsiswa['Hobi']=='Kesenian') echo 'selected=selected'; ?>>Kesenian</option>
                        <option value="Menulis" <?php if ($rowsiswa['Hobi']=='Menulis') echo 'selected=selected'; ?>>Menulis</option>
                        <option value="Travelling" <?php if ($rowsiswa['Hobi']=='Travelling') echo 'selected=selected'; ?>>Travelling</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Jarak ke Sekolah</label>

                <div class="controls">
                    <select name="jarak" id="jarak" class="input-xlarge">
                        <option value="">Jarak</option>
                        <option value="0-1 km" <?php if ($rowsiswa['Jarak']=='0-1 km') echo 'selected=selected'; ?>>0-1 km</option>
                        <option value="1-3 km"  <?php if ($rowsiswa['Jarak']=='1-3 km') echo 'selected=selected'; ?>>1-3 km</option>
                        <option value="3-5 km"  <?php if ($rowsiswa['Jarak']=='3-5 km') echo 'selected=selected'; ?>>3-5 km</option>
                        <option value="5-10 km"  <?php if ($rowsiswa['Jarak']=='5-10 km') echo 'selected=selected'; ?>>5-10 km</option>
                        <option value=">10 km" <?php if ($rowsiswa['Jarak']=='>10 km') echo 'selected=selected'; ?>>lebih dari 10 km</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Transportasi</label>

                <div class="controls">
                    <select name="transportasi" id="transportasi" class="input-xlarge">
                        <option value="">Transportasi</option>
                        <option value="Jalan kaki"  <?php if ($rowsiswa['Transportasi']=='Jalan kaki') echo 'selected=selected'; ?>>Jalan Kaki</option>
                        <option value="Sepeda" <?php if ($rowsiswa['Transportasi']=='Sepeda') echo 'selected=selected'; ?>>Sepeda</option>
                        <option value="Motor" <?php if ($rowsiswa['Transportasi']=='Motor') echo 'selected=selected'; ?>>Motor</option>
                        <option value="Mobil Pribadi" <?php if ($rowsiswa['Transportasi']=='Mobil Pribadi') echo 'selected=selected'; ?>>Mobil Pribadi</option>
                        <option value="Antar Jemput" <?php if ($rowsiswa['Transportasi']=='Antar Jemput') echo 'selected=selected'; ?>>Antar jemput</option>
                        <option value="Angkutan Umum" <?php if ($rowsiswa['Transportasi']=='Angkutan Umum') echo 'selected=selected'; ?>>Angkutan umum</option>
                        <option value="Lainnya" <?php if ($rowsiswa['Transportasi']=='Lainnya') echo 'selected=selected'; ?>>Lainnya</option>
                    </select>

                </div>

            </div>
            <div class="control-group">
                <label class="control-label">Nama Ayah</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="namaayah" name="namaayah" value="<?php echo $rowsiswa['NmAyah']?>">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nama Ibu</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="namaibu" name="namaibu" value="<?php echo $rowsiswa['NmIbu']?>">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Pekerjaan Ayah</label>

                <div class="controls">
                    <select name="pkrjayah" id="pkrjayah" class="input-xlarge">
                        <option value="">Pekerjaan</option>
                        <option value="PNS" <?php if ($rowsiswa['PkrjAyah']=='PNS') echo 'selected=selected'; ?>>PNS</option>
                        <option value="TNI/POLRI" <?php if ($rowsiswa['PkrjAyah']=='TNI/POLRI') echo 'selected=selected'; ?>>TNI/POLRI</option>
                        <option value="Guru/dosen" <?php if ($rowsiswa['PkrjAyah']=='Guru/dosen') echo 'selected=selected'; ?>>Guru/dosen</option>
                        <option value="Dokter" <?php if ($rowsiswa['PkrjAyah']=='Dokter') echo 'selected=selected'; ?>>Dokter</option>
                        <option value="Politikus" <?php if ($rowsiswa['PkrjAyah']=='Politikus') echo 'selected=selected'; ?>>Politikus</option>
                        <option value="Pedagang/Wiraswasta" <?php if ($rowsiswa['PkrjAyah']=='Pedagang/wiraswasta') echo 'selected=selected'; ?>>Pedagang/wiraswasta</option>
                        <option value="Petani/peternak" <?php if ($rowsiswa['PkrjAyah']=='PNS') echo 'selected=selected'; ?>>Petani/peternak</option>
                        <option value="Seniman" <?php if ($rowsiswa['PkrjAyah']=='Seniman') echo 'selected=selected'; ?>>Seniman</option>
                        <option value="Buruh" <?php if ($rowsiswa['Pkrjayah']=='Buruh') echo 'selected=selected'; ?>>Buruh</option>
                        <option value="Di rumah saja" <?php if ($rowsiswa['PkrjAyah']=='Di rumah saja') echo 'selected=selected'; ?>>Di rumah saja</option>
                        <option value="Lainnya" <?php if ($rowsiswa['PkrjAyah']=='Lainnya') echo 'selected=selected'; ?>>Lainnya</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Pekerjaan Ibu</label>

                <div class="controls">
                    <select name="pkrjibu" id="pkrjibu" class="input-xlarge">
                        <option value="">Pekerjaan</option>
                        <option value="PNS" <?php if ($rowsiswa['PkrIbu']=='PNS') echo 'selected=selected'; ?>>PNS</option>
                        <option value="TNI/POLRI" <?php if ($rowsiswa['PkrjIbu']=='TNI/POLRI') echo 'selected=selected'; ?>>TNI/POLRI</option>
                        <option value="Guru/dosen" <?php if ($rowsiswa['PkrjIbu']=='Guru/dosen') echo 'selected=selected'; ?>>Guru/dosen</option>
                        <option value="Dokter" <?php if ($rowsiswa['PkrjIbu']=='Dokter') echo 'selected=selected'; ?>>Dokter</option>
                        <option value="Politikus" <?php if ($rowsiswa['PkrjIbu']=='Politikus') echo 'selected=selected'; ?>>Politikus</option>
                        <option value="Pedagang/Wiraswasta" <?php if ($rowsiswa['PkrjIbu']=='Pedagang/wiraswasta') echo 'selected=selected'; ?>>Pedagang/wiraswasta</option>
                        <option value="Petani/peternak" <?php if ($rowsiswa['PkrjIbu']=='PNS') echo 'selected=selected'; ?>>Petani/peternak</option>
                        <option value="Seniman" <?php if ($rowsiswa['PkrjIbu']=='Seniman') echo 'selected=selected'; ?>>Seniman</option>
                        <option value="Buruh" <?php if ($rowsiswa['PkrjIbu']=='Buruh') echo 'selected=selected'; ?>>Buruh</option>
                        <option value="Di rumah saja" <?php if ($rowsiswa['PkrjIbu']=='Di rumah saja') echo 'selected=selected'; ?>>Di rumah saja</option>
                        <option value="Lainnya" <?php if ($rowsiswa['PkrjIbu']=='Lainnya') echo 'selected=selected'; ?>>Lainnya</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Pendidikan Ayah</label>

                <div class="controls">
                    <select name="pndayah" id="pndayah" class="input-xlarge">
                        <option value="">Pendidikan Terakhir</option>
                        <option value="TLSD" <?php if ($rowsiswa['PendAyah']=='TLSD') echo 'selected=selected'; ?>>Tidak Lulus SD/MI/Paket A</option>
                        <option value="SD" <?php if ($rowsiswa['PendAyah']=='SD') echo 'selected=selected'; ?>>SD/MI/Paket A</option>
                        <option value="SMP" <?php if ($rowsiswa['PendAyah']=='SMP') echo 'selected=selected'; ?>>SMP/MTS/Paket B</option>
                        <option value="SMA" <?php if ($rowsiswa['PendAyah']=='SMA') echo 'selected=selected'; ?>>SMA/MA/SMK/Paket C</option>
                        <option value="D1" <?php if ($rowsiswa['PendAyah']=='D1') echo 'selected=selected'; ?>>Diploma 1</option>
                        <option value="D2" <?php if ($rowsiswa['PendAyah']=='D2') echo 'selected=selected'; ?>>Diploma 2</option>
                        <option value="D3" <?php if ($rowsiswa['PendAyah']=='D3') echo 'selected=selected'; ?>>Diploma 3</option>
                        <option value="D4" <?php if ($rowsiswa['PendAyah']=='D4') echo 'selected=selected'; ?>>Diploma 4</option>
                        <option value="S1" <?php if ($rowsiswa['PendAyah']=='S1') echo 'selected=selected'; ?>>Strata 1 </option>
                        <option value="S2" <?php if ($rowsiswa['PendAyah']=='S2') echo 'selected=selected'; ?>>Strata 2</option>
                        <option value="S3" <?php if ($rowsiswa['PendAyah']=='S3') echo 'selected=selected'; ?>>Strata 3</option>
                        <option value="Lainnya" <?php if ($rowsiswa['PendAyah']=='Lainnya') echo 'selected=selected'; ?>>Lainnya</option>
                    </select>

                </div>

            </div>


            <div class="control-group">
                <label class="control-label">Pendidikan Ibu</label>

                <div class="controls">
                    <select name="pndibu" id="pndibu" class="input-xlarge">
                        <option value="">Pendidikan Terakhir</option>
                        <option value="TLSD" <?php if ($rowsiswa['PendIbu']=='TLSD') echo 'selected=selected'; ?>>Tidak Lulus SD/MI/Paket A</option>
                        <option value="SD" <?php if ($rowsiswa['PendIbu']=='SD') echo 'selected=selected'; ?>>SD/MI/Paket A</option>
                        <option value="SMP" <?php if ($rowsiswa['PendIbu']=='SMP') echo 'selected=selected'; ?>>SMP/MTS/Paket B</option>
                        <option value="SMA" <?php if ($rowsiswa['PendIbu']=='SMA') echo 'selected=selected'; ?>>SMA/MA/SMK/Paket C</option>
                        <option value="D1" <?php if ($rowsiswa['PendIbu']=='D1') echo 'selected=selected'; ?>>Diploma 1</option>
                        <option value="D2" <?php if ($rowsiswa['PendIbu']=='D2') echo 'selected=selected'; ?>>Diploma 2</option>
                        <option value="D3" <?php if ($rowsiswa['PendIbu']=='D3') echo 'selected=selected'; ?>>Diploma 3</option>
                        <option value="D4" <?php if ($rowsiswa['PendIbu']=='D4') echo 'selected=selected'; ?>>Diploma 4</option>
                        <option value="S1" <?php if ($rowsiswa['PendIbu']=='S1') echo 'selected=selected'; ?>>Strata 1 </option>
                        <option value="S2" <?php if ($rowsiswa['PendIbu']=='S2') echo 'selected=selected'; ?>>Strata 2</option>
                        <option value="S3" <?php if ($rowsiswa['PendIbu']=='S3') echo 'selected=selected'; ?>>Strata 3</option>
                        <option value="Lainnya" <?php if ($rowsiswa['PendIbu']=='Lainnya') echo 'selected=selected'; ?>>Lainnya</option>        </select>

                </div>

            </div>


            <div class="control-group">
                <label class="control-label">Golongan Gaji</label>

                <div class="controls">
                    <select name="golgaji" id="golgaji" class="input-xlarge">
                        <option value="">Gaji</option>
                        <option value="500ribu-1juta" <?php if ($rowsiswa['GolGaji']=='500ribu-1juta') echo 'selected=selected'; ?>>Rp. 500.000,- s/d Rp. 1.000.000,-</option>
                        <option value="1juta-3juta" <?php if ($rowsiswa['GolGaji']=='1juta-3juta') echo 'selected=selected'; ?>>Rp. 1.000.000,- s/d Rp. 3.000.000,-</option>
                        <option value="3juta-5juta" <?php if ($rowsiswa['GolGaji']=='3juta-5juta') echo 'selected=selected'; ?>>Rp. 3.000.000,- s/d Rp. 5.000.000,-</option>
                        <option value=">5juta" <?php if ($rowsiswa['GolGaji']=='>5juta') echo 'selected=selected'; ?>>Lebih dari Rp. 5.000.000,-</option>
                    </select>

                </div>

            </div>
            <u><h3>Jika Ikut Wali:</h3></u><br/>
            <div class="control-group">
                <label class="control-label">Nama Wali</label>

                <div class="controls">
                    <input type="text" id="nmwali" name="nmwali" class="input-xlarge" value="<?php echo $rowsiswa['NmWali']?>">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat Wali</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="alwali" name="alwali" value="<?php echo $rowsiswa['AlamatWali']?>">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">No Telp Orang Tua/Wali</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="tlpwali" name="tlpwali" value="<?php echo $rowsiswa['NoTelpWali']?>">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label"></label>

                <div class="controls">
                    <a href="?content=lsiswa" class="btn btn-primary input-xlarge" title="Kembali"><i class="icon-backward"></i> KEMBALI </a>



                </div>

            </div>



        </div>
    </div>
</div>
