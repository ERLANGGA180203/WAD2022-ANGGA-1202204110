<?php
include('connect.php');

if (isset($_POST['input'])) {
    $nama_mobil = $_POST['nama'];
    $pemilik_mobil = $_POST['pemilik'];
    $merk_mobil = $_POST['merk'];
    $tanggal_beli = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    $status_pembayaran = $_POST['status_pembayaran'];

    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi) ) {
        header("location:index.php?alert=gagal_ekstensi");
    }else{
        if ($ukuran < 1044070) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
            $query = "INSERT INTO showroom_erlangga_table (nama_mobil,pemilik_mobil,merk_mobil,tanggal_beli,deskripsi,foto_mobil,status_pembayaran) VALUES ('$nama_mobil','$pemilik_mobil','$merk_mobil','$tanggal_beli','$deskripsi','$xx','$status_pembayaran')";
            $insert = mysqli_query($connect, $query);
            header('Location: MY_ITEM.php');
        }
    }
}

if (isset($_POST['update'])) {
    session_start();
    $id_mobil = $_GET['id_mobil'];
    $nama_mobil = $_POST['nama'];
    $pemilik_mobil = $_POST['pemilik'];
    $merk_mobil = $_POST['merk'];
    $tanggal_beli = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    $status_pembayaran = $_POST['status_pembayaran'];
    $foto = $_FILES['foto']['name'];

    if($foto == ''){
        $query = "UPDATE showroom_erlangga_table SET nama_mobil='$nama_mobil',pemilik_mobil='$pemilik_mobil',merk_mobil='$merk_mobil',tanggal_beli='$tanggal_beli',deskripsi='$deskripsi',status_pembayaran='$status_pembayaran' WHERE id_mobil='$id_mobil'";
        $insert = mysqli_query($connect, $query);
        $_SESSION['pesan'] = "Data Berhasil di Update";
        header('Location: MY_ITEM.php');
    }else{
        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$ekstensi) ) {
            header("location:index.php?alert=gagal_ekstensi");
        }else{
            if ($ukuran < 1044070) {
                $xx = $rand . '_' . $filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
                $query = "UPDATE showroom_erlangga_table SET nama_mobil='$nama_mobil',pemilik_mobil='$pemilik_mobil',merk_mobil='$merk_mobil',tanggal_beli='$tanggal_beli',deskripsi='$deskripsi',status_pembayaran='$status_pembayaran',foto_mobil='$xx' WHERE id_mobil='$id_mobil'";
                $insert = mysqli_query($connect, $query);
                $_SESSION['pesan'] = "Data Berhasil di Update";
                header('Location: MY_ITEM.php');
            }
        }
    }
}
