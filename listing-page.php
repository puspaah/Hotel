<?php
include 'config.php'; // Menghubungkan ke database

// Inisialisasi variabel untuk menampilkan pesan
$message = "";

// Proses jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $identity_number = $_POST['identity_number'];
    $room_type = $_POST['room_type'];
    $email = $_POST['email']; // Menambahkan email
    $price = 0;

    // Set harga berdasarkan tipe kamar
    switch ($room_type) {
        case 'Standard':
            $price = 500000;
            break;
        case 'Deluxe':
            $price = 750000;
            break;
        case 'Family':
            $price = 1000000;
            break;
    }

    $booking_date = $_POST['booking_date'];
    $stay_duration = $_POST['stay_duration'];
    $breakfast = $_POST['breakfast'] == '1' ? true : false;

    // Hitung total harga
    $total_price = $price * $stay_duration;
    if ($breakfast) {
        $total_price += 80000; // Tambahan untuk sarapan
    }
    if ($stay_duration > 3) {
        $total_price *= 0.9; // Diskon 10%
    }

    // Simpan ke database
    $stmt = $pdo->prepare("INSERT INTO reservations (name, gender, identity_number, room_type, price, booking_date, stay_duration, breakfast, total_price, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$name, $gender, $identity_number, $room_type, $price, $booking_date, $stay_duration, $breakfast, $total_price, $email])) {
        // Redirect ke halaman konfirmasi dengan data pemesanan
        header("Location: confirmation.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&checkin=" . urlencode($booking_date) . "&checkout=" . urlencode($booking_date) . "&guests=" . urlencode($stay_duration) . "&total_price=" . urlencode(number_format($total_price, 2)));
        exit();
    } else {
        $message = "Terjadi kesalahan saat menyimpan pemesanan.";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hotel Booking</title>

    <!-- CSS FILES --> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">
                        
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/bootstrap-icons.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link href="css/templatemo-pod-talk.css" rel="stylesheet">
<!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>
    
<body>

    <main>
    
    <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.php">
                
                </a>
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item active" href="listing-page.php">Checkin Page</a></li>
                                <li><a class="dropdown-item" href="#form">Order</a></li>
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
                        <h2 class="mb-0">Form Pemesanan Hotel</h2>
                    </div>
                </div>
            </div>
        </header>
        <section class="booking-section section-padding" id="form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <form action="process_booking.php" method="post" class="custom-form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Pemesan</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="" disabled selected>Pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                             <label for="identity_number" class="form-label">Nomor Identitas</label>
                                <input type="text" class="form-control" id="identity_number" name="identity_number" pattern="\d{16}" title="Harus 16 digit" required>
                                <small id="identity_number_error" class="form-text text-danger" style="display: none;">Nomor identitas harus 16 digit.</small>
                            </div>
                            <div class="mb-3">
                                <label for="room_type" class="form-label">Tipe Kamar</label>
                                <select class="form-select" id="room_type" name="room_type" required>
                                    <option value="" disabled selected>Pilih tipe kamar</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Deluxe">Deluxe</option>
                                    <option value="Family">Family</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="price" name="price" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="booking_date" class="form-label">Tanggal Pesan</label>
                                <input type="date" class="form-control" id="booking_date" name="booking_date" required 
                                 min="<?php echo date('Y-m-d'); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="stay_duration" class="form-label">Durasi Menginap (Hari)</label>
                                <input type="number" class="form-control" id="stay_duration" name="stay_duration" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="breakfast" class="form-label">Termasuk Breakfast?</label>
                                <select class="form-select" id="breakfast" name="breakfast" required>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="total_price" class="form-label">Total Bayar</label>
                                <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                            </div>
                            <button type="button" class="btn custom-btn" onclick="calculateTotal()">Hitung Total Bayar</button>
                            <button type="submit" class="btn custom-btn">Simpan</button>
                        </form>
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
                            <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]@[^ @]" class="form-control" placeholder="Email Address" required="">
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
                    <a class="navbar-brand" href="index.php">
                        <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                    </a>
                </div>
                <div class="col-lg-3 col-12">
                    <p class="copyright-text mb-0">Copyright ©puspaayu
                    <br><br>
                    Design: <a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">puspaayu</a></p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
    const identityInput = document.getElementById('identity_number');
    const errorMessage = document.getElementById('identity_number_error');
    const form = document.getElementById('bookingForm');

    // Event listener to check real-time input validation for identity number
    identityInput.addEventListener('input', function() {
        const value = identityInput.value;

        // Check if input is not 16 digits
        if (value.length !== 16 || !/^\d{16}$/.test(value)) {
            errorMessage.style.display = 'block';  // Show error message
        } else {
            errorMessage.style.display = 'none';   // Hide error message if 16 digits
        }

        // Ensure that only 16 digits are entered
        if (value.length > 16) {
            identityInput.value = value.substring(0, 16);  // Only take the first 16 digits
        }
    });

    // Price calculation function
    function calculateTotal() {
        const roomType = document.getElementById('room_type').value;
        const stayDuration = parseInt(document.getElementById('stay_duration').value);
        let price = 0;

        // Set price based on room type
        switch (roomType) {
            case 'Standard':
                price = 500000;
                break;
            case 'Deluxe':
                price = 750000;
                break;
            case 'Family':
                price = 1000000;
                break;
        }

        let total = price * stayDuration;

        // Check for breakfast
        const breakfast = document.getElementById('breakfast').value;
        if (breakfast === '1') {
            total += 80000; // Tambahan untuk sarapan
        }

        // Apply discount if stay duration is more than 3 days
        if (stayDuration > 3) {
            total *= 0.9; // Diskon 10%
        }

        document.getElementById('price').value = price.toFixed(2);
        document.getElementById('total_price').value = total.toFixed(2);
    }
</script>

</body>
</html>