<?php
    
    require_once "./database/database_connection.php";
     $sql = "DELETE FROM `loai_san_pham`  WHERE LH_MA = '".$_GET['id'] ."'";

     if(!$con->query($sql) ===TRUE){
        echo "<script type='text/javascript'>
                alert('Danh mục không được xóa!');
                document.location='dashboard-category-add.php';
            </script>";
    }else{
        echo "<script type='text/javascript'>
                alert('Danh mục của bạn đã được xóa!');
                document.location='dashboard-category-add.php';
            </script>";
    }
    $con->close();
?>