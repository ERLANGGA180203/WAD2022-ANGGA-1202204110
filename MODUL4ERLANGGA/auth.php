<?php
include('connect.php');

if(isset($_POST['regis'])){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $pass = $_POST['pass'];
    $pass_con = $_POST['pass_con'];

    if ($pass == $pass_con){
        $query = "INSERT INTO users(nama,email,password,no_hp) VALUES ('$nama','$email','$pass','$no_hp')";
        $insert = mysqli_query($connect, $query);
        header('Location: Erlangga_HOME.php');
    }
}
if(isset($_POST['login'])){
    session_start();
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $emailCek = "SELECT * FROM users WHERE email='$email'";
    $select = mysqli_query($connect,$emailCek);

    if (mysqli_num_rows($select) == 1){
        $result = mysqli_fetch_assoc($select);
        if($pass == $result['password']){
            $_SESSION['id'] = $result['id'];
            if (isset($_POST['remember'])){
                setcookie("email",$email,time() + 3600);
                setcookie("pass",$pass,time() + 3600);

                header('Location: Erlangga_HOME.php');
                exit();
            }
            header('Location: Erlangga_HOME.php');
        }
    }
}

if (isset($_POST['update'])){
    session_start();
    $id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $pass = $_POST['pass'];
    $pass_con = $_POST['pass_con'];
    $bgcolor = $_POST['bgcolor'];
    $cek = "SELECT * FROM users WHERE id='$id'";
    $select = mysqli_query($connect,$cek);
    $data = mysqli_fetch_array($select);

    if ($pass == $pass_con){
        if ($pass == $data['password']){
            $query = "UPDATE users SET nama='$nama',email='$email',no_hp='$no_hp' WHERE id='$id'";
            $update = mysqli_query($connect,$query);
            $_SESSION['updated'] = 'Berhasil update profile!';
            $_SESSION['bgcolor'] = $bgcolor;
            header("Location: profile.php");
            header("Location: ADD_ITEM.php");
            header("Location: detail.php");
            header("Location: edit.php");
            header("Location: Erlangga_HOME.php");
        }
        $_SESSION['pesan'] = 'Gagal update profile, password Salah!';
        header("Location: Erlangga_HOME.php");
    }
}