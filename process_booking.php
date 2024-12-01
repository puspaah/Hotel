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
    $stmt = $pdo->prepare("INSERT INTO reservations (name, gender, identity_number, room_type, price, booking_date, stay_duration, breakfast, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$name, $gender, $identity_number, $room_type, $price, $booking_date, $stay_duration, $breakfast, $total_price])) {
        // Redirect ke halaman konfirmasi dengan data pemesanan
        header("Location: confirmation.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&identity_number=" . urlencode($identity_number) . "&gender=" . urlencode($gender) . "&room_type=" . urlencode($room_type) . "&stay_duration=" . urlencode($stay_duration) . "&total_price=" . urlencode(number_format($total_price, 2, ',', '.')));
        exit();
    } else {
        $message = "Terjadi kesalahan saat menyimpan pemesanan.";
    }
}
?>
