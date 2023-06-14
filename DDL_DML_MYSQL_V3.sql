CREATE DATABASE swiftAir;
USE swiftAir;

-- Membuat tabel Pemesan
CREATE TABLE Pemesan (
Pm_ID INT AUTO_INCREMENT PRIMARY KEY,
Pm_Username VARCHAR(30),
Pm_Nama VARCHAR(60),
Pm_No_Telp CHAR(15),
Pm_Email VARCHAR(30),
Pm_Password VARCHAR(30)
);

-- Insert into table Pemesan
INSERT INTO Pemesan (Pm_Username, Pm_Nama, Pm_No_Telp, Pm_Email, Pm_Password)
VALUES
  ('user1', 'Lee Donghae', '1234567890', 'john.doe@example.com', 'password1'),
  ('user2', 'Jane Smith', '0987654321', 'jane.smith@example.com', 'password2'),
  ('user3', 'Michael Johnson', '111222333', 'michael.johnson@example.com', 'password3'),
  ('user4', 'Emily Davis', '444555666', 'emily.davis@example.com', 'password4'),
  ('user5', 'Daniel Wilson', '777888999', 'daniel.wilson@example.com', 'password5'),
  ('user6', 'Jessica Lee', '555666777', 'jessica.lee@example.com', 'password6'),
  ('user7', 'David Brown', '888999000', 'david.brown@example.com', 'password7'),
  ('user8', 'Sophia Johnson', '123123123', 'sophia.johnson@example.com', 'password8'),
  ('user9', 'Leonardo Da Vinci', '456456456', 'monalisa.cintaq@example.com', 'password9'),
  ('user10', 'Olivia Thomas', '789789789', 'olivia.thomas@example.com', 'password10');

-- Membuat sequence untuk tabel model_pesawat
CREATE TABLE model_pesawat (
Mp_ID INT AUTO_INCREMENT PRIMARY KEY,
Mp_Nama VARCHAR(60) NOT NULL,
Mp_Manufacturer VARCHAR(100) NOT NULL,
Mp_Jumlah_Kursi INT NOT NULL
);

INSERT INTO model_pesawat (Mp_Nama, Mp_Manufacturer, Mp_Jumlah_Kursi)
VALUES
('Boeing 737-200', 'Boeing', 130),
('Boeing 737-500 Winglet', 'Boeing', 132),
('Next Generation Boeing 737-800', 'Boeing', 162),
('Boeing 737-800', 'Boeing', 162),
('Boeing 737-900', 'Boeing', 177),
('Boeing 737 MAX 8', 'Boeing', 178),
('Airbus A320', 'Airbus', 150),
('Airbus A330-200', 'Airbus', 246),
('Embraer E190', 'Embraer', 100),
('Bombardier CRJ900', 'Bombardier', 76);

-- Membuat sequence untuk tabel Penumpang
CREATE TABLE Penumpang (
P_ID INT AUTO_INCREMENT PRIMARY KEY,
P_Nama VARCHAR(60) NOT NULL,
P_NIK CHAR(16) NOT NULL
);

INSERT INTO Penumpang (P_Nama, P_NIK)
values
('Elon Musk', '3201010101010101'),
('Albert Einstein', '3302020202020202'),
('Michael Jackson', '3403030303030303'),
('Oprah Winfrey', '3504040404040404'),
('Selena Gomez', '3605050505050505'),
('Leonardo da Vinci', '3706060606060606'),
('Amelia Earhart', '3807070707070707'),
('Nelson Mandela', '3908080808080808'),
('Marie Curie', '4009090909090909'),
('Walt Disney', '4110101010101010');

-- BANDARA
CREATE TABLE bandara (
  B_ID CHAR(3) PRIMARY KEY,
  B_Nama_Bandara VARCHAR(100) NOT NULL,
  B_Lokasi VARCHAR(100) NOT NULL,
  B_KodeKota VARCHAR(5) not null,
  B_Email VARCHAR(100) NOT NULL,
  B_Telepon VARCHAR(15) NOT NULL
);

INSERT INTO bandara (B_ID, B_Nama_Bandara, B_Lokasi, B_Email, B_Telepon)
VALUES
('CGK', 'Bandar Udara Internasional Soekarno–Hatta', 'Tangerang, Banten, Indonesia', 'contact.center@angkasapura2.co.id', '622155912648'),
('SUB', 'Bandar Udara Internasional Juanda', 'Jalan Ir. Haji Juanda, Surabaya, Indonesia', 'cc172@ap1.co.id', '62312986200'),
('JOG', 'Bandar Udara Internasional Adisucipto', 'Maguwoharjo, Daerah Istimewa Yogyakarta, Indonesia', 'humas.jog@ap1.co.id', '62274484261'),
('BTJ', 'Bandar Udara Internasional Sultan Iskandar Muda', 'Blang Bintang, Aceh Besar, Indonesia', 'contact.center@angkasapura2.co.id', '6265121341'),
('DPS', 'Bandar Udara Internasional Ngurah Rai', 'Kelurahan Tuban, Bali, Indonesia', 'cc172@ap1.co.id', '623619351011'),
('HLP', 'Bandar Udara Halim Perdanakusuma', 'Halim Perdanakusuma, Jakarta, Indonesia', 'info@halimperdanakusumaaero.com', '622180153'),
('PDG', 'Bandar Udara Internasional Minangkabau', 'Ketaping, Padang Pariaman, Sumatera Barat, Indonesia', 'cc172@ap1.co.id', '627517408'),
('SRG', 'Bandar Udara Internasional Adi Sumarmo', 'Colomadu, Karanganyar, Jawa Tengah, Indonesia', 'ccsrg@inaca.co.id', '622712210005'),
('UPG', 'Bandar Udara Internasional Sultan Hasanuddin', 'Maros, Sulawesi Selatan, Indonesia', 'cc172@ap1.co.id', '62411966444'),
('PKU', 'Bandar Udara Internasional Sultan Syarif Kasim II', 'Pekanbaru, Riau, Indonesia', 'pku@ap1.co.id', '6281247029596');


-- PESAWAT
CREATE TABLE pesawat (
  Pe_ID INT PRIMARY KEY AUTO_INCREMENT,
  Mp_ID INT NOT NULL,
  FOREIGN KEY (Mp_ID) REFERENCES model_pesawat(Mp_ID)
);

INSERT INTO Pesawat (Mp_ID)
VALUES
(1),
(2),
(3),
(1),
(4),
(5),
(7),
(9),
(6),
(8);

-- DESTINASI
CREATE TABLE destinasi (
    D_ID INT PRIMARY KEY AUTO_INCREMENT,
    D_Lokasi_Asal CHAR(3) NOT NULL,
    D_Lokasi_Tujuan CHAR(3) NOT NULL
);

INSERT INTO destinasi (D_Lokasi_Asal, D_Lokasi_Tujuan) VALUES
('JKT', 'BDG'),
('JKT', 'JOG'),
('BDG', 'JKT'),
('JOG', 'DPS'),
('DPS', 'JKT'),
('CGK', 'DPS'),
('SUB', 'PKU'),
('DPS', 'JOG'),
('SRG', 'UPG'),
('CGK', 'PDG');

-- PENERBANGAN
CREATE TABLE penerbangan (
  Pn_ID INT PRIMARY KEY AUTO_INCREMENT,
  D_ID INT NOT NULL,
  FOREIGN KEY (D_ID) REFERENCES destinasi(D_ID)
);

insert into penerbangan (D_ID)
values 
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- ADMIN
CREATE TABLE admin (
    Ad_ID INT PRIMARY KEY AUTO_INCREMENT,
    Ad_Username VARCHAR(30) NOT NULL,
    Ad_Password VARCHAR(30) NOT NULL
);

INSERT INTO admin (Ad_Username, Ad_Password)
VALUES
('Sabrina', 'password1'),
('Rayssa', 'password2'),
('Diajeng', 'password3'),
('Talitha', 'password4'),
('Ariana', 'password5'),
('Michelle', 'password6'),
('Sophie', 'password7'),
('Oliver', 'password8'),
('Ethan', 'password9'),
('Emma', 'password10');

-- STATUS PEMBAYARAN
CREATE TABLE status_pembayaran (
    Sp_ID INT PRIMARY KEY AUTO_INCREMENT,
    Sp_Nama_Status VARCHAR(10) NOT NULL
);

-- Insert into table status_pembayaran
INSERT INTO status_pembayaran (Sp_Nama_Status) VALUES
('Berhasil'),
('Gagal'),
('Pending');

-- KELAS
CREATE TABLE kelas (
    K_ID CHAR(1) PRIMARY KEY NOT NULL,
    K_Nama VARCHAR(30) NOT NULL,
    K_Persentase_Kursi FLOAT(1) NOT NULL
);

INSERT INTO kelas (K_ID, K_Nama, K_Persentase_Kursi)
VALUES
    ('E', 'Economy', 0.7),
    ('B', 'Business', 0.2),
    ('F', 'FirstClass', 0.1);

-- KURSI PESAWAT
CREATE TABLE kursi_pesawat (
	Ku_ID CHAR(4) PRIMARY KEY NOT NULL,
	Ku_Status_Reservasi CHAR(1) NOT NULL,
    K_ID CHAR(1),
    Pe_ID INT,
	FOREIGN KEY (K_ID) REFERENCES kelas(K_ID),
    FOREIGN KEY (Pe_ID) REFERENCES pesawat(Pe_ID)
);

INSERT INTO kursi_pesawat (Ku_ID, Ku_Status_Reservasi, K_ID, Pe_ID)
VALUES
    ('15A', 'A', 'E', 2),
    ('1A', 'R', 'B', 3),
    ('27D', 'A', 'F', 1),
    ('6A', 'A', 'E', 4),
    ('5F', 'R', 'E', 5),
    ('10B', 'A', 'E', 2),
    ('3C', 'R', 'B', 4),
    ('8E', 'A', 'B', 3),
    ('2D', 'A', 'F', 5),
    ('12F', 'R', 'E', 1);

-- HARGA
CREATE TABLE Harga (
    H_ID INT AUTO_INCREMENT PRIMARY KEY,
    H_Harga DECIMAL(19, 0) NOT NULL,
    K_ID CHAR(1) NOT NULL,
    Pn_ID INT NOT NULL,
    FOREIGN KEY (Pn_ID) REFERENCES Penerbangan(Pn_ID),
    FOREIGN KEY (K_ID) REFERENCES kelas(K_ID)
);

insert into harga (H_Harga, K_ID, Pn_ID) 
values
(100000, 'E', 1),
(2000000, 'B', 1),
(3000000, 'F', 1),
(200000, 'E', 9),
(300000, 'B', 9),
(700000, 'F', 9),
(1700000, 'F', 3),
(700000, 'B', 3),
(70000, 'E', 3),
(1500000, 'E', 2),
(7000000, 'B', 2),
(15000000, 'F', 2),
(3500000, 'B', 4),
(400000, 'E', 4),
(50000000, 'F', 4),
(100000, 'E', 8),
(4000000, 'B', 8),
(6000000, 'F', 8),
(100000, 'B', 10),
(120000, 'F', 10),
(1300000, 'E', 10),
(1500000, 'E', 5),
(8000000, 'B', 5),
(45000000, 'F', 5),
(5000000, 'E', 6),
(20000000, 'F', 6),
(10000000, 'B', 6),

-- JADWAL PENERBANGAN
CREATE TABLE jadwal_penerbangan (
    Jp_ID INT AUTO_INCREMENT PRIMARY KEY,
    Jp_Tanggal_Waktu_Departure DATETIME NOT NULL,
    Jp_Tanggal_Waktu_Arrival DATETIME NOT NULL,
    Jp_Bandara_Asal VARCHAR(100) NOT NULL,
    Jp_Bandara_Tujuan VARCHAR(100) NOT NULL,
    Pe_ID INT,
    B_ID CHAR(3),
    Pn_ID INT,
    FOREIGN KEY (Pe_ID) REFERENCES pesawat(Pe_ID),
    FOREIGN KEY (B_ID) REFERENCES bandara(B_ID),
    FOREIGN KEY (Pn_ID) REFERENCES penerbangan(Pn_ID)
);

INSERT INTO jadwal_penerbangan (Jp_Tanggal_Waktu_Departure, Jp_Tanggal_Waktu_Arrival, Jp_Bandara_Asal, Jp_Bandara_Tujuan, Pe_ID, B_ID, Pn_ID)
VALUES
('2023-06-16 09:00:00', '2023-06-16 11:00:00', 'Bandar Udara Internasional Soekarno-Hatta', 'Bandar Udara Internasional Juanda', 1, 'CGK', 1),
('2023-06-17 14:30:00', '2023-06-17 16:30:00', 'Bandar Udara Internasional Juanda', 'Bandar Udara Internasional Ngurah Rai', 2, 'SUB', 2),
('2023-06-18 12:00:00', '2023-06-18 14:00:00', 'Bandar Udara Internasional Sultan Iskandar Muda', 'Bandar Udara Internasional Adisucipto', 3, 'BTJ', 3),
('2023-06-19 08:45:00', '2023-06-19 10:45:00', 'Bandar Udara Internasional Ngurah Rai', 'Bandar Udara Internasional Juanda', 4, 'DPS', 4),
('2023-06-20 11:30:00', '2023-06-20 13:30:00', 'Bandar Udara Internasional Adisucipto', 'Bandar Udara Internasional Soekarno-Hatta', 5, 'JOG', 5),
('2023-06-21 16:00:00', '2023-06-21 18:00:00', 'Bandar Udara Internasional Soekarno–Hatta', 'Bandar Udara Internasional Juanda', 6, 'CGK', 6),
('2023-06-21 18:30:00', '2023-06-21 20:00:00', 'Bandar Udara Internasional Juanda', 'Bandar Udara Internasional Ngurah Rai', 9, 'SUB', 6),
('2023-06-16 10:30:00', '2023-06-16 12:30:00', 'Bandar Udara Internasional Juanda', 'Bandar Udara Halim Perdanakusuma', 6, 'SUB', 7),
('2023-06-16 13:40:00', '2023-06-16 15:20:00', 'Bandar Udara Internasional Halim Perdanakusuma', 'Bandar Udara Internasional Sultan Syarif Kasim II', 7, 'HLP', 7),
('2023-06-18 13:15:00', '2023-06-18 15:15:00', 'Bandar Udara Internasional Ngurah Rai', 'Bandar Udara Internasional Adisucipto', 8, 'DPS', 8),
('2023-06-19 09:45:00', '2023-06-19 11:45:00', 'Bandar Udara Internasional Internasional Adi Sumarmo', 'Bandar Udara Internasional Sultan Hasanuddin', 3, 'SRG', 9),
('2023-06-20 14:00:00', '2023-06-20 16:00:00', 'Bandar Udara Internasional Juanda', 'Bandar Udara Internasional Minangkabau', 1, 'CGK', 10);

-- Membuat tabel Pembayaran
CREATE TABLE Pembayaran (
    Pb_ID INT AUTO_INCREMENT PRIMARY KEY,
    Pb_Tanggal_Waktu_Bayar DATE,
    Pb_Nomor_Kartu CHAR(16),
    Pb_Tanggal_Valid DATE,
    Pb_Nama_di_Kartu VARCHAR(60),
    Pb_CVV CHAR(4),
    Sp_ID INT,
    FOREIGN KEY (Sp_ID) REFERENCES status_pembayaran(Sp_ID)
);

-- Insert into table Pembayaran
INSERT INTO Pembayaran (Pb_ID, Pb_Tanggal_Waktu_Bayar, Pb_Nomor_Kartu, Pb_Tanggal_Valid, Pb_Nama_di_Kartu, Pb_CVV, Sp_ID)
VALUES
  (1, '2023-06-01', '1234567890123456', '2024-06-01', 'Lee Donghae', '123',1),
  (2, '2023-06-02', '9876543210987654', '2024-06-02', 'Jane Smith', '456', 2),
  (3, '2023-06-03', '1111222233334444', '2024-06-03', 'Michael Johnson', '789', 3),
  (4, '2023-06-04', '4444333322221111', '2024-06-04', 'Emily Davis', '012', 1),
  (5, '2023-06-05', '7777888899990000', '2024-06-05', 'Daniel Wilson', '345', 2),
  (6, '2023-06-06', '2222111133334444', '2024-06-06', 'Sabrina', '678', 3),
  (7, '2023-06-07', '5555444433332222', '2024-06-07', 'Rayssa', '901', 1),
  (8, '2023-06-08', '8888777766665555', '2024-06-08', 'Diajeng', '234', 2),
  (9, '2023-06-09', '3333222211110000', '2024-06-09', 'Talitha', '567', 3),
  (10, '2023-06-10', '6666555544443333', '2024-06-10', 'Ariana', '890', 1);

-- Membuat tabel Reservasi
CREATE TABLE Reservasi (
    R_ID INT AUTO_INCREMENT PRIMARY KEY,
    R_Jumlah_Kursi INT,
    R_Tanggal DATE,
    Ad_ID INT,
    Pm_ID INT,
    Pn_ID INT,
    Pb_ID INT,
    FOREIGN KEY (Ad_ID) REFERENCES Admin(Ad_ID),
    FOREIGN KEY (Pm_ID) REFERENCES Pemesan(Pm_ID),
    FOREIGN KEY (Pn_ID) REFERENCES Penerbangan(Pn_ID),
    FOREIGN KEY (Pb_ID) REFERENCES Pembayaran(Pb_ID)
);

-- Insert into table Reservasi
INSERT INTO Reservasi (R_Jumlah_Kursi, R_Tanggal, Ad_ID, Pm_ID, Pn_ID, Pb_ID)
VALUES
  (2, '2023-06-10', 1, 1, 1, 1),
  (1, '2023-06-11', 2, 2, 2, 2),
  (4, '2023-06-12', 3, 9, 3, 3),
  (3, '2023-06-13', 4, 9, 4, 4),
  (2, '2023-06-14', 3, 5, 5, 5),
  (6, '2023-06-15', 4, 9, 6, 6),
  (7, '2023-06-16', 10, 1, 7, 7),
  (8, '2023-06-17', 8, 9, 8, 8),
  (9, '2023-06-18', 9, 1, 9, 9),
  (10, '2023-06-19', 10, 1, 10, 10);

-- Membuat tabel Tiket_Individual
CREATE TABLE Tiket_Individual (
    Ti_ID INT AUTO_INCREMENT PRIMARY KEY,
    Ti_Bagasi INT,
    R_ID INT,
    Jp_ID INT,
    P_ID INT,
    FOREIGN KEY (R_ID) REFERENCES Reservasi(R_ID),
    FOREIGN KEY (Jp_ID) REFERENCES Jadwal_Penerbangan(Jp_ID),
    FOREIGN KEY (P_ID) REFERENCES Penumpang(P_ID)
);

-- Insert into table Tiket_Individual
INSERT INTO Tiket_Individual (Ti_Bagasi, R_ID, Jp_ID, P_ID)
VALUES
  (1, 1, 1, 1),
  (0, 2, 2, 2),
  (2, 3, 3, 3),
  (1, 4, 4, 4),
  (0, 5, 5, 5),
  (2, 6, 6, 6),
  (1, 7, 7, 7),
  (0, 8, 8, 8),
  (1, 9, 9, 9),
  (0, 10, 10, 10);
  