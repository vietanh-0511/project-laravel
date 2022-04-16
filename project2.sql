-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 10:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ma_admin` int(10) UNSIGNED NOT NULL,
  `ten_dang_nhap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ma_admin`, `ten_dang_nhap`, `mat_khau`) VALUES
(1, 'admin', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `hang_xe`
--

CREATE TABLE `hang_xe` (
  `ma_hang` int(10) UNSIGNED NOT NULL,
  `ten_hang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hang_xe`
--

INSERT INTO `hang_xe` (`ma_hang`, `ten_hang`) VALUES
(1, 'Trường Anh'),
(3, 'Phú Quý'),
(4, 'Quân Huy'),
(7, 'Cường Vinh'),
(8, 'Thủ Đô'),
(9, 'Tuyên An');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hoa_don` int(10) UNSIGNED NOT NULL,
  `ma_khach_hang` int(10) UNSIGNED NOT NULL,
  `tong_tien` double(8,0) NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  `ngay_dat` date NOT NULL,
  `ngay_khoi_hanh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hoa_don`, `ma_khach_hang`, `tong_tien`, `tinh_trang`, `ngay_dat`, `ngay_khoi_hanh`) VALUES
(6, 9, 200000, 2, '2020-08-06', '2020-08-10'),
(7, 10, 400000, 4, '2020-08-06', '2020-08-10'),
(8, 14, 500000, 4, '2020-08-09', '2020-08-11'),
(9, 14, 300000, 4, '2020-08-09', '2020-08-14'),
(10, 14, 500000, 2, '2020-08-10', '2020-08-12'),
(11, 15, 300000, 1, '2020-08-10', '2020-08-21'),
(12, 16, 300000, 1, '2020-08-10', '2020-08-19'),
(13, 17, 200000, 4, '2020-08-10', '2020-08-11'),
(14, 19, 3000000, 1, '2020-08-10', '2020-08-14'),
(15, 20, 2700000, 1, '2020-08-10', '2020-08-12'),
(16, 21, 4300000, 4, '2020-08-10', '2020-08-19'),
(17, 22, 300000, 1, '2020-08-11', '2020-08-20'),
(18, 23, 300000, 1, '2020-08-11', '2020-08-19'),
(19, 22, 300000, 1, '2020-08-11', '2020-08-20'),
(20, 22, 300000, 4, '2020-08-11', '2020-08-20'),
(21, 22, 300000, 4, '2020-08-11', '2020-08-20'),
(22, 22, 300000, 4, '2020-08-11', '2020-08-20'),
(23, 22, 300000, 1, '2020-08-11', '2020-08-20'),
(24, 22, 300000, 1, '2020-08-11', '2020-08-20'),
(25, 22, 300000, 2, '2020-08-11', '2020-08-20'),
(26, 22, 300000, 1, '2020-08-11', '2020-08-20'),
(27, 22, 300000, 1, '2020-08-11', '2020-08-20'),
(28, 22, 300000, 1, '2020-08-11', '2020-08-20'),
(29, 24, 200000, 1, '2020-08-12', '2020-08-19'),
(30, 25, 700000, 4, '2020-08-12', '2020-08-13'),
(31, 26, 200000, 4, '2020-08-12', '2020-08-14'),
(32, 27, 200000, 4, '2020-08-13', '2020-08-20'),
(33, 28, 200000, 4, '2020-08-13', '2020-08-19'),
(34, 29, 1000000, 1, '2020-08-13', '2020-08-26'),
(35, 30, 2600000, 4, '2020-08-13', '2020-08-26'),
(36, 31, 1200000, 4, '2020-08-13', '2020-08-20'),
(37, 31, 1200000, 4, '2020-08-13', '2020-08-20'),
(38, 31, 1200000, 4, '2020-08-13', '2020-08-20'),
(39, 31, 1200000, 4, '2020-08-13', '2020-08-20'),
(40, 31, 1200000, 4, '2020-08-13', '2020-08-20'),
(41, 32, 1200000, 4, '2020-08-13', '2020-08-20'),
(42, 31, 300000, 1, '2020-08-13', '2020-08-18'),
(43, 31, 100000, 1, '2020-08-13', '2020-08-21'),
(44, 31, 100000, 1, '2020-08-13', '2020-08-21'),
(45, 31, 300000, 1, '2020-08-13', '2020-08-15'),
(46, 31, 300000, 1, '2020-08-13', '2020-08-15'),
(47, 31, 200000, 1, '2020-08-14', '2020-08-19'),
(48, 31, 200000, 1, '2020-08-14', '2020-08-19'),
(49, 31, 200000, 1, '2020-08-14', '2020-08-26'),
(50, 33, 2200000, 1, '2020-08-14', '2020-08-20'),
(51, 33, 2200000, 1, '2020-08-14', '2020-08-20'),
(52, 33, 2200000, 1, '2020-08-14', '2020-08-20'),
(53, 31, 500000, 1, '2020-08-14', '2020-08-19'),
(54, 31, 500000, 1, '2020-08-14', '2020-08-19'),
(55, 31, 500000, 1, '2020-08-14', '2020-08-19'),
(56, 31, 300000, 1, '2020-08-14', '2020-08-20'),
(57, 34, 300000, 1, '2020-08-14', '2020-08-21'),
(58, 34, 200000, 1, '2020-08-14', '2020-08-20'),
(59, 34, 500000, 1, '2020-08-14', '2020-08-15'),
(60, 34, 500000, 1, '2020-08-14', '2020-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hoa_don` int(10) UNSIGNED NOT NULL,
  `ma_xe` int(11) NOT NULL,
  `so_ve` int(11) NOT NULL,
  `gia_ve` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`ma_hoa_don`, `ma_xe`, `so_ve`, `gia_ve`) VALUES
(6, 4, 2, 100000.00),
(7, 4, 4, 100000.00),
(8, 6, 5, 100000.00),
(9, 6, 3, 100000.00),
(10, 1, 5, 100000.00),
(11, 4, 3, 100000.00),
(12, 4, 3, 100000.00),
(13, 1, 2, 100000.00),
(14, 6, 30, 100000.00),
(15, 4, 27, 100000.00),
(16, 1, 43, 100000.00),
(17, 4, 3, 100000.00),
(18, 1, 3, 100000.00),
(19, 4, 3, 100000.00),
(20, 4, 3, 100000.00),
(21, 4, 3, 100000.00),
(22, 4, 3, 100000.00),
(23, 4, 3, 100000.00),
(24, 4, 3, 100000.00),
(25, 4, 3, 100000.00),
(26, 4, 3, 100000.00),
(27, 4, 3, 100000.00),
(28, 4, 3, 100000.00),
(29, 4, 2, 100000.00),
(30, 4, 7, 100000.00),
(31, 6, 2, 100000.00),
(32, 6, 2, 100000.00),
(33, 4, 2, 100000.00),
(34, 6, 10, 100000.00),
(35, 6, 26, 100000.00),
(36, 4, 12, 100000.00),
(37, 4, 12, 100000.00),
(38, 4, 12, 100000.00),
(39, 4, 12, 100000.00),
(40, 4, 12, 100000.00),
(41, 4, 12, 100000.00),
(42, 4, 3, 100000.00),
(43, 4, 1, 100000.00),
(44, 4, 1, 100000.00),
(45, 4, 3, 100000.00),
(46, 4, 3, 100000.00),
(47, 4, 2, 100000.00),
(48, 4, 2, 100000.00),
(49, 4, 2, 100000.00),
(50, 1, 22, 100000.00),
(51, 1, 22, 100000.00),
(52, 1, 22, 100000.00),
(53, 4, 5, 100000.00),
(54, 4, 5, 100000.00),
(55, 4, 5, 100000.00),
(56, 6, 3, 100000.00),
(57, 4, 3, 100000.00),
(58, 4, 2, 100000.00),
(59, 4, 5, 100000.00),
(60, 4, 5, 100000.00);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_khach_hang` int(10) UNSIGNED NOT NULL,
  `ten_khach_hang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_khach_hang`, `ten_khach_hang`, `so_dien_thoai`, `email`) VALUES
(2, 'Vanh', '0937261647', 'tranvietanh@gmail.com'),
(4, 'Trang', '0353970510', 'trang1234@gmail.com'),
(5, 'Nam', '058321456', 'nam06102@gmail.com'),
(9, 'Nguyễn Hùng', '0832811617', 'asbd@gmail.com'),
(10, 'Nam', '0234836927', 'nam@gmail.com'),
(11, 'Hoài', '0995485424', 'hoaibui@gmail.com'),
(12, 'Hiền Hoàng', '0966587687', 'hien@gmail.com'),
(14, 'Trần Vanh', '0344169977', 'tranvietanh333@gmail.com'),
(15, 'Phương Ánh Hùng', '0982345123', 'hung@gmail.com'),
(16, 'Hoàng Kim', '0987556244', 'kim@gmail.com'),
(17, 'vanhoc', '0388334345', 'ddd@gmail.com'),
(18, 'VAnh', '0947372883', 'rnrn@gmail.com'),
(19, 'adjadf', '0235830949', 'wjdfnkw@gmal.com'),
(20, 'SoveErro', '0259663788', 'dfg@gmal.ocm'),
(21, 'dgtjk', '065323565', 'fggvh@hjlk.xn--vu-08s'),
(22, 'VAnh', '0344169966', 'tranvanh@gmail.com'),
(23, 'Hiền', '0948333272', 'hienhoiang@gmail.com'),
(24, 'Nhung', '0552433156', 'woerhe@gmai.com'),
(25, 'Nhung', '0234567454', 'nhung14@gmail.com'),
(26, 'An', '0234567892', 'an14@gmail.com'),
(27, 'Nhung', '0123123123', 'nhung@gmail.com'),
(28, 'Nam', '0321321321', 'sss@gmail.com'),
(29, 'testve', '0213213213', 'asd@gmail.com'),
(30, 'testve', '0213213213', 'test@gmail.com'),
(31, 'testve', '0213213213', 'testve@gmail.com'),
(32, 'yghv', '0123456789', 'ghhyh@gmail.com'),
(33, 'kafa', '0546511321', 'adsvg@gmaoil.com'),
(34, 'hhh', '0987654321', 'hien@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lich_trinh`
--

CREATE TABLE `lich_trinh` (
  `ma_lich_trinh` int(10) UNSIGNED NOT NULL,
  `gio_xe_di` time NOT NULL,
  `gio_xe_den` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lich_trinh`
--

INSERT INTO `lich_trinh` (`ma_lich_trinh`, `gio_xe_di`, `gio_xe_den`) VALUES
(1, '11:30:00', '14:30:00'),
(3, '09:30:00', '15:00:00'),
(4, '07:50:00', '16:00:00'),
(5, '21:35:00', '03:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `loai_xe`
--

CREATE TABLE `loai_xe` (
  `ma_loai` int(10) UNSIGNED NOT NULL,
  `loai_xe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_ghe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_xe`
--

INSERT INTO `loai_xe` (`ma_loai`, `loai_xe`, `so_ghe`) VALUES
(3, 'Xe Giường Nằm', 35),
(4, 'Limousine giường nằm', 45),
(5, 'Xe Ghế Ngồi', 30),
(6, 'Limousine', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tuyen_duong`
--

CREATE TABLE `tuyen_duong` (
  `ma_tuyen` int(10) UNSIGNED NOT NULL,
  `tuyen_duong` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diem_di` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diem_den` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tuyen_duong`
--

INSERT INTO `tuyen_duong` (`ma_tuyen`, `tuyen_duong`, `diem_di`, `diem_den`) VALUES
(1, 'Hà Nội - Hà Giang', 'Hà Nội', 'Hà Giang'),
(3, 'Hà Nội - Tuyên Quang', 'Hà Nội', 'Tuyên Quang'),
(4, 'Hà Nội - Nghệ An', 'Hà Nội', 'Nghệ An'),
(5, 'Hà Nội - Thanh Hóa', 'Hà Nội', 'Thanh Hóa'),
(6, 'Hà Nội -  Sơn La', 'Hà Nội', 'Sơn La');

-- --------------------------------------------------------

--
-- Table structure for table `xe_khach`
--

CREATE TABLE `xe_khach` (
  `ma_xe` int(10) UNSIGNED NOT NULL,
  `ten_xe` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_loai` int(10) UNSIGNED NOT NULL,
  `ma_hang` int(10) UNSIGNED NOT NULL,
  `ma_tuyen` int(10) UNSIGNED NOT NULL,
  `ma_lich_trinh` int(10) UNSIGNED NOT NULL,
  `gia_ve` double NOT NULL,
  `bien_so` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xe_khach`
--

INSERT INTO `xe_khach` (`ma_xe`, `ten_xe`, `ma_loai`, `ma_hang`, `ma_tuyen`, `ma_lich_trinh`, `gia_ve`, `bien_so`, `anh`) VALUES
(1, 'Thành Công', 4, 3, 3, 1, 100000, '27F-235829', 'scania-bus.jpg'),
(4, 'Quân Huy 1', 3, 4, 3, 3, 100000, '22D-3515', 'IMG_E1540.JPG'),
(5, 'An Phú Qúy', 4, 1, 4, 4, 200000, '23D-24141', 'scania-bus.jpg'),
(6, 'Văn Minh', 3, 4, 1, 3, 100000, '87K-9754', 'unnamed.jpg'),
(7, 'Xe Bồ', 4, 3, 6, 4, 300000, '23K-1212', 'xekhach.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma_admin`);

--
-- Indexes for table `hang_xe`
--
ALTER TABLE `hang_xe`
  ADD PRIMARY KEY (`ma_hang`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hoa_don`),
  ADD KEY `hoa_don_ma_khach_hang_foreign` (`ma_khach_hang`);

--
-- Indexes for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`ma_hoa_don`,`so_ve`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_khach_hang`);

--
-- Indexes for table `lich_trinh`
--
ALTER TABLE `lich_trinh`
  ADD PRIMARY KEY (`ma_lich_trinh`);

--
-- Indexes for table `loai_xe`
--
ALTER TABLE `loai_xe`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `tuyen_duong`
--
ALTER TABLE `tuyen_duong`
  ADD PRIMARY KEY (`ma_tuyen`);

--
-- Indexes for table `xe_khach`
--
ALTER TABLE `xe_khach`
  ADD PRIMARY KEY (`ma_xe`),
  ADD KEY `xe_khach_ma_loai_foreign` (`ma_loai`),
  ADD KEY `xe_khach_ma_hang_foreign` (`ma_hang`),
  ADD KEY `xe_khach_ma_tuyen_foreign` (`ma_tuyen`),
  ADD KEY `xe_khach_ma_lich_trinh_foreign` (`ma_lich_trinh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ma_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hang_xe`
--
ALTER TABLE `hang_xe`
  MODIFY `ma_hang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hoa_don` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_khach_hang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `lich_trinh`
--
ALTER TABLE `lich_trinh`
  MODIFY `ma_lich_trinh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loai_xe`
--
ALTER TABLE `loai_xe`
  MODIFY `ma_loai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tuyen_duong`
--
ALTER TABLE `tuyen_duong`
  MODIFY `ma_tuyen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `xe_khach`
--
ALTER TABLE `xe_khach`
  MODIFY `ma_xe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ma_khach_hang_foreign` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`);

--
-- Constraints for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`ma_hoa_don`) REFERENCES `hoa_don` (`ma_hoa_don`);

--
-- Constraints for table `xe_khach`
--
ALTER TABLE `xe_khach`
  ADD CONSTRAINT `xe_khach_ma_hang_foreign` FOREIGN KEY (`ma_hang`) REFERENCES `hang_xe` (`ma_hang`),
  ADD CONSTRAINT `xe_khach_ma_lich_trinh_foreign` FOREIGN KEY (`ma_lich_trinh`) REFERENCES `lich_trinh` (`ma_lich_trinh`),
  ADD CONSTRAINT `xe_khach_ma_loai_foreign` FOREIGN KEY (`ma_loai`) REFERENCES `loai_xe` (`ma_loai`),
  ADD CONSTRAINT `xe_khach_ma_tuyen_foreign` FOREIGN KEY (`ma_tuyen`) REFERENCES `tuyen_duong` (`ma_tuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
