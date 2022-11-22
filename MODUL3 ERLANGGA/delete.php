<?php
    include('connect.php');
    $id = $_GET['id'];
    $query = "DELETE FROM showroom_erlangga_table WHERE id_mobil = $id";
    $delete = mysqli_query($connect, $query);
    
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv = 'refresh' content ='1 url = .php'>";
?>