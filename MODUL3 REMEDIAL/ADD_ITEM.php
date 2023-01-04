<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD ITEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<?php
include('connect.php');
?>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="na\vbarNavAltMarkup">
                <div class="navbar-nav mx-left">
                    <a class="nav-link text-light" href="Erlangga_HOME.PHP">Home</a>
                    <a class="nav-link text-light" href="MY_ITEM.php">MyCar</a>
                </div>
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