<?php

    require_once "./database/database_connection.php";
     $sql = "DELETE FROM san_pham WHERE SP_MA = '".$_GET['id'] ."'";

     if(!$con->query($sql) ===TRUE){
        echo "<script type='text/javascript'>
                alert('Sản phẩm không được xóa!');
                document.location='dashboard-product.php';
            </script>";
    }else{
        echo "<script type='text/javascript'>
                alert('Sản phẩm của bạn đã được xóa!');
                document.location='dashboard-product.php';
            </script>";
    }
    $con->close();
?>