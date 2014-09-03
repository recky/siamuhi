<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 11/20/13
 * Time: 8:03 AM
 * To change this template use File | Settings | File Templates.
 */
include("../konek.php");
session_start();
$id=($_SESSION['id']);

$q="select userlogin.password from info_form,userlogin where info_form.iduser=userlogin.iduser and userlogin.iduser='$id'";
$ex=mysql_fetch_array(mysql_query($q));

if($ex['password']==$_POST['passwordlm']){
    $query="update userlogin set password='$_POST[passwordbr]' where iduser='$id'";
    $row=mysql_query($query);
    if($row){
        print"<script>alert('Ubah Password Berhasil');
        javascript:window.location='index.php';</script>";
    }

}else{
    print"<script>alert('Password Lama Salah');
javascript:window.location='index.php#ulogin';</script>";
}
