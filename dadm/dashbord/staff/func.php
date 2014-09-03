<?php
//**************************************
//     Page load dropdown results     //
//**************************************






function getTierOne()
{
    session_start();
    $id=($_SESSION['id']);

    $querykd="select kodepos.kab from info_form,biodata,kodepos where info_form.nis=biodata.nis and biodata.kodepos=kodepos.kodepos and info_form.iduser='$id'";
    $hasilkd=mysql_query($querykd);
    $rowkab=mysql_fetch_array($hasilkd);

    $result = mysql_query("SELECT DISTINCT kab FROM kodepos")
        or die(mysql_error());

    while($tier = mysql_fetch_array( $result ))
    {
        if ($tier['kab']==$rowkab['kab']){$sel2="selected='selected'";}else{$sel2='';}
        echo '<option value="'.$tier['kab'].'"'.$sel2.'>'.$tier['kab'].'</option>';
    }

}

//**************************************
//     First selection results     //
//**************************************
if(isset($_GET['func']) == "drop_1" && isset($_GET['func'])) {
    drop_1($_GET['drop_var']);
}

function drop_1($drop_var)
{

    include_once('konek.php');

    session_start();
    $ids=($_SESSION['id']);
    $querykd="select kodepos.kec from biodata,kodepos,info_form where info_form.nis=biodata.nis and biodata.kodepos=kodepos.kodepos and info_form.iduser='$ids'";
    $hasilkd=mysql_query($querykd);
    $rowkec=mysql_fetch_array($hasilkd);


    $result = mysql_query("SELECT * FROM kodepos WHERE kab='$drop_var'")
        or die(mysql_error());

    echo '<select name="kec" id="kec">
	      <option value=" " >Pilih Kecamatan</option>';

    while($drop_2 = mysql_fetch_array( $result ))
    {
        if ($drop_2['kec']==$rowkec['kec']){$sel3="selected='selected'";}else{$sel3='';}
        echo '<option value="'.$drop_2['kec'].'"'.$sel3.'>'.$drop_2['kec'].'</option>';
    }

    echo '</select> ';

}

?>