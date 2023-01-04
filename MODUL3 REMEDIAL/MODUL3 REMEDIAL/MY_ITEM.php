<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY_ITEM</title>
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
include('connect.php');
session_start();
$query = "SELECT * FROM showroom_erlangga_table";
$select = mysqli_query($connect, $query);
if (mysqli_num_rows($select) == 0) {
    header('Location: ADD_ITEM.php');
}
?>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-light" href="Erlangga_HOME.PHP">Home</a>
                    <a class="nav-link text-light" href="MY_ITEM.php">MyCar</a>
                </div>
                <div class="navbar-end">
                    <a class="btn btn-light" style="position: absolute; right:10px;bottom: 10px;" href="ADD_ITEM.PHP">Add Car</a>
                </div>
            </div>
        </div>
    </nav>

    <br><br>
    <div class="container">
        <p style="font-size: 32px; font-weight:bold;">My Show Room</p>
        <p style="font-size: 16px;">List Show Room Erlangga - 1202204110</p>
        <div class="row">
            <?php while ($data = mysqli_fetch_assoc($select)) { ?>
                <div class="col">
                    <div class="card" style="width: 400px;">
                        <img src="gambar/<?= $data['foto_mobil'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['nama_mobil'] ?></h5>
                            <p class="card-text"><?= $data['deskripsi'] ?></p>
                            <a href="detail.php?id_mobil=<?= $data['id_mobil'] ?>" class="btn btn-primary">Detail</a>
                            <a href="delete.php?id_mobil=<?= $data['id_mobil'] ?>" name='delete' class="btn btn-danger">Delete</a>
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