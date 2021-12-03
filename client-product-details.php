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
    <link href="css/client-product-details.css"   rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->


</head>

<?php
    require_once "./database/database_connection.php";

    $id = $_GET["id"];
    $sqlDetails = "SELECT * FROM `san_pham` as sp JOIN loai_san_pham as lsp ON sp.LH_MA = lsp.LH_MA JOIN nha_san_xuat as nsx ON sp.NSX_MA = nsx.NSX_MA WHERE SP_MA = '" . $_GET['id'] . "'";
    $resultDetails = $con->query($sqlDetails);
    $rowDetails = $resultDetails->fetch_assoc();

    


?>

<style>
    #details {
        border-style: solid;
        border-width: 1px 1px 1px 0px; /* 25px top, 10px right, 4px bottom and 35px left */
    }

    #details-img{
    
        border-style: solid;
        border-width: 1px 0px 1px 1px; /* 25px top, 10px right, 4px bottom and 35px left */
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

                <div class="container-fluid" style="margin-top:80px;">
                    <div class="row" style="padding-left: 10%; padding-right:10%;" >
                        <!-- <a id="details" id="details"> -->
                      
                            <div class="col text-center" id="details-img" >
                                <img src="./img/admin/<?php echo $rowDetails['SP_ANH']; ?>" class="rounded" style="width:20rem; margin-top:30px;">

                            </div>
                            <div class="col" style="padding: 30px;" id="details" >
                                <h4 class="pro-d-title">
                                    <a href="#" class="">
                                        <?php echo $rowDetails['SP_TEN']; ?>
                                    </a>
                                </h4>
                                <p>
                                    <?php echo $rowDetails['SP_CT']; ?>
                                </p>
                                <div class="product_meta">
                                    <span class="posted_in"> <strong>Loại sản phẩm:</strong> <?php echo $rowDetails['LH_TEN']; ?> </span>
                                </div>
                                <div class="m-bot15"> <strong>Giá : </strong> <span class="amount-old"> <?php echo $rowDetails['SP_GIA']; ?></span> <span class="pro-price"> VND</span></div>
                                <form action="client-product-cart.php?id=<?php echo $rowDetails['SP_MA']; ?>" method="post">
                                    
                                    <label>Màu sắc: </label>
                                    <?php
                                        $sqlColor = "SELECT * FROM mau";
                                        $resultColor = $con->query($sqlColor);
                                    ?>
                                    <div class="form-group">
                                        <?php
                                             while ($rowColor = $resultColor->fetch_assoc()) {
                                                echo " 
                                                <input type='radio' name='color' class='color' aria-label='Checkbox for following text input' value=".
                                                $rowColor['M_MA'] .">
                                                <span> ". $rowColor['M_TEN'] ." </span>
                                                ";
                                             }
                                        ?>

                                    </div>

                                    <label>Size: </label>
                                    <div class="form-group">

                                        <?php
                                            $sqlSize = "SELECT * FROM size";
                                            $resultSize = $con->query($sqlSize);
                                        ?>
                                          <?php
                                             while ($rowSize = $resultSize->fetch_assoc()) {
                                                echo " 
                                                <input type='radio' name='size' class='size' aria-label='Checkbox for following text input' value=".
                                                $rowSize['S_MA'] .">
                                                <span class='spanSize'> ". $rowSize['S_TEN'] ." </span>
                                                ";
                                             }
                                        ?>

                                        
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input style="width:150px;" type="number" class="form-control" name="quantity" value="1" min="1" max="100">
                                    </div>

                                    <input class="btn btn-round btn-danger"  type="submit" name="add-to-card" value="Thêm vào giỏ hàng">
                                        <i class="fa fa-shopping-cart"></i>
                                    </input>
                                </form>

                                </p>
                            </div>
                        <!-- </a> -->

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