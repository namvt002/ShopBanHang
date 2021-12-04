<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A&T SHOP - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image   "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Trang cá nhân</h1>
                                    </div>
                                    <!-- form login -->

                                    <?php
                                        session_start();
                                        require_once "./database/database_connection.php";

                                        if(isset($_SESSION['idkh']) === FALSE){
                                                echo "<script type='text/javascript'>
                                                alert('Đăng nhập trước khi xem thông tin cá nhân!');
                                                document.location='index.php';
                                            </script>";
                                         }

                                        else{
                                            $sqlAdmin = "SELECT * FROM khach_hang WHERE KH_MA = '" . $_SESSION['idkh'] . "'";
                                            $resultadmin = $con->query($sqlAdmin);
                                            $rowAdmin = $resultadmin->fetch_assoc();
                                    ?>
                                 
                                    <form method="POST" class="user">
                                      
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Tên tài khoản:</label>
                                            <span style="font-weight: bold;"><?php echo $rowAdmin['USER_NAME'] ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tên khách hàng:</label>
                                            <input type="text" class="form-control" name="nameC" value="<?php echo $rowAdmin['KH_TEN']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Số điện thoại:</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $rowAdmin['KH_SDT']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Địa chỉ Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $rowAdmin['KH_EMAIL']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Địa chỉ:</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $rowAdmin['KH_DIACHI']; ?>">
                                        </div>

                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value="Cập nhật" name="update-profile">
                                            <a href="index.php" class="btn btn-primary">Đóng</a>
                                        </div>

                                    </form>
                                    <?php
                                        
                                          
                                        }
                                    ?>

                                    <?php

                                         if(isset($_POST['update-profile'])){
                                             $nameC = $_POST['nameC'];
                                            $phone = $_POST['phone'];
                                            $email = $_POST['email'];  
                                            $address = $_POST['address'];
                                            $sqlUpdate = "UPDATE `khach_hang` SET `KH_TEN` = ' $nameC', `KH_EMAIL`='$email',`KH_SDT`='$phone',`KH_DIACHI`='$address' WHERE KH_MA = '" . $_SESSION['idkh'] . "'";
                                            if($con->query($sqlUpdate)  === TRUE){
                                                echo "<script type='text/javascript'>
                                                alert('Cập nhật thành công!');
                                                document.location='index.php';
                                            
                                            </script>";
                                            }else{
                                                echo "<script type='text/javascript'>
                                                alert('Cập nhật không thành công!');
                                                document.location='index.php';
                                                </script>";
                                            }
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>