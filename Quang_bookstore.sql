-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 08, 2021 at 02:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telephonestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`) VALUES
(27, 'chiquang'),
(28, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` text DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `detail`, `parentID`, `image`) VALUES
(30, 'Iphone', 'Chi tiết', NULL, 'logoiphone.jpg'),
(31, 'SamSung', 'Chi tiết', NULL, 'logosamsung.jpg'),
(32, 'Oppo', 'Chi tiết', NULL, 'logooppo.jpg'),
(33, 'Vivo', 'Chi tiết', NULL, 'logovivo.jpg'),
(34, 'Xaomi', 'Chi tiết', NULL, 'logoxaomi.jpg'),
(35, 'Realme', 'Chi tiết', NULL, 'logorealme.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `categoryID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`categoryID`, `productID`) VALUES
(30, 10006),
(30, 10007),
(31, 10008);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `email`, `address`, `birth`, `username`) VALUES
(32, 'Đoàn Chí Quang', '0384327229', 'chiquang127@gmail.com', 'Hồ Chí Minh', '2001-07-12', 'chiquang'),
(33, 'Dzeam Techie', '0384327229', 'dzeamtechie@gmail.com', 'Hồ Chí Minh', '2001-07-12', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `joindate` date NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `email`, `address`, `birth`, `joindate`, `username`) VALUES
(13, 'Dzeam Techie', '0384327229', 'dzeamtechie@gmail.com', 'Hồ Chí Minh', '2001-07-12', '2021-12-01', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `employee_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `importdetail`
--

CREATE TABLE `importdetail` (
  `importID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `subtotal` double NOT NULL,
  `discount` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderID`, `productID`, `quantity`, `price`, `subtotal`, `discount`, `status`) VALUES
(172, 10006, 1, 20490000, 20490000, 10, 0),
(173, 10006, 1, 20490000, 20490000, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

CREATE TABLE `ordertb` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subtotal` double NOT NULL,
  `shippingfee` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `employee_username` varchar(50) DEFAULT NULL,
  `customer_username` varchar(50) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `moneyinput` double DEFAULT NULL,
  `moneyoutput` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertb`
--

INSERT INTO `ordertb` (`id`, `date`, `subtotal`, `shippingfee`, `discount`, `total`, `employee_username`, `customer_username`, `customerID`, `status`, `moneyinput`, `moneyoutput`) VALUES
(172, '2021-12-08', 18441000, 0, 0, 18441000, NULL, 'chiquang', NULL, -1, NULL, NULL),
(173, '2021-12-08', 18441000, 0, 0, 18441000, NULL, 'chiquang', NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `permission` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `permission`) VALUES
(1, 'add'),
(2, 'delete'),
(3, 'update');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `publishdate` date DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `sold` int(11) NOT NULL,
  `publisherID` int(11) DEFAULT NULL,
  `saleID` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `quantity`, `price`, `publishdate`, `image`, `sold`, `publisherID`, `saleID`, `status`) VALUES
(10006, 'iPhone 12', '', 99, 20490000, '2021-12-08', 'iphone-12-xanh-la-new-2-600x600.jpg', 1, 14, 'discount10', 1),
(10007, 'iPhone 13 Pro Max', '', 0, 33990000, '2021-12-09', 'iphone-13-pro-max-silver-600x600.jpg', 0, 14, 'discount10', 1),
(10008, 'Samsung Galaxy Z Fold3 5G 256GB', '', 0, 41990000, '2021-12-05', 'samsung-galaxy-z-fold-3-silver-1-600x600.jpg', 0, 15, 'discount10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `detail`, `image`) VALUES
(14, 'Apple', 'Address', NULL),
(15, 'Android', 'Address', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `orderID`, `productID`, `rating`, `comment`, `date`) VALUES
(62, 173, 10006, 5, 'Giao hàng nhanh, đóng gói kỹ', '2021-12-08 20:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`name`, `detail`) VALUES
('admin', 'Quản lý cấp cao'),
('staff.import', 'Quản lý bên bộ phận nhập hàng'),
('staff.import.add', 'Nhân viên bên khu nhập hàng có chức năng thêm'),
('staff.import.delete', 'Nhân viên bên khu nhập hàng có chức năng xóa'),
('staff.import.update', 'Nhân viên bên khu nhập hàng có chức năng sửa'),
('staff.product', 'Quản lý bên bộ phận sản phẩm'),
('staff.product.add', 'Nhân viên bên khu sản phẩm có chức năng thêm'),
('staff.product.delete', 'Nhân viên bên khu sản phẩm có chức năng xóa'),
('staff.product.update', 'Nhân viên bên khu sản phẩm có chức năng sửa'),
('staff.receipt', 'Quản lý bên bộ phận hóa đơn'),
('staff.receipt.add', 'Nhân viên bên khu hóa đơn có chức năng thêm'),
('staff.receipt.delete', 'Nhân viên bên khu hóa đơn có chức năng xóa'),
('staff.receipt.update', 'Nhân viên bên khu hóa đơn có chức năng sửa'),
('staff.sell', 'Quản lý bên bộ phận bán hàng'),
('staff.user', 'Quản lý bên bộ phận thông tin người dùng'),
('staff.user.add', 'Nhân viên bên khu thông tin người dùng có chức năn'),
('staff.user.delete', 'Nhân viên bên khu thông tin người dùng có chức năn'),
('staff.user.update', 'Nhân viên bên khu thông tin người dùng có chức năn');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `rolename` varchar(50) NOT NULL,
  `permissionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`rolename`, `permissionID`) VALUES
('staff.import', 1),
('staff.import', 2),
('staff.import', 3),
('staff.import.add', 1),
('staff.import.delete', 2),
('staff.import.update', 3),
('staff.product', 1),
('staff.product', 2),
('staff.product', 3),
('staff.product.add', 1),
('staff.product.delete', 2),
('staff.product.update', 3),
('staff.receipt', 1),
('staff.receipt', 2),
('staff.receipt', 3),
('staff.receipt.add', 1),
('staff.receipt.delete', 2),
('staff.receipt.update', 3),
('staff.sell', 1),
('staff.sell', 2),
('staff.sell', 3),
('staff.user', 1),
('staff.user', 2),
('staff.user', 3),
('staff.user.add', 1),
('staff.user.delete', 2),
('staff.user.update', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `minorder` double DEFAULT NULL,
  `maxsale` double DEFAULT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `name`, `quantity`, `discount`, `startdate`, `enddate`, `minorder`, `maxsale`, `type`) VALUES
('11112222333', 'Voucher 10%', 100, 15, '2021-10-01', '2022-02-10', 5000000, 100000, 3),
('discount10', 'Giảm 10%', 100, 10, '2021-05-01', '2022-05-06', NULL, NULL, 0),
('discount20', 'Giảm 20%', 100, 20, '2021-05-01', '2022-05-06', NULL, NULL, 0),
('discount30', 'Giảm 30%', 100, 30, '2021-05-01', '2022-05-06', NULL, NULL, 0),
('freeship10', 'Miễn phí vận chuyển tháng 10', 99, NULL, '2021-10-01', '2021-11-01', 9000000, NULL, 1),
('freeship12', 'Miễn phí vận chuyển tháng 12', 99, NULL, '2021-12-01', '2022-01-01', 8000000, NULL, 1),
('sinhnhat2021', 'Sinh nhật lần thứ 2', 100, 15, '2021-10-01', '2022-02-10', 5000000, 100000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `orderID` int(11) NOT NULL,
  `saleID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_order`
--

INSERT INTO `sale_order` (`orderID`, `saleID`) VALUES
(172, 'freeship10'),
(173, 'freeship12');

-- --------------------------------------------------------

--
-- Table structure for table `sale_user`
--

CREATE TABLE `sale_user` (
  `username` varchar(50) NOT NULL,
  `saleID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `date`, `status`, `image`) VALUES
('admin', '$2y$10$Stb9lXNXey0ck7YBj4Uhn.0gMLvkmbQilnnI3YLcpfOVcRKgCtenq', 'dzeamtechie@gmail.com', '2021-12-08', 1, NULL),
('chiquang', '$2y$10$U9wmz2.FjK3LemXkCCUPy.151W52fbOiyinbWrmPmfIcwrRdPXOtu', 'chiquang127@gmail.com', '2021-12-08', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `username` varchar(50) NOT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`username`, `rolename`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`cartID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentID` (`parentID`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`categoryID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_username` (`employee_username`);

--
-- Indexes for table `importdetail`
--
ALTER TABLE `importdetail`
  ADD PRIMARY KEY (`importID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_username` (`employee_username`),
  ADD KEY `customer_username` (`customer_username`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisherID` (`publisherID`),
  ADD KEY `saleID` (`saleID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderID` (`orderID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`rolename`,`permissionID`),
  ADD KEY `permissionID` (`permissionID`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`orderID`,`saleID`),
  ADD KEY `saleID` (`saleID`);

--
-- Indexes for table `sale_user`
--
ALTER TABLE `sale_user`
  ADD PRIMARY KEY (`username`,`saleID`),
  ADD KEY `saleID` (`saleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`username`,`rolename`),
  ADD KEY `rolename` (`rolename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartdetail_ibfk_3` FOREIGN KEY (`cartID`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_product_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_ibfk_1` FOREIGN KEY (`employee_username`) REFERENCES `employee` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `importdetail`
--
ALTER TABLE `importdetail`
  ADD CONSTRAINT `importdetail_ibfk_1` FOREIGN KEY (`importID`) REFERENCES `import` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `importdetail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `ordertb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD CONSTRAINT `ordertb_ibfk_1` FOREIGN KEY (`employee_username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordertb_ibfk_2` FOREIGN KEY (`customer_username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordertb_ibfk_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`publisherID`) REFERENCES `publisher` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`saleID`) REFERENCES `sale` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orderdetail` (`orderID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `orderdetail` (`productID`);

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_ibfk_1` FOREIGN KEY (`rolename`) REFERENCES `role` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_permission_ibfk_2` FOREIGN KEY (`permissionID`) REFERENCES `permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD CONSTRAINT `sale_order_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `ordertb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_order_ibfk_3` FOREIGN KEY (`saleID`) REFERENCES `sale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sale_user`
--
ALTER TABLE `sale_user`
  ADD CONSTRAINT `sale_user_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_user_ibfk_2` FOREIGN KEY (`saleID`) REFERENCES `sale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `userrole_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userrole_ibfk_2` FOREIGN KEY (`rolename`) REFERENCES `role` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
