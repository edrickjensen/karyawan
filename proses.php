<?php
require 'function.php'; // Pastikan file ini berisi koneksi ke database

// **Edit Data**
if (isset($_POST['editkaryawan'])) {
    $id = $_POST['idkaryawan'];
    $nama = $_POST['namakaryawan'];
    $nik = $_POST['nik'];
    $tglmasuk = $_POST['tglmasuk'];
    $jnskelamin = $_POST['jnskelamin'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $status = $_POST['status'];

    $query = "UPDATE inputkaryawan SET 
                namakaryawan='$nama', nik='$nik', tglmasuk='$tglmasuk', 
                jnskelamin='$jnskelamin', alamat='$alamat', nohp='$nohp', status='$status' 
              WHERE idkaryawan='$id'";
    mysqli_query($conn, $query);
    header("Location: layout-static.php");
}

// **Hapus Data**
if (isset($_POST['deletekaryawan'])) {
    $id = $_POST['idkaryawan'];
    $query = "DELETE FROM inputkaryawan WHERE idkaryawan='$id'";
    mysqli_query($conn, $query);
    header("Location: layout-static.php");
}

//edit departemen
if (isset($_POST['editdepartemen'])) {
    $iddpt = $_POST['iddpt'];
    $iddepartemen = $_POST['iddepartemen'];
    $namadepartemen = $_POST['namadepartemen'];


    $query = "UPDATE departemen SET 
                iddepartemen='$iddepartemen', namadepartemen='$namadepartemen' 
              WHERE iddpt='$iddpt'";
    mysqli_query($conn, $query);
    header("Location: dept.php");
}

//hapus departemen
if (isset($_POST['deletedepartemen'])){
    $iddpt = $_POST['iddpt'];
    $query = "DELETE FROM departemen WHERE iddpt='$iddpt'";
    mysqli_query($conn, $query);
    header("Location: dept.php");
}

// **Edit Data jabatan**
if (isset($_POST['edittunjangan'])) {
    $idjbt = $_POST['idjbt'];
    $idjabatan = $_POST['idjabatan'];
    $namajabatan = $_POST['namajabatan'];
    $tunjangan = $_POST['tunjangan'];

    $query = "UPDATE tunjangan SET 
                idjabatan='$idjabatan', namajabatan='$namajabatan', tunjangan='$tunjangan' 
              WHERE idjbt='$idjbt'";
    mysqli_query($conn, $query);
    header("Location: jabatan.php");
}

// **Hapus Data**
if (isset($_POST['deletejabatan'])) {
    $idjbt = $_POST['idjbt'];
    $query = "DELETE FROM jabatan WHERE idjbt='$idjbt'";
    mysqli_query($conn, $query);
    header("Location: jabatan.php");
}
?>
