<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "tanggal.php";?>
 <script type="text/javascript">
        function sizing() {
            var
                    formfilterswidth = $("#register").width();
            $(".input").width((formfilterswidth - 46) + "px");
        }
        $(document).ready(sizing);
        $(window).resize(sizing);
    </script>
    </head>
<body>


<div class="container-fluid" style="border: 0px solid black;margin: auto">
    <div class="row-fluid">
        <legend></legend>
        <form class="form-horizontal" id="register" method='post' action='biosimpan.php' name='forme' enctype="multipart/form-data">


            <?php
            include "../konek.php";
            if($row['url']!=true){
                $alfoto="foto/default.png";
            }else{
                $alfoto=$row['url'];
            }
            ?>
            <center>
                <img src="<?php echo $alfoto;?>"width="150"/>
                <input type="file" class="input-medium" name="foto"/>
            </center>
            <br/>

            <div class="control-group">
                <label class="control-label">NIS</label>

                <div class="controls">
                    <?php if($row['nis']==null){
                    $qnis="select username from userlogin where iduser='$id'";
                    $hsle=mysql_query($qnis);
                    $rownis=mysql_fetch_array($hsle);
                    echo "<input type='text' class='input-medium' id='nis' name='nis' value='$rownis[username]' readonly='true'>";
                }else{
                    echo "<input type='text' class='input-medium' id='nis' name='nis' value='$row[nis]' readonly='true'>";
                }
                    ?>


                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Nama Lengkap</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="nama" name="nama">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Jenis Kelamin</label>

                <div class="controls">
                    <input type="radio" name="jk" value="L">&nbsp Laki-laki
                    <input type="radio" name="jk" value="P">&nbsp Perempuan

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Tempat, tanggal lahir</label>

                <div class="controls">
                    <input type="text" class="input-medium" id="tempat" name="tempat">,
                    <input type="text" class="input-small" id="tanggal" name="tgl">



                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="input01">Jurusan</label>

                <div class="controls">
                    <select name="idjurusan" id="jurusan" class="span5">
                        <option disabled="disabled" value="" selected="selected">Pilih Jurusan</option>
                        <?php
                        include "../konek.php";
                        $qjrs="select * from jurusan ";
                        $hsljur=mysql_query($qjrs);
                        while($rowjrs=mysql_fetch_array($hsljur)){
                            echo "<option value='$rowjrs[IdJurusan]'>$rowjrs[Program]</option>";
                        };

                        ?>

                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="input01">Angkatan</label>

                <div class="controls">
                    <select name="angkatan" id="angkatan" class="span5">
                        <option disabled="disabled" value="" selected="selected">Pilih Angkatan</option>
                        <?php
                        $thn=2000;
                        while($thn!=2015){
                            echo "<option value='$thn'>$thn</option>";
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
                    <input type="text" class="input-large" id="sekolah" name="sekolah">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="alsekolah" name="alsekolah">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Nomor Ijazah</label>

                <div class="controls">
                    <input type="text" class="input-medium" id="noijasah" name="noijasah">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Nomor SKHUN</label>

                <div class="controls">
                    <input type="text" class="input-medium" id="noskhun" name="noskhun">

                </div>
            </div>


            <div class="control-group">
                <label class="control-label">Agama</label>

                <div class="controls">
                    <select name="agama" id="agama" class="span5">
                        <option value="">Agama</option>
                        <option value="islam">Islam</option>
                        <option value="krsiten">Kristen</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                        <option value="tionghoa">Tionghoa</option>
                    </select>

                </div>

            </div>
            <div class="control-group">
                <label class="control-label">Status dalam keluarga / anak ke</label>

                <div class="controls">
                    <input type="text" class="input-medium" id="status" name="status">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="alamat" name="alamat">

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
                    <input type="text" class="input-medium" id="tlp" name="tlp">

                </div>
            </div>



            <div class="control-group">
                <label class="control-label">Cita-cita</label>

                <div class="controls">
                    <select name="cita" id="cita">
                        <option value="">Cita-Cita</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI/POLRI">TNI/POLRI</option>
                        <option value="Guru/dosen">Guru/Dosen</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Politikus">Politikus</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Seniman">Seniman</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Hobi</label>

                <div class="controls">
                    <select name="hobi" id="hobi">
                        <option value="">Hobi</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Kesenian">Kesenian</option>
                        <option value="Menulis">Menulis</option>
                        <option value="Travelling">Travelling</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Jarak ke Sekolah</label>

                <div class="controls">
                    <select name="jarak" id="jarak">
                        <option value="">Jarak</option>
                        <option value="0-1 km">0-1 km</option>
                        <option value="1-3 km">1-3 km</option>
                        <option value="3-5 km">3-5 km</option>
                        <option value="5-10 km">5-10 km</option>
                        <option value=">10 km">lebih dari 10 km</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Transportasi</label>

                <div class="controls">
                    <select name="transportasi" id="transportasi">
                        <option value="">Transportasi</option>
                        <option value="Jalan kaki">Jalan Kaki</option>
                        <option value="Sepeda">Sepeda</option>
                        <option value="Motor">Motor</option>
                        <option value="Mobil Pribadi">Mobil Pribadi</option>
                        <option value="Antar Jemput">Antar jemput</option>
                        <option value="Angkutan Umum">Angkutan umum</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                </div>

            </div>
            <div class="control-group">
                <label class="control-label">Nama Ayah</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="namaayah" name="namaayah">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nama Ibu</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="namaibu" name="namaibu">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Pekerjaan Ayah</label>

                <div class="controls">
                    <select name="pkrjayah" id="pkrjayah">
                        <option value="">Pekerjaan</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI/POLRI">TNI/POLRI</option>
                        <option value="Guru/dosen">Guru/dosen</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Politikus">Politikus</option>
                        <option value="Pedagang/Wiraswasta">Pedagang/wiraswasta</option>
                        <option value="Petani/peternak">Petani/peternak</option>
                        <option value="Seniman">Seniman</option>
                        <option value="Buruh">Buruh</option>
                        <option value="Di rumah saja">Di rumah saja</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Pekerjaan Ibu</label>

                <div class="controls">
                    <select name="pkrjibu" id="pkrjibu">
                        <option value="">Pekerjaan</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI/POLRI">TNI/POLRI</option>
                        <option value="Guru/dosen">Guru/dosen</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Politikus">Politikus</option>
                        <option value="Pedagang/Wiraswasta">Pedagang/wiraswasta</option>
                        <option value="Petani/peternak">Petani/peternak</option>
                        <option value="Seniman">Seniman</option>
                        <option value="Buruh">Buruh</option>
                        <option value="Di rumah saja">Di rumah saja</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                </div>

            </div>

            <div class="control-group">
                <label class="control-label">Pendidikan Ayah</label>

                <div class="controls">
                    <select name="pndayah" id="pndayah">
                        <option value="">Pendidikan Terakhir</option>
                        <option value="TLSD">Tidak Lulus SD/MI/Paket A</option>
                        <option value="SD">SD/MI/Paket A</option>
                        <option value="SMP">SMP/MTS/Paket B</option>
                        <option value="SMA">SMA/MA/SMK/Paket C</option>
                        <option value="D1">Diploma 1</option>
                        <option value="D2">Diploma 2</option>
                        <option value="D3">Diploma 3</option>
                        <option value="D4">Diploma 4</option>
                        <option value="S1">Strata 1 </option>
                        <option value="S2">Strata 2</option>
                        <option value="S3">Strata 3</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                </div>

            </div>


            <div class="control-group">
                <label class="control-label">Pendidikan Ibu</label>

                <div class="controls">
                    <select name="pndibu" id="pndibu">
                        <option value="">Pendidikan Terakhir</option>
                        <option value="TLSD">Tidak Lulus SD/MI/Paket A</option>
                        <option value="SD">SD/MI/Paket A</option>
                        <option value="SMP">SMP/MTS/Paket B</option>
                        <option value="SMA">SMA/MA/SMK/Paket C</option>
                        <option value="D1">Diploma 1</option>
                        <option value="D2">Diploma 2</option>
                        <option value="D3">Diploma 3</option>
                        <option value="D4">Diploma 4</option>
                        <option value="S1">Strata 1 </option>
                        <option value="S2">Strata 2</option>
                        <option value="S3">Strata 3</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                </div>

            </div>


            <div class="control-group">
                <label class="control-label">Golongan Gaji</label>

                <div class="controls">
                    <select name="golgaji" id="golgaji">
                        <option value="">Gaji</option>
                        <option value="500ribu-1juta">Rp. 500.000,- s/d Rp. 1.000.000,-</option>
                        <option value="1juta-3juta">Rp. 1.000.000,- s/d Rp. 3.000.000,-</option>
                        <option value="3juta-5juta">Rp. 3.000.000,- s/d Rp. 5.000.000,-</option>
                        <option value=">5juta">Lebih dari Rp. 5.000.000,-</option>
                    </select>

                </div>

            </div>
            <u><h3>Jika Ikut Wali:</h3></u><br/>
            <div class="control-group">
                <label class="control-label">Nama Wali</label>

                <div class="controls">
                    <input type="text" id="nmwali" name="nmwali">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat Wali</label>

                <div class="controls">
                    <input type="text" class="input-xlarge" id="alwali" name="alwali">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">No Telp Orang Tua/Wali</label>

                <div class="controls">
                    <input type="text" class="input-medium" id="tlpwali" name="tlpwali">

                </div>
            </div>


            <div class="control-group">
                <label class="control-label"></label>

                <div class="controls">
                        <button type="submit" class="btn btn-success uneditable-btn" rel="tooltip" title="Save">SIMPAN </button>;

                </div>

            </div>


        </form>
    </div>
    </div>

</body>
</html>

