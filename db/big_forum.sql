-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 05 月 11 日 04:47
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

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
-- 表的结构 `b_download`
--

CREATE TABLE IF NOT EXISTS `b_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `url` varchar(500) NOT NULL COMMENT '地址',
  `datetime` datetime NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='相关下载表格' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b_message`
--

CREATE TABLE IF NOT EXISTS `b_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `content` varchar(5000) NOT NULL COMMENT '留言内容',
  `datetime` datetime NOT NULL COMMENT '事件',
  `status` tinyint(4) NOT NULL COMMENT '留言审核状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b_net`
--

CREATE TABLE IF NOT EXISTS `b_net` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `class` varchar(50) NOT NULL COMMENT '类别',
  `content` varchar(5000) NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='网站信息表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `b_net`
--

INSERT INTO `b_net` (`id`, `class`, `content`) VALUES
(1, 'title', '人文与科技讲坛'),
(2, 'h1', '人文与科技讲坛'),
(3, 'footer', 'copyright @ 颜海镜');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `b_user`
--

INSERT INTO `b_user` (`id`, `account`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'yanhaijing', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的结构 `b_video`
--

CREATE TABLE IF NOT EXISTS `b_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(500) NOT NULL COMMENT '标题',
  `url` varchar(5000) NOT NULL COMMENT '地址',
  `datetime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='录像表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
