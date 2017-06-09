-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 08 月 04 日 10:19
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fd_bbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `area_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`area_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `area`
--

INSERT INTO `area` (`area_name`) VALUES
('娱乐'),
('学术研究'),
('生活'),
('社团');

-- --------------------------------------------------------

--
-- 表的结构 `pic`
--

CREATE TABLE IF NOT EXISTS `pic` (
  `pic_id` int(32) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `pic`
--

INSERT INTO `pic` (`pic_id`, `pic_name`) VALUES
(1, '../imges/1.jpg'),
(2, '../imges/3A35BDDBCDB5BA6CFB9D73DD0E2E46465D35AC7DD32BD_500_417.jpg'),
(3, '../imges/3EBF5E99DA1EE377587D2D896542A28E9335CD5423B12_580_628.jpg'),
(4, '../imges/02D9D913504C6A150972DC5CB68B5B9E185E17E8FBDA4_500_281.GIF'),
(5, '../imges/28C93CBD9B1049AE52E701FEE4C6EE00A05ED0E32F82A_245_140.GIF'),
(6, '../imges/8FAA9378FA7F460EFEFD31949835A7D41609A1113D2CA_580_464.jpg'),
(7, '../imges/4C8306B86DC4FC6E5BDC621E95245705845EA9928607C_400_377.GIF'),
(8, '../imges/406D6B3406D1155B6C4E0413A615FF81DC83192709DB2_245_140.GIF'),
(9, '../imges/A8A9543084EAE338BBD30E9A57DC2B2073678C3E3BAD2_245_140.GIF'),
(10, '../imges/CC0B7C8B7246901B8EB84124FC378CA5D5DCFA98A26A6_245_140.GIF'),
(11, '../imges/E0D465F7F65778F85E3E440B55061B97F00828F744E22_500_540.jpg'),
(14, '../imges/psb.jpg'),
(16, '../imges/0D99A70952D4A2C70775849314518F76296E2CDC9B778_225_150.GIF'),
(17, '../imges/3FF65EDE9CA8E3E99667427E409EB63CEA2F30D9B593F_130_133.GIF'),
(20, '../imges/aiyo,laoma.gif'),
(21, '../imges/ziwei.jpg'),
(22, '../imges/original_tuqZ_68c3000049241191.gif'),
(23, '../imges/00e93901213fb80ed61d849f37d12f2eb83894ae.jpg'),
(24, '../imges/2D9DC9E23F48DD1C49FA01B8A5E564369CDDD5EDA60F2_565_637.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `plate`
--

CREATE TABLE IF NOT EXISTS `plate` (
  `area_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `plate_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`plate_name`),
  KEY `pl1` (`area_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `plate`
--

INSERT INTO `plate` (`area_name`, `plate_name`) VALUES
('娱乐', '台球俱乐部'),
('娱乐', '开心乐园'),
('娱乐', '踢足球'),
('娱乐', '运动专栏'),
('学术研究', '竞赛交流区'),
('学术研究', '考研专区'),
('学术研究', '软件交流区'),
('生活', ''),
('生活', '心灵花园'),
('生活', '招聘信息'),
('生活', '校园交易'),
('生活', '老乡会所'),
('社团', '华为俱乐部'),
('社团', '瑞芯开发'),
('社团', '腾讯俱乐部');

-- --------------------------------------------------------

--
-- 表的结构 `reply_title`
--

CREATE TABLE IF NOT EXISTS `reply_title` (
  `reply_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title_id` bigint(20) NOT NULL,
  `reply_time` datetime NOT NULL,
  `reply_content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `reply_people` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `re1` (`title_id`),
  KEY `re2` (`reply_people`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- 转存表中的数据 `reply_title`
--

INSERT INTO `reply_title` (`reply_id`, `title_id`, `reply_time`, `reply_content`, `reply_people`) VALUES
(22, 1, '2013-05-11 12:12:23', '第三次修改			', '刘明明'),
(24, 1, '2013-05-11 12:26:24', '第三次修改			', '孙悟空'),
(27, 1, '2013-05-11 12:12:46', '第三次修改			', '宋江'),
(28, 1, '2013-05-11 12:12:57', '第三次修改			', '唐僧'),
(29, 1, '2013-05-11 12:14:23', '第三次修改			', '林冲'),
(42, 1, '2013-05-11 16:12:23', '第三次修改			', '唐僧'),
(43, 1, '2013-05-11 16:16:23', '第三次修改			', '孙悟空'),
(46, 3, '2013-05-11 12:12:23', '第三次修改			', '徐宗宇'),
(47, 3, '2013-05-11 13:12:23', '第三次修改			', '薛宝钗'),
(48, 3, '2013-05-11 14:12:23', '第三次修改			', '贾宝玉'),
(50, 4, '2013-05-11 13:12:23', '第三次修改			', '宋江'),
(53, 14, '2013-05-14 17:25:38', '真的吗				', '周漠'),
(54, 14, '2013-05-14 17:40:01', '第三次修改			', '徐宗宇'),
(55, 1, '2013-05-14 18:47:06', '第三次修改			', 'admin'),
(56, 1, '2013-05-15 12:50:38', '第三次修改			', 'admin'),
(57, 4, '2013-05-15 13:01:48', '第三次修改			', 'admin'),
(58, 1, '2013-05-15 14:36:20', '第三次修改			', 'admin'),
(59, 15, '2013-05-15 14:39:37', '希望是真的					', '徐宗宇'),
(62, 1, '2013-05-15 17:30:48', '第三次修改			', '徐宗宇'),
(63, 22, '2013-05-15 18:41:40', '第三次修改			', '大泳'),
(64, 21, '2013-05-17 21:16:50', '第三次修改			', '周振永'),
(65, 21, '2013-05-17 21:17:57', '第三次修改			', '周振永'),
(66, 24, '2013-05-17 21:22:02', '好的知道了						', '周漠'),
(67, 24, '2013-05-17 21:23:31', '第三次修改			', '徐宗宇'),
(70, 15, '2013-05-18 10:54:52', '快点进行吧，等待不急咯								', 'admin'),
(71, 23, '2013-06-02 22:15:48', '什么时间定个时间打球不被', '宋江'),
(72, 1, '2010-11-24 12:17:19', '拉萨极度疯狂辣椒', '何一'),
(73, 1, '2010-11-24 12:19:18', '成功', '何一'),
(74, 27, '2013-06-05 19:39:34', '回忆啊', '何一'),
(75, 1, '2013-06-05 19:44:53', '空间阿斯顿了福建阿斯利康', '何一'),
(76, 15, '2013-06-07 17:58:19', '真的？\r\n', '徐宗宇'),
(77, 15, '2013-06-07 17:59:32', '这个事情，我也听同学说了呢', '宋江'),
(78, 15, '2013-06-07 18:03:14', '别听上面的胡说，咱这学校要是要举行的话，会提前通知的', '司旭'),
(79, 15, '2013-06-07 18:03:50', '楼上的嚎嚎啥呢，不知道别瞎说啊', '贾宝玉'),
(80, 15, '2013-06-07 18:04:28', '就是，顶楼上的', '林冲'),
(81, 15, '2013-06-07 18:05:05', '希望是真的，快点吧', '李杰'),
(82, 15, '2013-06-21 17:24:32', '真的？', '周漠'),
(83, 4, '2013-06-21 17:41:41', '那你？', '周漠');

-- --------------------------------------------------------

--
-- 表的结构 `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `title_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `plate_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `auther` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `theme` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title_time` datetime NOT NULL,
  PRIMARY KEY (`title_id`),
  KEY `ti1` (`plate_name`),
  KEY `ti2` (`auther`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `title`
--

INSERT INTO `title` (`title_id`, `plate_name`, `auther`, `theme`, `content`, `title_time`) VALUES
(1, '心灵花园', '周漠', '考研咯，\r\n这可是最新款哦，还没用哦', '和哈哈大翻身地方的			', '2013-05-11 12:29:23'),
(3, '开心乐园', '刘明明', '\r\n这可是最新款哦，还没用哦', '和哈哈大翻身地方的			', '2013-05-11 11:47:23'),
(4, '考研专区', '周漠', '考研咯，\r\n这可是最新款哦，还没用哦', '和哈哈大翻身地方的			', '2013-05-11 12:29:23'),
(5, '老乡会所', '徐宗宇', '舒雅，\r\n这可是最新款哦，还没用哦', '和哈哈大翻身地方的						', '2013-05-11 15:59:23'),
(6, '腾讯俱乐部', '宋江', '呵呵，\r\n这可是最新款哦，还没用哦', '和哈哈大翻身地方的			', '2013-05-12 21:22:23'),
(11, '运动专栏', '周漠', '好累啊', '和哈哈大翻身地方的			', '2013-05-13 17:02:28'),
(14, '运动专栏', 'admin', '过几天咱们学校就开运动会了', '和哈哈大翻身地方的			', '2013-05-14 17:24:39'),
(15, '运动专栏', '周漠', '我听说过几天要开什么运动会，不知道是真的假的', '据说某某天要开始了呢，不知道是真的假的还是				', '2013-05-14 17:37:13'),
(17, '运动专栏', '刘菲', '听说那个谁那个谁跑的很快啊', '和哈哈大翻身地方的			', '2013-05-15 16:30:59'),
(18, '运动专栏', '郭庆', '我爱运动', '和哈哈大翻身地方的			', '2013-05-15 17:48:51'),
(19, '校园交易', '周漠', '阿斯顿发生地方', '和哈哈大翻身地方的			', '2013-05-15 17:57:37'),
(20, '校园交易', '周漠', '买苹果', '和哈哈大翻身地方的			', '2013-05-15 17:57:51'),
(21, '校园交易', '周漠', '买衣服', '和哈哈大翻身地方的			', '2013-05-15 17:58:02'),
(22, '校园交易', '大泳', '买东西，一个定力啊', '和哈哈大翻身地方的			', '2013-05-15 18:41:23'),
(23, '台球俱乐部', '郭庆', '打台球', '阿斯顿发送到积分', '2013-05-17 19:53:25'),
(24, '开心乐园', '周振永', '在此公告', '鉴于最近发生了很多奇怪的UFO事件，有关部分在此声明，这仅仅是演习而已，没有其他什么事情，不要有什么大的慌张，慢慢过自己的小日子就行了', '2013-05-17 21:19:35'),
(25, '开心乐园', '周漠', '头像不动了', '同志们看看我头像怎么不动了啊，谁知道啊', '2013-05-17 21:22:32'),
(26, '考研专区', 'admin', '考研啦', '阿斯顿发', '2013-05-18 16:20:28'),
(27, '开心乐园', '何一', '开心死啦', '今天爽死啦', '2010-11-24 12:21:23'),
(28, '开心乐园', '何一', 'lalalla啦啦啦', '爽死啦', '2013-06-05 19:39:02');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sex` char(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `grade` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pic` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `useornot` tinyint(4) NOT NULL,
  `whichPlate` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `us1` (`whichPlate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`name`, `password`, `sex`, `email`, `grade`, `pic`, `useornot`, `whichPlate`) VALUES
('admin', 'admin', '男', 'lan.zhu.123@163.com', '管理员', '../imges/2D9DC9E23F48DD1C49FA01B8A5E564369CDDD5EDA60F2_565_637.jpg', 1, ''),
('何一', '123456', '男', 'asdfg', '版主', '../imges/4C8306B86DC4FC6E5BDC621E95245705845EA9928607C_400_377.GIF', 1, '招聘信息'),
('刘明明', '123456', '男', 'lan.zhu.123@163.com', '版主', 'no', 1, '心灵花园'),
('刘菲', '123456', '男', '123', '民工', 'no', 1, ''),
('司旭', '123456', '男', 'sixu@163.com', '版主', 'no', 1, '运动专栏'),
('周振永', '199122', '男', 'lan.zhu.123@163.com', '管理员', '../imges/CC0B7C8B7246901B8EB84124FC378CA5D5DCFA98A26A6_245_140.GIF', 1, ''),
('周漠', '199122', '男', 'lan.zhu.123@163.com', '版主', '../imges/A8A9543084EAE338BBD30E9A57DC2B2073678C3E3BAD2_245_140.GIF', 1, '校园交易'),
('唐僧', '123456', '男', 'lan.zhu.123@163.com', '民工', 'no', 1, ''),
('大泳', '123', '男', '123', '民工', 'no', 1, ''),
('孙悟空', '123456', '男', 'lan.zhu.123@163.com', '民工', 'no', 1, ''),
('宋江', '123456', '男', 'lan.zhu.123@163.com', '版主', '../imges/3FF65EDE9CA8E3E99667427E409EB63CEA2F30D9B593F_130_133.GIF', 1, '老乡会所'),
('徐宗宇', '123456', '男', 'lan.zhu.123@163.com', '版主', '../imges/4C8306B86DC4FC6E5BDC621E95245705845EA9928607C_400_377.GIF', 1, '华为俱乐部'),
('李杰', '123456', '男', 'lan.zhu.123@163.com', '版主', 'no', 1, '开心乐园'),
('林冲', '123456', '男', 'lan.zhu.123@163.com', '民工', 'no', 1, ''),
('薛宝钗', '123456', '女', 'lan.zhu.123@163.com', '民工', 'no', 1, ''),
('贾宝玉', '123456', '男', 'lan.zhu.123@163.com', '民工', 'no', 1, ''),
('郭庆', '123456', '男', '123', '版主', '../imges/3FF65EDE9CA8E3E99667427E409EB63CEA2F30D9B593F_130_133.GIF', 1, '台球俱乐部');

--
-- 限制导出的表
--

--
-- 限制表 `plate`
--
ALTER TABLE `plate`
  ADD CONSTRAINT `pl1` FOREIGN KEY (`area_name`) REFERENCES `area` (`area_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `reply_title`
--
ALTER TABLE `reply_title`
  ADD CONSTRAINT `re1` FOREIGN KEY (`title_id`) REFERENCES `title` (`title_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `re2` FOREIGN KEY (`reply_people`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `title`
--
ALTER TABLE `title`
  ADD CONSTRAINT `ti1` FOREIGN KEY (`plate_name`) REFERENCES `plate` (`plate_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ti2` FOREIGN KEY (`auther`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `us1` FOREIGN KEY (`whichPlate`) REFERENCES `plate` (`plate_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
