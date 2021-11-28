<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A&T Shop Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->


</head>

<?php
     require_once "./database/database_connection.php";
?>


<style>
    #details {
        border-style: solid;
        border-width: 1px 1px 1px 0px;
        /* 25px top, 10px right, 4px bottom and 35px left */
    }

    #details-img {

        border-style: solid;
        border-width: 1px 0px 1px 1px;
        /* 25px top, 10px right, 4px bottom and 35px left */
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang chủ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Sản phẩm
            </div>
            <?php
            $sqlLSP = "SELECT * FROM loai_san_pham";
            $resultLSP = $con->query($sqlLSP);
            while ($rowLSP = $resultLSP->fetch_assoc()) {
            ?>
                <li class="nav-item">
                    <?php
                    echo "<a class='nav-link' href='client-product.php?id=" . $rowLSP['LH_MA'] . "'>";
                    ?>
                    <i class="fas fa-fw fa-table"></i>
                    <span><?php echo $rowLSP['LH_TEN'] ?></span></a>
                </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- /.container-fluid -->
                <?php require 'header.php'; ?>
                <?php
                   if(!isset($_SESSION['idkh'])){
                        echo "<script type='text/javascript'>
                            alert('Vui lòng đăng nhập vào hệ thống trước khi thêm giỏ hàng');
                            document.location='login.php';
                        </script>";
                    }else{
                        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
                        // echo "<pre>";
                        // print_r($cart);
    
                    }
                    
                   

                ?>

                <div class="container-fluid" style="margin-top: 80px;">
                  
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                                <!-- <th scope="col">Giá</th> -->
                                <th scope="col" class="text-center">Thao Tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $key => $value): ?>
                                <tr>
                                    <td><?php echo $key++; ?></td>
                                    <td><img src="./img/admin/<?php echo $value['image']; ?>" alt="" width="100px;"></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['quantity']; ?></td>
                                    <td><?php echo $value['price']; ?></td>

                                    <td>1</td>
                                </tr>
                            <?php endforeach; ?>
                           

                        </tbody>

                    </table>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thông tin chi tiết</h3>
                        </div>
                        <div class="panel-body deess">

                        </div>

                    </div>
                           
                </div>

                <!-- code in here -->.

                <!--  -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" nếu bạn muốn thoát khỏi phiên làm việc hiện tại.</div>
                <div class="modal-footer">
                    <form action="" method="post">

                        <input type="submit" class="btn btn-primary" value="Đăng xuất" name="logout">

                    </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>