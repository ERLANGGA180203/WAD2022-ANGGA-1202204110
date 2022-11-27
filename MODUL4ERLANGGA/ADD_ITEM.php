<?php
session_start();
include('connect.php');
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
    <title>TP_MODUL4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        <h1 class="text" style="font-size:32px;">Tambah Mobil</h1>
        <h6 class="mb-3" style="font-size:16px;">Tambah Mobil Baru Anda Ke List Show Room </h6><br>
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <b><label class="form-label">Nama Mobil</label></b>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <b><label class="form-label">Nama Pemilik</label></b>
                <input type="text" class="form-control" name="pemilik" value="Erlangga_1202204110" readonly>
            </div>
            <div class="mb-3">
                <b><label class="form-label">Merk</label></b>
                <input type="text" class="form-control" name="merk">
            </div>
            <div class="mb-3">
                <b><label class="form-label">Tanggal Beli</label></b>
                <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="mb-3">
                <b><label class="form-label">Deskripsi</label></b>
                <textarea class="form-control" name="deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <b><label class="form-label">Foto</label></b>
                <input class="form-control" type="file" name="foto">
            </div>
            <div class="mb-3">
                <b><label>Status Pembayaran</label></b><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" value="Lunas">
                    <label class="form-check-label">Lunas</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" value="Belum Lunas">
                    <label class="form-check-label">Belum Lunas</label>
                </div>
            </div>
            <div class="mb-3">
                <div>
                    <button class="btn btn-primary" type="submit" name="input">Selesai</button>
                    <br>
                </div>
            </div>
        </form>
    </div>
</body>

</html>