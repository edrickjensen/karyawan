<?php
session_start();
// membuat koneksi ke database
$conn=mysqli_connect("localhost", "root", "", "karyawan");


if(isset($_POST['addkaryawan'])){
    $namakaryawan = $_POST['namakaryawan'];
    $nik = $_POST['nik'];
    $tglmasuk = $_POST['tglmasuk'];
    $jnskelamin = $_POST['jnskelamin'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $status = $_POST['status'];
    
    $addtotable = mysqli_query($conn, "insert into inputkaryawan (namakaryawan, nik, tglmasuk, jnskelamin, alamat, nohp, status) values ('$namakaryawan','$nik','$tglmasuk', '$jnskelamin', '$alamat', '$nohp', '$status')");
    if($addtotable){
        header('location:layout-static.php');
    } else {
        echo "gagal";
        header ('location:layout-static.php');
    }
};

if(isset($_POST['adddepartemen'])){
   $iddepartemen = $_POST['iddepartemen'];
   $namadepartemen = $_POST['namadepartemen'];
    
    
    $addtotable = mysqli_query($conn, "insert into departemen (iddepartemen, namadepartemen) values ('$iddepartemen', '$namadepartemen')");
    if($addtotable){
        header('location:dept.php');
    } else {
        echo "gagal";
        header ('location:dept.php');
    }
};
if(isset($_POST['addjabatan'])){
    $idjabatan = $_POST['idjabatan'];
    $namajabatan = $_POST['namajabatan'];
    $tunjangan = $_POST['tunjangan'];
    
    $addtotable = mysqli_query($conn, "insert into jabatan (idjabatan, namajabatan, tunjangan) values ('$idjabatan','$namajabatan','$tunjangan')");
    if($addtotable){
        header('location:jabatan.php');
    } else {
        echo "gagal";
        header ('location:jabatan.php');
    }
};
?>