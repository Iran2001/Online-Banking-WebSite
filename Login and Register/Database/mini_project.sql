-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 12:59 PM
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
-- Database: `mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `oder_chequebook`
--

CREATE TABLE `oder_chequebook` (
  `id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `acc_number` int(200) NOT NULL,
  `leves` int(20) NOT NULL,
  `qtybooks` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oder_chequebook`
--

INSERT INTO `oder_chequebook` (`id`, `type`, `acc_number`, `leves`, `qtybooks`) VALUES
(1, 'on', 220100020, 0, 3),
(2, 'on', 220100020, 0, 2),
(3, 'Personal', 220100020, 0, 2),
(4, 'Business', 220100020, 20, 2),
(5, 'Personal', 220100018, 15, 2),
(6, 'Business', 220100036, 10, 3),
(7, 'Personal', 220100019, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pay_bill`
--

CREATE TABLE `pay_bill` (
  `id` int(10) NOT NULL,
  `ac_number` int(100) NOT NULL,
  `pnumber` int(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `bill_number` int(100) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_bill`
--

INSERT INTO `pay_bill` (`id`, `ac_number`, `pnumber`, `type`, `bill_number`, `amount`) VALUES
(1, 0, 987654321, 'water', 22111, 220),
(2, 0, 987654321, 'telephone', 22111, 500),
(3, 0, 716475992, 'water', 22111, 500),
(4, 0, 987654321, 'electricity', 123456, 500),
(6, 220100019, 1234567890, 'electricity', 22111, 500),
(7, 220100019, 100293823, 'electricity', 22111, 500),
(8, 220100019, 716475992, 'electricity', 2222222, 2500),
(9, 220100019, 1232132, 'water', 34141224, 2000),
(10, 220100019, 23123, 'water', 34141224, 2000),
(11, 22100019, 23224324, 'water', 22111, 120),
(12, 220100019, 987654321, 'electricity', 23213323, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(100) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `pwd` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trans_actions`
--

CREATE TABLE `trans_actions` (
  `Taccount` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `type` varchar(15) NOT NULL,
  `date` datetime(6) NOT NULL,
  `id` int(10) NOT NULL,
  `Faccount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_actions`
--

INSERT INTO `trans_actions` (`Taccount`, `amount`, `type`, `date`, `id`, `Faccount`) VALUES
(12345678, 200, 'Withdrawal', '2024-01-30 10:10:46.000000', 0, 220100018),
(123457, 1200, 'Withdrawal', '2024-01-30 16:23:31.000000', 0, 220100018),
(123457, 1200, 'Withdrawal', '2024-01-30 16:28:36.000000', 0, 220100036),
(123457, 120, 'Withdrawal', '2024-01-30 16:46:19.000000', 0, 220100018),
(1234567, 200, 'Withdrawal', '2024-01-31 14:10:17.000000', 0, 220100019),
(1234567, 200, 'Withdrawal', '2024-01-31 14:18:44.000000', 0, 220100019),
(123234, 600, 'Withdrawal', '2024-01-31 14:24:26.000000', 0, 220100019),
(123456, 200, 'Withdrawal', '2024-01-31 15:13:01.000000', 0, 220100019),
(123445, 2000, 'Withdrawal', '2024-01-31 15:14:44.000000', 0, 220100019),
(12343, 2400, 'Withdrawal', '2024-01-31 15:15:25.000000', 0, 220100019),
(123456, 5000, 'Withdrawal', '2024-01-31 15:27:08.000000', 0, 220100019),
(12345678, 100, 'Withdrawal', '2024-01-31 15:50:14.000000', 0, 220100090),
(123456, 500, 'Withdrawal', '2024-01-31 20:46:10.000000', 0, 220100090),
(12344454, 600, 'Withdrawal', '2024-01-31 20:47:08.000000', 0, 220100090),
(1234254, 200, 'Withdrawal', '2024-01-31 20:47:47.000000', 0, 220100090);

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `massages` text NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`name`, `email`, `massages`, `contact_id`) VALUES
('', '', '', 1),
('delpitiya', 'delpitiya@gmail.com', 'erewr', 2),
('delpitiya', 'delpitiya@gmail.com', 'erewr', 3),
('', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_register_from`
--

CREATE TABLE `user_register_from` (
  `acc_number` int(100) NOT NULL,
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pnumber` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `balance` int(10) NOT NULL,
  `twidthrowal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_register_from`
--

INSERT INTO `user_register_from` (`acc_number`, `id`, `name`, `email`, `pnumber`, `password`, `balance`, `twidthrowal`) VALUES
(220100036, 1, 'sheshitha', 'malindu@gmail.com', 716475992, '$2y$10$nqmpbO/RwnnjE1hSgUsMhup0Fzo4NYDbUQljFSKA1Y5eRMzHW3iQ6', 98800, 0),
(220100017, 2, 'sarith', 'naveen@gmail.com', 716475992, '$2y$10$yLV/y.T9yLKwfPp48Mo0t.EOmfIGBG3RiFgyovU5G.IenXwaDqB.6', 100000, 0),
(220100100, 3, 'Milinda Nawarathna', 'milinda@gmail.com', 987654321, '$2y$10$ITQ3Ng2VMFM9TALsD/shR.2z77UlZUEUFwpp71.vZxcImqPXCM1wm', 100000, 0),
(220100019, 4, 'ddd', 'delpitiya@gmail.com', 987654321, '$2y$10$Yh2ti0ORqTHyzJOcDRl6eOsWVlVfn.Jj8CvBIaHE3RzsdETnjVjki', 85400, 9400),
(220100090, 5, 'malindu', 'mcn@gmail.com', 912939400, '$2y$10$DMjJkTFnPIDWLiJ5YPdgbuqbXZmBQJgflckMERENGBzV75hpT3c/W', 98600, 1400),
(220100017, 6, 'hiripitiya', 'hiripitiyabimansa@gmail.com', 716475992, '$2y$10$Ep7IqpNhW8ngB7HmA0xIc.qRAHZ8Q1MO5hAdDoXoyLSneCohSIcpe', 100000, 0),
(220100014, 7, 'sarith', 'naveen@gmail.com', 716475992, '$2y$10$UpIlP/895qZvoqwzEhdnVeiO3YrgarV2TkYKNkr/MTLR4J3ApdrjW', 100000, 0),
(220100010, 8, 'vimukthi', 'vimukthi@gmail.com', 987654321, '$2y$10$E8re6Xnp/anGiQTJkJRXbeiVxtWAcao3gDBHS2CiTBU2WvWocpyla', 100000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oder_chequebook`
--
ALTER TABLE `oder_chequebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_bill`
--
ALTER TABLE `pay_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `user_register_from`
--
ALTER TABLE `user_register_from`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oder_chequebook`
--
ALTER TABLE `oder_chequebook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pay_bill`
--
ALTER TABLE `pay_bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_register_from`
--
ALTER TABLE `user_register_from`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
