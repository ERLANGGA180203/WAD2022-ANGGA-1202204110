<?php
include('connect.php');
session_start();
$query = "SELECT * FROM showroom_erlangga_table";
$mobil = mysqli_query($connect, $query);
if (mysqli_num_rows($mobil) == 0) {
    header('Location: ADD_ITEM.php');
}
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id='$id'";
    $select = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($select);
}
$bgcolor = '#0d6efd';
$color = '#FFFFFF';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Modul 4</title>
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        <?php if (!isset($_SESSION['bgcolor'])){?>
            .bg{
                background:<?=$bgcolor?>;
            }
            .font{
                color:<?=$color?>;
            }
        <?php }else{?>
            .bg{
                background:<?=$_SESSION['bgcolor']?>;
            }
            .font{
                color:<?=$color?>;
            }
        <?php } ?>
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <?php if (!isset($_SESSION['id'])) { ?>
                    <div class="navbar-nav mx-left">
                        <a class="nav-link text-light" href="Erlangga_HOME.php">Home</a>
                    </div>
                    <div class="navbar-end">
                        <a class="nav-link text-light" style="position: absolute; right:10px;bottom: 15px;" href="login.php">Login</a>
                    </div>
                <?php } elseif (isset($_SESSION['id'])) { ?>
                    <div class="navbar-nav mx-left">
                        <a class="nav-link text-light" href="Erlangga_HOME.php">Home</a>
                        <a class="nav-link text-light" href="MY_ITEM.php">MyCar</a>
                    </div>
                    <div style="position: absolute; right:10px;bottom: 10px;">
                        <a class="btn btn-light" href="ADD_ITEM.PHP">Add Car</a>
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $data['nama'] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>

                <?php } ?>
            </div>
        </div>
    </nav>

    <br><br>
    <div class="container">
        <p style="font-size: 32px; font-weight:bold;">My Show Room</p>
        <p style="font-size: 16px;">List Show Room Erlangga - 1202204110</p>
        <div class="row">
            <?php while ($data_mobil = mysqli_fetch_assoc($mobil)) { ?>
                <div class="col">
                    <div class="card" style="width: 400px;">
                        <img src="gambar/<?= $data_mobil['foto_mobil'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data_mobil['nama_mobil'] ?></h5>
                            <p class="card-text"><?= $data_mobil['deskripsi'] ?></p>
                            <a href="detail.php?id_mobil=<?= $data_mobil['id_mobil'] ?>" class="btn btn-primary">Detail</a>
                            <a href="delete.php?id_mobil=<?= $data_mobil['id_mobil'] ?>" name='delete' class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if (isset($_SESSION['pesan'])) { ?>
        <div class="toast">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= $_SESSION['pesan'] ?>
            </div>
        </div>
    <?php } ?>
    <?php
    unset($_SESSION['pesan']);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>