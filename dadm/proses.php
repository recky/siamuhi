
<?php
session_start();
session_name("log");
header("Last-Modified:".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control:no-store,no-cache,must-revalidate");
header("Cache-Control:post-check=0,pre-check=0",false);

include "../konek.php";
$pass=md5($_POST['password']);
$query="SELECT * FROM ad_login WHERE username = '$_POST[username]' AND PASSWORD = '$pass'";
$hasil=mysql_query($query);
if(mysql_num_rows($hasil)!=true){
    print"
<script>alert('Terjadi kesalahan username atau password anda');
javascript:window.location='index.php';</script>";

}else{
      while($row=mysql_fetch_array($hasil)){
            if($row['status']==1){
            $expire=time()+60*60*24*30;
            setcookie("id",$row['id'],$expire);
            $id=$_COOKIE['id'];
            $_SESSION['id']=$row['id'];
            setcookie("hak",$row['hak'],$expire);
            $hak=$_COOKIE['hak'];
            $_SESSION['hak']=$row['hak'];
            header("Location:dashbord/");}else{
                print"
    <script>alert('Akun anda tidak aktif hubungi administrator');
        javascript:window.location='index.php';</script>";
            }

        }

}
?>