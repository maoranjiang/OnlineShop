-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-18 12:02:54
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_basket`
--

CREATE TABLE IF NOT EXISTS `think_basket` (
  `basket_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) NOT NULL,
  `goods_id` int(10) DEFAULT NULL,
  `goods_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`basket_id`,`user_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `goods_id_idx` (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_goods`
--

CREATE TABLE IF NOT EXISTS `think_goods` (
  `goods_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(45) NOT NULL,
  `goods_class_id` smallint(5) NOT NULL,
  `goods_image` varchar(100) NOT NULL,
  `goods_unit_price` int(11) NOT NULL,
  `goods_stock` int(10) NOT NULL,
  `goods_intro` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`goods_id`),
  UNIQUE KEY `goods_id_UNIQUE` (`goods_id`),
  KEY `goods_class_id_idx` (`goods_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `think_goods`
--

INSERT INTO `think_goods` (`goods_id`, `goods_name`, `goods_class_id`, `goods_image`, `goods_unit_price`, `goods_stock`, `goods_intro`) VALUES
(2, '12', 3, '1.jpg', 12, 12, '1111'),
(4, '为', 3, '6.jpg', 12, 12, '哈哈哈');

-- --------------------------------------------------------

--
-- 表的结构 `think_goods_class`
--

CREATE TABLE IF NOT EXISTS `think_goods_class` (
  `goods_class_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`goods_class_id`),
  KEY `class_father_id_idx` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `think_goods_class`
--

INSERT INTO `think_goods_class` (`goods_class_id`, `pid`, `class_name`, `type`) VALUES
(1, 0, '男鞋', 0),
(2, 0, '女鞋', 0),
(3, 1, '运动鞋', 1),
(4, 1, '旅游鞋', 1),
(5, 2, '高跟鞋', 1),
(6, 2, '帆布鞋', 1),
(7, 2, '水晶鞋', 1),
(9, 0, '计算机', 0),
(10, 9, '操作系统', 1),
(11, 9, '计算机网络', 1),
(12, 9, '编译原理', 1);

-- --------------------------------------------------------

--
-- 表的结构 `think_order`
--

CREATE TABLE IF NOT EXISTS `think_order` (
  `order_id` int(10) unsigned zerofill NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `goods_id` int(10) DEFAULT NULL,
  `goods_number` int(11) DEFAULT NULL,
  `order_time` varchar(45) DEFAULT NULL,
  `post_address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE IF NOT EXISTS `think_user` (
  `user_id` varchar(45) NOT NULL,
  `user_realname` varchar(100) DEFAULT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_tel` varchar(11) NOT NULL,
  `user_sex` enum('male','female') NOT NULL,
  `user_address` varchar(45) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_birth` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`user_id`, `user_realname`, `user_password`, `user_tel`, `user_sex`, `user_address`, `user_email`, `user_birth`) VALUES
('dyedu', '丁阳', 'd41d8cd98f00b204e9800998ecf8427e', '18813299292', 'male', '江西南昌', NULL, '1999-11-01'),
('jmredu', '蒋懋然', 'e10adc3949ba59abbe56e057f20f883e', '18813299290', 'male', '广东广州', 'jiangmaoran@foxmail.com', '1996-12-07'),
('zledu', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'male', '', NULL, '2000-12-02');

--
-- 限制导出的表
--

--
-- 限制表 `think_basket`
--
ALTER TABLE `think_basket`
  ADD CONSTRAINT `goods_id` FOREIGN KEY (`goods_id`) REFERENCES `think_goods` (`goods_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `think_user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `think_goods`
--
ALTER TABLE `think_goods`
  ADD CONSTRAINT `goods_class_id` FOREIGN KEY (`goods_class_id`) REFERENCES `think_goods_class` (`goods_class_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
