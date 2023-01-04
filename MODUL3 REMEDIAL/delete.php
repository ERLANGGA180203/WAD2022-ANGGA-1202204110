<?php
    include('connect.php');

    $id = $_GET['id_mobil'];
    $query = "DELETE FROM showroom_erlangga_table WHERE id_mobil = $id";
    $delete = mysqli_query($connect, $query);
    
    header('Location: MY_ITEM.php');
?>