-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mila`
--
CREATE DATABASE IF NOT EXISTS `mila` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mila`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Nhẫn bạc', 'helios nhan.webp'),
(2, 'Dây chuyền bạc', 'helios day chuyen.webp'),
(3, 'Khuyên tai bạc', 'helios khuyen tai.webp'),
(4, 'Vòng tay bạc', 'helios vong tay.webp'),
(5, 'Nhẫn thời trang', 'nhanthoitrang.webp'),
(6, 'Dây chuyền thời trang', 'daychuyenthoitrang.webp'),
(7, 'Khuyên tai thời trang', 'khuyentaithoitrang.webp'),
(8, 'Vòng tay thời trang', 'vongtaythoitrang.webp');

-- --------------------------------------------------------

--
-- Table structure for table `meet`
--

CREATE TABLE `meet` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meet`
--

INSERT INTO `meet` (`id`, `name`, `image`) VALUES
(1, 'Model Dương Hạ Vy', 'meet3.webp'),
(2, 'Blogger Wiatran', 'meet1.webp'),
(3, 'Blogger Phan Uyên Nhi', 'meet2.webp'),
(4, 'Blogger Cattia	', 'meet4.webp'),
(5, 'Blogger Dương Ánh Phạm', 'meet5.webp'),
(6, 'Blogger Tini', 'meet6.webp');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `amount` int(99) NOT NULL DEFAULT 1,
  `image` varchar(100) NOT NULL,
  `view` int(10) NOT NULL DEFAULT 0,
  `idcate` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `amount`, `image`, `view`, `idcate`) VALUES
(3, 'Nhẫn Bạc S925 Bromeliads Helio', 995000, 1, 'nhan3.webp', 0, 1),
(4, 'Nhẫn Bạc S925 Aurora Helios Si', 995000, 1, 'nhan4.webp', 0, 1),
(5, 'Nhẫn Bạc S925 Clytze Old Detai', 725000, 1, 'nhan5.webp', 20, 1),
(6, 'Nhẫn Bạc S925 Legal Helios Sil', 745000, 1, 'nhan6.webp', 0, 1),
(7, 'Nhẫn Bạc S925 Pusi Helios Silv', 895000, 1, 'nhan7.webp', 50, 1),
(8, 'Nhẫn Bạc S925 Clytze Old Detai', 725000, 1, 'nhan8.webp', 99, 1),
(9, 'Nhẫn Bạc S925 Cro Red Helios S', 995000, 1, 'nhan9.webp', 0, 1),
(10, 'Nhẫn Bạc S925 Nương Helios Sil', 1150000, 1, 'nhan10.webp', 60, 1),
(11, 'Nhẫn Bạc S925 Rome Helios Silv', 985000, 1, 'nhan11.webp', 0, 1),
(12, 'Nhẫn Bạc S925 Grenen Helios Si', 995000, 1, 'nhan12.webp', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `role`, `gender`) VALUES
(1, 'newstarlove00', '123', 'phuongcac555@gmail.com', 'Le Thanh Phuc', 0, ''),
(5, 'admin', 'admin', 'admin@gmail.com', 'admin', 1, ''),
(7, 'demo', 'demo', 'demo@gmail.com', 'demo', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meet`
--
ALTER TABLE `meet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`idcate`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `meet`
--
ALTER TABLE `meet`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`idcate`) REFERENCES `category` (`id`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"relation_lines\":\"true\",\"angular_direct\":\"direct\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('themoon', 1, 'ERD');

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"themoon\",\"table\":\"size\"},{\"db\":\"themoon\",\"table\":\"danh_muc\"},{\"db\":\"themoon\",\"table\":\"san_pham\"},{\"db\":\"themoon\",\"table\":\"hinh_anh\"},{\"db\":\"themoon\",\"table\":\"product_size\"},{\"db\":\"themoon\",\"table\":\"banner\"},{\"db\":\"themoon\",\"table\":\"meets\"},{\"db\":\"themoon\",\"table\":\"danh_gia\"},{\"db\":\"phpmyadmin\",\"table\":\"pma__bookmark\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('themoon', 'bai_viet', 1, 170, 372),
('themoon', 'chi_tiet_don_hang', 1, 885, 18),
('themoon', 'danh_gia', 1, 665, 249),
('themoon', 'danh_muc', 1, 169, 264),
('themoon', 'don_hang', 1, 894, 196),
('themoon', 'hinh_anh', 1, 441, 19),
('themoon', 'khach_hang', 1, 666, 448),
('themoon', 'khuyen_mai', 1, 1135, 231),
('themoon', 'meets', 1, 169, 560),
('themoon', 'product_size', 1, 172, 169),
('themoon', 'san_pham', 1, 378, 222),
('themoon', 'size', 1, 168, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('themoon', 'size', 'ten');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-11-21 11:45:37', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":234}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `themoon`
--
CREATE DATABASE IF NOT EXISTS `themoon` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `themoon`;

-- --------------------------------------------------------

--
-- Table structure for table `bai_viet`
--

CREATE TABLE `bai_viet` (
  `id` int(11) NOT NULL COMMENT 'Mã bài viết',
  `tieu_de` varchar(255) NOT NULL COMMENT 'Tiêu đề bài viết',
  `tom_tat` text NOT NULL COMMENT 'Tóm tắt nội dung bài viết',
  `noi_dung` text NOT NULL COMMENT 'Nội dung bài viết',
  `hinh_anh` varchar(255) NOT NULL COMMENT 'Hình ảnh bài viết',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày nhập'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL COMMENT 'Mã banner',
  `ten` varchar(50) NOT NULL COMMENT 'Tên banner',
  `hinh_anh` varchar(255) NOT NULL COMMENT 'Hình ảnh banner',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày nhập banner',
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày cập nhật banner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `ten`, `hinh_anh`, `ngay_nhap`, `ngay_cap_nhat`) VALUES
(1, 'banner 1', 'banner1.jpg', '2024-11-15 09:05:41', '2024-11-15 09:05:41'),
(2, 'banner 2', 'banner2.jpg', '2024-11-15 09:05:41', '2024-11-15 09:05:41'),
(3, 'banner 3', 'banner3.webp', '2024-11-15 09:05:41', '2024-11-15 09:05:41'),
(4, 'banner 4', 'banner4.jpg', '2024-11-15 09:05:41', '2024-11-15 09:05:41'),
(5, 'banner 5', 'banner5.webp', '2024-11-15 09:05:41', '2024-11-15 09:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL COMMENT 'Mã chi tiết đơn hàng',
  `id_dh` int(11) NOT NULL COMMENT 'Mã đơn hàng',
  `id_sp` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `so_luong` int(11) NOT NULL COMMENT 'Số lượng sản phẩm',
  `gia_sp` decimal(10,2) NOT NULL COMMENT 'Giá sản phẩm',
  `tong_tien` decimal(10,2) NOT NULL COMMENT 'Tổng tiền tất cả sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int(11) NOT NULL COMMENT 'Mã đánh giá',
  `id_sp` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `id_kh` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `noi_dung` text NOT NULL COMMENT 'Nội dung đánh giá',
  `diem_danh_gia` int(11) NOT NULL COMMENT 'Điểm đánh giá (từ 1-5)',
  `file` varchar(255) NOT NULL COMMENT 'Hình ảnh hoặc video',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày đánh giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL COMMENT 'Mã danh mục',
  `ten` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `mo_ta` text NOT NULL COMMENT 'Mô tả danh mục',
  `hinh_anh` varchar(255) NOT NULL COMMENT 'Hình ảnh danh mục',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày lập danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten`, `mo_ta`, `hinh_anh`, `ngay_nhap`) VALUES
(1, 'Nhẫn', 'Bộ sưu tập Nhẫn nhà The Moon gồm các thiết kế nhẫn bạc S925, nhẫn bạc nam, nhẫn thời trang mang phong cách lịch lãm, phong trần, năng động, cool ngầu...', 'product-banner1.jpg', '2024-11-09 10:47:15'),
(2, 'Dây chuyền', 'Dây chuyền - điểm nhấn thời trang không thể thiếu. Với những thiết kế độc đáo, sáng tạo, chúng tôi sẽ giúp bạn tạo nên phong cách riêng, thật nổi bật.', 'product-banner2.jpg', '2024-11-09 10:47:15'),
(3, 'Khuyên tai', 'Khẳng định màu sắc cá nhân với khuyên tai bạc nam S925. Các chế tác được thiết kế với nhiều kiểu dáng, phù hợp với phong cách và đặc trưng khuôn mặt khác nhau.', 'product-banner3.jpg', '2024-11-09 10:47:15'),
(4, 'Vòng tay', 'Vòng tay nam bạc s925 hay vòng tay kim loại thời trang tại The Moon là một lựa chọn dành riêng cho người đàn ông mạnh mẽ, cá tính riêng, dám đương đầu với thử thách\r\nCực nhiều mẫu mã - Dễ mix, phối với nhiều phong cách, trang phục - Ship toàn quốc, đổi trả hàng miễn phí.\r\nĐừng bỏ lỡ khi phụ kiện là điểm nhấn cuối cùng.', 'product-banner4.jpg', '2024-11-09 10:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL COMMENT 'Mã đơn hàng',
  `id_kh` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `id_km` int(11) NOT NULL COMMENT 'Mã khuyến mãi',
  `tong_tien_sp` decimal(10,2) NOT NULL COMMENT 'Tổng tiền tất cả sản phẩm',
  `tien_giam_gia` decimal(10,2) NOT NULL COMMENT 'Số tiền giảm giá (nếu có)',
  `tong_tien` decimal(10,2) NOT NULL COMMENT 'Tổng tiền cuối cùng',
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Trạng thái đơn hàng',
  `dia_chi` varchar(255) NOT NULL COMMENT 'Địa chỉ thanh toán',
  `phuong_thuc` varchar(50) NOT NULL COMMENT 'Phương thức thanh toán',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo đơn hàng',
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày cập nhập đơn hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `id` int(11) NOT NULL COMMENT 'Mã hình ảnh',
  `id_sp` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `anh_chinh` varchar(255) NOT NULL COMMENT 'Ảnh chính sản phẩm',
  `album1` varchar(255) NOT NULL COMMENT 'Ảnh album 1',
  `album2` varchar(255) NOT NULL COMMENT 'Ảnh album 2',
  `album3` varchar(255) NOT NULL COMMENT 'Ảnh album 3',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinh_anh`
--

INSERT INTO `hinh_anh` (`id`, `id_sp`, `anh_chinh`, `album1`, `album2`, `album3`, `ngay_nhap`) VALUES
(1, 1, 'PhoenixRingHeliosSilver.webp', 'PhoenixRingHeliosSilver1.webp', 'PhoenixRingHeliosSilver2.webp', 'PhoenixRingHeliosSilver3.webp', '2024-11-11 11:26:17'),
(2, 2, 'KANAGAWARINGHeliosSilver.webp', 'KANAGAWARINGHeliosSilver1.jpg', 'KANAGAWARINGHeliosSilver2.webp', 'KANAGAWARINGHeliosSilver3.webp', '2024-11-11 11:28:18'),
(3, 3, 'FUSHIRINGHeliosSilver.webp', 'FUSHIRINGHeliosSilver1.jpg', 'FUSHIRINGHeliosSilver2.webp', 'FUSHIRINGHeliosSilver3.jpg', '2024-11-11 11:28:18'),
(4, 4, 'NAMIRINGHeliosSilver.webp', 'NAMIRINGHeliosSilver1.jpg', 'NAMIRINGHeliosSilver2.webp', 'NAMIRINGHeliosSilver3.webp', '2024-11-11 11:28:18'),
(5, 5, 'KURAMARINGHeliosSilver.webp', 'KURAMARINGHeliosSilver1.webp', 'KURAMARINGHeliosSilver2.webp', 'KURAMARINGHeliosSilver3.webp', '2024-11-11 11:28:18'),
(6, 6, 'NISHIKIKOIRINGHeliosSilver.webp', 'NISHIKIKOIRINGHeliosSilver1.webp', 'NISHIKIKOIRINGHeliosSilver2.webp', 'NISHIKIKOIRINGHeliosSilver3.webp', '2024-11-11 11:29:56'),
(7, 7, 'RiseRingHeliosSilver.webp', 'RiseRingHeliosSilver1.webp', 'RiseRingHeliosSilver2.webp', 'RiseRingHeliosSilver3.jpg', '2024-11-11 11:29:56'),
(8, 8, 'MountainHeliosSilver.webp', 'MountainHeliosSilver1.webp', 'MountainHeliosSilver2.webp', 'MountainHeliosSilver3.webp', '2024-11-11 11:29:56'),
(9, 9, 'QuakeV3HeliosSilver.webp', 'QuakeV3HeliosSilver1.webp', 'QuakeV3HeliosSilver2.webp', 'QuakeV3HeliosSilver3.webp', '2024-11-11 11:29:56'),
(10, 10, 'HeliosSnowflakes.webp', 'HeliosSnowflakes1.webp', 'HeliosSnowflakes2.webp', 'HeliosSnowflakes3.webp', '2024-11-21 06:57:51'),
(11, 11, 'HeliosBasicFeather.webp', 'HeliosBasicFeather1.webp', 'HeliosBasicFeather2.webp', 'HeliosBasicFeather3.webp', '2024-11-21 06:57:51'),
(12, 12, 'HeliosBraid.webp', 'HeliosBraid1.webp', 'HeliosBraid2.webp', 'HeliosBraid3.jpg', '2024-11-21 06:57:51'),
(13, 13, 'HeliosChain.webp', 'HeliosChain1.jpg', 'HeliosChain2.webp', 'HeliosChain3.webp', '2024-11-21 06:57:51'),
(14, 14, 'HeliosChainLine.webp', 'HeliosChainLine1.jpg', 'HeliosChainLine2.webp', 'HeliosChainLine3.webp', '2024-11-21 06:57:51'),
(15, 15, 'HeliosGroot.webp', 'HeliosGroot1.webp', 'HeliosGroot2.webp', 'HeliosGroot3.webp', '2024-11-21 06:57:51'),
(16, 16, 'AstinaRingHeliosGold.webp', 'AstinaRingHeliosGold1.webp', 'AstinaRingHeliosGold2.webp', 'AstinaRingHeliosGold3.webp', '2024-11-21 06:57:51'),
(17, 17, 'NISHIKIKOIRINGHeliosGold.webp', 'NISHIKIKOIRINGHeliosGold1.webp', 'NISHIKIKOIRINGHeliosGold2.webp', 'NISHIKIKOIRINGHeliosGold3.webp', '2024-11-21 06:57:51'),
(18, 18, 'FUSHIRINGHeliosGold.webp', 'FUSHIRINGHeliosGold1.webp', 'FUSHIRINGHeliosGold2.webp', 'FUSHIRINGHeliosGold3.webp', '2024-11-21 06:57:51'),
(19, 19, 'DayBacYNamV7HeliosSilver.jpg', 'DayBacYNamV7HeliosSilver1.jpg', 'DayBacYNamV7HeliosSilver2.webp', 'DayBacYNamV7HeliosSilver3.jpg', '2024-11-21 07:01:52'),
(20, 20, 'freedom-helios-silver.webp', 'freedom-helios-silver1.webp', 'freedom-helios-silver2.webp', 'freedom-helios-silver3.webp', '2024-11-21 07:01:52'),
(21, 21, 'RiverLotus12mmHelios.webp', 'RiverLotus12mmHelios1.jpg', 'RiverLotus12mmHelios2.jpg', 'RiverLotus12mmHelios3.jpg', '2024-11-21 07:01:52'),
(22, 22, 'storyteller-helios.webp', 'storyteller-helios1.webp', 'storyteller-helios2.webp', 'storyteller-helios3.jpg', '2024-11-21 07:01:52'),
(23, 23, 'triarchy-helios.webp', 'triarchy-helios1.webp', 'triarchy-helios2.webp', 'triarchy-helios3.webp', '2024-11-21 07:01:52'),
(24, 24, 'ChainHeliosZengerxLotusHelios.webp', 'ChainHeliosZengerxLotusHelios1.jpg', 'ChainHeliosZengerxLotusHelios2.webp', 'ChainHeliosZengerxLotusHelios3.jpg', '2024-11-21 07:01:52'),
(25, 25, 'ChainHeliosRisexLotusHelios.webp', 'ChainHeliosRisexLotusHelios1.jpg', 'ChainHeliosRisexLotusHelios2.webp', 'ChainHeliosRisexLotusHelios3.jpg', '2024-11-21 07:01:52'),
(26, 26, 'ChainHeliosGlexLotusHelios.webp', 'ChainHeliosGlexLotusHelios1.webp', 'ChainHeliosGlexLotusHelios2.webp', 'ChainHeliosGlexLotusHelios3.webp', '2024-11-21 07:01:52'),
(27, 27, 'HatNgocTraiTrangHelios.webp', 'HatNgocTraiTrangHelios1.webp', 'HatNgocTraiTrangHelios2.webp', 'HatNgocTraiTrangHelios3.webp', '2024-11-21 07:01:52'),
(28, 28, 'ClytzeBlueV2.webp', 'ClytzeBlueV2_1.webp', 'ClytzeBlueV2_2.webp', 'ClytzeBlueV2_3.webp', '2024-11-21 07:05:35'),
(29, 29, 'origin-crescent-helios.webp', 'origin-crescent-helios1.jpg', 'origin-crescent-helios2.webp', 'origin-crescent-helios3.webp', '2024-11-21 07:05:35'),
(30, 30, 'origin-geometry-earring-helios.webp', 'origin-geometry-earring-helios1.webp', 'origin-geometry-earring-helios2.webp', 'origin-geometry-earring-helios3.webp', '2024-11-21 07:05:35'),
(31, 31, 'baikal-lotus-helios-black.jpg', 'baikal-lotus-helios-black1.webp', 'baikal-lotus-helios-black2.webp', 'baikal-lotus-helios-black3.webp', '2024-11-21 07:05:35'),
(32, 32, 'victoria-lotus-helios-black.jpg', 'victoria-lotus-helios-black1.webp', 'victoria-lotus-helios-black2.webp', 'victoria-lotus-helios-black3.webp', '2024-11-21 07:05:35'),
(33, 33, 'khao-yai-sunflower-helios-black.jpg', 'khao-yai-sunflower-helios-black1.webp', 'khao-yai-sunflower-helios-black2.webp', 'khao-yai-sunflower-helios-black3.webp', '2024-11-21 07:05:35'),
(34, 34, 'bwindi-sunflower-helios-black.jpg', 'bwindi-sunflower-helios-black1.webp', 'bwindi-sunflower-helios-black2.webp', 'bwindi-sunflower-helios-black3.jpg', '2024-11-21 07:05:35'),
(35, 35, 'daintree-sunflower-helios-black.jpg', 'daintree-sunflower-helios-black1.jpg', 'daintree-sunflower-helios-black2.webp', 'daintree-sunflower-helios-black3.webp', '2024-11-21 07:05:35'),
(36, 36, 'hoa-luan-helios.jpg', 'hoa-luan-helios1.webp', 'hoa-luan-helios2.webp', 'hoa-luan-helios3.jpg', '2024-11-21 07:05:35'),
(37, 37, 'TwistedHeliosStainlessSteel.webp', 'TwistedHeliosStainlessSteel1.webp', 'TwistedHeliosStainlessSteel2.webp', 'TwistedHeliosStainlessSteel3.webp', '2024-11-21 07:09:05'),
(38, 38, 'ChainBlackHeliosStainlessSteel.webp', 'ChainBlackHeliosStainlessSteel1.webp', 'ChainBlackHeliosStainlessSteel2.webp', 'ChainBlackHeliosStainlessSteel3.webp', '2024-11-21 07:09:05'),
(39, 39, 'HeliosMatXichBac.webp', 'HeliosMatXichBac1.jpg', 'HeliosMatXichBac2.webp', 'HeliosMatXichBac3.jpg', '2024-11-21 07:09:05'),
(40, 40, 'HeliosXichFreedomhopkimV2.webp', 'HeliosXichFreedomhopkimV2_1.webp', 'HeliosXichFreedomhopkimV2_2.webp', 'HeliosXichFreedomhopkimV2_3.webp', '2024-11-21 07:09:05'),
(41, 41, 'HeliosCubanChain.webp', 'HeliosCubanChain1.webp', 'HeliosCubanChain2.webp', 'HeliosCubanChain3.webp', '2024-11-21 07:09:05'),
(42, 42, 'HeliosCubanv2.webp', 'HeliosCubanv2_1.webp', 'HeliosCubanv2_2.webp', 'HeliosCubanv2_3.webp', '2024-11-21 07:09:05'),
(43, 43, 'FlowerSmileHeliosStainlessSteel.webp', 'FlowerSmileHeliosStainlessSteel1.webp', 'FlowerSmileHeliosStainlessSteel2.webp', 'FlowerSmileHeliosStainlessSteel3.jpg', '2024-11-21 07:09:05'),
(44, 44, 'SkullBlingHeliosStainlessSteel.webp', 'SkullBlingHeliosStainlessSteel1.webp', 'SkullBlingHeliosStainlessSteel2.webp', 'SkullBlingHeliosStainlessSteel3.webp', '2024-11-21 07:09:05'),
(45, 45, 'HeliosBraidV.webp', 'HeliosBraidV1.jpg', 'HeliosBraidV2.webp', 'HeliosBraidV3.jpg', '2024-11-21 07:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `ten` varchar(255) NOT NULL COMMENT 'Tên khách hàng',
  `email` varchar(50) NOT NULL COMMENT 'Địa chỉ email khách hàng',
  `sdt` varchar(20) NOT NULL COMMENT 'Số điện thoại khách hàng',
  `dia_chi` varchar(255) NOT NULL COMMENT 'Địa chỉ khách hàng',
  `mat_khau` varchar(255) NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `avatar` varchar(255) NOT NULL COMMENT 'Ảnh đại diện khách hàng',
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái tài khoản',
  `admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Trạng thái admin',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo tài khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `id` int(11) NOT NULL COMMENT 'Mã khuyến mãi',
  `ten` varchar(255) NOT NULL COMMENT 'Tên khuyến mãi',
  `mo_ta` text NOT NULL COMMENT 'Mô tả khuyến mãi',
  `loai_km` enum('phan_tram','so_tien') NOT NULL COMMENT 'Loại khuyến mãi (% hoặc số tiền cụ thể)',
  `gia_tri_km` decimal(10,2) NOT NULL COMMENT 'Giá trị khuyến mãi',
  `ngay_bat_dau` date NOT NULL COMMENT 'Ngày bắt đầu khuyến mãi',
  `ngay_ket_thuc` date NOT NULL COMMENT 'Ngày kết thúc khuyến mãi',
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Trạng thái khuyến mãi',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày nhập khuyến mãi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meets`
--

CREATE TABLE `meets` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meets`
--

INSERT INTO `meets` (`id`, `ten`, `hinh_anh`, `ngay_nhap`) VALUES
(1, 'BLOGGER TRÍ MINH LÊ', 'meet1.jpg', '2024-11-15 08:47:00'),
(2, 'YOUTUBER KIÊN PHẠM', 'meet2.webp', '2024-11-15 08:47:00'),
(3, 'BLOGGER PHAN UYÊN NHI', 'meet3.webp', '2024-11-15 08:47:00'),
(4, 'BLOGGER TRÍ MINH LÊ', 'meet4.webp', '2024-11-15 08:47:00'),
(5, 'YOUTUBER KIÊN PHẠM', 'meet5.webp', '2024-11-15 08:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id_sp` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `id_size` int(11) NOT NULL COMMENT 'Mã size'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `id_dm` int(11) NOT NULL COMMENT 'Mã danh mục',
  `ten` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
  `gia` decimal(10,2) NOT NULL COMMENT 'Giá sản phẩm',
  `mo_ta` text NOT NULL COMMENT 'Mô tả sản phẩm',
  `hot` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Trạng thái nổi bật',
  `chat_lieu` enum('bạc','vàng','hợp kim') NOT NULL COMMENT 'Chất liệu sản phẩm',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày nhập sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `id_dm`, `ten`, `gia`, `mo_ta`, `hot`, `chat_lieu`, `ngay_nhap`) VALUES
(1, 1, 'Phoenix Ring Helios Silver', 745000.00, 'Sản phẩm được lấy cảm hứng từ hình ảnh phượng hoàng - vị thần có thể hồi sinh từ chính đống tro tàn của mình, ý nghĩa của chiếc nhẫn Phoenix này là sự hồi sinh và trỗi dậy. Sự hồi sinh và trỗi dậy này là chính là hình ảnh đại diện cho một Việt Nam kiên cường, bất khuất, không hề run sợ mà chống chọi với đại dịch.\r\n\r\nĐồng thời, mặt phía trong của chiếc nhẫn được điêu khắc 2 hình ảnh là: mặt trời và giọt nước mắt. Giọt nước mắt biểu trưng cho sự khổ đau, còn mặt trời chính là ánh sáng của tương lai, thiết kế mặt trời nằm trên giọt nước mắt như muốn khẳng định ánh sáng của tương lai, của năm mới sẽ xua tan đi những đau khổ mà năm cũ đã gây ra.\r\n\r\nSản phẩm nằm trong bộ sưu tập RISE, sẽ được ra mắt vào mùa đông, Giáng Sinh năm 2021\r\n\r\nCó thể có sự khác biệt nhỏ về các chi tiết sản phẩm giữa thiết kế bản vẽ 2D và sản phẩm chính thức, sản phẩm thương mại.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-09 10:58:30'),
(2, 1, 'KANAGAWA RING Helios Silver', 1350000.00, 'Vượt sóng, vượt gió, kiên trì bám đuổi theo khát khao, đứng lên chống lại chông gai, bão tố là thông điệp mà bức tranh “Sóng Lừng” - Kanagawa muốn truyền tải. \r\n\r\nĐem quan niệm thẩm mĩ đó vào chiếc nhẫn bạc thủ công, Helios cho ra đời mảnh ghép, biểu tượng cho nguyên tắc “Can đảm” của các chiến binh Samurai!\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-09 10:58:30'),
(3, 1, 'FUSHI RING Helios Silver', 1150000.00, 'Từ xưa người Nhật luôn tin leo Phú Sĩ giúp rèn luyện ý chí kiên cường, mạnh mẽ. \r\n\r\nLà địa điểm tâm linh,nơi truyền thêm sức mạnh tinh thần cho những chiến binh Samurai. Là hình tượng đại diện cho những vị tráng sĩ!\r\n\r\nCảm hứng được đúc rút từ ý niệm đó, chiếc nhẫn đã được hoàn thiện, là bước khởi đầu cho BST Bushido tại Helios!\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-09 10:58:30'),
(4, 1, 'NAMI RING Helios Silver', 1195000.00, 'Vượt sóng, vượt gió, kiên trì bám đuổi theo khát khao, đứng lên chống lại chông gai, bão tố là thông điệp mà bức tranh “Sóng Lừng” muốn truyền tải. \r\n\r\nĐem quan niệm thẩm mĩ đó thực thể hóa thành một chiếc nhẫn, Helios cho ra đời mảnh ghép, biểu tượng cho tinh thần “Can đảm” trong “Võ sĩ đạo” của các chiến binh Samurai.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-09 10:58:30'),
(5, 1, 'KURAMA RING Helios Silver', 1195000.00, 'Sau những cuộc chinh phạt sống còn, các chiến binh Samurai thường tìm đến những vị thần để làm nơi xoa dịu tâm hồn, đem lại cảm giác bình yên cho mình. \r\n\r\nBắt nguồn từ ý tưởng đó, chiếc nhẫn với biểu tượng  cáo trắng được ra đời với mong muốn, đây sẽ là sản phẩm có thể giúp người đeo có được cảm giác bình yên, được che chở, được sự bảo hộ từ các vị thần tối cao.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-09 10:58:30'),
(6, 1, 'NISHIKIKOI RING Helios Silver', 1190000.00, 'Theo truyền thuyết, cá Koi là hình ảnh ẩn dụ về sự quyết tâm và kiên trì bằng cách bơi ngược dòng, không ngừng di chuyển, chống chọi với dòng nước.\r\n\r\nLấy cảm hứng từ hình tượng đó, chúng tôi xây dựng lên một tác phẩm nghệ thuật với tinh thần đề cao sự kiên trì, không ngừng cố gắng vươn lên để vượt qua bão tố.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-09 10:58:30'),
(7, 1, 'Rise Ring Helios Silver', 895000.00, 'Sự sần sùi thể hiện cho một thể hỗn độn đầy đau khổ, nhưng sự hỗn độn đó lại phải nghiêng mình gánh trên lưng chữ “Sự trỗi dậy”. Chiếc nhẫn mang biểu trưng cho: dù có nhiều đau khổ, đau đớn biết bao thì đến cuối cùng mọi thứ cũng sẽ bình lặng và hồi sinh trở lại\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-09 10:58:30'),
(8, 1, 'Mountain Helios Silver', 745000.00, 'Bứt phá với thiết kế độc nhất đầy góc cạnh và xù xì, Mountain tạo nên vẻ ngoài cá tính, dáng vẻ bụi bặm phong trần\r\n\r\nTượng trưng cho đam mê khám phá của một nhà thám hiểm, một người đàn ông chinh phục ngọn núi cao.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-09 10:58:30'),
(9, 1, 'Quake V3 Helios Silver', 895000.00, 'Quake V3 tựa như một viên đá nằm trên đỉnh núi ngàn năm.\r\n\r\nBị bào mòn bởi thời gian, nhưng kết cấu vẫn vững chắc từ sâu bên trong, không bị vụn nát thành cát bụi.\r\n\r\nCũng như người đàn ông trưởng thành, sự kiên cường vững chãi của hiện tại đã được tôi luyện qua vô số thách thức từ cuộc sống.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?\r\n\r\n', 0, 'bạc', '2024-11-09 10:58:30'),
(10, 1, 'Snowflakes Helios Stainless Steel', 245000.00, 'Snowflakes lấy cảm hứng từ hình dáng thật sự của các tinh thể băng tuyết, một cấu trúc đối xứng hoàn hảo và tuyệt mỹ.\r\n\r\nMỗi bông tuyết lại khác nhau bởi chúng thay đổi tùy vào môi trường chúng đang tồn tại.\r\n\r\nCũng giống với con người, khi phải phát triển và tiến bộ hàng ngày để thích ứng với cuộc sống.', 0, 'hợp kim', '2024-11-12 12:10:07'),
(11, 1, 'Basic Feather Helios Stainless Steel', 245000.00, 'Basic Feather là sự kết hợp hoàn hảo giữa mạnh mẽ và phóng khoáng.\r\n\r\nĐược thiết kế như một chiếc lông vũ uốn cong, chiếc nhẫn tỏa sáng như một biểu tượng của tự do, bay bổng.\r\n\r\nToát lên tinh thần phiêu lưu cùng một chút táo bạo, nhắc nhở ta rằng điều duy nhất giới hạn là tâm trí.\r\n\r\nBởi vậy hãy luôn dám nghĩ, dám thử và dám theo đuổi tới tận cùng.', 1, 'hợp kim', '2024-11-12 12:10:07'),
(12, 1, 'Braid Helios Stainless Steel', 245000.00, 'Chiếc nhẫn khiến bao người phải chăm chú để nhìn ra được ý nghĩa của nét khắc.\r\n\r\nThực chất, đây chính là Braid - tóc thắt bím, một hình ảnh đặc trưng của bộ tộc Viking.\r\n\r\nMái tóc mượt mà mềm mại, nay trở thành biểu tượng mạnh mẽ, kiên cường khi được bện thành từng dải chắc.\r\n\r\nĐồng thời cũng đại diện cho sự hợp nhất, đúng với tinh thần thiện chiến và đoàn kết của người Viking.', 1, 'hợp kim', '2024-11-12 12:10:07'),
(13, 1, 'Chain Ring Helios Stainless Steel', 245000.00, 'Thiết kế dạng mắt xích kết hợp với dáng nhẫn to bản. Một chiếc nhẫn đơn giản nhưng không hề thiếu phần cool ngầu.\r\n\r\nChiếc nhẫn không đơn giản chỉ là một món phụ kiện, nó còn chứa đựng những thông điệp, niềm tin, lời hứa, thành tựu,… của chủ nhân. \r\n\r\nLịch lãm, phong trần, năng động, cool ngầu... tất cả các phong cách đều có trong bộ sưu tập nhẫn cao cấp của Helios. ', 0, 'hợp kim', '2024-11-12 12:10:07'),
(14, 1, 'Chain Line Helios Stainless Steel', 245000.00, 'CHAIN LINE RING - một bản phối hoạ tiết cực kỳ cá tính, được nối từ hai chữ T đảo chiều nhau bằng 2 đoạn dây xích riêng biệt!\r\n\r\nChiếc nhẫn không đơn giản chỉ là một món phụ kiện, nó còn chứa đựng những thông điệp, niềm tin, lời hứa, thành tựu,… của chủ nhân. \r\n\r\nLịch lãm, phong trần, năng động, cool ngầu... tất cả các phong cách đều có trong bộ sưu tập nhẫn cao cấp của Helios. ', 0, 'hợp kim', '2024-11-12 12:10:07'),
(15, 1, 'Groot Helios Stainless Steel', 245000.00, 'Câu chuyện của sản phẩm: Dưới lớp vỏ khô cằn gai góc của bộ rễ là những dòng nhựa sống cuồn cuộn chảy qua.\r\n\r\nMôi trường càng khắc nghiệt, các nhánh càng cắm xuống lòng đất, len lỏi thật sâu để đưa nước và dinh dưỡng đến mọi tế bào cây.\r\n\r\nChiếc nhẫn Groot được khai thác từ chính hình ảnh ấy, một sự mạnh mẽ ngầm, một sự cống hiến thầm lặng cho cả quá trình sinh trưởng của cây.', 0, 'hợp kim', '2024-11-12 12:10:07'),
(16, 1, 'Astina Ring Helios Gold', 14650000.00, 'Hoa hồng gợi nhớ đến tính nữ của phái đẹp, đến tất cả sự khéo léo, dịu dàng, ấm áp và quyến rũ của họ.\r\n\r\nNhưng không chỉ có vậy, họ còn rất mạnh mẽ và kiên cường như chiếc gai nhọn, sẵn sàng đấu tranh để bảo vệ điều mình ao ước trong đó có cả tình yêu.', 0, 'vàng', '2024-11-12 12:20:44'),
(17, 1, 'NISHIKIKOI RING Helios Gold', 16220000.00, 'Muốn ở trên vị thế không ai chạm tới, phải vượt qua thách thức không ai dám thử.\r\n\r\nNhư loài cá chép Koi, bơi ngược thác cả trăm năm mới trở thành hình dáng rồng vàng uy mãnh.\r\n\r\nNishikikoi ra đời từ ý niệm đó, chế tác từ chất liệu vàng với thiết kế band ring, cùng các chi tiết chạm nổi tái hiện chân thực hình ảnh cá Koi vượt thác dữ.\r\n\r\nKhông chỉ thể hiện quyền lực hay địa vị, mà còn mang giá trị lâu dài, bền bỉ như tinh thần không chịu khuất phục của người đàn ông đeo nó.', 0, 'vàng', '2024-11-12 12:20:44'),
(18, 1, 'FUSHI RING Helios Gold', 16980000.00, 'Đỉnh núi Phú Sĩ đại diện cho ý chí kiên cường, cho tinh thần Samurai bên trong mỗi người đàn ông.\r\n\r\nChế tác được đúc nguyên khối từ chất vàng quyền lực, dựa trên form signet khỏe khoắn.\r\n\r\nMặt nhẫn là hình ngọn núi với phần mây được làm rỗng, hai bên hông là các chi tiết hoa anh đào được chạm khắc tỉ mỉ.', 0, 'vàng', '2024-11-12 12:20:44'),
(19, 2, 'Dây Bạc Ý Nam V7 Helios Silver', 1315000.00, 'Dây chuyền Bạc Ý V7 được thiết kế theo dáng Snake Chain, đặc trưng bởi các tấm cong nhẹ ghép chặt với nhau tạo thành hình ống linh hoạt.\r\n\r\nTạo nên một điểm nhấn đơn giản mà mạnh mẽ cho bộ trang phục của anh em.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 12:54:29'),
(20, 2, 'Freedom Chain Helios Silver', 4450000.00, 'Tự do không phải là sự buông thả, thích gì làm nấy, hay vô trách nhiệm.\r\n\r\nTự do đích thực nằm trong giới hạn của nguyên tắc và kỷ luật bản thân, giúp chúng ta luôn vững vàng trước mọi cám dỗ.\r\n\r\nMang hình tượng dây xích, Freedom Chain như một lời nhắc nhở thường trực: tự do không vượt quá giới hạn mới là tự do chân chính.\r\n\r\nHãy để chiếc vòng này trở thành biểu tượng cho sự mạnh mẽ và kiên định trong cuộc sống của bạn.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 12:54:29'),
(21, 2, 'River Lotus 12mm Helios Silver', 13450000.00, 'Chế tác River Lotus được thiết kế theo dáng vòng Cuban huyền thoại. \r\n\r\nThay vì đính đá hay làm trơn, Helios đã chạm khắc tỉ mỉ hoa văn Lotus độc bản lên từng mắt xích nhỏ.\r\n\r\nToát lên một vẻ rất ngông, rất chiến khi đeo lên tay.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 12:54:29'),
(22, 2, 'Storyteller Pendant Helios Silver', 2210000.00, 'Không chỉ là tên gọi của dây chuyền này, Storyteller ở đây chính là anh em, người sẽ kể câu chuyện của bản thân, hoàn thiện nó với các lựa chọn charm tùy theo sở thích.\r\n\r\nMỗi charm bạc được chế tác như mảnh ghép độc đáo, chứa đựng ý nghĩa riêng đối với từng người.\r\n\r\nKết hợp với nhau, chúng tạo nên một câu chuyện độc nhất và đáng nhớ, thể hiện cá tính của riêng mình.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 12:54:29'),
(23, 2, 'Triarchy Helios Silver', 2250000.00, 'Tổng lãnh Thiên sứ, hay còn được gọi là Archangels, là những thực thể thiêng liêng dẫn đầu trong cuộc chiến giữa Thiên đàng và Địa ngục. \r\n\r\nBa vị đứng đầu trong hàng ngũ các Archangels là Michael, Gabriel và và Raphael, lần lượt đại diện cho ba ý niệm Bảo vệ - Truyền tin - Chữa lành.\r\n\r\nHọ oai vệ, quyền năng như những chiến binh của trời, sẵn sàng hy sinh để thực hiện nhiệm vụ cao cả của mình, xứng đáng với vị thế thủ lĩnh nơi Thiên đàng.\r\n\r\n3 vị Tổng lãnh Thiên sứ tối cao chính là nguồn cảm hứng cho chế tác dây chuyền Triarchy tại Helios.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 12:54:29'),
(24, 2, 'Chain Zenger x Lotus Helios Silver', 1210000.00, 'Dây chuyền Zenger x Lotus được thiết kế theo dáng Curb Chain, đặc trưng bởi các mắt xích dẹt.\r\n\r\nPhần khóa cài được chạm khắc tỉ mỉ họa tiết Lotus độc bản của Helios.\r\n\r\nTạo nên một điểm nhấn đơn giản mà chất ngầu cho bộ trang phục của anh em.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 12:54:29'),
(25, 2, 'Chain Rise x Lotus Helios Silver', 1140000.00, 'Dây chuyền Rise x Lotus được thiết kế theo dáng Oval Cable, đặc trưng bởi các mắt xích dày khỏe khoắn và phóng khoáng.\r\n\r\nPhần khóa cài được chạm khắc tỉ mỉ họa tiết Lotus độc bản của Helios.\r\n\r\nTạo nên một điểm nhấn đơn giản mà mạnh mẽ cho bộ trang phục của anh em.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 12:54:29'),
(26, 2, 'Chain Gle x Lotus Helios Silver', 1160000.00, 'Được hoàn thiện với móc cài là biểu tượng hoa sen đặc trưng của HELIOS. Đeo một mình hoặc layer với mặt dây chuyền yêu thích của bạn chắc chắn sẽ là sự lựa chọn không tồi Xin lưu ý rằng tất cả các sản phẩm của chúng tôi đều được làm thủ công và là sản phẩm độc nhất vô nhị, do đó có thể thay đổi đôi chút về kích thước, hình dạng và màu sắc.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 12:54:29'),
(27, 2, 'Hạt Ngọc Trai Trắng Helios Silver', 885000.00, 'Mỗi một sản phẩm bạc tại Helios đều là kết quả của quá trình chế tác thủ công kỹ lưỡng, tỉ mỉ và trau chuốt trước khi đến tay khách hàng.\r\n\r\nKhi chọn cách hoàn thiện thủ công, Helios hoàn toàn lường trước được việc thành phẩm sẽ không thể đồng nhất 100% từng chi tiết một như khi sản xuất công nghiệp bằng máy móc. Song, đây lại là điểm đặc biệt nhất, khi mỗi sản phẩm được hoàn thiện đều được ‘cá nhân hoá’ cho mỗi khách hàng.\r\n\r\nVới mỗi chế tác được hoàn thiện, Helios hy vọng đó sẽ là kỷ niệm riêng của mỗi người đeo.', 0, 'bạc', '2024-11-12 12:54:29'),
(28, 3, 'Clytze Blue V2 Helios Silver', 325000.00, 'Lấy cảm hứng từ sự tích về hoa hướng dương, về nàng Clytze - người con gái luôn dõi theo thần Helios.\r\n\r\nCác cánh hoa được chạm khắc theo tinh thần của nghệ thuật Gothic, đan xen nét sắc nhọn với những đường cong mềm mại. \r\n\r\nHình tròn trung tâm là biểu trưng cho tính kết nối, được phá cách bằng hiệu ứng nứt hoặc mặt đá tinh xảo. \r\n\r\nMỗi chế tác như một lời gợi nhắc về người con gái vẫn luôn dõi theo và hướng về anh em, giống như đóa hoa hướng dương hướng về Mặt Trời.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 13:11:21'),
(29, 3, 'Origin Crescent Helios Silver', 385000.00, 'Đúng như hình tượng mà chế tác đại diện, khuyên tai Origin Crescent được thiết kế với hình dáng lưỡi liềm độc đáo.\r\n\r\nBề mặt nhám của khuyên tượng trưng cho sự thô ráp nguyên bản, mang lại cảm giác tự nhiên, chưa qua quá nhiều xử lý - một mảnh ghép thô mộc nhưng đầy giá trị. Kết hợp với sắc đen của đá và dấu ấn Lotus, chế tác trở nên bắt mắt và cá tính hơn rất nhiều.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 13:11:21'),
(30, 3, 'Origin Geometry Earring Helios Silver', 385000.00, 'Bản dạng của mọi phần tử đang tồn tại đều xuất phát từ những khối hình đơn giản nhất. Dù mang vẻ ngoài phức tạp đến đâu, khi được bóc tách ra chúng đều là những hình học không hề phức tạp.\r\n\r\nVới ý niệm này, khuyên tai Origin Geometry (hình học) gợi nhắc: những điều lớn lao mà chúng ta hướng tới có vẻ thật phức tạp và khó nắm bắt. Nhưng nếu bạn bóc tách và tiếp cận chúng từng phần, bạn sẽ thấy đó là sự kết hợp của những bước đi nhỏ, vững chắc và có mục tiêu rõ ràng. \r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 13:11:21'),
(31, 3, 'Baikal Lotus Helios Black Silver', 345000.00, 'Hồ Baikal nằm ở vùng Siberia, Nga và được bao quanh bởi các dãy núi. Tính theo thể tích, đây là hồ nước ngọt lớn nhất thế giới.\r\n\r\nKhi đặt cái tên này cho khuyên tai Baikal - một chế tác trong BST Lotus, chúng tôi mang ý niệm rằng: thiết kế Lotus sẽ xuất hiện ở những hồ lớn trên thế giới, mang dấu ấn của Helios đến khắp nơi.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 13:11:21'),
(32, 3, 'Victoria Lotus Helios Black Silver', 650000.00, 'Hồ Victoria là hồ nước ngọt lớn nhất châu Phi và thứ nhì thế giới, đồng thời cũng là vùng nước nguy hiểm nhất thế giới.\r\n\r\nLấy tên theo địa danh đầy hấp dẫn này, chế tác khuyên tai bạc Victoria nằm trong BST Lotus. BST bao gồm các chế tác được đặt tên theo những hồ nổi tiếng trên thế giới. Từng chiếc nhẫn, vòng tay, dây chuyền đều mang trong mình câu chuyện và vẻ đẹp riêng biệt của từng hồ, với ý nghĩa thiết kế Lotus xuất hiện ở khắp nơi.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 13:11:21'),
(33, 3, 'Khao Yai Sunflower Helios Black Silver', 345000.00, 'Khu rừng Khao Yai, Thái Lan có vô vàn phong cảnh đẹp, cũng chính là minh chứng cho sự bảo tồn thành công của các loài động vật lớn trong một khu vực thiên nhiên hoang dã.\r\n\r\nNằm trong BST Sunflower, khuyên tai Khao Yai mang tên của điểm đến đầy mê hoặc này. BST bao gồm các chế tác đặt tên theo những khu rừng nổi tiếng thế giới, với hàm nghĩa bất kỳ nơi đâu có rừng, mặt trời sẽ mọc và hoa hướng dương sẽ hướng về phía đó. Cũng như vậy, sản phẩm trong BST Sunflower cũng sẽ hiện diện tại những quốc gia ấy, mang theo vẻ đẹp rực rỡ và sức sống mãnh liệt của hoa hướng dương.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 13:11:21'),
(34, 3, 'Bwindi Sunflower Helios Black Silver', 425000.00, 'Những khu rừng rậm rạp, sừng sững luôn mang lại cho con người cảm giác rùng mình và nhỏ bé trước thiên nhiên. Khu rừng Bwindi - Ugada là một địa danh như vậy.\r\n\r\nĐây cũng chính là cái tên cho chế tác khuyên tai nằm trong BST Sunflower. BST bao gồm các chế tác được đặt tên theo những khu rừng nổi tiếng thế giới. Bất kỳ đâu có rừng, mặt trời sẽ mọc và hoa hướng dương sẽ hướng về phía đó. Cũng như vậy, sản phẩm trong BST Sunflower cũng sẽ hiện diện tại những quốc gia ấy, mang theo vẻ đẹp rực rỡ và sức sống mãnh liệt của loài hoa hướng về ánh dương.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 13:11:21'),
(35, 3, 'Daintree Sunflower Helios Black Silver', 395000.00, 'Nhắc đến kho báu sinh học Daintree - Australia là nhắc đến một trong những bảo tàng sống cổ xưa nhất trên hành tinh. Ấy là nơi trú ngụ của rất nhiều loài thực vật cổ đại mà đa phần trong số đó không thể tìm thấy ở bất kỳ nơi nào khác trên thế giới.\r\n\r\nNằm trong BST Sunflower, khuyên tai Daintree mang tên của điểm đến đầy mê hoặc này. BST bao gồm các chế tác đặt tên theo những khu rừng nổi tiếng thế giới, với hàm nghĩa bất kỳ nơi đâu có rừng, mặt trời sẽ mọc và hoa hướng dương sẽ hướng về phía đó. Cũng như vậy, sản phẩm trong BST Sunflower cũng sẽ hiện diện tại những quốc gia ấy, mang theo vẻ đẹp rực rỡ và sức sống mãnh liệt của hoa hướng dương.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?\r\n\r\n', 0, 'bạc', '2024-11-12 13:11:21'),
(36, 3, 'Hoả Luân Helios Silver', 385000.00, 'Nằm trong bộ đôi hoả diệm được Na Tra sử dụng, thiết kế của vòng Hỏa Luân mang dáng hình gai góc hơn.\r\n\r\nĐược tạo hình từ ba vòng gai nhọn và những đường nét của lửa, khuyên Hỏa Luân mang đến cho người đeo một cảm giác mạnh mẽ, thô ráp và ấn tượng.\r\n\r\nHoả Luân hiện diện với những tính cách đặc trưng của người đàn ông ngông cuồng, khó đoán và có chút gì đó bướng bỉnh.\r\n\r\nHọ phán đoán khác, hành động khác với những suy nghĩ khác biệt hơn. Đường nét lấy cảm hứng từ ngọn lửa cũng biểu trưng cho tính cách nóng nảy, vội vàng của giai đoạn này.\r\n\r\nKhi được trao đến tay khách hàng, sản phẩm mang sứ mệnh kể tiếp câu chuyện cùng chủ nhân của nó. Vậy, câu chuyện của bạn là gì?', 0, 'bạc', '2024-11-12 13:11:21'),
(37, 4, 'Helios Twisted Helios Stainless Steel', 295000.00, 'Vòng tay kim loại Helios Twisted', 0, 'hợp kim', '2024-11-15 10:50:49'),
(38, 4, 'Helios Chain Black Helios Stainless Steel', 295000.00, 'Chiếc vòng mới nhất tại Helios Accessories được phát triển từ dáng Byzantine Box Chain đậm chất streetwear.\r\n\r\nCác mắt xích móc nối chắc chắn, bao phủ một tông màu đen xước cực bụi bặm và phóng khoáng..\r\n\r\nPhần khóa cài đóng mở thuận tiện, đảm bảo cho trải nghiệm đeo dễ chịu nhất.', 0, 'hợp kim', '2024-11-15 10:50:49'),
(39, 4, 'Mắt Xích Bạc Helios Stainless Steel', 295000.00, 'Vòng tay kim loại Helios Mắt Xích Bạc', 0, 'hợp kim', '2024-11-15 10:50:49'),
(40, 4, 'Helios Xích Freedom V2 Helios Stainless Steel', 295000.00, 'Từng mắt xích trong thiết kế này đều kết hợp với hình ảnh đồng hồ cát ở chính giữa. Sản phẩm được hoàn thiện tinh xảo bằng chất liệu hợp kim không gỉ.', 0, 'hợp kim', '2024-11-15 10:50:49'),
(41, 4, 'Cuban Chain Helios Stainless Steel', 295000.00, 'Cá tính và bụi bặm, vòng tay Cuban Chain là lựa chọn phù hợp với những an chàng ưa thích style đường phố nói chung và hip hop nói riêng.', 0, 'hợp kim', '2024-11-15 10:50:49'),
(42, 4, 'Helios Cuban v2 Helios Stainless Steel', 295000.00, 'Hiphop không chỉ là một trào lưu, đó còn là một lối sống, một nền văn hóa, một sự khẳng định bản thân mạnh mẽ của giới trẻ. Và gắn liền với lối sống đó, thời trang Hip hop đã ra đời, phát triển rất tự nhiên, hòa chung vào hơi thở của thời trang hiện đại.\r\nVà nói về phong cách thời trang Hip hop/Rapper, ta có thể nói tới một số item quen thuộc như áo phông hoặc thun in hình, bomber jacket, giày sneaker, những bộ tracksuit thường đi liền với phụ kiện, những mẫu vòng tay, dây chuyền phong cách \"Cuban V2\" là không thể thiếu.\r\nChất liệu hợp kim không gỉ cực kỳ chắc chắn được đính kèm những viên đá Cz cao cấp sáng lấp lánh, được gia công tinh xảo bởi những bậc thầy kim hoàn, khéo léo để tạo ra những sản phẩm với chất lượng trên cả tuyệt vời!', 0, 'hợp kim', '2024-11-15 10:50:49'),
(43, 4, 'Flower Smile Helios Stainless Steel', 295000.00, 'Vòng tay Flower Smile', 0, 'hợp kim', '2024-11-15 10:50:49'),
(44, 4, 'Skull Bling Helios Stainless Steel', 295000.00, 'Vòng tay Skull Bling', 0, 'hợp kim', '2024-11-15 10:50:49'),
(45, 4, 'Braid V Helios Stainless Steel', 295000.00, 'Chiếc vòng lấy cảm hứng từ Braid - tóc thắt bím, một biểu tượng gắn liền với dân tộc Viking.\r\n\r\nTừng bện tóc khỏe khoắn trở thành những mắt xích chữ V đầy mạnh mẽ.\r\n\r\nKhông chỉ mang ý nghĩa về sự hợp nhất, mà còn mang đậm tinh thần của một chiến binh Viking.', 0, 'hợp kim', '2024-11-15 10:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL COMMENT 'Mã size',
  `id_dm` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL COMMENT 'Tên size',
  `mo_ta` varchar(255) DEFAULT NULL COMMENT 'Mô tả size',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày nhập size',
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày cập nhật size'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `id_dm`, `ten`, `mo_ta`, `ngay_nhap`, `ngay_cap_nhat`) VALUES
(1, 1, 'Size 5', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(2, 1, 'Size 6', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(3, 1, 'Size 7', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(4, 1, 'Size 8', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(5, 1, 'Size 9', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(6, 1, 'Size 10', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(7, 1, 'Size 11', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(8, 1, 'Size 12', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(9, 1, 'Free Size', 'Size của nhẫn', '2024-11-21 08:43:36', '2024-11-21 09:20:20'),
(10, 2, 'Size 43cm', 'Size của dây chuyền', '2024-11-21 09:50:55', '2024-11-21 09:50:55'),
(11, 2, 'Size 45cm', 'Size của dây chuyền', '2024-11-21 09:50:55', '2024-11-21 09:50:55'),
(12, 2, 'Size 50cm', 'Size của dây chuyền', '2024-11-21 09:50:55', '2024-11-21 09:50:55'),
(13, 2, 'Size 55cm', 'Size của dây chuyền', '2024-11-21 09:50:55', '2024-11-21 09:50:55'),
(14, 2, 'Size 60cm', 'Size của dây chuyền', '2024-11-21 09:50:55', '2024-11-21 09:50:55'),
(15, 2, 'Size M', 'Size của dây chuyền', '2024-11-21 09:50:55', '2024-11-21 09:50:55'),
(16, 2, 'Size S', 'Size của dây chuyền', '2024-11-21 09:50:55', '2024-11-21 09:50:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dh` (`id_dh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `id_km` (`id_km`);

--
-- Indexes for table `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meets`
--
ALTER TABLE `meets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id_sp`,`id_size`),
  ADD KEY `id_size` (`id_size`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dm` (`id_dm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bài viết';

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã banner', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết đơn hàng';

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đánh giá';

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng';

--
-- AUTO_INCREMENT for table `hinh_anh`
--
ALTER TABLE `hinh_anh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hình ảnh', AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng';

--
-- AUTO_INCREMENT for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã khuyến mãi';

--
-- AUTO_INCREMENT for table `meets`
--
ALTER TABLE `meets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã size', AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_dh`) REFERENCES `don_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_km`) REFERENCES `khuyen_mai` (`id`);

--
-- Constraints for table `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD CONSTRAINT `hinh_anh_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danh_muc` (`id`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danh_muc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
