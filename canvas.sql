# Host: localhost  (Version: 5.5.5-10.1.9-MariaDB)
# Date: 2017-05-20 10:26:48
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "cancel"
#

CREATE TABLE `cancel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "cancel"
#

INSERT INTO `cancel` VALUES (1,'1','123','321','2017-03-18 03:30:29','2017-03-18 03:30:29'),(2,'1','222','','2017-03-18 03:31:10','2017-03-18 03:31:10'),(3,'4','2123','123','2017-03-18 03:32:10','2017-03-18 03:32:10'),(4,'4','222','333','2017-03-18 03:32:40','2017-03-18 03:32:40'),(5,'1','321','123','2017-03-18 03:33:01','2017-03-18 03:33:01'),(6,'4','`12','21`','2017-03-19 02:54:21','2017-03-19 02:54:21'),(7,'4','123','33333333','2017-03-19 02:57:06','2017-03-19 02:57:06'),(8,'7','sdfsd f','dsadfqwe1e','2017-03-19 02:57:20','2017-03-19 02:57:20'),(9,'8','厕所','厕所','2017-03-19 10:33:31','2017-03-19 10:33:31'),(10,'18','','','2017-03-24 09:48:01','2017-03-24 09:48:01'),(12,'19','这下就好了','这下一定好了','2017-03-24 11:00:22','2017-03-24 11:21:03'),(13,'20','312','312312','2017-03-24 11:36:06','2017-03-24 11:36:33'),(15,'21','我的天啊啊','斯蒂芬是是','2017-03-24 11:37:52','2017-03-24 11:38:08'),(16,'22','时尚','等等','2017-05-11 10:57:13','2017-05-11 10:57:13'),(17,'31','  ','','2017-05-11 15:43:47','2017-05-11 15:43:47');

#
# Structure for table "hitch"
#

CREATE TABLE `hitch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'null',
  `room` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '故障地点',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '故障类型',
  `type2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT '故障描述',
  `time` datetime NOT NULL COMMENT '上报时间',
  `person` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '处理人',
  `status` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '状态：0表示没人受理。1表示受理中.2表示处理完成',
  `finish` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '是否已经处理完成',
  `is_cancel` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `user_cancel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finish_time` date DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "hitch"
#

INSERT INTO `hitch` VALUES (1,'admin','402','gg啊是电闪的速度发撒旦发撒旦防守对方速度',NULL,'速度防守对方阿斯蒂芬斯蒂芬速度防守对方斯蒂芬速度速度防守对方斯蒂芬是','2016-07-30 00:00:00','admin','1','1','1','1','2016-07-30 00:00:00','2017-03-19 03:05:35','2017-03-19',NULL,NULL),(2,'admin','123','2',NULL,'321\t','1899-12-29 00:00:00','admin','1','1','0',NULL,'0000-00-00 00:00:00','2017-03-17 02:17:32','2017-03-17',NULL,NULL),(3,'admin','321','3',NULL,'123','1899-12-30 12:00:00','admin','1','1','0',NULL,NULL,'2017-03-17 04:52:39','2017-03-17',NULL,NULL),(4,'admin','123','4',NULL,'321','0000-00-00 00:00:00','admin','2','1','0',NULL,NULL,'2017-03-22 11:29:55','2017-03-22',NULL,NULL),(5,'','31','1',NULL,'321123123','0000-00-00 00:00:00','admin','2','1','0',NULL,'2017-03-19 02:42:33','2017-03-19 10:31:07','2017-03-19',NULL,NULL),(6,'','123','1',NULL,'123123','0000-00-00 00:00:00','admin','2','1','0',NULL,'2017-03-19 02:42:51','2017-03-19 10:31:08','2017-03-17',NULL,NULL),(7,'','321','1',NULL,'121','0000-00-00 00:00:00','admin','2','1','1',NULL,'2017-03-19 02:43:04','2017-03-22 11:29:11','2017-03-22',NULL,NULL),(8,'null','12','1',NULL,'432','0000-00-00 00:00:00','admin','2','1','1',NULL,'2017-03-19 03:37:54','2017-03-19 10:33:47','2017-03-17',NULL,NULL),(9,'null','11','1',NULL,'123123','0000-00-00 00:00:00','carlos','2','1','0',NULL,'2017-03-19 03:40:07','2017-03-19 10:24:09','2017-03-19',NULL,NULL),(10,'463024796@qq.com','12','1',NULL,'231312','0000-00-00 00:00:00','carlos','1','1','0',NULL,'2017-03-19 03:41:05','2017-03-19 10:28:55','2017-03-19',NULL,NULL),(11,'463024796@qq.com','12','1',NULL,'3212312','2017-03-19 03:48:53','carlos','1','1','0',NULL,'2017-03-19 03:48:53','2017-03-19 03:57:12','2017-03-17',NULL,NULL),(12,'463024796@qq.com','12','1',NULL,'21123','2017-03-19 03:49:04','carlos','1','1','0',NULL,'2017-03-19 03:49:04','2017-03-19 03:57:14','2017-03-19',NULL,NULL),(13,'463024796@qq.com','12','1',NULL,'111','2017-03-19 03:53:24','carlos','1','1','0',NULL,'2017-03-19 03:53:24','2017-03-19 03:57:15','2017-03-19',NULL,NULL),(14,'463024796@qq.com','1231','1',NULL,'1233','2017-03-19 09:16:56','carlos','1','1','0',NULL,'2017-03-19 09:16:56','2017-03-19 10:23:56','2017-03-17',NULL,NULL),(15,'463024796@qq.com','1222','1',NULL,'111','2017-03-19 10:18:50','李珂毅','0','1','0',NULL,'2017-03-19 10:18:50','2017-03-19 10:24:36','2017-03-19',NULL,NULL),(16,'463024796@qq.com','1321','1',NULL,'123123','2017-03-19 10:25:34','李珂毅','0','1','0',NULL,'2017-03-19 10:25:34','2017-03-20 21:27:22','2017-03-17',NULL,NULL),(17,'463024796@qq.com','19999','1',NULL,'231123','2017-03-19 10:25:48','李珂毅','2','1','0',NULL,'2017-03-19 10:25:48','2017-03-19 10:26:06','2017-03-19',NULL,NULL),(18,'463024796@qq.com','1123','1',NULL,'123455667','2017-03-20 21:27:33','admin','2','1','1',NULL,'2017-03-20 21:27:33','2017-03-24 10:56:24','2017-03-24',NULL,NULL),(19,'463024796@qq.com','1101','1',NULL,'电脑坏了','2017-03-24 09:59:20','admin','2','1','1',NULL,'2017-03-24 09:59:20','2017-03-24 16:23:38','2017-03-24',NULL,NULL),(20,'admin','11001','3',NULL,'1111\r\n','2017-03-24 11:22:02','admin','0','1','1',NULL,'2017-03-24 11:22:02','2017-03-24 11:36:33','2017-03-10',NULL,NULL),(21,'admin','1123','1',NULL,'321312','2017-03-24 11:25:05','admin','0','1','1',NULL,'2017-03-24 11:25:05','2017-03-24 11:38:08','2017-03-10',NULL,NULL),(22,'463024796@qq.com','1303','1',NULL,'打球的时候把电脑显示屏砸了，现在花屏了','2017-03-24 17:00:03','admin','2','1','1',NULL,'2017-03-24 17:00:03','2017-05-11 15:01:04','2017-05-11',NULL,'非常屌得无所畏惧'),(23,'admin','1222','1','11111111111111','31212','2017-04-13 16:09:12','','0','1','0','1','2017-04-13 16:09:12','2017-04-13 16:09:19',NULL,NULL,NULL),(24,'admin','1123','1','111111111','321123','2017-04-13 16:09:24','admin','1','1','0','1','2017-04-13 16:09:24','2017-04-13 16:09:35',NULL,NULL,NULL),(25,'463024796@qq.com','1','1',NULL,'','2017-05-04 12:13:18','admin','1','0','0',NULL,'2017-05-04 12:13:18','2017-05-11 14:49:26',NULL,NULL,NULL),(26,'463024796@qq.com','1','1','111111111111','','2017-05-04 14:38:53','admin','2','1','0',NULL,'2017-05-04 14:38:53','2017-05-05 16:36:57','2017-05-05','2017-05-04/ca893a96d8d52e210a8e020307a7689e.jpeg',NULL),(27,'463024796@qq.com','1','1','111111111111111111111111','','2017-05-04 14:39:54','','0','0','0',NULL,'2017-05-04 14:39:54','2017-05-04 14:39:54',NULL,'2017-05-04/b64243eb99dc3c63ebee7a74777a5777.jpeg',NULL),(28,'463024796@qq.com','1','1','111111111111111111','','2017-05-04 14:40:31','admin','1','0','0',NULL,'2017-05-04 14:40:31','2017-05-11 14:49:30',NULL,'2017-05-04/b64243eb99dc3c63ebee7a74777a5777.jpeg',NULL),(29,'463024796@qq.com','1','2','233311111111111111111111111','tese','2017-05-04 15:26:07','','0','0','0',NULL,'2017-05-04 15:26:07','2017-05-04 15:26:07',NULL,'',NULL),(30,'463024796@qq.com','111','1',NULL,'321312','2017-05-04 15:27:28','','0','0','0',NULL,'2017-05-04 15:27:28','2017-05-04 15:27:28',NULL,'2017-05-04/ca893a96d8d52e210a8e020307a7689e.jpeg',NULL),(31,'463024796@qq.com','1123','1','1','321321','2017-05-04 15:28:27','admin','1','0','1',NULL,'2017-05-04 15:28:27','2017-05-11 21:04:03',NULL,'2017-05-04/f48cab8cf5f9e6a553b65a56cb94b8fa.jpeg',NULL),(32,'463024796@qq.com','1234','1','1','321','2017-05-04 16:08:47','','0','0','0',NULL,'2017-05-04 16:08:47','2017-05-04 16:08:47',NULL,'2017-05-04/ca893a96d8d52e210a8e020307a7689e.jpeg',NULL),(33,'463024796@qq.com','1234','1','1','3213123','2017-05-04 16:18:13','admin','1','0','0',NULL,'2017-05-04 16:18:13','2017-05-11 14:53:46',NULL,'','无所畏惧啊 啊啊啊啊啊啊啊啊 啊啊啊啊啊啊啊'),(34,'admin','1111','1','1','123','2017-05-05 16:40:38','','0','1','0','1','2017-05-05 16:40:38','2017-05-05 16:42:14',NULL,'2017-05-05/86a6a76753d4044b5bcf5bbbaf26ee64.jpeg',NULL),(35,'admin','1111','1','1','321','2017-05-05 16:54:25','9','0','1','0','1','2017-05-05 16:54:25','2017-05-05 16:55:35',NULL,'',NULL),(36,'admin','1111','1','1','test','2017-05-05 16:55:04','李珂毅','0','1','0','1','2017-05-05 16:55:04','2017-05-05 16:55:31',NULL,'',NULL),(37,'admin','1111','1','1','test','2017-05-05 16:55:40','admin','2','1','0',NULL,'2017-05-05 16:55:40','2017-05-11 11:02:23','2017-05-11','',NULL),(38,'admin','1111','1','1','','2017-05-09 15:54:00','李珂毅','1','0','0',NULL,'2017-05-09 15:54:00','2017-05-11 14:45:26',NULL,'','反馈测试'),(39,'admin','1111','1','1','很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多很多','2017-05-11 16:05:49','李珂毅','1','0','0',NULL,'2017-05-11 16:05:49','2017-05-11 20:51:10',NULL,'2017-05-11/d46cbf153fa737ab2a9ffa5eda80276d.jpeg','fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff\n');

#
# Structure for table "hitch_detailed"
#

CREATE TABLE `hitch_detailed` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` tinyint(3) NOT NULL DEFAULT '1',
  `type` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "hitch_detailed"
#

INSERT INTO `hitch_detailed` VALUES (1,1,'112'),(2,2,'111'),(3,3,'111'),(4,4,'123123'),(5,5,'其他'),(6,6,'其他');

#
# Structure for table "hitch_type"
#

CREATE TABLE `hitch_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "hitch_type"
#

INSERT INTO `hitch_type` VALUES (1,'OA故障'),(2,'办公室电脑故障'),(3,'网络故障'),(4,'打印机/扫描仪故障'),(5,'打印机耗材不足'),(6,'其他');

#
# Structure for table "knowledge"
#

CREATE TABLE `knowledge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `founder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "knowledge"
#

INSERT INTO `knowledge` VALUES (2,'admin','','1','斯蒂芬韦尔柯林犬瘟热 斯蒂芬妮卡李锦玲留我i哦123额人','斯蒂芬韦尔柯林犬瘟热 斯蒂芬妮卡李锦玲留我i哦额人123','2017-03-22 19:41:19','2017-03-22 19:41:19'),(3,'admin','','1','斯蒂芬韦尔柯林犬瘟热 斯蒂芬妮卡李锦玲留我i哦额人','斯蒂芬韦尔柯林犬瘟热 斯蒂芬妮卡李锦玲留我i哦额人','2017-03-22 19:45:26','2017-03-22 19:45:26'),(4,'admin','','1','斯蒂芬森的岁的父亲沃尔沃而去','1 千万人千万人去问问','2017-03-22 19:45:46','2017-03-22 19:45:46'),(5,'admin','','1','闻气味','让2 韦尔奇问23','2017-03-22 19:46:00','2017-03-22 19:46:00'),(6,'admin','','1','日前我而去we','温柔请问','2017-03-22 19:49:11','2017-03-22 19:49:11'),(7,'admin','','1','请问','温柔去','2017-03-22 19:49:18','2017-03-22 19:49:18'),(8,'admin','','1','亲亲我而去','去恶趣味日请问','2017-03-22 19:49:36','2017-03-22 19:49:36'),(11,'admin','','1','','','2017-03-22 20:14:50','2017-03-22 20:14:50'),(12,'admin','','1','','','2017-03-22 20:14:52','2017-03-22 20:14:52'),(13,'admin','','2','','','2017-03-22 20:14:59','2017-03-22 20:14:59'),(14,'admin','','4','','','2017-03-22 20:15:23','2017-03-22 20:15:23'),(15,'admin','','3','123','321','2017-03-22 20:19:09','2017-03-22 20:19:09'),(16,'admin','','1','213','12312','2017-03-22 20:20:39','2017-03-22 20:20:39'),(17,'admin','','1','321','123','2017-03-23 10:33:04','2017-03-23 10:33:04'),(18,'admin','','2','321','123','2017-03-23 10:33:11','2017-03-23 10:33:11'),(19,'admin','','1','分啊赛迪网温柔奋斗奋斗的地方的点点滴滴点点滴滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答滴答答','去问问呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜呜      驱蚊器闻气味而且我而且我恶趣味请问请问请问请问去123123 1231阿萨德请问请问','2017-03-23 16:33:47','2017-03-23 16:33:47');

#
# Structure for table "migrations"
#

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2015_06_21_174427_create_posts_table',1),(3,'2015_06_27_074414_create_tags_table',1),(4,'2015_06_27_074433_create_post_tag_pivot',1),(5,'2016_08_08_231059_create_post_tag_table',1),(6,'2016_08_08_234447_drop_post_tag_pivot_table',1),(7,'2016_08_28_195321_add_linkedin_column_to_users_table',1),(8,'2016_08_29_082858_add_cv_column_to_users_table',1),(9,'2016_09_02_231259_create_password_resets_table',1),(10,'2016_09_07_091203_create_settings_table',1),(11,'2016_09_22_165717_update_page_image_paths',1),(12,'2016_11_07_144904_update_posts_table_to_include_author_id',1),(13,'2016_11_08_072246_create_roles_table',1),(14,'2016_11_08_080456_add_roles_column_to_users_table',1),(15,'2016_11_14_070030_drop_roles_table',1),(16,'2017_03_16_222122_create_hitch_table',2),(17,'2017_03_18_005431_create_cancel_table',3),(18,'2017_03_21_032758_create_knowledge_table',4),(19,'2017_03_22_203004_create_hitch_type_table',5);

#
# Structure for table "password_resets"
#

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "password_resets"
#

INSERT INTO `password_resets` VALUES ('463024796@qq.com','a565f05e9cfaedf4245c5f57e0c359fa53134f1cc02d13aba7f1c3b1dee9e214','2017-03-12 20:07:32');

#
# Structure for table "settings"
#

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_setting_name_index` (`setting_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "settings"
#

INSERT INTO `settings` VALUES (1,'latest_release','v3.2.4');

#
# Structure for table "users"
#

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `floor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_floor` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_index` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'463024796@qq.com','$2y$10$E.oIw.WvDDsIEvaGnIMMoOxOQaTlDRPifMuaIFL59h0LYIxASQX4e','4gMuG1DF02z3mRRI3ND7v7VdnYO1m0ARzfcHcfshH4VN0GIWHondttn5eh4F',NULL,'2017-05-04 16:35:17','2','1234','1'),(2,'admin','$2y$10$.3XwBjPm7F3TfyAXwy6iBeVqwowcl4ri75j74binulCmLFUPvB7ii','DmmfcPxM2QwuPdpwzKWKEds6QvJB9fcAl7d5JmamMn500QxHmeuKfdezsCOK',NULL,'2017-05-05 15:22:30','2','1111','1'),(9,'李珂毅','$2y$10$jy88M/uzh3eW7MFKshGbKuLHK60WLqtQadxxaHev0/jrFD43/6lZ6','nGPKoKInS1ileG93PBRsiVZ8DtD3O6JoML0frM3imCZcm9l9VkXOA4m4KrHd','2017-03-19 02:34:57','2017-03-20 06:28:00','1',NULL,NULL),(10,'许钊纹','$2y$10$QvIxH/0Z6pYoodyafV5wH.sFW5v9XTeixafSnQeyKlqvtZVpnG396','sQhZHM03vwxDSWTWYhVLEWCgc1oMw72fL3M3XxGcaG19cVsXIo053pCTqlpo','2017-03-24 16:27:28','2017-03-24 16:28:30','0',NULL,NULL),(12,'林晓娟','$2y$10$VxOBfA64xFdw1HU.Dynwbeab1vKowD25e8xMK3/ZUOX0f0kzLLOL6',NULL,'2017-03-24 16:30:11','2017-03-24 16:30:11','1',NULL,NULL),(13,'杨浩潮','$2y$10$GYsf4837obxxDB4wimaeqeWtF2.QI979uADj.eiG3/vwSU.WoykU2',NULL,'2017-03-24 16:32:03','2017-03-24 16:32:03','1',NULL,NULL),(14,'陈龙飞','$2y$10$Y05tBN2MPoujpxS1TjLkJusIoP/CEpxOEajWC85lCmIvArC2ae7Ou',NULL,'2017-03-24 16:32:15','2017-03-24 16:32:15','0',NULL,NULL),(15,'刘荣杰','$2y$10$1mcU3vEbVi6RWo/5Mv4osuAoyBW7AXhoJJ4bupmEhKamx3ZKmpIbK',NULL,'2017-03-24 16:33:04','2017-03-24 16:33:04','1',NULL,NULL);
