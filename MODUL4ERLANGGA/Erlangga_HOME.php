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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="clearfix">
        <div class="container">
            <div class="row">
                <div class="col">
                    <b>
                        <h1>
                            <p class="fw-bold">Selamat Datang Di Show Room Erlangga</p>
                        </h1>
                    </b>
                    <p class="text-secondary">At lacus vitae nulla sagittis scelerisque nist. Pellentesque duis curcus vestibulum, facilisi ac, sed faucibus.</p>
                    <br>
                    <?php if(isset($_SESSION['id'])){?>
                    <div class="card-body">
                        <div class='container'>
                            <a class="nav-link text-secondary"><a href="MY_ITEM.php" class="btn btn-primary"> MyCar </a>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col">
                        <br><br><img src="logo-ead.png" style="width: 100px;height: 25px;"> <a> Erlangga_1202204110</a>
                    </div>
                </div>
                <div class="col">
                    <img src="MOBIL1.png" style="width:600px;height:380px;">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>