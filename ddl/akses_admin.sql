CREATE TABLE akses (
	Ak_ID int not null primary key,
	Ak_Nama varchar(20)
);

CREATE TABLE admin (
    Ad_ID INT NOT NULL PRIMARY KEY,
    Ad_Nama VARCHAR(60) NOT NULL,
    Ad_No_Telp CHAR(15),
    Ad_Jenis_Kelamin CHAR(1),
    Ad_Email VARCHAR(30),
    Ad_Alamat VARCHAR(100),
    Ad_Tanggal_Lahir DATE,
    Ak_ID INT NOT NULL,
    FOREIGN KEY (Ak_ID) REFERENCES akses(Ak_ID)
);
