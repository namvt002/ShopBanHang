<?php

    require_once "./database/database_connection.php";
    $sql = "DELETE FROM kho_hang WHERE K_MA = '".$_GET['id'] ."'";

     if(!$con->query($sql) ===TRUE){
        echo "<script type='text/javascript'>
                alert('Kho không được xóa!');
                document.location='dashboard-warehouse.php';
            </script>";
    }else{
        echo "<script type='text/javascript'>
                alert('Kho đã được xóa!');
                document.location='dashboard-warehouse.php';
            </script>";
    }
    $con->close();
?>