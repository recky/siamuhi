<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 3/11/14
 * Time: 3:35 PM
 * To change this template use File | Settings | File Templates.
 */
// class paging untuk halaman administrator

class Paging
{

function buatLimit($sql,$posisi,$batas){
    $prosql=$sql.' limit '.$posisi.','.$batas;
    return $prosql;
}

// Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas){
        if(empty($_GET[halaman])){
            $posisi=0;
            $_GET[halaman]=1;
        }
        else{
            $posisi = ($_GET[halaman]-1) * $batas;
        }
        return $posisi;
    }

// Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas){
        $jmlhalaman = ceil($jmldata/$batas);
        return $jmlhalaman;
    }

// Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman){
        $link_halaman = "";

// Link halaman 1,2,3, ...
        for ($i=1; $i<=$jmlhalaman; $i++){
            if ($i == $halaman_aktif){
                $link_halaman .= "<b>$i</b> | ";
            }
            else{
                $link_halaman .= "<a href=$_SERVER[PHP_SELF]?content=$_GET[content]&halaman=$i>$i</a> | ";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman1($halaman_aktif, $jmlhalaman){
        $link_halaman = "";

// Link halaman 1,2,3, ...
        for ($i=1; $i<=$jmlhalaman; $i++){
            if ($i == $halaman_aktif){
                $link_halaman .= "<b>$i</b> | ";
            }
            else{
                $link_halaman .= "<a href=$_SERVER[PHP_SELF]?content=$_GET[content]&mod=$_GET[mod]&halaman=$i>$i</a> | ";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }

    function navHalaman2($halaman_aktif, $jmlhalaman){
        $link_halaman = "";

// Link halaman 1,2,3, ...
        for ($i=1; $i<=$jmlhalaman; $i++){
            if ($i == $halaman_aktif){
                $link_halaman .= "<b>$i</b> | ";
            }
            else{
                $link_halaman .= "<a href=$_SERVER[PHP_SELF]?content=$_GET[content]&zoner=$_GET[zoner]&halaman=$i>$i</a> | ";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
