CREATE TABLE  grup_kru_pesawat (
	Gkp_ID INT NOT NULL PRIMARY KEY
);

CREATE TABLE kru_pesawat (
	Kp_ID INT NOT NULL PRIMARY KEY,
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
