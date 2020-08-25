-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb28.awardspace.net
-- Generation Time: Aug 25, 2020 at 07:51 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3555583_starvelater`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `Area_ID` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `City_ID` varchar(255) DEFAULT NULL,
  `City_Name` varchar(255) DEFAULT NULL,
  `State_ID` varchar(255) DEFAULT NULL,
  `State_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`Area_ID`, `Name`, `City_ID`, `City_Name`, `State_ID`, `State_Name`) VALUES
('5f4523b139c93', 'Jayendra Nagar', '5f451fc92c9ca', 'Kakinada', '5f451ea9eed59', 'Andhra Pradesh'),
('5f45243464107', 'Indrapalem', '5f451fc92c9ca', 'Kakinada', '5f451ea9eed59', 'Andhra Pradesh'),
('5f45244e6a3e4', 'Diwan Cheruvu', '5f4524418bb10', 'Rajahmundry', '5f451ea9eed59', 'Andhra Pradesh'),
('5f45246bb9ea4', 'Kondapur', '5f45245dcae2c', 'Bhilai', '5f452454edcc3', 'Bihar'),
('5f45538b89279', 'Banjara Hills', '5f45537c5ade8', 'Hyderabad', '5f455371586f8', 'Telangana'),
('5f455b996fced', 'Miyapur', '5f45537c5ade8', 'Hyderabad', '5f455371586f8', 'Telangana');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` varchar(50) NOT NULL,
  `Restaurant_ID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Restaurant_ID`, `Name`) VALUES
('5f4530709abb9', '5f4525abd4c85', 'Main Course'),
('5f45318b15177', '5f4525abd4c85', 'Starters');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `City_ID` varchar(50) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `State_ID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_ID`, `Name`, `State_ID`) VALUES
('5f451f5de3b6c', 'Mumbai', '5f451eeae0161'),
('5f451fc92c9ca', 'Kakinada', '5f451ea9eed59'),
('5f4524418bb10', 'Rajahmundry', '5f451ea9eed59'),
('5f45245dcae2c', 'Bhilai', '5f452454edcc3'),
('5f45537c5ade8', 'Hyderabad', '5f455371586f8');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email_ID` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Address` varchar(50) NOT NULL,
  `Total_Orders` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Name`, `Email_ID`, `Password`, `Phone`, `Address`, `Total_Orders`) VALUES
('5ebcfa887eeba', 'Saikiran Kopparthi', 'knvrssaikiran@gmail.com', 'sai123', '9381384234', 'D.NO 70-14-8/32/101, UDAY SOUDHA APARTMENT', '0'),
('5ebcfd3b86013', 'Koushik Modekurti', 'koushikmodekurti00@gmail.com', 'koushik123', '8639796138', 'Bhilai, Chattisgarh', '0');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` varchar(50) NOT NULL,
  `Restaurant_ID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `Discount` varchar(50) NOT NULL,
  `Final_Price` varchar(50) NOT NULL,
  `photoname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `Restaurant_ID`, `Name`, `Type`, `category`, `price`, `availability`, `Discount`, `Final_Price`, `photoname`) VALUES
('5f4533dc530d0', '5f4525abd4c85', 'Motichur Laddu', 'Vegetarian', 'Main Course', '250', 'No', '0 %', '250', 'laddu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `order_Id` varchar(50) NOT NULL,
  `item_ids` varchar(50) DEFAULT NULL,
  `Restaurant_ID` varchar(50) DEFAULT NULL,
  `Customer_ID` varchar(50) DEFAULT NULL,
  `Order_Type` varchar(50) NOT NULL,
  `Order_Date` varchar(50) NOT NULL,
  `Order_Status` varchar(50) NOT NULL,
  `Net_Bill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `Restaurant_ID` varchar(50) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Restaurant_Name` varchar(60) NOT NULL,
  `KnownFor` varchar(255) NOT NULL,
  `Email_ID` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `SeatingCapacity` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Area` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `GSTIN` varchar(50) NOT NULL,
  `FoodLicense` varchar(50) NOT NULL,
  `LabourLicense` varchar(50) NOT NULL,
  `Margin` varchar(50) NOT NULL,
  `OrdersReceived` varchar(50) NOT NULL,
  `logoFileName` varchar(80) NOT NULL,
  `OperationStatus` varchar(50) NOT NULL,
  `AvgPrepTime` varchar(50) NOT NULL,
  `sessionID` varchar(255) NOT NULL,
  `lastLogin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`Restaurant_ID`, `Type`, `Category`, `Restaurant_Name`, `KnownFor`, `Email_ID`, `Password`, `Phone`, `SeatingCapacity`, `fname`, `lname`, `Address`, `Area`, `City`, `State`, `GSTIN`, `FoodLicense`, `LabourLicense`, `Margin`, `OrdersReceived`, `logoFileName`, `OperationStatus`, `AvgPrepTime`, `sessionID`, `lastLogin`) VALUES
('5f4525abd4c85', 'Most Popular', 'College Canteen', 'Subayya Hotel ', 'Best Vegetarian Dishes...', 'knvrssaikiran@gmail.com', 'saikiran123', '+919381384234', '150', 'Saikiran', 'Kopparthi', 'Ramanayyapeta, Near Raja Tank', 'Jayendra Nagar', 'Kakinada', 'Andhra Pradesh', 'ACD12345', 'ASD456', 'TYHHU789', '12', '0', 'subayya.jpg', 'Closed', '45 mins', 'free', '2020-08-25 20:51:43'),
('5f4527054695a', 'Most Popular', 'Restaurant', 'Haveli Dakshin', 'Non Veg Speciality', 'haveliadmin@gmail.com', 'haveli123', '+919381384234', '0', 'Ramkumar', 'Kopparthi', 'Near Kalamandir', 'Indrapalem', 'Kakinada', 'Andhra Pradesh', 'RDER123456', '0', '0', '0', '0', 'haveli.jpg', 'Open', '0', 'free', '2020-08-25 21:23:59'),
('5f455317543a3', 'Most Popular', 'Restaurant', 'Bawarchi', 'North Indian, Chinese, Seafood', 'bawarchi@gmail.com', 'saikiran123', '+919381384234', '0', 'Koushik', 'Modekurti', 'Nallakunta', 'Jayendra Nagar', 'Kakinada', 'Andhra Pradesh', 'DRT123', '0', '0', '0', '0', 'bawarchi.jpg', 'Open', '0', 'free', 'time'),
('5f4554ee53378', 'Most Popular', 'Restaurant', 'Red Chillies Restaurant', 'Indian, Chinese', 'redchillies@gmail.com', 'saikiran123', '+919381384234', '0', 'Santosh', 'Burada', 'NAD Junction', 'Jayendra Nagar', 'Kakinada', 'Andhra Pradesh', 'ASGT12345', '0', '0', '0', '0', 'Red Chillies.jfif', 'Open', '0', 'free', 'time'),
('5f45559299b48', 'Most Popular', 'Restaurant', 'Deccan Fried Chicken', 'Italian, Beverages', 'deccan@gmail.com', 'saikiran123', '+919381384234', '0', 'Padma', 'Kopparthi', 'Gajuwaka', 'Diwan Cheruvu', 'Rajahmundry', 'Andhra Pradesh', 'RDER123456', '0', '0', '0', '0', 'deccan.jfif', 'Open', '0', 'free', 'time'),
('5f455606a7ef2', 'Most Popular', 'Restaurant', 'Happy Bakery', 'Birthday Cakes', 'happy@gmail.com', 'happy123', '+919381384234', '0', 'Saikiran', 'Kopparthi', 'Old Gajuwaka. Near NAD', 'Banjara Hills', 'Hyderabad', 'Telangana', 'ACD12345', '0', '0', '0', '0', 'happy.jfif', 'Open', '0', 'free', 'time'),
('5f4556b594aa8', 'Most Popular', 'Restaurant', 'The Thickshake Factory', 'Milk Shakes and Juices', 'thick@gmail.com', 'thick123', '+919381384234', '0', 'Ram', 'Kumar', 'Kakani Nagar, NAD', 'Banjara Hills', 'Hyderabad', 'Telangana', 'AGRKRR1234', '0', '0', '0', '0', 'thick.jfif', 'Open', '0', 'free', 'time'),
('5f45572c02991', 'Most Popular', 'Restaurant', 'Sri Gruhalaxmi Home Foods', 'Home made Sweets', 'gruha@gmail.com', 'gruha123', '+919381384234', '0', 'Koushik', 'Modelurti', 'Near Kalamandir', 'Banjara Hills', 'Hyderabad', 'Telangana', 'RDER123456', '0', '0', '0', '0', 'gruhalaxmi.jfif', 'Open', '0', 'free', 'time'),
('5f4557fb723a6', 'Most Popular', 'Restaurant', 'Bombay Kulfis', 'Ice Cream, Desserts', 'bombay@gmail.com', 'bombay123', '+919381384234', '0', 'Ramkumar', 'Yelisetti', 'Lakshmi Nagar', 'Banjara Hills', 'Hyderabad', 'Telangana', 'AGRKRR1234', '0', '0', '0', '0', 'bombay.jfif', 'Open', '0', 'free', 'time'),
('5f4558649ebd6', 'Most Popular', 'Restaurant', 'Little Idli', 'South Indian', 'little@gmail.com', 'little123', '+919381384234', '0', 'Santosh', 'Burada', 'Road No.02', 'Banjara Hills', 'Hyderabad', 'Telangana', 'DRT123', '0', '0', '0', '0', 'littleidli.jfif', 'Open', '0', 'free', 'time'),
('5f4559044e64d', 'Most Popular', 'Restaurant', 'Cream Stone', 'Desserts, Ice Cream', 'cream@gmail.com', 'cream12345', '+919381384234', '0', 'Saikiran', 'Kopparthi', 'Somajiguda', 'Jayendra Nagar', 'Kakinada', 'Andhra Pradesh', 'ACD12345', '0', '0', '0', '0', 'creamstone.jfif', 'Open', '0', 'free', 'time');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `State_ID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`State_ID`, `Name`) VALUES
('5f451ea9eed59', 'Andhra Pradesh'),
('5f451eeae0161', 'Maharastra'),
('5f451f0e16572', 'Madhya Pradesh'),
('5f452454edcc3', 'Bihar'),
('5f455371586f8', 'Telangana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Area_ID`),
  ADD KEY `City_ID` (`City_ID`),
  ADD KEY `State_ID` (`State_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`City_ID`),
  ADD KEY `State_ID` (`State_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_ids` (`item_ids`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`Restaurant_ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`State_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`City_ID`) REFERENCES `city` (`City_ID`),
  ADD CONSTRAINT `area_ibfk_2` FOREIGN KEY (`State_ID`) REFERENCES `state` (`State_ID`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurants` (`Restaurant_ID`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`State_ID`) REFERENCES `state` (`State_ID`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurants` (`Restaurant_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_ids`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurants` (`Restaurant_ID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
