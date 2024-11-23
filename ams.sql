-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 09:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `logistic`
--

CREATE TABLE `logistic` (
  `logistic_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rank` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logistic`
--

INSERT INTO `logistic` (`logistic_id`, `username`, `fullname`, `email`, `phone`, `password`, `rank`) VALUES
(41, 'user1', 'John Doe', 'user1@example.com', '1234567890', 'pass123', 'Lieutenant'),
(42, 'user2', 'Jane Smith', 'user2@example.com', '0987654321', 'pass456', 'Sergeant Major'),
(43, 'user3', 'Alice Johnson', 'user3@example.com', '5551234567', 'pass789', 'Corporal'),
(44, 'user4', 'Bob Anderson', 'user4@example.com', '9876543210', 'passabc', 'Captain'),
(45, 'user5', 'Emily Brown', 'user5@example.com', '4445556666', 'passdef', 'Private'),
(46, 'user6', 'Chris Wilson', 'user6@example.com', '1112223333', 'passghi', 'Major General'),
(47, 'user7', 'Olivia Martinez', 'user7@example.com', '7778889999', 'passjkl', 'Colonel'),
(48, 'user8', 'Daniel Thompson', 'user8@example.com', '3334445555', 'passmno', 'Sergeant'),
(49, 'user9', 'Sophia Garcia', 'user9@example.com', '6667778888', 'passpqr', 'General'),
(50, 'user10', 'William Hernandez', 'user10@example.com', '2223334444', 'passstu', 'Chief Warrant Officer'),
(51, 'user11', 'Isabella Lopez', 'user11@example.com', '8889990000', 'passvwx', 'Lieutenant Colonel'),
(52, 'user12', 'Michael Scott', 'user12@example.com', '1236547890', 'passyza', 'Major'),
(53, 'user13', 'Emma Green', 'user13@example.com', '5556667777', 'passbcd', 'Staff Sergeant'),
(54, 'user14', 'Matthew King', 'user14@example.com', '9990001111', 'passefg', 'Second Lieutenant'),
(55, 'user15', 'Ava Lee', 'user15@example.com', '4447778888', 'passhij', 'Warrant Officer'),
(56, 'user16', 'Jacob Perez', 'user16@example.com', '1114447777', 'passklm', 'First Sergeant'),
(57, 'user17', 'Mia Baker', 'user17@example.com', '7774441111', 'passnop', 'Brigadier General'),
(58, 'user18', 'Alexander Turner', 'user18@example.com', '3336669999', 'passqrs', 'Master Sergeant'),
(59, 'user19', 'Ethan Ward', 'user19@example.com', '9996663333', 'passtuv', 'Chief Petty Officer'),
(60, 'user20', 'Grace Brooks', 'user20@example.com', '2228884444', 'passwxy', 'Private First Class');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `officer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`officer_id`, `user_id`, `name`, `username`, `email`, `phone`, `password`, `rank`) VALUES
(2022, 501, 'John Doe', 'john_doe', 'john@example.com', '1234567890', 'password1', 'Lieutenant'),
(2023, 502, 'Jane Smith', 'jane_smith', 'jane@example.com', '2345678901', 'password2', 'Captain'),
(2024, 503, 'Michael Johnson', 'michael_johnson', 'michael@example.com', '3456789012', 'password3', 'Major'),
(2025, 504, 'Emily Brown', 'emily_brown', 'emily@example.com', '4567890123', 'password4', 'Lieutenant Colonel'),
(2026, 505, 'William Davis', 'william_davis', 'william@example.com', '5678901234', 'password5', 'Colonel'),
(2027, 506, 'Olivia Wilson', 'olivia_wilson', 'olivia@example.com', '6789012345', 'password6', 'Brigadier General'),
(2028, 507, 'James Martinez', 'james_martinez', 'james@example.com', '7890123456', 'password7', 'Major General'),
(2029, 508, 'Sophia Anderson', 'sophia_anderson', 'sophia@example.com', '8901234567', 'password8', 'Lieutenant General'),
(2030, 509, 'Benjamin Taylor', 'benjamin_taylor', 'benjamin@example.com', '9012345678', 'password9', 'General'),
(2031, 510, 'Ava Thomas', 'ava_thomas', 'ava@example.com', '0123456789', 'password10', 'General of the Army'),
(2032, 511, 'Daniel Hernandez', 'daniel_hernandez', 'daniel@example.com', '1234567890', 'password11', 'Second Lieutenant'),
(2033, 512, 'Mia Lopez', 'mia_lopez', 'mia@example.com', '2345678901', 'password12', 'First Lieutenant'),
(2034, 513, 'Ethan Gonzalez', 'ethan_gonzalez', 'ethan@example.com', '3456789012', 'password13', 'Staff Sergeant'),
(2035, 514, 'Harper Moore', 'harper_moore', 'harper@example.com', '4567890123', 'password14', 'Sergeant'),
(2036, 515, 'Isabella Hill', 'isabella_hill', 'isabella@example.com', '5678901234', 'password15', 'Corporal'),
(2037, 516, 'Lucas Rivera', 'lucas_rivera', 'lucas@example.com', '6789012345', 'password16', 'Sergeant Major'),
(2038, 517, 'Alexander Mitchell', 'alexander_mitchell', 'alexander@example.com', '7890123456', 'password17', 'Master Sergeant'),
(2039, 518, 'Madison Perez', 'madison_perez', 'madison@example.com', '8901234567', 'password18', 'First Sergeant'),
(2040, 519, 'Charlotte Roberts', 'charlotte_roberts', 'charlotte@example.com', '9012345678', 'password19', 'Command Sergeant Major'),
(2041, 520, 'Noah Turner', 'noah_turner', 'noah@example.com', '0123456789', 'password20', 'Sergeant Major of the Army');

-- --------------------------------------------------------

--
-- Table structure for table `soldier`
--

CREATE TABLE `soldier` (
  `soldier_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soldier`
--

INSERT INTO `soldier` (`soldier_id`, `user_id`, `name`, `username`, `email`, `phone`, `password`, `rank`) VALUES
(3024, 101, 'John Smith', 'john_smith', 'john@example.com', '1234567890', 'password1', 'Private'),
(3025, 102, 'Emma Johnson', 'emma_johnson', 'emma@example.com', '2345678901', 'password2', 'Private'),
(3026, 103, 'Michael Williams', 'michael_williams', 'michael@example.com', '3456789012', 'password3', 'Corporal'),
(3027, 104, 'Sophia Brown', 'sophia_brown', 'sophia@example.com', '4567890123', 'password4', 'Sergeant'),
(3028, 105, 'James Jones', 'james_jones', 'james@example.com', '5678901234', 'password5', 'Staff Sergeant'),
(3029, 106, 'Olivia Davis', 'olivia_davis', 'olivia@example.com', '6789012345', 'password6', 'Sergeant First Class'),
(3030, 107, 'William Miller', 'william_miller', 'william@example.com', '7890123456', 'password7', 'Master Sergeant'),
(3031, 108, 'Ava Wilson', 'ava_wilson', 'ava@example.com', '8901234567', 'password8', 'First Sergeant'),
(3032, 109, 'Alexander Moore', 'alexander_moore', 'alexander@example.com', '9012345678', 'password9', 'Sergeant Major'),
(3033, 110, 'Mia Taylor', 'mia_taylor', 'mia@example.com', '0123456789', 'password10', 'Command Sergeant Major'),
(3034, 111, 'Ethan Anderson', 'ethan_anderson', 'ethan@example.com', '1234567890', 'password11', 'Sergeant Major of the Army'),
(3035, 112, 'Harper Thomas', 'harper_thomas', 'harper@example.com', '2345678901', 'password12', 'Second Lieutenant'),
(3036, 113, 'Isabella Jackson', 'isabella_jackson', 'isabella@example.com', '3456789012', 'password13', 'First Lieutenant'),
(3037, 114, 'Lucas White', 'lucas_white', 'lucas@example.com', '4567890123', 'password14', 'Captain'),
(3038, 115, 'Avery Harris', 'avery_harris', 'avery@example.com', '5678901234', 'password15', 'Major'),
(3039, 116, 'Scarlett Martin', 'scarlett_martin', 'scarlett@example.com', '6789012345', 'password16', 'Lieutenant Colonel'),
(3040, 117, 'Jackson Thompson', 'jackson_thompson', 'jackson@example.com', '7890123456', 'password17', 'Colonel'),
(3041, 118, 'Aria Garcia', 'aria_garcia', 'aria@example.com', '8901234567', 'password18', 'Brigadier General'),
(3042, 119, 'Liam Martinez', 'liam_martinez', 'liam@example.com', '9012345678', 'password19', 'Major General'),
(3043, 120, 'Emma Robinson', 'emma_robinson', 'emma@example.com', '0123456789', 'password20', 'Lieutenant General');

-- --------------------------------------------------------

--
-- Table structure for table `weapon`
--

CREATE TABLE `weapon` (
  `weapon_id` int(11) NOT NULL,
  `weapon_name` varchar(100) DEFAULT NULL,
  `weapon_type` varchar(100) DEFAULT NULL,
  `company` varchar(60) NOT NULL,
  `country` varchar(50) NOT NULL,
  `availability_status` enum('available','issued','banned') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weapon`
--

INSERT INTO `weapon` (`weapon_id`, `weapon_name`, `weapon_type`, `company`, `country`, `availability_status`) VALUES
(1, 'KRISS Vector Gen 2', 'Submachine gun', 'Martin Corps', 'Russia', 'available'),
(2, 'Heckler & Koch Mp5', 'Submachine gun', 'Martin Corps', 'Russia', 'issued'),
(3, 'BD-08', 'Assault Rifle', 'Martin Corps', 'Russia', 'available'),
(4, 'Type 56', 'Assault Rifle', 'Martin Corps', 'Russia', 'banned'),
(5, 'AK-15', 'Assault Rifle', 'Martin Corps', 'Russia', 'issued'),
(6, 'M4 Carbine', 'carbine', 'Martin Corps', 'Russia', 'available'),
(7, 'Type 56 Carbine', 'carbine', 'Martin Corps', 'Russia', 'issued'),
(8, 'Zastava M59', 'carbine', 'Martin Corps', 'Russia', 'available'),
(9, 'Heckler & Koch G3', 'Battle Rifle', 'Martin Corps', 'Russia', 'available'),
(10, 'FN FAL', 'Battle Rifle', 'Martin Corps', 'Russia', 'banned'),
(11, 'BD-15', 'Light machine gun', 'Martin Corps', 'Russia', 'available'),
(12, 'RPD', 'Light machine gun', 'Martin Corps', 'Russia', 'issued'),
(13, 'Type 80', 'General purpose', 'Martin Corps', 'Russia', 'available'),
(14, 'DShK', 'Heavy machine gun', 'Martin Corps', 'Russia', 'issued'),
(15, 'AX308', 'sniper rifle', 'Martin Corps', 'Russia', 'available'),
(16, 'SC-76 Thunderbolt', 'sniper rifle', 'Martin Corps', 'Russia', 'issued'),
(17, 'Pindad SPR', 'sniper rifle', 'Martin Corps', 'Russia', 'available'),
(18, 'RPA Rangemaster', 'sniper rifle', 'Martin Corps', 'Russia', 'banned'),
(19, 'Dragunov sniper rifle', 'Designated marksman rifle', 'Martin Corps', 'Russia', 'issued'),
(20, 'PSL', 'Designated marksman rifle', 'Martin Corps', 'Russia', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `weapon_requests`
--

CREATE TABLE `weapon_requests` (
  `request_id` int(11) NOT NULL,
  `soldier_id` int(11) DEFAULT NULL,
  `officer_id` int(11) DEFAULT NULL,
  `weapon_id` int(11) DEFAULT NULL,
  `request_status` enum('pending','approved','denied') DEFAULT 'pending',
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `approval_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weapon_requests`
--

INSERT INTO `weapon_requests` (`request_id`, `soldier_id`, `officer_id`, `weapon_id`, `request_status`, `request_date`, `approval_date`) VALUES
(1, 3024, NULL, 1, 'approved', '2023-12-17 18:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logistic`
--
ALTER TABLE `logistic`
  ADD PRIMARY KEY (`logistic_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `soldier`
--
ALTER TABLE `soldier`
  ADD PRIMARY KEY (`soldier_id`);

--
-- Indexes for table `weapon`
--
ALTER TABLE `weapon`
  ADD PRIMARY KEY (`weapon_id`);

--
-- Indexes for table `weapon_requests`
--
ALTER TABLE `weapon_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `soldier_id` (`soldier_id`),
  ADD KEY `officer_id` (`officer_id`),
  ADD KEY `weapon_id` (`weapon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logistic`
--
ALTER TABLE `logistic`
  MODIFY `logistic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2042;

--
-- AUTO_INCREMENT for table `soldier`
--
ALTER TABLE `soldier`
  MODIFY `soldier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3044;

--
-- AUTO_INCREMENT for table `weapon`
--
ALTER TABLE `weapon`
  MODIFY `weapon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `weapon_requests`
--
ALTER TABLE `weapon_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weapon_requests`
--
ALTER TABLE `weapon_requests`
  ADD CONSTRAINT `weapon_requests_ibfk_1` FOREIGN KEY (`soldier_id`) REFERENCES `soldier` (`soldier_id`),
  ADD CONSTRAINT `weapon_requests_ibfk_2` FOREIGN KEY (`officer_id`) REFERENCES `officer` (`officer_id`),
  ADD CONSTRAINT `weapon_requests_ibfk_3` FOREIGN KEY (`weapon_id`) REFERENCES `weapon` (`weapon_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
