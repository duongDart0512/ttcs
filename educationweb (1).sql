-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2024 lúc 04:05 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `educationweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `anhdaidien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `ten`, `taikhoan`, `matkhau`, `anhdaidien`) VALUES
(1, 'Tuấn Anh', 'trinhmoc18@gmail.com', '123456', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `tailieuid` int(11) DEFAULT NULL,
  `noidung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`id`, `ten`) VALUES
(1, 'Năm 1'),
(2, 'Năm 2'),
(3, 'Năm 3'),
(4, 'Năm 4'),
(5, 'Năm 5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tailieu`
--

CREATE TABLE `tailieu` (
  `id` int(11) NOT NULL,
  `tentailieu` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `tenonhoc` varchar(255) DEFAULT NULL,
  `tailieu` varchar(255) DEFAULT NULL,
  `anhdaidien` varchar(255) DEFAULT NULL,
  `uploaddate` date DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `namhocid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tailieu`
--

INSERT INTO `tailieu` (`id`, `tentailieu`, `filepath`, `tenonhoc`, `tailieu`, `anhdaidien`, `uploaddate`, `userid`, `namhocid`) VALUES
(47, 'Tổng hợp LAB Lập trình hợp ngữ', '/quantri/uploads/file/TH_LabLThopngu.pdf', 'Lập trình hợp ngữ', '/ttcs/quantri/uploads/file/TH_LabLThopngu.pdf', '/quantri/uploads/hinhanh/TH_LabLThopngu_thumbnail.jpg', '2024-11-21', NULL, 4),
(48, 'Ôn tập hệ thống thông tin di động', '/quantri/uploads/file/HT thongtindidong.pdf', 'Hệ thống thông tin di động', '/ttcs/quantri/uploads/file/HT thongtindidong.pdf', '/quantri/uploads/hinhanh/HT thongtindidong_thumbnail.jpg', '2024-11-21', NULL, 4),
(49, 'Giáo trình otomat và ngôn ngữ hình thức', '/quantri/uploads/file/Lý thuyết ngôn ngữ hình thức.pdf', 'Otomat và ngôn ngữ hình thức', '/ttcs/quantri/uploads/file/Lý thuyết ngôn ngữ hình thức.pdf', '/quantri/uploads/hinhanh/Lý thuyết ngôn ngữ hình thức_thumbnail.jpg', '2024-11-22', NULL, 2),
(52, 'Giáo trình Tiếng Anh chuyên ngành ', '/quantri/uploads/file/Giao trinh Tieng Anh CNTT bản cuối (2).pdf', 'Tiếng Anh chuyên ngành', '/ttcs/quantri/uploads/file/Giao trinh Tieng Anh CNTT bản cuối (2).pdf', '/quantri/uploads/hinhanh/Giao trinh Tieng Anh CNTT bản cuối (2)_thumbnail.jpg', '2024-11-22', NULL, 3),
(53, 'Lý thuyết cuối kỳ Lý thuyết độ phức tạp tính toán', '/quantri/uploads/file/LyThuyet.pdf', 'Lý thuyết độ phức tạp tính toán', '/ttcs/quantri/uploads/file/LyThuyet.pdf', '/quantri/uploads/hinhanh/LyThuyet_thumbnail.jpg', '2024-11-24', NULL, 4),
(55, 'Ôn tập trắc nghiệm phát triển ứng dụng web ', '/quantri/uploads/file/ÔN-TẬP-THI-TRẮC-NGHIỆM_1_SV.pdf', 'Phát triển ứng dụng web', '/ttcs/quantri/uploads/file/ÔN-TẬP-THI-TRẮC-NGHIỆM_1_SV.pdf', '/quantri/uploads/hinhanh/ÔN-TẬP-THI-TRẮC-NGHIỆM_1_SV_thumbnail.jpg', '2024-11-24', NULL, 3),
(56, 'Ôn tập trắc nghiệm phát triển ứng dụng web 2', '/quantri/uploads/file/on_trac_nghiem_2.pdf', 'Phát triển ứng dụng web', '/ttcs/quantri/uploads/file/on_trac_nghiem_2.pdf', '/quantri/uploads/hinhanh/on_trac_nghiem_2_thumbnail.jpg', '2024-11-24', NULL, 3),
(58, 'Giáo trình cấu trúc dữ liệu và giải thuật', '/quantri/uploads/file/Giáo-trình-KMA-1.pdf', 'Cấu trúc dữ liệu và giải thuật', '/ttcs/quantri/uploads/file/Giáo-trình-KMA-1.pdf', '/quantri/uploads/hinhanh/Giáo-trình-KMA-1_thumbnail.jpg', '2024-11-24', NULL, 3),
(59, 'Tài liệu quizz ôn tập phát triển ứng dụng web', '/quantri/uploads/file/Tài liệu QUIZZ ôn tập WEB  (1).pdf', 'Phát triển ứng dụng web', '/ttcs/quantri/uploads/file/Tài liệu QUIZZ ôn tập WEB  (1).pdf', '/quantri/uploads/hinhanh/Tài liệu QUIZZ ôn tập WEB  (1)_thumbnail.jpg', '2024-11-24', NULL, 3),
(60, 'Giới thiệu nguyên lý hệ điều hành', '/quantri/uploads/file/Giới-thiệu-NLHĐH.pdf', 'Nguyên lý hệ điều hành', '/ttcs/quantri/uploads/file/Giới-thiệu-NLHĐH.pdf', '/quantri/uploads/hinhanh/Giới-thiệu-NLHĐH_thumbnail.jpg', '2024-12-03', NULL, 3),
(61, 'Chương I nguyên lý hệ điều hành', '/quantri/uploads/file/Chương-1-Tổng-quan-HĐH.pdf', 'Nguyên lý hệ điều hành', '/ttcs/quantri/uploads/file/Chương-1-Tổng-quan-HĐH.pdf', '/quantri/uploads/hinhanh/Chương-1-Tổng-quan-HĐH_thumbnail.jpg', '2024-12-03', NULL, 3),
(62, 'Chương 2 nguyên lý hệ điều hành', '/quantri/uploads/file/Chương-2-Tiến-trình-và-Luồng.pdf', 'Nguyên lý hệ điều hành', '/ttcs/quantri/uploads/file/Chương-2-Tiến-trình-và-Luồng.pdf', '/quantri/uploads/hinhanh/Chương-2-Tiến-trình-và-Luồng_thumbnail.jpg', '2024-12-03', NULL, 3),
(63, 'Chương 3 nguyên lý hệ điều hành', '/quantri/uploads/file/Chương-3-Lập-lịch.pdf', 'Nguyên lý hệ điều hành', '/ttcs/quantri/uploads/file/Chương-3-Lập-lịch.pdf', '/quantri/uploads/hinhanh/Chương-3-Lập-lịch_thumbnail.jpg', '2024-12-03', NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tailieuyeuthich`
--

CREATE TABLE `tailieuyeuthich` (
  `tailieuid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tailieuyeuthich`
--

INSERT INTO `tailieuyeuthich` (`tailieuid`, `userid`) VALUES
(58, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `anhdaidien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userid`, `ten`, `taikhoan`, `matkhau`, `anhdaidien`) VALUES
(5, 'Trịnh Tuấn Anh', 'mocbltk@gmail.com', '$2y$10$0/B/YcM95Ke26mFu7X3YKeYehBA9I5RnasOjUDonHF/yex4aohR/K', NULL),
(6, 'advv', 'trinhmoc18@gmail.com', '$2y$10$fJlSi8GdElS4n1p7crBBSOlD5TXZc/vZLC2hWzTI6m.6.GBQsRgCa', 'images/avatar.svg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `tailieuid` (`tailieuid`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `namhocid` (`namhocid`);

--
-- Chỉ mục cho bảng `tailieuyeuthich`
--
ALTER TABLE `tailieuyeuthich`
  ADD PRIMARY KEY (`tailieuid`,`userid`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`tailieuid`) REFERENCES `tailieu` (`id`);

--
-- Các ràng buộc cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `tailieu_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `tailieu_ibfk_2` FOREIGN KEY (`namhocid`) REFERENCES `namhoc` (`id`);

--
-- Các ràng buộc cho bảng `tailieuyeuthich`
--
ALTER TABLE `tailieuyeuthich`
  ADD CONSTRAINT `tailieuyeuthich_ibfk_1` FOREIGN KEY (`tailieuid`) REFERENCES `tailieu` (`id`),
  ADD CONSTRAINT `tailieuyeuthich_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
