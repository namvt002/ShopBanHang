<?php
    
    require_once "./database/database_connection.php";
     $sql = "DELETE FROM chi_tiet_khuyen_mai WHERE CTKM_MA = '".$_GET['id'] ."'";

     if(!$con->query($sql) ===TRUE){
        echo "<script type='text/javascript'>
                alert('Khuyến mãi không được xóa!');
                document.location='dashboard-promotion.php';
            </script>";
    }else{
        echo "<script type='text/javascript'>
                alert('Khuyễn mãi của bạn đã được xóa!');
                document.location='dashboard-promotion.php';
            </script>";
    }
    $con->close();
?>