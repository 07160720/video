-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-06 06:48:17
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `truename` varchar(20) NOT NULL COMMENT '真实姓名',
  `gid` int(10) NOT NULL COMMENT '角色id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `truename`, `gid`, `status`, `add_time`) VALUES
(11, 'admin', '123', '张三丰', 1, 0, 20180203);

-- --------------------------------------------------------

--
-- 表的结构 `admin_groups`
--

DROP TABLE IF EXISTS `admin_groups`;
CREATE TABLE IF NOT EXISTS `admin_groups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '角色名称',
  `rights` text NOT NULL COMMENT '角色权限',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_groups`
--

INSERT INTO `admin_groups` (`gid`, `title`, `rights`) VALUES
(1, '开发人员', '[2,1,25]'),
(2, '系统管理', '');

-- --------------------------------------------------------

--
-- 表的结构 `admin_menus`
--

DROP TABLE IF EXISTS `admin_menus`;
CREATE TABLE IF NOT EXISTS `admin_menus` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '菜单名称',
  `controller` varchar(30) NOT NULL COMMENT '控制器名称',
  `method` varchar(30) NOT NULL,
  `ishidden` tinyint(1) NOT NULL COMMENT '是否隐藏；0正常显示，1隐藏',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  `ord` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '上级菜单',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_menus`
--

INSERT INTO `admin_menus` (`mid`, `title`, `controller`, `method`, `ishidden`, `status`, `ord`, `pid`) VALUES
(34, '管理员菜单', '', '', 0, 0, 0, 3),
(33, '管理员保存', '', '', 0, 0, 0, 3),
(32, '管理员列表', '', '', 0, 0, 0, 3),
(1, '系统设置', '', '', 0, 0, 0, 0),
(2, '权限管理', '', '', 0, 0, 0, 0),
(3, '管理员管理', '', '', 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
