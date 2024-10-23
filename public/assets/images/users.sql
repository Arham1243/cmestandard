-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 01:46 AM
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
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_id` int(11) DEFAULT NULL,
  `academic_title` varchar(255) DEFAULT NULL,
  `total_credit_hours` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `speciality_area_id` int(11) DEFAULT NULL,
  `speciality_interest_id` int(11) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `procedures_performed` int(11) DEFAULT NULL,
  `patients_treated` int(11) DEFAULT NULL,
  `years_of_exp` int(11) DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `phone_show_on_profile` tinyint(4) DEFAULT 0,
  `email_show_on_profile` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `country_id_num` varchar(255) DEFAULT NULL,
  `medical_license_number` varchar(255) DEFAULT NULL,
  `profile_img` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_sample` varchar(255) DEFAULT NULL,
  `verified_user` int(11) NOT NULL DEFAULT 0,
  `show_on_homepage` int(11) DEFAULT 0,
  `is_welcome_email_sent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `qualification` varchar(255) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `institution_city` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `long_desc` text DEFAULT NULL,
  `languages` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `custom_id`, `academic_title`, `total_credit_hours`, `full_name`, `bio`, `speciality_area_id`, `speciality_interest_id`, `slug`, `email`, `procedures_performed`, `patients_treated`, `years_of_exp`, `phone`, `phone_show_on_profile`, `email_show_on_profile`, `address`, `city`, `country`, `country_id_num`, `medical_license_number`, `profile_img`, `password`, `password_sample`, `verified_user`, `show_on_homepage`, `is_welcome_email_sent`, `created_at`, `updated_at`, `is_active`, `is_deleted`, `qualification`, `institution_name`, `institution_city`, `birthday`, `long_desc`, `languages`) VALUES
(51, 1001, 'Dr.', 657, 'Emily Johnson', 'Dr. Emily Johnson is a pulmonologist with extensive experience in respiratory care and a strong focus on health policy. She is dedicated to advancing patient care through evidence-based practices and policy advocacy.', 13, 23, 'emily-Johnson', 'arham404khan@gmail.com', NULL, NULL, NULL, '+1 (926) 342-2406', 1, 1, NULL, NULL, 'USA', '1000', '1000', 'Uploads/User/avatar51156699418630/2jTzVJ9S5qSOYsFfJrA4kLPSmf2IumV61OXUmjq5.png', '$2y$10$EXF1kag5GRyqjjovbFlbLOkRgVwAHoqFZaLdV98JFbLHEveeN.S5.', NULL, 0, 1, 0, '2020-08-01 11:55:14', '2024-10-06 16:29:40', 1, 0, 'MBBS', 'Chicago Institute', 'Berlin', '2024-09-03', NULL, 'null'),
(65, 1002, 'Dr.', NULL, 'Cora Leblanc', NULL, 18, 17, 'cora-leblanc', 'lekup@mailinator.com', NULL, NULL, NULL, '+1 (665) 316-8601', 0, NULL, NULL, NULL, 'Est culpa voluptate', '21', '91', 'Uploads/User/Profile6538839088790/eWqt7Qy97yreBpWGpidZfHS4XUKoS8Y27ANqm40s', '$2y$10$vuhEcuAU0mKwXvUolL.wZu0B27duk0TmWZy7ZH3Pjlonybjt8QDb.', NULL, 0, 1, 0, '2024-09-21 21:17:07', '2024-10-06 12:33:13', 1, 0, 'Porro repellendus M', 'Richard Torres', 'Adipisci pariatur I', '1999-06-05', NULL, NULL),
(66, 1003, 'Asoc. Prof.', NULL, 'Vivien Lester', NULL, 14, 15, 'vivien-lester', 'rikot@mailinator.com', NULL, NULL, NULL, '+1 (347) 415-6726', 0, NULL, NULL, NULL, 'Sunt beatae ullamco', '96', '512', 'Uploads/User/Profile66112601813034/IFcRsch7RsuPh5ynGQTELkaaGs2jThWd4mKDF9b8.png', '$2y$10$GIFsUXpYEXBit/Ja7LFS5uQDb3IPn9GDZ8jsMOVkfUePw5HcSYEQK', NULL, 0, 1, 0, '2024-09-21 21:18:05', '2024-10-06 12:33:20', 1, 0, 'Natus ratione laboru', 'Patrick Moses', 'Incidunt ad dolore', '1990-02-14', NULL, NULL),
(67, 1004, 'Asoc. Prof.', NULL, 'Stacey Wallace', NULL, 24, 21, 'stacey-wallace', 'ralysen@mailinator.com', NULL, NULL, NULL, '+1 (364) 357-5779', 0, NULL, NULL, NULL, 'Sint in modi dicta', '8', '992', 'Uploads/User/Profile6794754611097/YbUF3QK6Grm9lbatBcAu7HrA3dfP29feo5RndN8d.jpg', '$2y$10$ruU3lrBGNpMLzVMv5K3uHet/zLb6D4Fe4w1bhZ7PyG174rpeuslvC', NULL, 0, 1, 0, '2024-09-23 19:18:43', '2024-10-06 12:33:52', 1, 0, 'Consequatur expedita', 'Davis Love', 'Architecto duis reru', '1999-11-12', NULL, NULL),
(68, 1005, 'Asoc. Prof.', NULL, 'Yolanda Yates', NULL, 18, 21, 'yolanda-yates', 'tiniru@mailinator.com', NULL, NULL, NULL, '+1 (482) 911-2982', 0, NULL, NULL, NULL, '1321', '65', '429', 'Uploads/User/Profile68188082040470/91PF85fXhusnafgOH5W522fG2pOPhCqMKj7ai2ZY.jpg', '$2y$10$HBHmD52kaE5w/HTaA8YuwORKh9JVXKSWHvn0HkZoSwHGEMjoOtv7i', NULL, 0, 1, 0, '2024-09-23 19:20:17', '2024-10-06 12:33:57', 1, 0, 'Voluptates asperiore', 'Knox Huber', 'Ullam provident pra', '1976-04-03', NULL, NULL),
(69, 1006, 'Asst. Prof.', NULL, 'Rudyard Madden', NULL, 20, 19, 'rudyard-madden', 'pugedisaf@mailinator.com', NULL, NULL, NULL, '+1 (862) 876-8462', 0, NULL, NULL, NULL, 'Sunt dolores quis c', '2147483647', '687', 'Uploads/User/Profile6951806906486/ipwkaj3s8Np2shwpHgO4vlUccFXOtFUTtZppxo8Y.jpg', '$2y$10$V889vC3pgZRPCPeYUV4z6.6R3bOUryNelvb5YO/BJzOwRz.Oixm8S', NULL, 0, 1, 0, '2024-09-23 19:24:21', '2024-10-06 12:36:24', 1, 0, 'Architecto facere eu', 'Grace Figueroa', 'Iste excepturi iste', '2018-07-03', NULL, NULL),
(70, 1007, 'Asst. Prof.', NULL, 'Deanna Lowe', NULL, 26, 17, 'deanna-lowe', 'jopubepi@mailinator.com', NULL, NULL, NULL, '+1 (243) 421-7861', 0, NULL, NULL, NULL, 'Vel molestias fugiat', '92', '749', 'Uploads/User/Profile7011934341782/AKBWECBLsJfEPPMoy9az2Du1rL1TcHusBk3IqQfi.jpg', '$2y$10$bTfyh59FQvJIxpFiiTdRTeYQK/fQH0SpofMwKrPA537D6hRcQOMke', NULL, 0, 1, 0, '2024-09-23 19:25:48', '2024-10-06 12:36:28', 1, 0, 'Veniam exercitation', 'Zeph Phillips', 'Molestias perferendi', '1973-04-01', NULL, NULL),
(71, 1008, 'Asoc. Prof.', NULL, 'Ivor Joseph', NULL, 25, 29, 'ivor-joseph', 'zebog@mailinator.com', NULL, NULL, NULL, '+1 (607) 109-9237', 0, NULL, NULL, NULL, 'At non dolores et co', '2147483647', 'asdasd22', 'Uploads/User/Profile71164085480587/k5EIix0d0ToKRFwKbqGjUc0Nlkkm06wpZqguVaS0.jpg', '$2y$10$VESwgKmZ3hBBSvw5in4jqe2xZA0QYcbEz1ktKGVuSyhqNiI/Tr7uC', NULL, 0, 0, 0, '2024-09-23 19:27:48', '2024-09-23 19:27:48', 1, 0, 'Illo minim quod reru', 'Whilemina Nash', 'Pariatur Atque dolo', '2011-12-03', NULL, NULL),
(72, 1009, 'Dr.', NULL, 'Aurelia Stark', NULL, 24, 15, 'aurelia-stark', 'nuhocihif@mailinator.com', NULL, NULL, NULL, '+1 (464) 164-6437', 0, NULL, NULL, NULL, 'Dolorum tempore omn', '1264', '52', 'Uploads/User/Profile72149505076050/oIdB4pgogVZhyVnaNNaTwyYMN67e5Ls4hDwxi8r0.jpg', '$2y$10$ZqrTd/cpIv2Ve6m8XaF/3ewkIqOuXfaDii4iep7pJ7gixItkA899a', NULL, 0, 0, 0, '2024-09-23 19:44:56', '2024-09-23 19:44:56', 1, 0, 'Eos odio sed autem a', 'Hanae Klein', 'Unde sed ipsum ab u', '1976-06-19', NULL, NULL),
(73, 1010, 'Dr.', NULL, 'Felix Cash', NULL, 30, 16, 'felix-cash', 'vykicuza@mailinator.com', NULL, NULL, NULL, '+1 (968) 479-2988', 0, NULL, NULL, NULL, 'Cillum porro ducimus', '1264', '549', 'Uploads/User/Profile73182362065291/jHYzVeDYH6hHy8r96xHjRkZSSIn8nM1EcYyWkHQx.jpg', '$2y$10$WvHX8mEFgkEXIWP3szhkX.JVLEdyWCZocL423kPrIqMqRBNr8y/H.', NULL, 0, 0, 0, '2024-09-23 19:45:34', '2024-09-23 19:45:34', 1, 0, 'Nihil sint in conse', 'Doris Leon', 'Iste Nam et aut dict', '1972-08-22', NULL, NULL),
(74, 1011, 'Dr.', NULL, 'Anika Stephens', NULL, 24, 22, 'anika-stephens', 'sudubepog@mailinator.com', NULL, NULL, NULL, '03-23213-123123', 0, NULL, NULL, NULL, 'Pakistan', '100000', '2312-23', 'Uploads/User/Profile74148805986172/qZlcLcwoFXDn5CI6zfP2imSO5pmXT454H7R8264v.jpg', '$2y$10$B9meyuhe.zQZvk6YfyCPP.BA6tjZ/DaEEAKLw7BxkYyd7wwaQ8z/S', NULL, 0, 0, 0, '2024-09-23 19:53:15', '2024-09-23 19:53:15', 1, 0, 'MBBS', 'Halla Matthews', 'Enim fugiat fuga I', '2024-09-30', NULL, NULL),
(75, 1012, 'Prof.', NULL, 'arham', NULL, 28, 25, 'arham', 'suvoxyce@mailinator.com', NULL, NULL, NULL, '+1 (212) 503-5845', 0, NULL, NULL, NULL, 'Qui reiciendis quos', '46', '563', 'Uploads/User/Profile75103325103927/u5REHRQOdVcOylRlYPoDdxlgbCM978GPLmGnil41.png', '$2y$10$SYlwRTI9UC/7VYAZawYde.zSKZEp7u2VGPY8rrK5LdcPFsK61kPnO', NULL, 0, 1, 0, '2024-10-06 15:37:42', '2024-10-06 15:39:27', 1, 0, 'Porro magnam enim do', 'Elaine Barlow', 'Minim nostrum aliqui', '1971-12-05', NULL, NULL),
(76, 1013, 'Prof.', NULL, 'new User Arham', NULL, 16, 14, 'new-user-arham', 'rywodywop@mailinator.com', NULL, NULL, NULL, '+1 (867) 451-2022', 0, NULL, NULL, NULL, 'Aspernatur architect', '27', '193', 'Uploads/User/Profile/761352339282/XhfEkIe2TRbh0MQVgYQ3UHq1YHiCTabXNTQQLafM.png', '$2y$10$FXkMoiiVbvwisQcnvNwIE.qXlMPifrv2D/Nb4Phzo7ZSXCMs4oBCK', NULL, 0, 0, 0, '2024-10-06 17:11:47', '2024-10-06 17:11:47', 1, 0, 'Qui vitae neque est', 'Hayes Holden', 'Dolore ab qui ullam', '1976-01-02', NULL, NULL),
(77, 1014, 'Prof.', NULL, 'new User Arham', NULL, 16, 14, 'new-user-arham-1', 'rywodywop@mailinator.com', NULL, NULL, NULL, '+1 (867) 451-2022', 0, NULL, NULL, NULL, 'Aspernatur architect', '27', '193', 'Uploads/User/Profile/7777606173049/Up2yKPmcTceayHnYaN5dWirPS68rljwdzOhwOdmK.png', '$2y$10$.8JjUzQA3FqL1zXyrCRnr.QrTxZaMMoFUYLhbn38dG3k/vuBeJK9y', NULL, 0, 0, 0, '2024-10-06 17:12:15', '2024-10-06 17:12:15', 1, 0, 'Qui vitae neque est', 'Hayes Holden', 'Dolore ab qui ullam', '1976-01-02', NULL, NULL),
(78, 1015, 'Prof.', NULL, 'create_user_form', NULL, 29, 15, 'create-user-form', 'muturyry@mailinator.com', NULL, NULL, NULL, '+1 (737) 367-9969', 0, NULL, NULL, NULL, 'Tempora sint quidem', '70', '60', 'Uploads/User/Profile/78210082615017/3tpbkAFS3vJgK5U9r5mOs4okuxFiLjEJDJTspQdl.png', '$2y$10$f0WCTO4GmfsgOx1X9uvwa.JRkY7qOqezt3s7Vq6zvoJUg5J7aYpgW', NULL, 0, 0, 0, '2024-10-06 17:12:44', '2024-10-06 17:12:44', 1, 0, 'Occaecat tempor qui', 'Allen Tate', 'Provident aute dolo', '2010-01-18', NULL, NULL),
(79, 1016, 'Prof.', NULL, 'create_user_form', NULL, 29, 15, 'create-user-form-1', 'muturyry@mailinator.com', NULL, NULL, NULL, '+1 (737) 367-9969', 0, NULL, NULL, NULL, 'Tempora sint quidem', '70', '60', 'Uploads/User/Profile/7918924392513/RK98WQd7ghGVbmjRjuv3r6Idj7OrUNmT51hfjGhf.png', '$2y$10$X.KsAO1VgpuS7psCtiaGbu9RQXgVHKC7ztE4xfFMOVPnnd2HYDmDe', NULL, 0, 0, 0, '2024-10-06 17:13:03', '2024-10-06 17:13:03', 1, 0, 'Occaecat tempor qui', 'Allen Tate', 'Provident aute dolo', '2010-01-18', NULL, NULL),
(80, 1017, 'Asst. Prof.', NULL, 'New User', NULL, 29, 25, 'new-user', 'qagekosyd@mailinator.com', NULL, NULL, NULL, '+1 (267) 301-2493', 0, NULL, NULL, NULL, 'Nemo error eum error', '19', '799', 'Uploads/User/Profile/807523454679/RPtqb4o1kqwsvyYWc7bSBOBiX9QmCNO2QAQzypBD.png', '$2y$10$Mq.bsIAMAl/tDILnzJOnqusqSa2cP/XK4pv876UAwow0DquxsYLzS', NULL, 0, 0, 0, '2024-10-06 17:13:50', '2024-10-06 17:13:50', 1, 0, 'Quia vel adipisci qu', 'Zachery Sutton', 'Ut voluptatem Moles', '1983-08-05', NULL, NULL),
(81, 1018, 'Prof.', NULL, 'Kevin White', NULL, 30, 31, 'kevin-white', 'jyzy@mailinator.com', NULL, NULL, NULL, '+1 (812) 225-5217', 0, NULL, NULL, NULL, 'In nulla quo iure ip', '95', '363', NULL, '$2y$10$DclGTxi2rdBZqLwCj147TeufPmh0eDV/ofzNqtyhyMSK8/3MLwAW.', 'Pa$$w0rd!', 0, 0, 0, '2024-10-06 17:34:13', '2024-10-06 17:34:13', 1, 0, 'Cillum mollitia dolo', 'Risa Hoover', 'Veniam sapiente nis', '1981-12-17', NULL, NULL),
(82, 1019, 'Dr.', NULL, 'Noel Suarez', NULL, 14, 28, 'noel-suarez', 'pabo@mailinator.com', NULL, NULL, NULL, '+1 (626) 771-2981', 0, NULL, NULL, NULL, 'Odio elit sed offic', '6', '678', NULL, '$2y$10$JObxA7NfvTz.KyY13e5NnuYTUPGwVxYLZM1ZTzMX2qqqmwDyjtO96', 'Pa$$w0rd!', 0, 0, 0, '2024-10-06 17:36:13', '2024-10-06 17:36:13', 1, 0, 'Laboriosam ad occae', 'Jeanette Rogers', 'Lorem cupidatat dele', '1981-12-22', NULL, NULL),
(83, 1020, 'Prof.', NULL, 'Mason Zamora', NULL, 21, 24, 'mason-zamora', 'ribevanije@mailinator.com', NULL, NULL, NULL, '+1 (924) 413-5712', 0, NULL, NULL, NULL, 'Iusto non aut qui ar', '44', '796', NULL, '$2y$10$4Kz7uN5xMUiEtJAL4XjqYuIag83I/QWhQraCKfNboFDRB8opbQa6e', 'Est ullamco qui sun', 0, 0, 0, '2024-10-06 17:36:51', '2024-10-06 17:36:51', 1, 0, 'Iure atque sed ea ex', 'Dennis Gay', 'Aliquid sit dolorum', '1981-10-10', NULL, NULL),
(84, 1021, 'Prof.', NULL, 'Callum Copeland', NULL, 22, 14, 'callum-copeland', 'givi@mailinator.com', NULL, NULL, NULL, '+1 (723) 703-9045', 0, NULL, NULL, NULL, 'Nam magnam explicabo', '83', '662', 'Uploads/User/Profile/84126203385360/I4NMzqODnDomPSOeF2BO2SnBidkpwpewwx0aHuwk.png', '$2y$10$jwr/id.YsxomoKENVw/WJ.ObH0AG44iiQbDjTz5JQnS3F6QTnHAtC', NULL, 0, 0, 0, '2024-10-06 17:40:58', '2024-10-06 17:40:58', 1, 0, 'Ut rem consequat Id', 'Walter Morrow', 'Rerum dolore quo fug', '1977-06-05', NULL, NULL),
(85, 1022, 'Dr.', NULL, 'Rashad Wilson', NULL, 25, 26, 'rashad-wilson', 'dozuvycy@mailinator.com', NULL, NULL, NULL, '+1 (494) 241-6352', 0, NULL, NULL, NULL, 'Ratione quibusdam ad', '48', '958', 'Uploads/User/Profile/8528593139297/NYC74kyc76VxgL6M2RexXbHiBqQGOc8p5IrkIn6g.png', '$2y$10$BDm6wiaRHZj31u4bXN6C1.nkjQnlx.TGHsQEorlOu1CEBIg4BcOYu', 'Pa$$w0rd!', 0, 0, 0, '2024-10-06 17:41:59', '2024-10-06 17:41:59', 1, 0, 'Omnis facere magni n', 'Owen Page', 'Ab quia quo perspici', '1984-11-05', NULL, NULL),
(86, 1023, 'Prof.', NULL, 'Keith Stokes', NULL, 23, 16, 'keith-stokes', 'new@user.com', NULL, NULL, NULL, '+1 (146) 877-7782', 0, NULL, NULL, NULL, 'Deserunt est laboris', '57', '341', 'Uploads/User/Profile/8649195366438/B99LJfWPTFGBowaHbz8vVj13EEmcDLz46E0vfCpe.png', '$2y$10$SZb1WORsRN1sf0t90bj.TeeM87SxJVWJDgMGMnTIpSfExk7YOdsVG', 'Pa$$w0rd!', 0, 0, 0, '2024-10-06 18:31:51', '2024-10-06 18:31:51', 1, 0, 'Quis architecto lore', 'Harriet Hartman', 'Possimus qui nisi a', '2000-03-09', NULL, NULL),
(87, 1024, 'Asoc. Prof.', NULL, 'New', NULL, 16, 28, 'new', 'newUser@gmail.com', NULL, NULL, NULL, '+1 (967) 908-8443', 0, NULL, NULL, NULL, 'Ut eius debitis ea c', '69', '890', NULL, '$2y$10$FXbmq1TOwlATpjTBBNWLheGA0AqugRhRlArx2UGUwq7d9iEzJ.gR6', 'Ab ut ut voluptatem', 0, 0, 0, '2024-10-06 18:32:33', '2024-10-06 18:35:25', 1, 0, 'Optio nostrud cumqu', 'Nathan Harper', 'Iure omnis modi irur', '1987-01-25', NULL, NULL),
(88, 1025, 'Dr.', NULL, 'Lee Burnett', NULL, 20, 27, 'lee-burnett', 'vilogyso@mailinator.com', NULL, NULL, NULL, '+1 (644) 122-6411', 0, NULL, NULL, NULL, 'Amet et unde volupt', '1', '331', NULL, '$2y$10$N/td29hS/pgEA2D5sM4TuewuOuz6Z3K9FRKAI2AMT9Oic3UQ9SHBC', 'Consequuntur aliquam', 0, 0, 1, '2024-10-06 18:36:19', '2024-10-06 18:36:22', 1, 0, 'Consectetur soluta', 'Plato Atkins', 'Ad ipsa ullam tempo', '2018-08-28', NULL, NULL),
(89, 1026, 'Prof.', NULL, 'Delilah Jennings', '33', 26, 17, 'delilah-jennings', 'cawiqebage@mailinator.com', NULL, NULL, NULL, '+1 (961) 984-3231', 1, 1, NULL, NULL, 'Mollit perspiciatis', '17', '401', 'Uploads/User/avatar68855259221/TR2Gab9XMsv1qIfAuva0eRHP95I1TbdNwFcibG9G.jpg', '$2y$10$1zKZ1CmbRNFLc1iNBvQjp.wGJ2nFoqME/WdUDMKbgvw22GnekSG0C', 'Pa$$w0rd!', 0, 0, 1, '2024-10-06 18:38:19', '2024-10-06 18:42:39', 1, 0, 'Saepe voluptatem con', 'Jacob Rodgers', 'Est debitis veritati', '1980-12-10', NULL, 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
