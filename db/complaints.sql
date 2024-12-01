-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 06:47 PM
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
-- Database: `hostel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `COMPLAINT_ID` int(11) NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `DATE` date NOT NULL,
  `roll_no` char(8) NOT NULL,
  `concerned_staff` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`COMPLAINT_ID`, `status`, `DESCRIPTION`, `DATE`, `roll_no`, `concerned_staff`) VALUES
(1, 'Pending', 'The lighting in the hostel corridor is too dim, making it unsafe to walk at night.', '2024-11-30', '23bcs001', 'Electricity Staff'),
(2, 'In Progress', 'The internet connection in my room is intermittent and often not working for extended periods.', '2024-11-29', '23bcs001', 'IT Support'),
(3, 'Pending', 'The common areas in the hostel are not cleaned regularly, and trash is piling up.', '2024-11-28', '23bcs001', 'Cleaning Staff'),
(4, 'Resolved', 'Some of my clothes went missing after using the hostel laundry service.', '2024-11-27', '23bcs001', 'Laundry Staff'),
(5, 'Pending', 'The food served in the mess seems unhygienic, and I’ve noticed insects around the food areas.', '2024-11-30', '23bcs001', 'Catering Staff');

--
-- Triggers `complaints`
--
DELIMITER $$
CREATE TRIGGER `assign_worker` AFTER INSERT ON `complaints` FOR EACH ROW BEGIN
    DECLARE worker_id CHAR(20);
    DECLARE complaint_id INT;

    -- Get the complaint ID of the newly inserted row
    SET complaint_id = NEW.COMPLAINT_ID;

    -- Assign worker based on concerned_staff
    IF NEW.concerned_staff = 'electrician' THEN
        -- Select the electrician with the minimum assigned complaints
        SELECT ELECTRICIAN_ID INTO worker_id
        FROM electrician
        LEFT JOIN (
            SELECT ECOMPLAINT_ID, COUNT(*) AS complaint_count
            FROM electrician
            GROUP BY ELECTRICIAN_ID
        ) AS e_count ON electrician.ELECTRICIAN_ID = e_count.ECOMPLAINT_ID
        ORDER BY IFNULL(e_count.complaint_count, 0) ASC
        LIMIT 1;

        -- Insert into electrician table
        INSERT INTO electrician (ELECTRICIAN_ID, ECOMPLAINT_ID)
        VALUES (worker_id, complaint_id);

    ELSEIF NEW.concerned_staff = 'carpenter' THEN
        -- Select the carpenter with the minimum assigned complaints
        SELECT CARPENTER_ID INTO worker_id
        FROM carpenter
        LEFT JOIN (
            SELECT CCOMPLAINT_ID, COUNT(*) AS complaint_count
            FROM carpenter
            GROUP BY CARPENTER_ID
        ) AS c_count ON carpenter.CARPENTER_ID = c_count.CCOMPLAINT_ID
        ORDER BY IFNULL(c_count.complaint_count, 0) ASC
        LIMIT 1;

        -- Insert into carpenter table
        INSERT INTO carpenter (CARPENTER_ID, CCOMPLAINT_ID)
        VALUES (worker_id, complaint_id);

    ELSEIF NEW.concerned_staff = 'plumber' THEN
        -- Select the plumber with the minimum assigned complaints
        SELECT PLUMBER_ID INTO worker_id
        FROM plumber
        LEFT JOIN (
            SELECT PCOMPLAINT_ID, COUNT(*) AS complaint_count
            FROM plumber
            GROUP BY PLUMBER_ID
        ) AS p_count ON plumber.PLUMBER_ID = p_count.PCOMPLAINT_ID
        ORDER BY IFNULL(p_count.complaint_count, 0) ASC
        LIMIT 1;

        -- Insert into plumber table
        INSERT INTO plumber (PLUMBER_ID, PCOMPLAINT_ID)
        VALUES (worker_id, complaint_id);

    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`COMPLAINT_ID`),
  ADD KEY `fk_student_roll` (`roll_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `COMPLAINT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_student_roll` FOREIGN KEY (`roll_no`) REFERENCES `student_details` (`ROLL_NO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
