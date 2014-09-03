<?php
session_start();
session_name("log");
header("Last-Modified:".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control:no-store,no-cache,must-revalidate");
header("Cache-Control:post-check=0,pre-check=0",false);

include "konek.php";
$query="SELECT * FROM userlogin WHERE username = '$_POST[username]' AND PASSWORD = '$_POST[password]' and status=1";
$hasil=mysql_query($query);
if(mysql_num_rows($hasil)!=true){
    print"
<script>alert('Terjadi kesalahan username atau password anda');
javascript:window.location='index.php';</script>
";

}else{
    while($row=mysql_fetch_array($hasil)){
        $expire=time()+60*60*24*30;
        setcookie("id",$row['id'],$expire);
        $id=$_COOKIE['IdUser'];
        $_SESSION['id']=$row['IdUser'];
        header("Location:user/");
    }

}


?>