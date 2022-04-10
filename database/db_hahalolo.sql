-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2022 lúc 09:51 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_hahalolo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id` int(11) NOT NULL,
  `mahd` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngaynhanphong` date NOT NULL,
  `ngaytraphong` date NOT NULL,
  `songuoi` int(11) NOT NULL,
  `yeucau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sothe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tenchuthe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngayhh` date NOT NULL,
  `macvc` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id`, `mahd`, `ngaynhanphong`, `ngaytraphong`, `songuoi`, `yeucau`, `sothe`, `tenchuthe`, `ngayhh`, `macvc`) VALUES
(1, 'KH0002', '2022-01-27', '0000-00-00', 1, NULL, '', '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `mahd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `makh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gia` float DEFAULT NULL,
  `thue` float NOT NULL,
  `maphong` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` float NOT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `mahd`, `makh`, `gia`, `thue`, `maphong`, `tongtien`, `trangthai`) VALUES
(1, 'KH0001', 'KH0007', 2000000, 0, 'P-MT1-2', 2000000, 'cho-xac-nhan'),
(2, 'KH0002', 'KH0008', 2000000, 0, 'P-MT1-2', 2000000, 'cho-xac-nhan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `makh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ho` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quocgia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thanhpho` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `makh`, `ho`, `ten`, `sdt`, `email`, `quocgia`, `thanhpho`) VALUES
(5, 'KH0001', 'hu', 'dsd', NULL, 'lexuanhuy4497@gmail.com', 'Việt Nam', NULL),
(6, 'KH0005', '5435', '5435', NULL, '435435', 'Việt Nam', NULL),
(7, 'KH0007', '1', '213', NULL, '3213213', 'Việt Nam', NULL),
(8, 'KH0008', '121', '21', NULL, 'lexuanhuy4497@gmail.com', 'Việt Nam', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachsan`
--

CREATE TABLE `khachsan` (
  `makhachsan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tenkhachsan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `tienich` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongquan` text COLLATE utf8_unicode_ci NOT NULL,
  `quytacchung` text COLLATE utf8_unicode_ci NOT NULL,
  `url_map` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachsan`
--

INSERT INTO `khachsan` (`makhachsan`, `tenkhachsan`, `diachi`, `gia`, `tienich`, `anh`, `tongquan`, `quytacchung`, `url_map`) VALUES
('MT1', 'Mường Thanh', 'Cửa Lò', 1000000, 'Đưa đón-Dịch vụ phòng-Gửi xe-Tiệc', '', '         <img src=\"./img/FAIRFIELD.jpg\" class=\"w-100 d-block\" alt=\"\">               <p>- Welcome to Homewood Suites Syracuse. This modern all-suite hotel offers the perfect home away from                 home ideal for short business trips or extended stays in Syracuse NY. We are conveniently situated off                 NYS Thruway I-90 in the campus like setting of the Pioneer Business Park providing easy access to all                 that the local area has to offer including Syracuse Hancock International Airport just a short 7 miles                 away. Visit popular attractions such as Destiny USA Syracuse University and the Carrier Dome or take                 the whole family for a meal to remember at Dinosaur Barbeque. Our welcoming staff will make you feel                 at home from the moment you arrive. Indulge in a full hot breakfast every morning and complimentary                 evening social and drinks* Monday - Thursday. Our spacious studio and one or two bedroom suites                 feature all the comforts of home including a fully equipped kitchenette 42-inch TV work space and                 complimentary WiFi. Keep up your fitness routine with a workout in the large fitness center or relax                 with a swim in the indoor heated pool. Business travelers will appreciate our flexible meeting room                 which can accommodate events with up to 75 guests. *Subject to state and local laws. Must be of legal                 drinking age. .</p>', '              Nhận phòng                Sau 3 PM               Trả phòng                Trước 11 AM               Chính sách hủy đặt phòng                CANCELLATION POLICY VARIES DEPENDING UPON TIME OF               BOOKING AND RATE. PLEASE SEE RATE RULES FOR               DETAILS.               .', 'https://www.google.com/maps/place/172-180+N+Genesee+St,+Utica,+NY+13502,+Hoa+K%E1%BB%B3/@43.10939,-75.2193966,17z/data=!3m1!4b1!4m5!3m4!1s0x89d94713de3c298d:0x4bf524ca0cc367ca!8m2!3d43.1093114!4d-75.2170935'),
('MT2', 'Mường Thanh Hà Nội', 'Hà Nội', 2000000, 'Đưa đón-Dịch vụ phòng-Gửi xe-Tiệc', '', '', '', 'https://www.google.com/maps/place/172-180+N+Genesee+St,+Utica,+NY+13502,+Hoa+K%E1%BB%B3/@43.10939,-75.2193966,17z/data=!3m1!4b1!4m5!3m4!1s0x89d94713de3c298d:0x4bf524ca0cc367ca!8m2!3d43.1093114!4d-75.2170935');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `maphong` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `makhachsan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenphong` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `songuoi` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tienich` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaynhanphong` datetime DEFAULT NULL,
  `ngaytraphong` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`maphong`, `makhachsan`, `tenphong`, `songuoi`, `gia`, `mota`, `anh`, `tienich`, `ngaynhanphong`, `ngaytraphong`) VALUES
('P-MT1-2', 'MT1', 'VIP2', 1, 2000000, '', '', '<ul class=\"jss102\"><li><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"MuiSvgIcon-root MuiSvgIcon-fontSizeInherit\" focusable=\"false\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><g data-name=\"Group 28291\"><path data-name=\"Rectangle 4398\" fill=\"none\" d=\"M0 0h24v24H0z\"></path><g data-name=\"Vector Smart Object4 copy 2\"><g data-name=\"Group 27004\"><g data-name=\"Path 19205\"><path data-name=\"Path 20107\" d=\"M9.954 18.406a.588.588 0 01-.378-.137l-7.363-6.108a.594.594 0 01.759-.914L9.906 17 20.974 5.187a.593.593 0 01.865.812l-11.45 12.22a.591.591 0 01-.435.187z\" stroke=\"currentColor\" stroke-width=\"0.2\"></path></g></g></g></g></svg>&nbsp;<span>Không hút thuốc</span></li><li><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"MuiSvgIcon-root MuiSvgIcon-fontSizeInherit\" focusable=\"false\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><g data-name=\"Group 28291\"><path data-name=\"Rectangle 4398\" fill=\"none\" d=\"M0 0h24v24H0z\"></path><g data-name=\"Vector Smart Object4 copy 2\"><g data-name=\"Group 27004\"><g data-name=\"Path 19205\"><path data-name=\"Path 20107\" d=\"M9.954 18.406a.588.588 0 01-.378-.137l-7.363-6.108a.594.594 0 01.759-.914L9.906 17 20.974 5.187a.593.593 0 01.865.812l-11.45 12.22a.591.591 0 01-.435.187z\" stroke=\"currentColor\" stroke-width=\"0.2\"></path></g></g></g></g></svg>&nbsp;<span>Tivi</span></li><li><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"MuiSvgIcon-root MuiSvgIcon-fontSizeInherit\" focusable=\"false\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><g data-name=\"Group 28291\"><path data-name=\"Rectangle 4398\" fill=\"none\" d=\"M0 0h24v24H0z\"></path><g data-name=\"Vector Smart Object4 copy 2\"><g data-name=\"Group 27004\"><g data-name=\"Path 19205\"><path data-name=\"Path 20107\" d=\"M9.954 18.406a.588.588 0 01-.378-.137l-7.363-6.108a.594.594 0 01.759-.914L9.906 17 20.974 5.187a.593.593 0 01.865.812l-11.45 12.22a.591.591 0 01-.435.187z\" stroke=\"currentColor\" stroke-width=\"0.2\"></path></g></g></g></g></svg>&nbsp;<span>Kết nối internet tốc độ cao</span></li><li><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"MuiSvgIcon-root MuiSvgIcon-fontSizeInherit\" focusable=\"false\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><g data-name=\"Group 28291\"><path data-name=\"Rectangle 4398\" fill=\"none\" d=\"M0 0h24v24H0z\"></path><g data-name=\"Vector Smart Object4 copy 2\"><g data-name=\"Group 27004\"><g data-name=\"Path 19205\"><path data-name=\"Path 20107\" d=\"M9.954 18.406a.588.588 0 01-.378-.137l-7.363-6.108a.594.594 0 01.759-.914L9.906 17 20.974 5.187a.593.593 0 01.865.812l-11.45 12.22a.591.591 0 01-.435.187z\" stroke=\"currentColor\" stroke-width=\"0.2\"></path></g></g></g></g></svg>&nbsp;<span>Giường sofa</span></li><li><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"MuiSvgIcon-root MuiSvgIcon-fontSizeInherit\" focusable=\"false\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><g data-name=\"Group 28291\"><path data-name=\"Rectangle 4398\" fill=\"none\" d=\"M0 0h24v24H0z\"></path><g data-name=\"Vector Smart Object4 copy 2\"><g data-name=\"Group 27004\"><g data-name=\"Path 19205\"><path data-name=\"Path 20107\" d=\"M9.954 18.406a.588.588 0 01-.378-.137l-7.363-6.108a.594.594 0 01.759-.914L9.906 17 20.974 5.187a.593.593 0 01.865.812l-11.45 12.22a.591.591 0 01-.435.187z\" stroke=\"currentColor\" stroke-width=\"0.2\"></path></g></g></g></g></svg>&nbsp;<span>Bồn tắm</span></li></ul>', '2022-01-27 00:23:54', NULL),
('P-MT1-3', 'MT1', 'VIP3', 2, 2000000, '', '', '', '2022-01-25 00:39:34', NULL),
('P-MT2-1', 'MT2', 'VIP1', 1, 2000000, '', '', '', '2022-01-27 00:39:58', NULL),
('P-MT2-2', 'MT2', 'VIP2', 5, 10000000, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ho` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ten` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `vaitro` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'KH',
  `email_verification_link` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ho`, `ten`, `email`, `pass`, `status`, `vaitro`, `email_verification_link`, `email_verified_at`) VALUES
(1, 'Nguyễn Thị Phương', 'Thảo', 'phuongthao2104.na@gmail.com', '123456', 1, 'KH', 'ec96df749bdbd2548ea1028b95435a9d1585', '2022-01-01 10:39:40'),
(2, 'Đặng Khắc', 'Hùng', 'dangkhachung10k@gmail.com', 'Admin1@', 0, 'AD', '', NULL),
(3, 'Phương', 'Thảo', 'nguyenthiphuongthao@gmail.com', 'Admin2@', 0, 'AD', '', NULL),
(4, 'Nguyễn Anh', 'Quân', 'nguyenanhquan@gmail.com', 'Admin3@', 0, 'AD', '', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hoadon_makhachhang` (`makh`),
  ADD KEY `fk_hoadon_maks` (`maphong`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachsan`
--
ALTER TABLE `khachsan`
  ADD PRIMARY KEY (`makhachsan`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`maphong`),
  ADD KEY `fk_1` (`makhachsan`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`makhachsan`) REFERENCES `khachsan` (`makhachsan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
