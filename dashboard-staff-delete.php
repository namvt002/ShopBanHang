<?php
    
    require_once "./database/database_connection.php";
     $sql = "DELETE FROM nhan_vien WHERE NV_MA = '".$_GET['id'] ."'";

     if(!$con->query($sql) ===TRUE){
        echo "<script type='text/javascript'>
                alert('Không xóa được!');
                document.location='dashboard-staff-add.php';
            </script>";
    }else{
        echo "<script type='text/javascript'>
                alert('Nhân viên đã được xóa!');
                document.location='dashboard-staff-add.php';
            </script>";
    }
    $con->close();
?>