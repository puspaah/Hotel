<?php
// Ambil data dari URL
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'N/A';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : 'N/A';
$identity_number = isset($_GET['identity_number']) ? htmlspecialchars($_GET['identity_number']) : 'N/A';
$gender = isset($_GET['gender']) ? htmlspecialchars($_GET['gender']) : 'N/A';
$room_type = isset($_GET['room_type']) ? htmlspecialchars($_GET['room_type']) : 'N/A';
$stay_duration = isset($_GET['stay_duration']) ? htmlspecialchars($_GET['stay_duration']) : 'N/A';
$total_price = isset($_GET['total_price']) ? htmlspecialchars($_GET['total_price']) : 'Rp 0,00';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking Confirmation</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/templatemo-pod-talk.css">
</head>
<body>
<main>
    <nav class="navbar navbar-expand-lg">
            <div class="container">
                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Hotel" aria-label="Search">
                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="listing-page.php">Checkin Page</a></li>
                                <li><a class="dropdown-item" href="#Contact">About us</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ms-4">
                        <a href="listing-page.php" class="btn custom-btn custom-border-btn smoothscroll">Get started</a>
                    </div>
                </div>
            </div>
        </nav>
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">Konfirmasi Pemesanan</h2>
                </div>
            </div>
        </div>
    </header>
    <section class="latest-podcast-section section-padding pb-0" id="section_2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Detail Pemesanan Anda</h4>
                    </div>
                    <div class="custom-block-info">
                    <h5 class="mb-4">Terima kasih atas pemesanan Anda!</h5>
                            <li class="d-flex border-bottom pb-3 mb-4"><strong>Nama Pemesan:</strong> <?php echo $name; ?></li>
                            <li class="d-flex border-bottom pb-3 mb-4"><strong>Nomor Identitas:</strong> <?php echo $identity_number; ?></li>
                            <li class="d-flex border-bottom pb-3 mb-4"><strong>Jenis Kelamin:</strong> <?php echo $gender; ?></li>
                            <li class="d-flex border-bottom pb-3 mb-4"><strong>Tipe Kamar:</strong> <?php echo $room_type; ?></li>
                            <li class="d-flex border-bottom pb-3 mb-4"><strong>Durasi Menginap:</strong> <?php echo $stay_duration; ?> Hari</li>
                            <li class="d-flex border-bottom pb-3 mb-4"><strong>Total Harga:</strong> <?php echo $total_price; ?></li> <!-- Menggunakan total_price -->
                    </div>
                    <div class="mt-4">
                        <h5 class="mb-4">Kami berharap dapat menyambut Anda!</h5>
                        <p class="d-flex">Jika Anda memiliki pertanyaan, silakan hubungi kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding" id="Contact">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-5 col-12 pe-lg-5">
                            <div class="contact-info">
                                <h3 class="mb-4">My Hotels & Contact</h3>

                                <p class="d-flex border-bottom pb-3 mb-4">
                                    <strong class="d-inline me-4">Phone:</strong>
                                    <span>+62 851-5614-3307</span>
                                </p>

                                <p class="d-flex border-bottom pb-3 mb-4">
                                    <strong class="d-inline me-4">Email:</strong>
                                    <a href="puspaayusoleha@gmail.com">puspaayusoleha@gmail.com</a>
                                </p>

                                <p class="d-flex">
                                    <strong class="d-inline me-4">Location:</strong>
                                    <span>Jl. Pondok Cibubur No.32A Kota Depok</span>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                            <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.819917806043!2d103.84793601429608!3d1.281807962148459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190c2c94ccb3%3A0x11213560829baa05!2sTwitter!5e0!3m2!1sen!2smy!4v1669212183861!5m2!1sen!2smy" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>
                </div>
            </section>
    </main>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="subscribe-form-wrap">
                        <h6>Subscribe. Every weekly.</h6>
                        <form class="custom-form subscribe-form" action="#" method="get" role="form">
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required="">
                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control" id="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            
                <div class="col-lg-3 col-md-6 col-12">
                    <h6 class="site-footer-title mb-3">Download Mobile</h6>
                    <div class="site-footer-thumb mb-4 pb-2">
                        <div class="d-flex flex-wrap">
                            <a href="#">
                                <img src="images/app-store.png" class="me-3 mb-2 mb-lg-0 img-fluid" alt="">
                            </a>
                            <a href="#">
                                <img src="images/play-store.png" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <h6 class="site-footer-title mb-3">Social</h6>
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-12">
                </div>
                <div class="col-lg-3 col-12">
                    <p class="copyright-text mb-0">Copyright ©puspaayu
                    <br><br>
                    Design: <a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">@Puspaayu</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>