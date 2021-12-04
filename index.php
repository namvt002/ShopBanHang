<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A&T Shop</title>
    <!-- CSS only -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<?php



?>

<body>

    <section id="main">
        <?php require "header.php"; ?>
        <!-- slidershow -->
        <div id="sliderShow">
            <div class="container-xxl" style="max-height: 60%;">
                <div class="row">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/client/sliderShow2.jpg" id="img-slider" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/client/sliderShow1.jpg" id="img-slider" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/client/sliderShow3.jpg" id="img-slider" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- coudown sale -->

    <div class="container">
        <section class="section-center">
            <!-- image -->
            <article class="gift-img">
                <img id="img-save" src="./img/client/save.png" alt="gift" />
            </article>
            <!-- info -->
            <article class="gift-info">
                <h3>Giveaway mùa covid</h3>
                <h4 class="giveaway">
                    Giveaway mùa đông, 30-12-2021, 23:59PM
                </h4>
                <p id="paragraph">
                # Hãy tham gia chương trình khuyến mãi mùa đông, một trang web dành cho các mặt hàng thời trang từ các nhà thiết kế tuyệt vời! 200$ cho một người chiến thắng, 100 đô la mỗi người cho hai người chiến thắng! #giveaway qua A&T.vn
                </p>
                <div class="deadline">

                    <div class="deadline-format">
                        <div>
                            <h4 class="days" class="giveaway1">20</h4>
                            <span>Ngày</span>
                        </div>
                    </div>

                    <div class="deadline-format">
                        <div>
                            <h4 class="hours" class="giveaway1">50</h4>
                            <span>Giờ</span>
                        </div>
                    </div>

                    <div class="deadline-format">
                        <div>
                            <h4 class="minutes" class="giveaway1">30</h4>
                            <span>phút</span>
                        </div>
                    </div>

                    <div class="deadline-format">
                        <div>
                            <h4 class="seconds">20</h4>
                            <span>giây</span>
                        </div>
                    </div>

                </div>
            </article>
        </section>

    </div>


    <!-- about -->
    <div class="container" id="aboutClient">
        <section class="sectionAbout">
            <div class="title">
                <h2>Giới thiệu A&T</h2>
                <p>
                   Khách hàng là tất cả
                </p>
            </div>

            <div class="about-center section-center">
                <article class="about-img">
                    <img src="img/client/A & T.jpg" alt="" />
                </article>
                <article class="about">
                    <!-- btn container -->
                    <div class="btn-container">
                        <button class="tab-btn active" data-id="history">Nhà A&T</button>
                        <button class="tab-btn" data-id="vision">Giá trị</button>
                        <button class="tab-btn" data-id="goals">Mục đích</button>
                    </div>
                    <div class="about-content">
                        <!-- single item -->
                        <div class="content active" id="history">
                            <h4>A$T - NHÀ CỦA GU</h4>
                            <p>
                                Streetwear của giới trẻ Việt đang phát triển không ngừng và ngày càng khó tính hơn, kiểu cách hơn...<br>
                                Theo xu hướng, AT.VN đang có những bước chuyển mình đầy táo bạo...<br>
                                ĐA DẠNG CÁC GU THỜI TRANG chính là phong cách hiện tại của YaMe.vn<br>
                                Đến với A&T, sẽ đáp ứng mọi nhu cầu thời trang hàng ngày cho bạn:  ĐI HỌC, ĐI CHƠI, ĐI LÀM, DU LỊCH, DẠO PHỐ, TIỆC TÙNG, THỂ THAO
                                
                            </p>
                        </div>
                        <!-- end of single item -->
                        <!-- single item -->
                        <div class="content" id="vision">
                            <h4>Giá trị</h4>
                            <p>
                            Không mãi chạy theo xu hướng, đánh mất mình. A&T vẫn luôn giữ những giá trị đã xây đựng và phát triền bao lâu nay, những điểm nổi bật đã mang khách hàng đến với YaMe trong suốt thời gian qua:<br>
                            Bên cạnh những sản phẩm đầu tư và “chất chơi” kén người mặt, A&T vẫn ra mắt đều đặn những thiết kế casual với mức giá tuyệt vời dành cho sinh viên
                            <br><br>
                            </p>
                        </div>
                        <!-- end of single item -->
                        <!-- single item -->
                        <div class="content" id="goals">
                            <h4>Mục đích</h4>
                            <p>
                            Sự và thuận tiện trong mua sắm cho các bạn trẻ là mối quan tâm hàng đầu mà A&T đặt ra, với lối trưng bày theo phong cách "factory" mạnh mẽ, lôi cuốn và gần gũi, A&T mang lại một không gian trải nghiệm tuyệt vời cho các bạn trẻ.
                            <br><br><br><br>
                            </p>
                        </div>
                        <!-- end of single item -->
                    </div>
                </article>
            </div>
        </section>
    </div>

    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    
                        <input  type="submit" class="btn btn-primary" value="Đăng xuất" name="logout">

                    </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                </div>
            </div>
        </div>
    </div>
    


    <?php require "footer.php"; ?>


    <script src="js/index.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>