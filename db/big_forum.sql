-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 21 日 16:44
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `big_forum`
--

-- --------------------------------------------------------

--
-- 表的结构 `b_message`
--

CREATE TABLE IF NOT EXISTS `b_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `content` varchar(5000) NOT NULL COMMENT '留言内容',
  `datetime` datetime NOT NULL COMMENT '事件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `b_notice`
--

CREATE TABLE IF NOT EXISTS `b_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(300) NOT NULL COMMENT '通知标题',
  `content` varchar(100) NOT NULL COMMENT '内容',
  `date` date NOT NULL COMMENT '发表时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='通知表' AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `b_notice`
--

INSERT INTO `b_notice` (`id`, `title`, `content`, `date`) VALUES
(10, '第150期《大学生创新创业以及领导力的培养》', 'notice/9524ABD3-827C-8774-6D93-1B0106FBC930.png', '2013-04-20'),
(11, '第150期《大学生创新创业以及领导力的培养》', 'notice/43A49122-5B76-C329-29E6-AFA1E35DA0C1.jpg', '2013-04-20'),
(12, '第150期《大学生创新创业以及领导力的培养》', 'notice/9FA56753-0F61-C340-0014-1CCF90B01D4B.jpg', '2013-04-20'),
(13, '第150期《大学生创新创业以及领导力的培养》', 'notice/C7FBA89C-8448-8DC2-E3EA-A1816900B155.png', '2013-04-20'),
(14, '第150期《大学生创新创业以及领导力的培养》', 'notice/C5B82602-4EC3-EEB2-7B77-EEEF80ED9F76.jpg', '2013-04-20'),
(15, '第150期《大学生创新创业以及领导力的培养》', 'notice/5D5DB2DC-0B8E-F859-CDB9-D002025FFA11.jpg', '2013-04-20'),
(16, '第150期《大学生创新创业以及领导力的培养》', 'notice/F79519BF-911F-678F-10DA-D5A4F292168C.jpg', '2013-04-20'),
(17, '第150期《大学生创新创业以及领导力的培养》', 'notice/C663E842-D617-0C18-87F8-0849CA901092.jpg', '2013-04-20'),
(18, '第150期《大学生创新创业以及领导力的培养》', 'notice/E699261C-4F2B-92DA-40FE-E13EECECF314.jpg', '2013-04-20'),
(19, '第150期《大学生创新创业以及领导力的培养》', 'notice/C80B36D4-883A-4429-288E-0AFE5D8F8F0F.jpg', '2013-04-20'),
(20, '第150期《大学生创新创业以及领导力的培养》', 'notice/7F79025C-06B4-7CC1-7397-A9B6FD5215AE.jpg', '2013-04-20'),
(21, '第150期《大学生创新创业以及领导力的培养》', 'notice/852A0D14-1FA2-A6C2-CD4A-C6BFD59E706A.jpg', '2013-04-20'),
(22, '第150期《大学生创新创业以及领导力的培养》', 'notice/BD05B592-DCA4-954A-0283-18A8267087CD.jpg', '2013-04-20'),
(23, '第150期《大学生创新创业以及领导力的培养》', 'notice/0666ADED-8141-4E4A-3ACB-7D6160C83D39.jpg', '2013-04-20'),
(24, '第150期《大学生创新创业以及领导力的培养》', 'notice/2D5D305F-DBAE-B201-F5D1-A09835F8FC5A.jpg', '2013-04-20'),
(25, '第150期《大学生创新创业以及领导力的培养》', 'notice/2B12F3A0-E743-F3DC-55BA-85E6A9D23205.jpg', '2013-04-20'),
(26, '第150期《大学生创新创业以及领导力的培养》', 'notice/08873E36-1572-9778-F50C-26649FB6D082.jpg', '2013-04-21');

-- --------------------------------------------------------

--
-- 表的结构 `b_user`
--

CREATE TABLE IF NOT EXISTS `b_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id号',
  `account` varchar(20) NOT NULL COMMENT '帐号',
  `password` varchar(60) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `b_user`
--

INSERT INTO `b_user` (`id`, `account`, `password`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
