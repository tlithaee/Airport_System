-- Membuat sequence untuk tabel Pemesan
CREATE SEQUENCE pemesan_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

-- Membuat tabel Pemesan
CREATE TABLE Pemesan (
  Pm_ID INTEGER DEFAULT nextval('pemesan_sq') PRIMARY KEY,
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
CREATE SEQUENCE model_pesawat_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;


CREATE TABLE model_pesawat (
    Mp_ID int primary key default nextval('model_pesawat_sq'),
    Mp_Nama varchar(60) NOT NULL,
    Mp_Manufacturer varchar(100) NOT NULL,
    Mp_Jumlah_Kursi int NOT NULL
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

CREATE SEQUENCE Penumpang_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

-- CREATE TABLE PENUMPANG
create table Penumpang (
	P_ID int primary key default nextval('Penumpang_sq'),
	P_Nama varchar(60) not null,
	P_NIK char(16) not null
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

CREATE TABLE bandara (
	B_ID CHAR(3) NOT NULL PRIMARY KEY,
	B_Nama VARCHAR(100),
	B_Alamat VARCHAR(100),
	B_Email VARCHAR(60),
	B_No_Telp CHAR(15)
);

INSERT INTO bandara
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
CREATE SEQUENCE Pesawat_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE Pesawat (
	Pe_ID int primary key default nextval('Pesawat_sq'),
	Mp_ID int not null,
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
CREATE SEQUENCE destinasi_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE destinasi (
    D_ID INT PRIMARY KEY DEFAULT nextval('destinasi_sq'),
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
CREATE SEQUENCE Penerbangan_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

create table penerbangan (
	Pn_ID int primary key default nextval ('Penerbangan_sq'),
	D_ID int not null,
	foreign key (D_ID) references destinasi(D_ID)
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
CREATE SEQUENCE admin_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE admin (
    Ad_ID INT PRIMARY KEY DEFAULT nextval('admin_sq'),
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
CREATE SEQUENCE status_pembayaran_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE status_pembayaran (
    Sp_ID INT PRIMARY KEY DEFAULT nextval('status_pembayaran_sq'),
    Sp_Nama_Status VARCHAR(10) NOT NULL
);

INSERT INTO status_pembayaran (Sp_Nama_Status) VALUES
('Berhasil'),
('Gagal'),
('Pending');

-- KELAS
CREATE TABLE kelas (
    K_ID CHAR(1) PRIMARY KEY NOT NULL,
    K_Nama VARCHAR (30) NOT NULL,
    K_Persentase_Kursi FLOAT (1) NOT NULL
);

INSERT INTO Kelas (K_ID, K_Nama, K_Persentase_Kursi)
VALUES
    ('E', 'Economy', 0.7),
    ('B', 'Business', 0.2),
    ('F', 'FirstClass', 0.1);

-- KURSI PESAWAT
CREATE TABLE kursi_pesawat (
	Ku_ID CHAR(4) PRIMARY KEY NOT NULL,
	Ku_Status_Reservasi CHAR(1) NOT NULL,
    K_ID char (1),
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
CREATE SEQUENCE Harga_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE Harga (
	H_ID int primary key default nextval('Harga_sq'),
	H_Harga money not null,
	K_ID char(1) not null,
	Pn_ID int not null,
	foreign key (Pn_ID) references Penerbangan(Pn_ID),
	FOREIGN KEY (K_ID) REFERENCES Kelas(K_ID)
);

insert into harga (H_Harga, K_ID, Pn_ID) 
values
(1000000, 'B', 1),
(700000, 'E', 9),
(1700000, 'F', 3),
(1500000, 'E', 2),
(3500000, 'B', 4),
(5000000, 'F', 2),
(1000000, 'E', 8),
(700000, 'B', 3),
(1700000, 'B', 10),
(1500000, 'E', 5),
(3500000, 'E', 4),
(5000000, 'E', 6);

-- JADWAL PENERBANGAN
CREATE SEQUENCE jadwal_penerbangan_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE jadwal_penerbangan (
    Jp_ID INT PRIMARY KEY DEFAULT nextval('jadwal_penerbangan_sq'),
    Jp_Tanggal_Waktu_Departure DATE NOT NULL,
    Jp_Tanggal_Waktu_Arrival DATE NOT NULL,
    Jp_Bandara_Asal VARCHAR (100) NOT NULL,
    Jp_Bandara_Tujuan VARCHAR (100) NOT NULL,
    Pe_ID INT,
    B_ID CHAR (3),
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

-- Membuat sequence untuk tabel Pembayaran
CREATE SEQUENCE pembayaran_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;


-- Membuat tabel Pembayaran
CREATE TABLE Pembayaran (
  Pb_ID INTEGER DEFAULT nextval('pembayaran_sq') PRIMARY KEY,
  Pb_Tanggal_Waktu_Bayar DATE,
  Pb_Nomor_Kartu CHAR(16),
  Pb_Tanggal_Valid DATE,
  Pb_Nama_di_Kartu VARCHAR(60),
  Pb_CVV CHAR(4),
  Sp_ID INTEGER,
  foreign key (Sp_ID) REFERENCES status_pembayaran(Sp_ID)
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

-- Membuat sequence untuk tabel Reservasi
CREATE SEQUENCE reservasi_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

-- Membuat tabel Reservasi
CREATE TABLE Reservasi (
  R_ID INTEGER DEFAULT nextval('reservasi_sq') PRIMARY KEY,
  R_Jumlah_Kursi INTEGER,
  R_Tanggal DATE,
  Ad_ID INTEGER,
  foreign key (Ad_ID) REFERENCES Admin(Ad_ID),
  Pm_ID INTEGER,
  foreign key (Pm_ID) REFERENCES Pemesan(Pm_ID),
  Pn_ID INTEGER,
  foreign key (Pn_ID) REFERENCES Penerbangan(Pn_ID),
  Pb_ID INTEGER,
  foreign key (Pb_ID) REFERENCES Pembayaran(Pb_ID)
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

-- Membuat sequence untuk tabel Tiket_Individual
CREATE SEQUENCE tiket_individual_sq
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

-- Membuat tabel Tiket_Individual
CREATE TABLE Tiket_Individual (
  Ti_ID INTEGER DEFAULT nextval('tiket_individual_sq') PRIMARY KEY,
  Ti_Bagasi INTEGER,
  R_ID INTEGER,
  foreign key (R_ID) REFERENCES Reservasi(R_ID),
  Jp_ID INTEGER,
  foreign key (Jp_ID) REFERENCES Jadwal_Penerbangan(Jp_ID),
  P_ID INTEGER,
  foreign key (P_ID) REFERENCES Penumpang(P_ID)
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
  
-- QUERY BIASA
-- 1. Menampilkan jumlah kursi yang tersedia di setiap pesawat:
SELECT p.Pe_ID, mp.Mp_Nama, mp.Mp_Jumlah_Kursi - COUNT(kp.Ku_ID) AS Jumlah_Kursi_Tersedia
FROM pesawat p
JOIN model_pesawat mp ON p.Mp_ID = mp.Mp_ID
LEFT JOIN kursi_pesawat kp ON p.Pe_ID = kp.Pe_ID
GROUP BY p.Pe_ID, mp.Mp_Nama, mp.Mp_Jumlah_Kursi;

-- 2. Menampilkan jumlah tiket individu yang telah terjual untuk setiap penerbangan:
SELECT jp.Jp_ID, COUNT(ti.Ti_ID) AS Jumlah_Tiket_Individu_Terjual
FROM jadwal_penerbangan jp
LEFT JOIN tiket_individual ti ON jp.Jp_ID = ti.Jp_ID
GROUP BY jp.Jp_ID;

-- 3. Tampilkan daftar jadwal penerbangan yang memiliki penerbangan tujuan ke "Bandar Udara Internasional Soekarno-Hatta" (Jakarta):
SELECT jp.Jp_ID, jp.Jp_Tanggal_Waktu_Departure, jp.Jp_Tanggal_Waktu_Arrival, jp.Jp_Bandara_Asal, jp.Jp_Bandara_Tujuan
FROM jadwal_penerbangan jp
WHERE jp.Jp_Bandara_Tujuan = 'Bandar Udara Internasional Soekarno-Hatta';

-- 4. Menampilkan rata-rata harga tiket per kelas untuk setiap penerbangan:
SELECT k.K_Nama AS Kelas, TRUNC(AVG(CAST(h.H_Harga AS NUMERIC)), 0) AS RataRataHarga
FROM kelas k
JOIN Harga h ON k.K_ID = h.K_ID
GROUP BY k.K_Nama;

-- 5. Menampilkan daftar pemesan yang belum melakukan pembayaran untuk reservasi mereka:
SELECT P.Pm_ID, P.Pm_Nama, P.Pm_No_Telp, P.Pm_Email, Sp.Sp_Nama_Status
FROM Pemesan P
JOIN Reservasi R ON P.Pm_ID = R.Pm_ID
JOIN Pembayaran Pb ON R.Pb_ID = Pb.Pb_ID
JOIN status_pembayaran Sp ON Pb.Sp_ID = Sp.Sp_ID
WHERE Sp.Sp_Nama_Status = 'Gagal' OR Sp.Sp_Nama_Status = 'Pending';

-- 6. Mengambil bandara dengan jumlah penerbangan terbanyak:
SELECT B_ID, COUNT(Jp_ID) AS Jumlah_Penerbangan
FROM jadwal_penerbangan
GROUP BY B_ID
HAVING COUNT(Jp_ID) = (
    SELECT MAX(Jumlah_Penerbangan)
    FROM (
        SELECT COUNT(Jp_ID) AS Jumlah_Penerbangan
        FROM jadwal_penerbangan
        GROUP BY B_ID
    ) AS T
);

-- 7. Menemukan pemesan dengan jumlah reservasi terbanyak:
SELECT Pemesan.Pm_Nama, COUNT(*) AS Jumlah_Reservasi
FROM Pemesan
JOIN Reservasi ON Pemesan.Pm_ID = Reservasi.Pm_ID
GROUP BY Pemesan.Pm_ID, Pemesan.Pm_Nama
HAVING COUNT(*) = (
    SELECT MAX(ReservasiCount)
    FROM (
        SELECT COUNT(*) AS ReservasiCount
        FROM Reservasi
        GROUP BY Pm_ID
    ) AS SubQuery
);

-- 8. Mencari semua daftar admin beserta jumlah reservasi yang dilayaninya, termasuk admin yang tidak pernah melayani reservasi
SELECT admin.Ad_Username, COUNT(reservasi.R_ID) AS Jumlah_Reservasi
FROM admin
LEFT JOIN reservasi ON admin.Ad_ID = reservasi.Ad_ID
GROUP BY admin.Ad_Username;

-- 9. menghitung total pendapatan dari tiket terjual berdasarkan kelas:
SELECT k.K_Nama AS Kelas, SUM(h.H_Harga) AS Total_Pendapatan
FROM Harga h
JOIN kelas k ON h.K_ID = k.K_ID
JOIN jadwal_penerbangan j ON h.Pn_ID = j.Pn_ID
JOIN reservasi r ON j.Pn_ID = r.Pn_ID
JOIN tiket_individual t ON r.R_ID = t.R_ID
WHERE t.Jp_ID = j.Jp_ID
GROUP BY k.K_Nama;

-- 10. Menghitung total pendapatan tiap bandara
SELECT bandara.B_Nama, SUM(Harga.H_Harga) AS Total_Pendapatan
FROM jadwal_penerbangan
JOIN bandara ON jadwal_penerbangan.B_ID = bandara.B_ID
JOIN penerbangan ON jadwal_penerbangan.Pn_ID = penerbangan.Pn_ID
JOIN Harga ON penerbangan.Pn_ID = Harga.Pn_ID
GROUP BY bandara.B_Nama;

-- VIEW
-- 1. Menampilkan jumlah kursi yang tersedia di setiap pesawat:
CREATE VIEW jumlah_kursi_tersedia AS
SELECT p.Pe_ID, mp.Mp_Nama, mp.Mp_Jumlah_Kursi - COUNT(kp.Ku_ID) AS Jumlah_Kursi_Tersedia
FROM pesawat p
JOIN model_pesawat mp ON p.Mp_ID = mp.Mp_ID
LEFT JOIN kursi_pesawat kp ON p.Pe_ID = kp.Pe_ID
GROUP BY p.Pe_ID, mp.Mp_Nama, mp.Mp_Jumlah_Kursi;

-- 2. Menampilkan jumlah tiket individu yang telah terjual untuk setiap penerbangan:
CREATE VIEW jumlah_kursi_tersedia AS
SELECT jp.Jp_ID, COUNT(ti.Ti_ID) AS Jumlah_Tiket_Individu_Terjual
FROM jadwal_penerbangan jp
LEFT JOIN tiket_individual ti ON jp.Jp_ID = ti.Jp_ID
GROUP BY jp.Jp_ID;

-- 3. Tampilkan daftar jadwal penerbangan yang memiliki penerbangan tujuan ke "Bandar Udara Internasional Soekarno-Hatta" (Jakarta):
CREATE VIEW jadwal_penerbangan_ke_soehatta AS
SELECT jp.Jp_ID, jp.Jp_Tanggal_Waktu_Departure, jp.Jp_Tanggal_Waktu_Arrival, jp.Jp_Bandara_Asal, jp.Jp_Bandara_Tujuan
FROM jadwal_penerbangan jp
WHERE jp.Jp_Bandara_Tujuan = 'Bandar Udara Internasional Soekarno-Hatta';

-- 4. Menampilkan rata-rata harga tiket per kelas untuk setiap penerbangan:
CREATE VIEW rata_rata_harga_per_kelas AS
SELECT k.K_Nama AS Kelas, TRUNC(AVG(CAST(h.H_Harga AS NUMERIC)), 0) AS RataRataHarga
FROM kelas k
JOIN Harga h ON k.K_ID = h.K_ID
GROUP BY k.K_Nama;

-- 5. Menampilkan daftar pemesan yang belum melakukan pembayaran untuk reservasi mereka:
CREATE VIEW pemesan_belum_bayar AS
SELECT P.Pm_ID, P.Pm_Nama, P.Pm_No_Telp, P.Pm_Email, Sp.Sp_Nama_Status
FROM Pemesan P
JOIN Reservasi R ON P.Pm_ID = R.Pm_ID
JOIN Pembayaran Pb ON R.Pb_ID = Pb.Pb_ID
JOIN status_pembayaran Sp ON Pb.Sp_ID = Sp.Sp_ID
WHERE Sp.Sp_Nama_Status = 'Gagal' OR Sp.Sp_Nama_Status = 'Pending';

-- 6. Mengambil bandara dengan jumlah penerbangan terbanyak:
CREATE VIEW bandara_jumlah_penerbangan AS
SELECT B_ID, COUNT(Jp_ID) AS Jumlah_Penerbangan
FROM jadwal_penerbangan
GROUP BY B_ID
HAVING COUNT(Jp_ID) = (
    SELECT MAX(Jumlah_Penerbangan)
    FROM (
        SELECT COUNT(Jp_ID) AS Jumlah_Penerbangan
        FROM jadwal_penerbangan
        GROUP BY B_ID
    ) AS T
);

-- 7. Menemukan pemesan dengan jumlah reservasi terbanyak:
CREATE VIEW pemesan_jumlah_reservasi AS
SELECT Pemesan.Pm_Nama, COUNT(*) AS Jumlah_Reservasi
FROM Pemesan
JOIN Reservasi ON Pemesan.Pm_ID = Reservasi.Pm_ID
GROUP BY Pemesan.Pm_ID, Pemesan.Pm_Nama
HAVING COUNT(*) = (
    SELECT MAX(ReservasiCount)
    FROM (
        SELECT COUNT(*) AS ReservasiCount
        FROM Reservasi
        GROUP BY Pm_ID
    ) AS SubQuery
);

-- 8. Mencari semua daftar admin beserta jumlah reservasi yang dilayaninya, termasuk admin yang tidak pernah melayani reservasi
CREATE VIEW admin_jumlah_reservasi AS
SELECT admin.Ad_Username, COUNT(reservasi.R_ID) AS Jumlah_Reservasi
FROM admin
LEFT JOIN reservasi ON admin.Ad_ID = reservasi.Ad_ID
GROUP BY admin.Ad_Username;

-- 9. menghitung total pendapatan dari tiket terjual berdasarkan kelas:
CREATE VIEW pendapatan_per_kelas AS
SELECT k.K_Nama AS Kelas, SUM(h.H_Harga) AS Total_Pendapatan
FROM Harga h
JOIN kelas k ON h.K_ID = k.K_ID
JOIN jadwal_penerbangan j ON h.Pn_ID = j.Pn_ID
JOIN reservasi r ON j.Pn_ID = r.Pn_ID
JOIN tiket_individual t ON r.R_ID = t.R_ID
WHERE t.Jp_ID = j.Jp_ID
GROUP BY k.K_Nama;

-- 10. Menghitung total pendapatan tiap bandara
CREATE VIEW total_pendapatan_bandara AS
SELECT bandara.B_Nama, SUM(Harga.H_Harga) AS Total_Pendapatan
FROM jadwal_penerbangan
JOIN bandara ON jadwal_penerbangan.B_ID = bandara.B_ID
JOIN penerbangan ON jadwal_penerbangan.Pn_ID = penerbangan.Pn_ID
JOIN Harga ON penerbangan.Pn_ID = Harga.Pn_ID
GROUP BY bandara.B_Nama;

-- INDEXING bandara
CREATE INDEX idx_B_ID_CGK ON bandara (B_ID) WHERE B_ID = 'CGK';

CREATE INDEX idx_B_ID ON bandara (B_ID);

EXPLAIN SELECT * FROM bandara WHERE B_ID = 'CGK';

SELECT * FROM pg_indexes WHERE tablename = 'bandara';

SELECT * FROM bandara WHERE B_ID = 'CGK';

DROP INDEX IF EXISTS idx_bandara_b_id;

-- INDEXING model_pesawat
CREATE INDEX idx_Mp_Nama ON model_pesawat (Mp_Nama);

SELECT * FROM pg_indexes WHERE tablename = 'model_pesawat';

-- INDEXING pemesan
CREATE INDEX idx_Pm_Nama ON pemesan (Pm_Nama);

SELECT * FROM pg_indexes WHERE tablename = 'pemesan';

-- INDEXING admin
CREATE INDEX idx_Ad_Username ON admin (Ad_Username);

SELECT * FROM pg_indexes WHERE tablename = 'admin';