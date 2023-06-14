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
  ('user5', 'Daniel Wilson', '777888999', 'daniel.wilson@example.com', 'password5');

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
('Boeing 737-900', 'Boeing', 177);

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
('Selena Gomez', '3605050505050505');


CREATE TABLE bandara (
	B_ID CHAR(3) NOT NULL PRIMARY KEY,
	B_Nama VARCHAR(100),
	B_Alamat VARCHAR(100),
	B_Email VARCHAR(60),
	B_No_Telp CHAR(15)
);

 insert into bandara
 values 
('CGK', 'Bandar Udara Internasional Soekarno–Hatta', 'Tangerang, Banten, Indonesia', 'contact.center@angkasapura2.co.id', '622155912648'),
('SUB', 'Bandar Udara Internasional Juanda', 'Jalan Ir. Haji Juanda, Surabaya, Indonesia', 'cc172@ap1.co.id', '62312986200'),
('JOG', 'Bandar Udara Internasional Adisucipto', 'Maguwoharjo, Daerah Istimewa Yogyakarta, Indonesia', 'humas.jog@ap1.co.id', '62274484261'),
('BTJ', 'Bandar Udara Internasional Sultan Iskandar Muda', 'Blang Bintang, Aceh Besar, Indonesia', 'contact.center@angkasapura2.co.id', '6265121341'),
('DPS', 'Bandar Udara Internasional Ngurah Rai', 'Kelurahan Tuban, Bali, Indonesia', 'cc172@ap1.co.id', '623619351011');

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
(5);

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
('JKT', 'YGY'),
('BDG', 'JKT'),
('YGY', 'DPS'),
('DPS', 'JKT');

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
(5);

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

INSERT INTO admin (Ad_Username, Ad_Password) VALUES
('Sabrina', 'password1'),
('Rayssa', 'password2'),
('Diajeng', 'password3'),
('Talitha', 'password4'),
('Ariana', 'password5');

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

INSERT INTO kursi_pesawat (Ku_ID, Ku_Status_Reservasi, K_ID, Pe_ID) VALUES
    ('15A', 'A', 'E', 2),
    ('1A', 'R', 'B', 3),
    ('27D', 'A', 'F', 1),
    ('6A', 'A', 'E', 4),
    ('5F', 'R', 'E', 5);


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
(700000, 'E', 1),
(1700000, 'F', 1),
(1500000, 'E', 2),
(3500000, 'B', 2),
(5000000, 'F', 2);

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
('2023-06-07 09:00:00', '2023-06-07 11:00:00', 'Bandar Udara Internasional Soekarno-Hatta', 'Bandar Udara Internasional Juanda', 1, 'CGK', 1),
('2023-06-08 14:30:00', '2023-06-08 16:30:00', 'Bandar Udara Internasional Juanda', 'Bandar Udara Internasional Ngurah Rai', 2, 'SUB', 2),
('2023-06-09 12:00:00', '2023-06-09 14:00:00', 'Bandar Udara Internasional Sultan Iskandar Muda', 'Bandar Udara Internasional Adisucipto', 3, 'BTJ', 3),
('2023-06-10 08:45:00', '2023-06-10 10:45:00', 'Bandar Udara Internasional Ngurah Rai', 'Bandar Udara Internasional Juanda', 4, 'DPS', 4),
('2023-06-11 11:30:00', '2023-06-11 13:30:00', 'Bandar Udara Internasional Adisucipto', 'Bandar Udara Internasional Soekarno-Hatta', 5, 'JOG', 5);

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
  (5, '2023-06-05', '7777888899990000', '2024-06-05', 'Daniel Wilson', '345', 2);

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
  (4, '2023-06-12', 3, 3, 3, 3),
  (3, '2023-06-13', 4, 4, 4, 4),
  (2, '2023-06-14', 5, 5, 5, 5);


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
  (0, 5, 5, 5);
