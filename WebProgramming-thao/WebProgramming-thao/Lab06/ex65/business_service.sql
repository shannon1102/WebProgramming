-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 21, 2021 lúc 01:54 AM
-- Phiên bản máy phục vụ: 8.0.23
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `business_service`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Biz_Categories`
--

CREATE TABLE `Biz_Categories` (
  `BusinessID` int NOT NULL,
  `CategoryID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `Biz_Categories`
--

INSERT INTO `Biz_Categories` (`BusinessID`, `CategoryID`) VALUES
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(18, 3),
(19, 2),
(20, 2),
(21, 2),
(21, 3),
(22, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Businesses`
--

CREATE TABLE `Businesses` (
  `BusinessID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `Businesses`
--

INSERT INTO `Businesses` (`BusinessID`, `Name`, `Address`, `City`, `Telephone`, `URL`) VALUES
(1, 'name', 'address', 'city', 'telephone', 'url'),
(2, 'dsd', 'VietNam', 'Hanoi', '0397888236', 'asdf.com'),
(3, 'VanHuyLE', 'VietNam', 'Hanoi', '0397888111', 'sasa.com'),
(4, 'HuyVan', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(5, 'Vanchamchi', 'VietNam', 'Hanoi', '0397888111', 'asdf.com'),
(6, 'VanDepTrai', 'VietNam', 'Hanoi', '0397888236', 'asdf.com'),
(7, 'Vanchamchi', 'VietNam', 'Hanoi', '0397888236', 'asdf.com'),
(8, 'VanHuyLE', 'VietNam', 'Hanoi', '0397888111', 'sasa.com.vn'),
(9, 'HuyVan', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(10, 'Vanchamchi', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(11, 'DO DO', 'VietNam', 'Hanoi', '0397888236', 'asdf.com'),
(12, 'VanHuyLE', 'VietNam', 'Hanoi', '0397888111', 'asdf.com'),
(13, 'Vanchamchi', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(14, 'Vanchamchi', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(15, 'Vanchamchi', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(16, 'DaoMe', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(17, 'Vanchamchi', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(18, 'dsd', 'VietNam', 'Hanoi', '0397888236', 'asdf.com'),
(19, 'HuyVan', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(20, 'DaoMe', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn'),
(21, 'VanHuyLE', 'VietNam', 'Hanoi', '0397888111', 'asdf.com'),
(22, 'Vanchamchi', 'VietNam', 'Hanoi', '0397888236', 'sasa.com.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Categories`
--

CREATE TABLE `Categories` (
  `CategoryID` int NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `Categories`
--

INSERT INTO `Categories` (`CategoryID`, `Title`, `Description`) VALUES
(1, 'School and Colleges', 'Nothing'),
(2, 'Health and Beauty', 'Nothing'),
(3, 'Safefood Stores and Restaurants', 'Nothing');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Biz_Categories`
--
ALTER TABLE `Biz_Categories`
  ADD KEY `BusinessID` (`BusinessID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Chỉ mục cho bảng `Businesses`
--
ALTER TABLE `Businesses`
  ADD PRIMARY KEY (`BusinessID`),
  ADD KEY `BusinessID` (`BusinessID`);

--
-- Chỉ mục cho bảng `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `CategoryID_2` (`CategoryID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Businesses`
--
ALTER TABLE `Businesses`
  MODIFY `BusinessID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `Categories`
--
ALTER TABLE `Categories`
  MODIFY `CategoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Biz_Categories`
--
ALTER TABLE `Biz_Categories`
  ADD CONSTRAINT `Biz_Categories_ibfk_1` FOREIGN KEY (`BusinessID`) REFERENCES `Businesses` (`BusinessID`),
  ADD CONSTRAINT `Biz_Categories_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
