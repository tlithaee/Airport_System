CREATE TABLE Passport (
    Pa_Nomor_Passport CHAR(12) PRIMARY KEY,
    Pa_Negara_Asal VARCHAR(60),
    Pa_Tanggal_Expired DATE
);

CREATE TABLE Kelas (
    K_ID CHAR(1) PRIMARY KEY,
    K_Nama VARCHAR(30)
);

CREATE TABLE Jabatan_Kru_Pesawat (
    J_ID INTEGER PRIMARY KEY,
    J_Nama VARCHAR(30)
);
