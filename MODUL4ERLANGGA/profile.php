        <?php
        session_start();
        include('connect.php');
        if (isset($_SESSION['isd'])) {
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
                                <a class="nav-link text-light" href="Erlangga_HOME">Home</a>
                            </div>
                            <div class="navbar-end">
                                <a class="nav-link text-light" style="position: absolute; right:10px;bottom: 15px;" href="login.php">Login</a>
                            </div>
                        <?php } elseif (isset($_SESSION['id'])) { ?>
                            <div class="navbar-nav mx-left">
                                <a class="nav-link text-light" href="Erlangga_HOME">Home</a>
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

            <div class="container">
                <p class="text-center fw-bold" style="font-size:32px;">Profile</p>
                <form action="auth.php" method="POST">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="email" value="<?= $data['email'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>">
                        </div>
                    </div>
                    <hr>
                    </hr>
                    <div class="mb-3 row">
                        <label for="pass" class="col-sm-2 col-form-label">Kata Sandi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Kata Sandi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pass_con" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pass_con" name="pass_con" placeholder="Konfirmasi Kata Sandi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bgcolor" class="col-sm-2 col-form-label">Warna Navbar</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="bgcolor" id="bgcolor">
                                <?php
                                    $colors = array('#000' => 'Black', '#0d6efd' => 'Blue');
                                    foreach ($colors as $name => $value) {
                                        $selected = $name == $_SESSION['bgcolor'] ? 'SELECTED="SELECTED"' : '';
                                        echo '<option value= "' . $name . '"' . $selected . '>' . $value . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <button class="btn btn-primary text-center mx-auto" type="submit" name="update">Update</button>
                    </div>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        </body>

        </html>