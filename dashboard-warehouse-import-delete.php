<?php

    require_once "./database/database_connection.php";
     $sql = "DELETE FROM `chi_tiet_phieu_nhap` WHERE CTPN_MA = '".$_GET['id'] ."'";

     if(!$con->query($sql) ===TRUE){
        echo "<script type='text/javascript'>
                alert('Nhập hàng không được xóa!');
                document.location='dashboard-warehouse-import.php';
            </script>";
    }else{
        echo "<script type='text/javascript'>
                alert('Nhập hàng của bạn đã được xóa!');
                document.location='dashboard-warehouse-import.php';
            </script>";
    }
    $con->close();
?>