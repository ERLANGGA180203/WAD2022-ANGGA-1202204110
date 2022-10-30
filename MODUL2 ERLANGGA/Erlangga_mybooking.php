<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
    <title>Tugas Pendahuluan Modul 2</title>
</head>
</html>
<body>
<?php
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$duration = $_POST['duration'];
$car = $_POST['car'];
$phone = $_POST['Number'];
?>

<div class="container">
        <h5 class="text-center">Thank You ERLANGGA_1202204110 for Reserving</h5>
        <p class="text-center">Please double check your reservation details</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Booking Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Date time</th>
                    <th scope="col">Car Type</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo(rand() . "<br>");?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $time ?></td>
                    <td><?php echo $car ?></td>
                    <td><?php echo $phone ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mb-3">
        <div class="d-flex justify-content-center">
            <a href="Erlangga_booking.php" class="btn btn-outline-primary w-50">Kembali</a>
    </div>
    <br>
    <br>
   <footer class="bg-light text-center text-lg-start">
          <div class="container" >
            Created by ERLANGGA_1202204110
          </div>
        </footer>
</body>