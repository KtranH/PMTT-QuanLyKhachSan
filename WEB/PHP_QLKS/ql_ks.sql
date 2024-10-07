-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 05, 2024 lúc 08:35 AM
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
-- Cơ sở dữ liệu: `ql_ks`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_phieudangky`
--

CREATE TABLE `chitiet_phieudangky` (
  `MAPHIEU` varchar(255) NOT NULL,
  `MAKH` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_phieudangky`
--

INSERT INTO `chitiet_phieudangky` (`MAPHIEU`, `MAKH`) VALUES
('111110LPPT04063207', '20249126'),
('20249126LPCC03091224', '20249126'),
('20249126LPCC04063341', '20249126'),
('20249126LPGR02033008', '20249126'),
('20249126LPGR05062654', '20249126'),
('20249126LPPT01014121', '20249126'),
('20249126LPPT02062527', '20249126'),
('20249126LPPT03061758', '20249126'),
('20249126LPPT04015449', '20249126');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoa_don`
--

CREATE TABLE `ct_hoa_don` (
  `MAHD` varchar(255) NOT NULL,
  `MADV` varchar(50) NOT NULL,
  `SOLUONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `MADG` varchar(255) NOT NULL,
  `BINHLUAN` text NOT NULL,
  `SOSAO` float NOT NULL,
  `ISDELETE` int(11) NOT NULL,
  `MAPHIEU` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`MADG`, `BINHLUAN`, `SOSAO`, `ISDELETE`, `MAPHIEU`) VALUES
('02165320249126', 'test', 5, 0, '20249126LPPT04015449');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `MADV` varchar(50) NOT NULL,
  `TENDV` varchar(255) NOT NULL,
  `GIA` float NOT NULL,
  `MOTA` text NOT NULL,
  `HINHANH` varchar(255) NOT NULL,
  `ISDELETE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`MADV`, `TENDV`, `GIA`, `MOTA`, `HINHANH`, `ISDELETE`) VALUES
('DV01', 'Bơi', 100000, 'Khách sạn chúng tôi cung cấp một bể bơi rộng lớn và hiện đại, với không gian thoáng đãng và thiết kế sang trọng, tạo điều kiện lý tưởng cho việc tận hưởng nước và thư giãn.', 'https://d2h8hramu3xqoh.cloudfront.net/blog/wp-content/uploads/2018/07/Swimming-Benefits-Children-MentallyEmotionallyand-Physically.webp', 1),
('DV010', 'Spa', 100000, 'Khách sạn chúng tôi cung cấp các phòng spa riêng tư, được trang bị đầy đủ tiện nghi và không gian yên tĩnh, tạo điều kiện lý tưởng cho việc thư giãn và tái tạo.', 'https://acihome.vn/uploads/15/thiet-ke-spa-tai-khach-san-nam-2023.jpeg', 1),
('DV02', 'Giặt, ủi quần áo', 100000, 'Khách sạn của chúng tôi cung cấp dịch vụ giặt ủi quần áo thuận tiện và nhanh chóng, giúp khách hàng tiết kiệm thời gian và công sức khi đi du lịch hoặc công tác.', 'https://maygiatcongnghiep1.com/wp-content/uploads/2021/09/giat-ui-la-gi.jpeg', 1),
('DV03', 'Xe đưa đón sân bay', 100000, 'Khách sạn của chúng tôi có sẵn một đội xe đa dạng bao gồm các loại xe từ sedan, SUV đến xe vận tải lớn, đảm bảo phù hợp với nhu cầu và số lượng hành khách của mỗi gia đình hoặc nhóm.', 'https://noibai247.com.vn/wp-content/uploads/2023/05/xe-don-san-bay-noi-bai-title.jpeg', 1),
('DV04', 'Thuê xe máy', 100000, 'Khách sạn của chúng tôi cung cấp một loạt các loại xe máy từ các dòng xe scooter nhẹ đến các loại xe mạnh mẽ và thích hợp với mọi loại địa hình, đảm bảo phù hợp với nhu cầu và kỹ năng lái của từng khách hàng.', 'https://alothuexemay.com/wp-content/uploads/2023/04/sluder-cho-thue-xe-may-sai-gon.jpg', 1),
('DV05', 'Trông trẻ', 100000, 'Chúng tôi có một đội ngũ nhân viên trông trẻ được đào tạo chuyên nghiệp, có kinh nghiệm và yêu trẻ, đảm bảo rằng trẻ em sẽ được chăm sóc một cách an toàn và chu đáo.', 'https://ezcloud.vn/wp-content/uploads/2019/09/di%CC%A3ch-vu%CC%A3-ba%CC%89o-ma%CC%82%CC%83u.jpg', 1),
('DV06', 'Wifi tốc độ cao', 100000, 'Chúng tôi cung cấp dịch vụ Wi-Fi tốc độ cao và ổn định, đảm bảo rằng khách hàng có thể truy cập internet một cách nhanh chóng và mượt mà mọi lúc, mọi nơi trong khách sạn.', 'https://cdn.tgdd.vn//GameApp/-1//top-10-router-wifi-toc-do-tren-300-mbps-nhanh-va-muot-6-800x450.jpg', 1),
('DV07', 'Thu đổi ngoại tệ', 100000, 'Chúng tôi cung cấp dịch vụ thu đổi ngoại tệ với tỷ giá hợp lý và cạnh tranh, đảm bảo rằng khách hàng sẽ nhận được số tiền tương đương xứng đáng với loại tiền tệ họ đổi.', 'https://lotushotel.vn/wp-content/uploads/2021/01/quy-trinh-dich-vu-doi-ngoai-te-tai-lotus-hotel-cap-nhap-ti-le-gia-tien.jpg', 1),
('DV08', 'Tour du lịch', 1000000, 'Chúng tôi cung cấp một loạt các tour du lịch đa dạng, bao gồm các tour tham quan thành phố, tour tự nhiên, tour lịch sử, tour văn hóa và nhiều loại hình du lịch khác nhau, đảm bảo phù hợp với mọi sở thích và nhu cầu của khách hàng.', 'https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2022/7/10/hinh-anh-cac-loai-hinh-du-lich-3-1657423025597-1657423027180128362217.jpeg', 1),
('DV09', 'Karaoke', 100000, 'Khách sạn của chúng tôi cung cấp các phòng karaoke riêng tư, trang bị đầy đủ các thiết bị âm thanh và ánh sáng chuyên nghiệp, tạo điều kiện lý tưởng cho các buổi hát karaoke vui vẻ và sôi động.', 'https://thegioiclub.vn/images/TotalKey/thiet-ke-thi-cong-2021-4.jpg', 1),
('TESTDV', 'TEST2', 555, 'TEST', 'https://static01.nyt.com/images/2023/06/21/multimedia/00buffet-miss2/00buffet-miss2-videoSixteenByNine3000.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MAKH` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `MALP` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` varchar(255) NOT NULL,
  `MANV` varchar(255) DEFAULT NULL,
  `MAPHIEU` varchar(255) NOT NULL,
  `NGAYLAP` date DEFAULT NULL,
  `TONGTIEN` decimal(10,2) NOT NULL,
  `ISDELETE` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MANV`, `MAPHIEU`, `NGAYLAP`, `TONGTIEN`, `ISDELETE`) VALUES
('111110LPPT04063207063242', NULL, '111110LPPT04063207', NULL, 0.00, 1),
('20249126LPCC04063341063435', NULL, '20249126LPCC04063341', NULL, 0.00, 1),
('20249126LPPT04015449015509', '20240988558043', '20249126LPPT04015449', '2024-06-02', 3000000.00, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(255) NOT NULL,
  `HOTEN` varchar(255) NOT NULL,
  `GIOITINH` varchar(10) NOT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `DIEMTINNHIEM` int(11) DEFAULT 0,
  `AVATAR` varchar(255) DEFAULT NULL,
  `CCCD` varchar(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `GHICHU` text DEFAULT NULL,
  `ISDELETE` tinyint(1) NOT NULL,
  `LUUTRU` varchar(255) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `HOTEN`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `SDT`, `EMAIL`, `PASSWORD`, `DIEMTINNHIEM`, `AVATAR`, `CCCD`, `USERNAME`, `GHICHU`, `ISDELETE`, `LUUTRU`) VALUES
('202412345678', 'Trần Thị Phương Thảo', 'Nữ', '2001-09-23', 'Thôn 11, Eahiao, Eahleo, Đăk Lăk', '0936123489', 'thao123@gmail.com', 'thao123', 100, '', '1234', 'thaophuong', 'Bình thường', 1, 'NO'),
('20249126', '24.Trần Hoàng Anh Khôi', 'Nam', '2024-01-01', 'Chưa rõ', '0563740949', 'hoangkhoi230@gmail.com', '$2y$12$RNayQVr6y13aszXG4FWORuYh12fFyNSSk/bmHjU18IcRzO3efgMLm', 40, 'https://lh3.googleusercontent.com/a/ACg8ocLev1qQPI8GSu3HuQYV5frfYBAmMQX_Fej2vyRveWGMPofrZdar=s96-c', '0789565442', '24.Trần Hoàng Anh Khôi', NULL, 1, 'YES'),
('707351078', 'Trần Văn A', 'Chưa rõ', '2024-01-01', 'Chưa rõ', '0707349054', 'hoangv131098@gmail.com', '$2y$12$1eWAzbk.Qj/XTsCv4vDkU.uYz4tKmQEpF3kWb721KtzJGC9SXQK5G', 100, 'user.png', NULL, 'GTXtitanx', NULL, 1, 'NO'),
('789456111111222333114709', 'Trần Văn AB', 'Chưa rõ', '2024-01-01', 'Chưa rõ', '111222333', 'AB@gmail.com', '$2y$12$jbHSFWibwErs8pxFuMn02uTr7IENjlwm.IU.8QOg7K/UARtXgp.d2', 100, 'user.png', '789456111', 'ABTest', NULL, 1, 'YES');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `MALP` varchar(255) NOT NULL,
  `TENLOAIPHONG` varchar(255) NOT NULL,
  `MOTA` text NOT NULL,
  `SUCCHUA` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `ANH` varchar(255) NOT NULL,
  `GIATHUE` double NOT NULL,
  `DIENTICH` varchar(255) NOT NULL,
  `TIENICH` varchar(255) NOT NULL,
  `NOITHAT` varchar(255) NOT NULL,
  `QUYDINH` varchar(255) NOT NULL,
  `ISDELETE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`MALP`, `TENLOAIPHONG`, `MOTA`, `SUCCHUA`, `SOLUONG`, `ANH`, `GIATHUE`, `DIENTICH`, `TIENICH`, `NOITHAT`, `QUYDINH`, `ISDELETE`) VALUES
('LPCC01', 'Phòng đơn hạng cao cấp', 'Phòng đơn giành riêng cho 1 người có view biển và có ban công. Không gian rộng rãi, tầm nhìn đẹp, trang bị cao cấp, phòng tắm sang trọng, và dịch vụ đẳng cấp.', 1, 6, 'https://www.tlcinteriors.com.au/wp-content/uploads/2021/09/bohemian-little-girls-bedroom-with-rattan-headboard-and-white-sheer-curtains.jpg|https://www.tlcinteriors.com.au/wp-content/uploads/2021/09/single-bed-styling-grey-bed-with-blush-and-white-bedding', 1000000, '20m²', 'Tiện nghi đầy đủ, không gian thoáng mát, giá cả hợp lý', '1 giường ngủ +1 phòng xông hơi + 1 nhà tắm + WC + 1 máy lạnh + 1 máy sấy đồ', 'Không hút thuốc, không nấu nướng, không được phép mang vật nuôi vào phòng', 1),
('LPCC02', 'Phòng đôi hạng cao cấp', 'Phòng đôi cao cấp với giường đôi, dành riêng cho hai người có view biển và có ban công.Không gian rộng rãi, tầm nhìn đẹp, trang bị cao cấp, phòng tắm sang trọng, và dịch vụ đẳng cấp.', 2, 1, 'https://c7.alamy.com/comp/DY42X4/bedroom-in-bb-uk-DY42X4.jpg|https://c7.alamy.com/comp/DY42WR/bedroom-in-bb-uk-DY42WR.jpg', 2000000, '30m²', 'Tiện nghi đầy đủ, không gian thoáng mát, giá cả hợp lý, tiện ích đặc biệt', '1 giường ngủ lớn +1 phòng xông hơi + 1 nhà tắm + WC + 1 máy lạnh + 1 máy sấy đồ +1 TV', 'Không hút thuốc, không nấu nướng, không được phép mang vật nuôi vào phòng', 1),
('LPCC03', 'Phòng VIP hạng cao cấp', 'Rộng 30m², 2 giường nhỏ có view biển và có ban công, tầm nhìn đẹp, trang bị cao cấp, và dịch vụ đẳng cấp, tiện ích đặc biệt.', 3, 1, 'https://cdn.pixabay.com/photo/2016/10/01/01/53/room-1706801_1280.jpg|https://cdn.pixabay.com/photo/2018/01/23/20/48/hotel-3102377_1280.jpg', 3000000, '30m²', 'Tiện nghi đầy đủ, không gian thoáng mát, giá cả hợp lý, tiện ích đặc biệt', '3 giường ngủ nhỏ +1 phòng xông hơi + 1 nhà tắm + WC + 1 máy lạnh + 1 máy sấy đồ + ủi đồ + máy giặt +1 TV', 'Không hút thuốc, không nấu nướng, không được phép mang vật nuôi vào phòng', 1),
('LPCC04', 'Phòng gia đình hạng cao cấp', 'Phòng có 1 giường lớn + 1 giường nhỏ, có view biển và có ban công, trang bị cao cấp, và dịch vụ đẳng cấp, tiện ích đặc biệt.', 3, 0, 'https://www.shutterstock.com/image-photo/triple-room-modern-hotel-260nw-649329964.jpg|https://thumbs.dreamstime.com/b/triple-room-modern-hotel-92725615.jpg', 4000000, '30m²-40m²', 'Tiện nghi đầy đủ, không gian thoáng mát, giá cả hợp lý, tiện ích đặc biệt', 'Phòng có 1 giường lớn + 1 giường nhỏ +1 phòng xông hơi + 1 nhà tắm + WC + 1 máy lạnh + 1 máy sấy đồ + ủi đồ + máy giặt +1 TV', 'Không hút thuốc, không nấu nướng, không được phép mang vật nuôi vào phòng', 0),
('LPCC05', 'Phòng tổng thống hạng cao cấp', 'Phòng có 2 giường lớn cho 4 người ở có view biển và có ban công, mang đến tầm nhìn ra biển tuyệt đẹp, có view biển, trang bị cao cấp, và dịch vụ đẳng cấp, tiện ích đặc biệt.', 5, 1, 'https://www.hoangyenhotel.com.vn/upload/products/VPHUM_testsang4.jpg|https://lh6.googleusercontent.com/proxy/7tYcVf51VjCxFbGLaL0X6YJIDNGaMjOTlzj-ruhOp9J035SK6d3yNfp1vZmF0xLpwY_Ivy6ZmKaQoqgUy1rySO1pzmkUdxT8FcfTJRUYeRulnhLrErqcacJLdfeO9w', 5000000, '40m²', 'Tiện nghi đầy đủ, không gian thoáng mát, giá cả hợp lý, tiện ích đặc biệt', '2 giường lớn +1 phòng xông hơi + 1 nhà tắm + WC + 1 máy lạnh + 1 máy sấy đồ + ủi đồ + máy giặt +1 TV', 'Không hút thuốc, không nấu nướng, không được phép mang vật nuôi vào phòng', 1),
('LPGR01', 'Phòng đơn giá rẻ', 'Phòng có 1 giường cho 1 người ngủ, giá cả rẻ, không gian thoáng mát', 1, 2, 'https://img.freepik.com/free-photo/small-hotel-room-interior-with-double-bed-bathroom_1262-12489.jpg?size=626&ext=jpg|https://img.freepik.com/free-photo/interior-modern-comfortable-hotel-room_1232-1823.jpg?size=626&ext=jpg', 200000, '20m²', 'Không gian thoải mái, tiện nghi cơ bản', '1 phòng ngủ + 1 nhà tắm + WC + 1 máy lạnh', 'Không hút thuốc , không nấu nướng, không mang thú cưng vào phòng', 1),
('LPGR02', 'Phòng đôi giá rẻ', 'Phòng có 1 giường đôi cho 2 người ngủ, giá cả rẻ, không gian thoáng mát', 2, 1, 'https://c7.alamy.com/comp/GB0X7J/twin-bed-hotel-room-GB0X7J.jpg|https://c7.alamy.com/comp/GB0X7T/twin-bed-hotel-room-GB0X7T.jpg', 500000, '30m²', 'Không gian thoải mái, tiện nghi cơ bản', ' 1 giường đôi + 1 nhà tắm + WC + 1 máy lạnh', 'Không hút thuốc , không nấu nướng, không mang thú cưng vào phòng', 1),
('LPGR03', 'Phòng VIP giá rẻ', 'phòng có 1 giường lớn + 1 giường nhỏ cho 3 người, giá cả rẻ, không gian thoáng mát', 3, 1, 'https://cdn.pixabay.com/photo/2016/10/01/01/53/room-1706801_1280.jpg|https://cdn.pixabay.com/photo/2018/01/23/20/48/hotel-3102377_1280.jpg', 800000, '30m²', 'Không gian thoải mái, tiện nghi cơ bản', ' 3 giường nhỏ +1 nhà tắm + WC + 1 máy lạnh', 'Không hút thuốc , không nấu nướng, không mang thú cưng vào phòng', 1),
('LPGR04', 'Phòng gia đình giá rẻ', 'Phòng 1 giường lớn + 1 giường nhỏ, giá cả rẻ, không gian thoáng mát', 3, 1, 'https://www.dunesvillage.com/wp-content/uploads/2021/03/Accommodations-3Br.jpg|https://www.dunesvillage.com/wp-content/uploads/2021/03/Accommodations-1Br.jpg', 700000, '30m²-40m²', 'Không gian thoải mái, tiện nghi cơ bản', '1 giường lớn + 1 giường nhỏ +1 nhà tắm + WC + 1 máy lạnh', 'Không hút thuốc , không nấu nướng, không mang thú cưng vào phòng', 1),
('LPGR05', 'Phòng tổng thống giá rẻ', 'phòng có 2 giường lớn + 1 giường nhỏ cho 4 người ở, giá cả rẻ, không gian thoáng mát', 5, 1, 'https://acihome.vn/uploads/15/mau-thiet-ke-noi-that-phong-2-giuong-don-ben-trong-khach-san-3-4-5-sao-1.JPG|https://phuongbacluxuryhotel.com/uploads/rooms/DTO/PBL_DTO1.png', 1000000, '30m²', 'Không gian thoải mái, tiện nghi cơ bản', '2 giường lớn + 1 giường nhỏ + 1 nhà tắm + WC + 1 máy lạnh', 'Không hút thuốc , không nấu nướng, không mang thú cưng vào phòng', 1),
('LPPT01', 'Phòng đơn hạng phổ thông', 'Phòng có 1 giường cho 1 người ngủ hạng phổ thông, với ban công có thể ngắm hoàng hôn hoặc bình minh,  không gian sang trọng và tiện nghi vượt trội.', 1, 3, 'https://img.freepik.com/free-photo/small-hotel-room-interior-with-double-bed-bathroom_1262-12489.jpg?size=626&ext=jpg|https://img.freepik.com/free-photo/interior-modern-comfortable-hotel-room_1232-1823.jpg?size=626&ext=jpg', 1500000, '30m²', 'Không gian rộng rãi, tầm nhìn đẹp, trang bị đầy đủ, dịch vụ cao cấp', '1 giường ngủ + 1 nhà tắm +WC + 1TV + 1 máy giặt + ủi đồ', 'Không hút thuốc, không nấu ăn, không mang thú cưng vào phòng', 1),
('LPPT02', 'Phòng đôi hạng phổ thông', 'Phòng có 1 giường đôi cho 2 người ngủ và có ban , với ban công có thể ngắm hoàng hôn hoặc bình minh,  không gian sang trọng và tiện nghi vượt trội.', 2, 2, 'https://c7.alamy.com/comp/GB0X7A/twin-bed-hotel-room-GB0X7A.jpg|https://c7.alamy.com/comp/2B1JNKN/twin-bed-hotel-room-in-rome-italy-2B1JNKN.jpg|https://c7.alamy.com/comp/GB0X67/motion-blurred-person-walking-in-twin-bed-hotel-room-GB0X67.jpg', 2500000, '30m²', 'Không gian rộng rãi, tầm nhìn đẹp, trang bị đầy đủ, dịch vụ cao cấp', '1 giường đôi + 1 nhà tắm +WC + 1TV + 1 máy giặt + ủi đồ', 'Không hút thuốc, không nấu ăn, không mang thú cưng vào phòng', 1),
('LPPT03', 'Phòng VIP hạng phổ thông', 'phòng có 1 giường lớn + 1 giường nhỏ cho 3 người, với ban công có thể ngắm hoàng hôn hoặc bình minh,  không gian sang trọng và tiện nghi vượt trội.', 3, 1, 'https://cdn.pixabay.com/photo/2015/06/15/01/59/room-809816_960_720.jpg|https://cdn.pixabay.com/photo/2015/02/24/02/01/room-647011_960_720.jpg', 3000000, '40m²', 'Không gian rộng rãi, tầm nhìn đẹp, trang bị đầy đủ, dịch vụ cao cấp', '3 giường nhỏ + 1 nhà tắm +WC + 1TV + 1 máy giặt + ủi đồ', 'Không hút thuốc, không nấu ăn, không mang thú cưng vào phòng', 1),
('LPPT04', 'Phòng gia đình hạng phổ thông', 'Phòng  1 giường lớn + 1 giường nhỏ, với ban công có thể ngắm hoàng hôn hoặc bình minh,  không gian sang trọng và tiện nghi vượt trội.', 3, 1, 'https://www.shutterstock.com/image-photo/triple-bed-blanket-small-bedroom-260nw-1778551487.jpg|https://www.shutterstock.com/shutterstock/photos/2305328789/display_1500/stock-photo-luxury-star-hotel-bedroom-with-wooden-furniture-and-pillows-arranged-230532', 3000000, '30m²-40m²', 'Không gian rộng rãi, tầm nhìn đẹp, trang bị đầy đủ, dịch vụ cao cấp', '1 giường lớn + 1 giường nhỏ + 1 nhà tắm +WC + 1TV + 1 máy giặt + ủi đồ', 'Không hút thuốc, không nấu ăn, không mang thú cưng vào phòng', 1),
('LPPT05', 'Phòng tổng thống hạng phổ thông', 'phòng có 2 giường lớn + 1 giường nhỏ cho 5 người ở', 5, 1, 'https://acihome.vn/uploads/15/mau-thiet-ke-noi-that-phong-2-giuong-don-ben-trong-khach-san-3-4-5-sao-1.JPG|https://phuongbacluxuryhotel.com/uploads/rooms/DTO/PBL_DTO1.png', 4500000, '40m²', 'Không gian rộng rãi, tầm nhìn đẹp, trang bị đầy đủ, dịch vụ cao cấp', '2 giường lớn + 1 giường nhỏ +1 nhà tắm +WC + 1TV + 1 máy giặt + ủi đồ', 'Không hút thuốc, không nấu ăn, không mang thú cưng vào phòng', 1),
('TESTNEW', 'TEST2', 'TEST', 5, 1, 'https://static01.nyt.com/images/2023/06/21/multimedia/00buffet-miss2/00buffet-miss2-videoSixteenByNine3000.jpg|https://cf.bstatic.com/xdata/images/hotel/max1024x768/482241348.jpg?k=b2b224709fdec8df749e7914ec9b99d6d06334199d22234e70b7033652124c54&o=&hp=1', 99999, '55', 'TEST', 'TEST', 'TEST', 1);

--
-- Bẫy `loaiphong`
--
DELIMITER $$
CREATE TRIGGER `after_update_isdelete` BEFORE UPDATE ON `loaiphong` FOR EACH ROW BEGIN
   IF NEW.ISDELETE = 0 THEN 
      SET NEW.SOLUONG = 0;
   END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_LOAIPHONG` BEFORE INSERT ON `loaiphong` FOR EACH ROW BEGIN
   IF NEW.ISDELETE = 0 THEN 
      SET NEW.SOLUONG = 0;
   END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` varchar(255) NOT NULL,
  `HOTEN` varchar(255) NOT NULL,
  `GIOITINH` varchar(10) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `DIACHI` varchar(255) NOT NULL,
  `SDT` varchar(15) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `MANHOM` varchar(10) NOT NULL,
  `ISDELETE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `HOTEN`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `SDT`, `EMAIL`, `PASSWORD`, `MANHOM`, `ISDELETE`) VALUES
('20240707349111', 'TEST2', 'Nam', '2006-06-06', 'TEST', '0707349111', 'Patry468@gmail.com', '$2y$12$Y.K86tF5isOtEaojYzMJlOpSDcua50oIKj3cMX0x/.9eYamT0zhyS', 'N02', 1),
('20240916718902', 'Nguyễn Văn An', 'Nam', '1980-10-15', '456A Phạm Thị Riêng, Quận Đống Đa, Hà Nội', '023456789109', 'nguyena@gmail.com', 'an123', 'N02', 1),
('20240936782190', 'Trần Thị Bình', 'Nữ', '1990-05-20', '76/12B Tân Hưng Thuận Quận 9, TP.HCM', '03456789209', 'tranb@gmail.com', 'binh123', 'N02', 1),
('2024093678921', 'Phạm Văn Trí', 'Nam', '1985-07-23', '12/23 Hồ Văn Nghi, Cần Thơ', '0456789390', 'phamc@gmail.com', 'tri123', 'N02', 1),
('20240946712890', 'Lê Thị Hà', 'Nữ', '1988-04-26', '555 Nguyễn Trư Phương, Quận 1 TP.HCM', '056789487', 'led@gmail.com', 'ha123', 'N02', 1),
('20240988558043', 'Đào Văn Vinh', 'Nam', '1985-12-24', '24/157 Phạm Văn Quá, Quận 12, TP.HCM', '0297381234', 'vinhdao@gmail.com', '$2y$12$5d/Vs1Ql8i.icRWbzm9SE.Dv2t0OaCq/gmyZ7kE39K/GEzGecxjXm', 'N01', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `MANHOM` varchar(10) NOT NULL,
  `MAPHANQUYEN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomquyen`
--

INSERT INTO `nhomquyen` (`MANHOM`, `MAPHANQUYEN`) VALUES
('N01', 'PQ01'),
('N02', 'PQ02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MAPHANQUYEN` varchar(10) NOT NULL,
  `CHUCNANG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`MAPHANQUYEN`, `CHUCNANG`) VALUES
('PQ01', 'Admin'),
('PQ02', 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudangky`
--

CREATE TABLE `phieudangky` (
  `MAPHIEU` varchar(255) NOT NULL,
  `MANV` varchar(255) DEFAULT NULL,
  `MAPHONG` varchar(255) DEFAULT NULL,
  `NGAYDAT` date DEFAULT NULL,
  `TINHTRANG` varchar(255) DEFAULT NULL,
  `TRAPHONG` date DEFAULT NULL,
  `THANHTOAN` double DEFAULT NULL,
  `TT_NHANPHONG` varchar(255) DEFAULT NULL,
  `ISDELETE` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudangky`
--

INSERT INTO `phieudangky` (`MAPHIEU`, `MANV`, `MAPHONG`, `NGAYDAT`, `TINHTRANG`, `TRAPHONG`, `THANHTOAN`, `TT_NHANPHONG`, `ISDELETE`) VALUES
('111110LPPT04063207', '20240988558043', '10LPPT04', '2024-06-05', 'Đã xác nhận', '2024-06-09', 12000000, 'Đã nhận phòng', 1),
('20249126LPCC03091224', NULL, '22LPCC03', '2024-06-03', 'Đã hủy', '2024-06-04', 3000000, 'Đã hủy', 1),
('20249126LPCC04063341', '20240988558043', '8LPCC04', '2024-06-07', 'Đã xác nhận', '2024-06-12', 4000000, 'Đã nhận phòng', 1),
('20249126LPGR02033008', NULL, '11LPGR02', '2024-06-14', 'Đã hủy', '2024-06-16', 500000, 'Đã hủy', 1),
('20249126LPGR05062654', '20240988558043', '24LPGR05', '2024-06-07', 'Đã hủy', '2024-06-09', 1000000, 'Đã hủy', 1),
('20249126LPPT01014121', NULL, '12LPPT01', '2024-06-03', 'Đã hủy', '2024-06-04', 1500000, 'Đã hủy', 1),
('20249126LPPT02062527', NULL, '5LPPT02', '2024-06-06', 'Đã hủy', '2024-06-09', 2500000, 'Đã hủy', 1),
('20249126LPPT03061758', NULL, '15LPPT03', '2024-06-06', 'Đã hủy', '2024-06-09', 3000000, 'Đã hủy', 1),
('20249126LPPT04015449', '20240988558043', '7LPPT04', '2024-06-03', 'Đã xác nhận', '2024-06-09', 3000000, 'Đã trả phòng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `MAPHONG` varchar(255) NOT NULL,
  `TENPHONG` varchar(255) DEFAULT NULL,
  `TRANGTHAI` int(1) NOT NULL DEFAULT 0,
  `MALP` varchar(50) NOT NULL,
  `VITRI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MAPHONG`, `TENPHONG`, `TRANGTHAI`, `MALP`, `VITRI`) VALUES
('10LPPT04', 'A103', 1, 'LPPT04', 1),
('11LPGR02', 'A303', 0, 'LPGR02', 2),
('12LPPT01', 'A302', 0, 'LPPT01', 5),
('13LPCC02', 'A401', 0, 'LPCC02', 3),
('14LPPT02', 'A405', 0, 'LPPT02', 6),
('15LPPT03', 'A201', 0, 'LPPT03', 1),
('16LPGR01', 'A202', 0, 'LPGR01', 5),
('17LPGR04', 'A204', 0, 'LPGR04', 6),
('18LPGR03', 'A205', 0, 'LPGR03', 2),
('19LPCC01', 'A203', 0, 'LPCC01', 3),
('1LPPT01', 'A101', 0, 'LPPT01', 1),
('20LPPT05', 'A502', 0, 'LPPT05', 4),
('21LPCC01', 'A104', 0, 'LPCC01', 3),
('22LPCC03', 'A402', 0, 'LPCC03', 5),
('23LPGR01', 'A501', 0, 'LPGR01', 6),
('24LPGR05', 'A505', 0, 'LPGR05', 2),
('2LPCC01', 'A102', 0, 'LPCC01', 1),
('3LPCC01', 'A301', 0, 'LPCC01', 1),
('4LPCC05', 'A404', 0, 'LPCC05', 2),
('5LPCC01', 'TEST2', 0, 'TESTNEW', 5),
('5LPPT02', 'A304', 0, 'LPPT02', 3),
('6LPCC01', 'A503', 0, 'LPCC01', 3),
('7LPPT04', 'A504', 0, 'LPPT04', 5),
('8LPCC04', 'A403', 1, 'LPCC04', 6),
('9LPPT01', 'A304', 0, 'LPPT01', 4);

--
-- Bẫy `phong`
--
DELIMITER $$
CREATE TRIGGER `update_quantity_after_insert_PHONG` AFTER INSERT ON `phong` FOR EACH ROW BEGIN
   DECLARE RoomCount INT;
   SELECT COUNT(*) 
   INTO RoomCount
   FROM PHONG
   WHERE TRANGTHAI = 0 AND MALP = NEW.MALP;
   
   UPDATE LOAIPHONG
   SET SOLUONG = RoomCount,
       ISDELETE = CASE 
           WHEN RoomCount = 0 THEN 0 
           ELSE 1 
       END
   WHERE MALP = NEW.MALP;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_quantity_after_update_PHONG` AFTER UPDATE ON `phong` FOR EACH ROW BEGIN
   DECLARE RoomCount INT;
   SELECT COUNT(*) 
   INTO RoomCount
   FROM PHONG
   WHERE TRANGTHAI = 0 AND MALP = NEW.MALP;
   
   UPDATE LOAIPHONG
   SET SOLUONG = RoomCount,
       ISDELETE = CASE 
           WHEN RoomCount = 0 THEN 0 
           ELSE 1 
       END
   WHERE MALP = NEW.MALP;
END
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_phieudangky`
--
ALTER TABLE `chitiet_phieudangky`
  ADD PRIMARY KEY (`MAPHIEU`,`MAKH`) USING BTREE,
  ADD KEY `MAKH` (`MAKH`);

--
-- Chỉ mục cho bảng `ct_hoa_don`
--
ALTER TABLE `ct_hoa_don`
  ADD PRIMARY KEY (`MAHD`,`MADV`) USING BTREE,
  ADD KEY `MADV` (`MADV`,`MAHD`) USING BTREE;

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MADG`),
  ADD KEY `ma_phieu` (`MAPHIEU`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MADV`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `ma_kh` (`MAKH`),
  ADD KEY `ma_lp` (`MALP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MANV` (`MANV`),
  ADD KEY `MAPHIEU` (`MAPHIEU`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `SDT` (`SDT`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`MALP`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD KEY `fk_nhanvien_nhomquyen` (`MANHOM`);

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`MANHOM`),
  ADD KEY `MAPHANQUYEN` (`MAPHANQUYEN`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MAPHANQUYEN`);

--
-- Chỉ mục cho bảng `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD PRIMARY KEY (`MAPHIEU`),
  ADD KEY `MAPHONG` (`MAPHONG`),
  ADD KEY `MANV` (`MANV`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MAPHONG`),
  ADD KEY `MALP` (`MALP`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_phieudangky`
--
ALTER TABLE `chitiet_phieudangky`
  ADD CONSTRAINT `chitiet_phieudatphong_khachhang` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `chitiet_phieudatphong_phieudatphong` FOREIGN KEY (`MAPHIEU`) REFERENCES `phieudangky` (`MAPHIEU`);

--
-- Các ràng buộc cho bảng `ct_hoa_don`
--
ALTER TABLE `ct_hoa_don`
  ADD CONSTRAINT `ct_hoa_don_dichvu` FOREIGN KEY (`MADV`) REFERENCES `dichvu` (`MADV`),
  ADD CONSTRAINT `ct_hoa_don_hoadon` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `ma_phieu` FOREIGN KEY (`MAPHIEU`) REFERENCES `phieudangky` (`MAPHIEU`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `ma_kh` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ma_lp` FOREIGN KEY (`MALP`) REFERENCES `loaiphong` (`MALP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_nhanvien` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `hoadon_phieudatphong` FOREIGN KEY (`MAPHIEU`) REFERENCES `phieudangky` (`MAPHIEU`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_nhomquyen` FOREIGN KEY (`MANHOM`) REFERENCES `nhomquyen` (`MANHOM`);

--
-- Các ràng buộc cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD CONSTRAINT `nhomquyen_phanquyen` FOREIGN KEY (`MAPHANQUYEN`) REFERENCES `phanquyen` (`MAPHANQUYEN`);

--
-- Các ràng buộc cho bảng `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD CONSTRAINT `fk_phieudatphong_nhanvien` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `fk_phieudatphong_phong` FOREIGN KEY (`MAPHONG`) REFERENCES `phong` (`MAPHONG`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `fk_phong_loaiphong` FOREIGN KEY (`MALP`) REFERENCES `loaiphong` (`MALP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
