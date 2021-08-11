CREATE DATABASE animal_rescure

USE animal_rescure

CREATE TABLE thongtintnv 
(
    idtnv INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tentnv VARCHAR(255) NOT NULL,
    gioitinh BIT(1) DEFAULT 1,
    ngaysinh DATE NOT NULL,
    tendangnhap VARCHAR(255) NOT NULL UNIQUE,
    matkhau VARCHAR(255) NOT NULL,
    sdt VARCHAR(11) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE 
    trangthaihoatdong TINYINT NOT NULL DEFAULT 14
)

CREATE TABLE ttlienhe
(
    idtnv INT(11) NOT NULL PRIMARY KEY,
    sdt VARCHAR(11) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    diachi VARCHAR(255) NOT NULL
)

CREATE TABLE trangthaihoatdong
(
    trangthaihoatdong INT NOT NULL PRIMARY KEY,
    tentrangthai INT NOT NULL UNIQUE
)

INSERT INTO trangthaihoatdong
VALUES (11, "online")

INSERT INTO trangthaihoatdong
VALUES (12, "dangcuutro")

INSERT INTO trangthaihoatdong
VALUES (13, "dangban")

INSERT INTO trangthaihoatdong
VALUES (14, "offline")

INSERT INTO trangthaihoatdong
VALUES (15, "nghi")

INSERT INTO thongtintnv 
VALUES (1000, "Quản Trị Viên", 1, '2002-01-01', "admin", "admin@123456", "0000000000", "admin@ar.com", 14)

INSERT INTO thongtintnv 
VALUES (1001, "Nhân Viên", 1, '2002-01-01', "staff", "staff@123456", "0100000000", "staff@ar.com", 14)

INSERT INTO thongtintnv 
VALUES (1002, "Tình Nguyện Viên", 1, '2002-01-01', "volunteer", "volunteer@123456", "0200000000", "volunteer@ar.com", 14)

INSERT INTO ttlienhe
VALUES (1000, "0000000000", "admin@ar.com", "NULL")

INSERT INTO ttlienhe
VALUES (1001, "0100000000", "staff@ar.com", "NULL")

INSERT INTO ttlienhe
VALUES (1002, "0200000000", "volunteer@ar.com", "NULL")

SELECT tendangnhap, diachi FROM thongtintnv LEFT JOIN  ttlienhe ON thongtintnv.idtnv = ttlienhe.idtnv

SELECT idtnv FROM thongtintnv WHERE tendangnhap="admin"

INSERT INTO thongtintnv (tentnv, gioitinh, ngaysinh, tendangnhap, matkhau, sdt, email)
VALUES ('Bùi Huy Hoàng', 1, '2002-11-27', 'Hoanghihi01', 'admin@123456', '0354569591', 'hoanghihi0000@gmail.com')

