CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    gender ENUM('Laki-laki', 'Perempuan') NOT NULL,
    identity_number VARCHAR(16) NOT NULL,
    room_type ENUM('Standard', 'Deluxe', 'Family') NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    booking_date DATE NOT NULL,
    stay_duration INT NOT NULL,
    breakfast BOOLEAN NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL
);
