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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>


<?php

    require_once "./database/database_connection.php";
    $sql = "SELECT * FROM san_pham";
    $result = $con->query($sql);

    if (isset($_POST['submit-add'])) {
        $KM_TEN = $_POST['name_promotion'];
        $KM_NGAYBD = $_POST['start_date'];
        $KM_NGAYKT = $_POST['end_date'];
        $CTKM_PHANTRAMKM = $_POST['sale']; //float
        $LOAI_HANG = $_POST['Loai_Hang'];
        $sqlKhuyenMai = "INSERT INTO `chi_tiet_khuyen_mai` (`SP_MA`, `CTKM_PHANTRAM`, `CTKM_TEN`, `CTKM_NGAYBD`, `CTKM_NGAYKT`) VALUES ('$LOAI_HANG', '$CTKM_PHANTRAMKM', ' $KM_TEN', '$KM_NGAYBD', '$KM_NGAYKT')";

        if (!$con->query($sqlKhuyenMai) === TRUE) {
            echo "<script type='text/javascript'>
                        alert('Không thêm được khuyến mãi thành công!');
                        document.location='dashboard-promotion.php';
                    </script>";
        } else {
            echo "<script type='text/javascript'>
                        alert('Thêm khuyến mãi thành công!');
                        document.location='dashboard-promotion.php';
                    </script>";
        }
    }

    $sqlkm = "SELECT ct.CTKM_MA, ct.CTKM_TEN, ct.CTKM_NGAYBD, ct.CTKM_NGAYKT, sp.SP_TEN, ct.CTKM_PHANTRAM
    FROM san_pham AS sp
        JOIN chi_tiet_khuyen_mai AS ct ON sp.SP_MA = ct.SP_MA;";
    $resultkm = $con->query($sqlkm);

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index-admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">A&T Shop Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index-admin.php   ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a class="nav-link" href="dashboard-order.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Đơn hàng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-product.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sản phẩm</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-product-details.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Chi tiết sản phẩm</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-warehouse.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kho hàng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-warehouse-import.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Nhập hàng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-promotion.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Khuyến mãi</span></a>
            </li>
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

                <!-- End of Topbar -->

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- /.container-fluid -->

                <!-- code in here -->.
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Khuyến mãi</h1>

                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <form method="post" action="">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-1 small" placeholder="Search " aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>

                            </div>
                        </form>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-download fa-sm text-white-50"></i>Thêm khuyễn mãi mới</button>

                    </div>



                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới khuyến mãi</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Tên khuyến mãi:</label>
                                            <input type="text" name="name_promotion"  class="form-control"  placeholder="Nhập tên khuyến mãi">
                                        </div>
                                        <div class="mb-3">
                                            <label>Loại sản phẩm</label> <br>
                                            <select class="form-select" aria-label="Default select example" name="Loai_Hang">
                                                <option value="">---Chọn loại sản phẩm---</option>
                                                <?php
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo " <option value=" . $row['SP_MA'] . ">";
                                                        echo   $row['SP_TEN'];
                                                        echo " </option>";
                                                    }
                                                    $result->free();
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Phần trăm khuyến mãi mãi:</label>
                                            <input type="type" name="sale" class="form-control" placeholder="Nhập tỉ lệ khuyến mãi">
                                        </div>

                                        <div class="mb-3">
                                            <label>Ngày bắt đầu áp dụng</label> <br>
                                            <input type="date" name="start_date" id="" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Ngày kết thúc</label>
                                            <input type="date" name="end_date" id="" class="form-control" >
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="submit-add" class="btn btn-primary" value="Thêm mới" >
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

                                        </div>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover" class="text-center">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên khuyến mãi</th>
                                <th scope="col">Ngày bắt đầu</th>
                                <th scope="col">Ngày kết thúc</th>
                                <th scope="col">Tên sản phẩm khuyến mãi</th>
                                <th scope="col">Phần trăm khuyến mãi </th>


                                <th scope="col" class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $i = 1;
                                while($rowkm = $resultkm->fetch_assoc()){
                                   
                                    echo "<tr>";
                                    echo " <th scope='row'>$i</th>";
                                    echo " <td > ". $rowkm['CTKM_TEN'] ." </td>";
                                    echo " <td > ". $rowkm['CTKM_NGAYBD'] ." </td>";
                                    echo " <td > ". $rowkm['CTKM_NGAYKT'] ." </td>";
                                    echo " <td > ". $rowkm['SP_TEN'] ." </td>";
                                    echo " <td > ". $rowkm['CTKM_PHANTRAM'] ." </td>"  ;
                                    echo " <td scope='row' class='text-center'>
                                        <a href='./dashboard-promotion-edit.php?id=". $rowkm['CTKM_MA'] ."' type='button' class='btn btn-primary btn-small'><i class='bi bi-pencil'></i>Sữa</a>
                                        <a href='./dashboard-promotion-delete.php?id=". $rowkm['CTKM_MA'] ."' type='button' class='btn btn-primary btn-small'><i class='bi bi-person-x'></i> Xóa</a>
                                    </td>";
                                
                                    echo " </tr>";
                                    $i++;
                                }
                            ?>

                        </tbody>

                    </table>
                </div>
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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