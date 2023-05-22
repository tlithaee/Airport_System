CREATE TABLE Passport (
    Pa_Nomor_Passport CHAR(12) PRIMARY KEY,
    Pa_Negara_Asal VARCHAR(60),
    Pa_Tanggal_Expired DATE
);

CREATE TABLE Kelas (
    K_ID CHAR(1) PRIMARY KEY,
    K_Nama VARCHAR(30) NOT NULL,
    K_Persentase_Kursi FLOAT(1,1) NOT NULL
);

CREATE SEQUENCE Jabatan_Kru_Pesawat_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE Jabatan_Kru_Pesawat (
    J_ID int primary key default nextval('Jabatan_Kru_Pesawat_sq'),
    J_Nama VARCHAR(30)
);

CREATE SEQUENCE Airlines_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE Airlines (
    A_ID int primary key default nextval('Airlines_sq'),
    A_Nama varchar(60) NOT NULL
);

CREATE SEQUENCE Model_pesawat_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE model_pesawat (
    Mp_ID int primary key default nextval('Model_pesawat_sq'),
    Mp_Nama varchar(60) NOT NULL,
    Mp_Manufacturer varchar(100) NOT NULL,
    Mp_Jumlah_Kursi int NOT NULL
);

CREATE SEQUENCE menu_paket_makanan_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE menu_paket_makanan (
    Mpk_ID int primary key default nextval('menu_paket_makanan_sq'),
    Mpk_Nama varchar(60) NOT NULL,
    Mpk_Harga decimal(10,2) NOT NULL,
    Mpk_Deskripsi varchar(200) NOT NULL
);

CREATE SEQUENCE akses_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE akses (
	Ak_ID int primary key default nextval('akses_sq'),
	Ak_Nama varchar(20)
);

CREATE SEQUENCE admin_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE admin (
    Ad_ID int primary key default nextval('admin_sq'),
    Ad_Nama VARCHAR(60) NOT NULL,
    Ad_No_Telp CHAR(15),
    Ad_Jenis_Kelamin CHAR(1),
    Ad_Email VARCHAR(30),
    Ad_Alamat VARCHAR(100),
    Ad_Tanggal_Lahir DATE,
    Ak_ID INT NOT NULL,
    FOREIGN KEY (Ak_ID) REFERENCES akses(Ak_ID)
);

CREATE TABLE bandara (
	B_ID CHAR(3) NOT NULL PRIMARY KEY,
	B_Nama VARCHAR(100),
	B_Alamat VARCHAR(100),
	B_Email VARCHAR(60),
	B_No_Telp CHAR(15)
);

CREATE TABLE  grup_kru_pesawat (
	Gkp_ID INT NOT NULL PRIMARY KEY
);

CREATE SEQUENCE kru_pesawat_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

CREATE TABLE kru_pesawat (
	Kp_ID int primary key default nextval('kru_pesawat_sq'),
	Kp_Nama VARCHAR(60),
	Kp_No_Telp CHAR(15),
	Kp_Jenis_Kelamin CHAR(1),
	Kp_Alamat VARCHAR(100),
	Kp_Tanggal_Gabung DATE,
	Kp_Tanggal_Lahir DATE,
	Gkp_ID INT,
	A_ID INT,
	J_ID INT,
	FOREIGN KEY (Gkp_ID) REFERENCES grup_kru_pesawat(Gkp_ID),
	FOREIGN KEY (A_ID) REFERENCES airlines(A_ID),
	FOREIGN KEY (J_ID) REFERENCES Jabatan_Kru_Pesawat(J_ID)
);

CREATE SEQUENCE Pemesan_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

-- CREATE TABLE Pemesan
create table Pemesan (
	Pm_ID int primary key default nextval('Pemesan_sq'),
	Pm_Nama varchar(60) not null,
	Pm_No_Telp char(15) not null,
	Pm_Email varchar(60) not null
);

CREATE SEQUENCE Destinasi_sq 
MINVALUE 1 
MAXVALUE 99999999999999999	
START WITH 1 
INCREMENT BY 1;

-- CREATE TABLE Destinasi
CREATE TABLE Destinasi (
    D_ID INT PRIMARY KEY DEFAULT nextval('Destinasi_sq'),
    D_Lokasi_Asal CHAR(3) NOT NULL,
    D_Lokasi_Tujuan CHAR(3) NOT null,
    FOREIGN KEY (D_Lokasi_Asal) REFERENCES bandara(B_ID),
    FOREIGN KEY (D_Lokasi_Tujuan) REFERENCES bandara(B_ID)
);
