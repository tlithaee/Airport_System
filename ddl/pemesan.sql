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
