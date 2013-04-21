-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 21 日 19:27
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='通知表' AUTO_INCREMENT=1 ;

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
(1, 'admin', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
