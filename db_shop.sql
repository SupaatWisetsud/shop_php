/*******************************************************
 Mr.Supaat Wisetsud 
 Number student: 600112416008 
 Class CT 
********************************************************/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--
CREATE DATABASE IF NOT EXISTS `db_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(280) NOT NULL,
  `name` varchar(180) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `username`, `password`, `name`, `email`, `phone`) VALUES
(1, 'admin', '1234', 'Supaat Wisetsud', '600112416008@bru.ac.th', '0931021805'),
(2, 'user', '1234', 'user name', 'user@mail.com', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `date_order` datetime DEFAULT current_timestamp(),
  `product_order` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `date_order`, `product_order`) VALUES
(15, '2020-02-03 21:14:32', '{\"1\":{\"id\":\"1\",\"name\":\"Intel Atom x5-Z8350\",\"count\":1,\"price\":\"4971\",\"total\":\"4971\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `img` varchar(380) DEFAULT 'assets/img/product.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `name`, `price`, `img`) VALUES
(1, 'Intel Atom x5-Z8350', 4971, 'assets/img/5c2190a6N30df1e96.jpg'),
(2, 'PC All in one Lenovo M700Z Gen6', 5990, 'assets/img/sadsadsadasdsadasdsad.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
