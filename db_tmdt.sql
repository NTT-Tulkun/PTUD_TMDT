-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2024 lúc 03:11 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_tmdt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congty`
--

CREATE TABLE `congty` (
  `idcty` int(11) NOT NULL,
  `tencty` varchar(50) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `dienthoai` varchar(11) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `congty`
--

INSERT INTO `congty` (`idcty`, `tencty`, `diachi`, `dienthoai`, `fax`) VALUES
(1, 'SamSung', 'Korea', NULL, NULL),
(2, 'Apple', 'USA', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `gia` float NOT NULL,
  `mota` text NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `giamgia` float NOT NULL,
  `idcty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `gia`, `mota`, `hinh`, `giamgia`, `idcty`) VALUES
(1, 'SamSung S23 Ultra', 30000000, 'Sản phẩm mới', 'samsung23utra.jpeg', 2000000, 1),
(2, 'Iphone 15 Promax', 30000000, 'Sản phẩm mới', 'iphone15promax.jpg', 150000000, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `congty`
--
ALTER TABLE `congty`
  ADD PRIMARY KEY (`idcty`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `congty`
--
ALTER TABLE `congty`
  MODIFY `idcty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
