-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2022 at 06:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organicx_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int(11) NOT NULL,
  `CustID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Postcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`AddressID`, `CustID`, `Name`, `Address`, `Phone`, `Postcode`) VALUES
(1, 1, 'Fairall', '4203, Jln Bakariah, Kampung Bukit Treh, 84000 Muar, Johor.', '746-3668699', 84000),
(2, 27, 'Ken', 'A123, Hla Sepakat 15A, Taman Pinggir Rapat Perdana, 31350 Perak.', '646-7834965', 31350),
(3, 1, 'Christine', '12, Jln Rengas Kaw 5, Taman Selatan, 41200 Klang, Selangor.', '012-3391045', 41200),
(4, 10, 'Nisse', 'No. 20, Mdn Setia 2, Bukit Damansara, 50490 Kuala Lumpur.', '013-3893019', 50490),
(10, 10, 'Chloe', '47, Jln Makmur, Taman Mekar, 83000 Batu Pahat, Johor.', '012-8992378', 83000),
(11, 5, 'Elouise Ng', '99, Jalan HaJi, Taman Wan Lingkar, 86100 Ayer Hitam, Johor.', '012-7492018', 86100),
(12, 5, 'Jackson', '72, Jalan Kaloi, Taman Makmur, 32000 Sitiawan, Perak.', '012-9384790', 32000),
(13, 5, 'Elyn', '78, Jalan Batu, TamanSitia, 81000 Sri Gading, Johor.', '012-7839999', 81000),
(14, 6, 'Yosha', '72, Jalan Masri, Taman Masri, 40000, Malacca.', '440-9446166', 40000),
(19, 113, 'Jim', '78, Jalan H, Taman W', '012-9099111', 83000),
(20, 113, 'Js', '67, JalanB, Taman A', '012-9998765', 86100);

-- --------------------------------------------------------

--
-- Table structure for table `adminacc`
--

CREATE TABLE `adminacc` (
  `AdminID` int(11) NOT NULL,
  `AdEmail` varchar(50) NOT NULL,
  `AdPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminacc`
--

INSERT INTO `adminacc` (`AdminID`, `AdEmail`, `AdPassword`) VALUES
(1, 'organicx2022@gmail.com', 'admin2022');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CustUsername` varchar(20) NOT NULL,
  `ProID` int(11) NOT NULL,
  `Price` decimal(5,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Subtotal` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CustUsername`, `ProID`, `Price`, `Quantity`, `Subtotal`) VALUES
('ebedin4', 12, '13.90', 1, '13.90'),
('ebedin4', 8, '13.90', 2, '27.80'),
('ebedin4', 3, '16.90', 1, '16.90'),
('ebedin4', 14, '24.90', 1, '24.90'),
('Chloe', 10, '21.90', 1, '21.90');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustID` int(11) NOT NULL,
  `CustName` varchar(30) DEFAULT NULL,
  `CustUsername` varchar(20) NOT NULL,
  `CustPassword` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustID`, `CustName`, `CustUsername`, `CustPassword`, `Email`, `Phone`) VALUES
(1, 'Jen Fairall', 'jfairall0', 'hn6wzE', 'jfairall0@qq.com', '746-3668699'),
(2, 'Gregorius Obray', 'gobray1', 'qQjaHRvtNzq', 'gobray1@state.tx.us', '436-5488173'),
(3, 'Vi L\'Homme', 'vlhomme2', 'bWV2vm4V7DPM', 'vlhomme2@prlog.org', '503-7310614'),
(4, 'Chadwick Spellecy', 'cspellecy3', 'elE5On0', 'cspellecy3@wired.com', '539-6506685'),
(5, 'Eloisa Bedin', 'ebedin4', 'cOpYWmTn', 'ebedin4@marketwatch.com', '835-3351654'),
(6, 'Alyosha Pridmore', 'apridmore5', 'O1TBGTC', 'apridmore5@prlog.org', '440-9446166'),
(7, 'Claribel Klyner', 'cklyner6', 'JWlhKJ2e1EzM', 'cklyner6@ebay.co.uk', '917-5936392'),
(8, 'Duncan Blanpein', 'dblanpein7', 'BUSKTY', 'dblanpein7@slashdot.org', '590-8108926'),
(9, 'Betteanne Braithwait', 'bbraithwait8', '5fBMfr80AUV', 'bbraithwait8@goo.ne.jp', '938-1265765'),
(10, 'Nisse Lockier', 'nlockier9', 'bOQbcTVHgyC', 'nlockier9@nymag.com', '723-8750571'),
(11, 'Bron Colebourne', 'bcolebournea', '3LZwR9gt932k', 'bcolebournea@addtoany.com', '738-3267259'),
(12, 'Denis Downe', 'ddowneb', 'dq7Ny29asmc', 'ddowneb@soundcloud.com', '225-9688537'),
(13, 'Patric Atwill', 'patwillc', 'MDxe4qZ2UWe', 'patwillc@miitbeian.gov.cn', '154-6113757'),
(14, 'Thorpe Connochie', 'tconnochied', 'jcgjfah9Xjj', 'tconnochied@constantcontact.com', '574-2952938'),
(15, 'Drona Abercrombie', 'dabercrombiee', 'HFZT2ZPvk', 'dabercrombiee@macromedia.com', '970-7017041'),
(16, 'Prisca Garfit', 'pgarfitf', 'w6efHhAZ', 'pgarfitf@cnet.com', '800-1539219'),
(17, 'Waly Seago', 'wseagog', 'A8nXoeZTENVq', 'wseagog@gizmodo.com', '212-5471484'),
(18, 'Jamal Alves', 'jalvesh', '5iQyyEMiJf', 'jalvesh@dropbox.com', '477-7782887'),
(19, 'Saleem D\'Avaux', 'sdavauxi', 'rSITOAElcBNl', 'sdavauxi@craigslist.org', '849-4267442'),
(20, 'Georgetta Croft', 'gcroftj', 'PDSvrsVh9', 'gcroftj@nationalgeographic.com', '329-8332578'),
(21, 'Aleda Jenks', 'ajenksk', 'f3MUKr2eEN', 'ajenksk@bbc.co.uk', '326-5969627'),
(22, 'Joella Joll', 'jjolll', 'EtPwJW03t', 'jjolll@washingtonpost.com', '409-8310039'),
(23, 'Ardis Wikey', 'awikeym', 'buLiYD5TP4YD', 'awikeym@icio.us', '914-9462779'),
(24, 'Sharla Ratray', 'sratrayn', 'LLdhzPrh1eY', 'sratrayn@fda.gov', '687-8684115'),
(25, 'Jayson Yakobowitz', 'jyakobowitzo', 'wCTfKj', 'jyakobowitzo@blogger.com', '408-8939667'),
(26, 'Tabbie Eland', 'telandp', 'sPpEIA', 'telandp@vk.com', '806-3425811'),
(27, 'Loria Kennon', 'lkennonq', 'dFXbT2', 'lkennonq@nytimes.com', '646-7834965'),
(28, 'Raff Malden', 'rmaldenr', 'rMsdPZB', 'rmaldenr@de.vu', '896-3249187'),
(29, 'Oren Geldart', 'ogeldarts', 'KN82FGPR', 'ogeldarts@cbsnews.com', '340-8038341'),
(30, 'Otis Shiel', 'oshielt', '6EpsN8m', 'oshielt@pbs.org', '935-9348952'),
(31, 'Banky Gudger', 'bgudgeru', 'Fw8mQbnPNwY8', 'bgudgeru@icq.com', '539-7276022'),
(32, 'Georgeta Birchenough', 'gbirchenoughv', 'Vqq0AJQ6', 'gbirchenoughv@apple.com', '170-3320411'),
(33, 'Bambie Parry', 'bparryw', 'JfpCw5VF', 'bparryw@gravatar.com', '284-9367612'),
(34, 'Gaby Bolzen', 'gbolzenx', 'imtlrtGO5i', 'gbolzenx@mtv.com', '736-3716293'),
(35, 'Brice McKirton', 'bmckirtony', 'QMTm5F', 'bmckirtony@oaic.gov.au', '585-2717199'),
(36, 'Gilligan Rickword', 'grickwordz', 'OeXDfk', 'grickwordz@ow.ly', '804-9503191'),
(37, 'Kelcie Baunton', 'kbaunton10', 'pE0GYG', 'kbaunton10@sitemeter.com', '230-2607099'),
(38, 'Brana Laminman', 'blaminman11', 'klOfOX', 'blaminman11@nbcnews.com', '870-5485514'),
(39, 'Iris Rosenqvist', 'irosenqvist12', 'Uo0nnJnK9', 'irosenqvist12@dedecms.com', '522-2126950'),
(40, 'Michael Mintram', 'mmintram13', 'XtthduA', 'mmintram13@sbwire.com', '966-5607786'),
(41, 'Tatiana Nockells', 'tnockells14', 'BMJvHYsDdLD2', 'tnockells14@netscape.com', '503-9580615'),
(42, 'Archibold Peacop', 'apeacop15', '6XhAyMIsIXUy', 'apeacop15@edublogs.org', '685-6233679'),
(43, 'Kerby Worsell', 'kworsell16', 'umd614z71d', 'kworsell16@berkeley.edu', '640-3259186'),
(44, 'Janela Strangwood', 'jstrangwood17', 'fPk4uJ', 'jstrangwood17@webmd.com', '659-6893295'),
(45, 'Tommie Clipson', 'tclipson18', '7721fLxo7', 'tclipson18@dyndns.org', '458-2207246'),
(46, 'Rubi Glanz', 'rglanz19', 'VbB4LbG', 'rglanz19@flickr.com', '471-3836079'),
(47, 'Husein Cockland', 'hcockland1a', 'I3QW080t', 'hcockland1a@admin.ch', '727-9569251'),
(48, 'Si Macken', 'smacken1b', 'sri6BVMeLs', 'smacken1b@indiatimes.com', '803-9086129'),
(49, 'Mandie Doumenc', 'mdoumenc1c', 'Ea0BYjOoa8Q', 'mdoumenc1c@washington.edu', '120-9288904'),
(50, 'Iago Tinham', 'itinham1d', '48L5gBY', 'itinham1d@mediafire.com', '121-5469035'),
(112, 'Jshan', 'Chloe', '123', 'chloe@mail.com', '012-7172777'),
(113, 'Joanne Lim', 'Joanne', 'J', 'abc@gmail.com', '012-7171234');

-- --------------------------------------------------------

--
-- Table structure for table `cust_order`
--

CREATE TABLE `cust_order` (
  `OrderID` int(11) NOT NULL,
  `CustID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderStatus` varchar(11) NOT NULL,
  `SubTotal` decimal(6,2) NOT NULL,
  `DeliveryOption` varchar(20) NOT NULL,
  `DeliveryTime` varchar(20) NOT NULL,
  `ShippingFee` int(1) NOT NULL,
  `Total` decimal(6,2) NOT NULL,
  `PaymentMethod` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_order`
--

INSERT INTO `cust_order` (`OrderID`, `CustID`, `OrderDate`, `OrderStatus`, `SubTotal`, `DeliveryOption`, `DeliveryTime`, `ShippingFee`, `Total`, `PaymentMethod`) VALUES
(60, 6, '2022-01-18', 'To Receive', '63.70', 'same day delivery', 'Office Hour', 8, '71.70', 'Touch N Go'),
(63, 113, '2022-01-18', 'Completed', '81.60', 'standard delivery', 'Office Hour', 8, '89.60', 'Online Banking');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProID` int(11) NOT NULL,
  `ProName` varchar(50) NOT NULL,
  `ProDetails` varchar(300) NOT NULL,
  `Price` decimal(5,2) NOT NULL,
  `Category` varchar(25) NOT NULL,
  `Photos` varchar(150) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProID`, `ProName`, `ProDetails`, `Price`, `Category`, `Photos`, `Stock`, `Sales`) VALUES
(1, 'Ten Grain Rice', 'Ten Grains Rice produces low in fat with high fiber content. It also containing some nutrients such as zinc, Vitamin B, and chromium. ', '14.90', 'Rice', '001.jpg', 48, 37),
(2, 'Organic Pearl White Rice', 'Providing instant energy, stabalizes our body\'s blood sugar level, as well as providing vital source of Vitamin B1 to our body. ', '18.90', 'Rice', '002.jpg', 134, 118),
(3, 'Brown Rice', 'Providing high nutrients with low calories. Other beneficial nutrients such as phytochemicals, minerals and essential fiber are contained in the Natural Brown Rice as well. ', '16.90', 'Rice', '003.jpg', 23, 53),
(4, 'Basmati Rice', 'Low in fat and gluten free. The rice contained 8 important amino acids and folic acid, with low sodium and no cholesterol. ', '15.90', 'Rice', '004.jpg', 43, 64),
(5, 'Baby Rice', 'Providing bowel movement and good for relaxing blood vessels. It improves blood flow and delivering nutrient with low blood pressure. ', '18.90', 'Rice', '005.jpg', 78, 43),
(6, 'Organic Soy Bean Spaghetti', 'Providing high plant protein, with high iron content and zero cholesterol. ', '13.90', 'Noodle', '006.jpg', 124, 53),
(7, 'Yee Mee', 'Yee Mee originally contained High Protein Flour, with New Zealand Sea Salt and Vegetable Oil', '9.90', 'Noodle', '007.jpg', 42, 96),
(8, 'Organic Baby Noodle', 'Containing Wheat Flour and vegetable powder', '13.90', 'Noodle', '008.jpg', 123, 85),
(9, 'Raw Organic Whole Cashews', 'Cashews has been revered to irresistible taste that perfect for making milk, cheese and many more. ', '15.90', 'Snacks', '009.jpg', 75, 58),
(10, 'Raw Organix Macadamia Nuts', 'Delightfully fresh and irresistible buttery treat. It has a satisfying crunch and flavor. ', '21.90', 'Snacks', '010.jpg', 54, 64),
(11, 'Raw Organix Heirloom Almonds', 'Our heirloom ensures they never undergo steam pasteurization . The process leaves the almond a unique and stay at a natural flavor. ', '15.90', 'Snacks', '011.jpg', 96, 76),
(12, 'Raw Organic Berry Adventure', 'Nutrient-packed that fuels your adventures! The berry snacks contains lots of nutrients such as Vitamin A, Copper and Magnesium, giving us a crunchy yet healthy snacks. ', '13.90', 'Snacks', '012.jpg', 65, 35),
(13, 'Organic Regular Rolled Oat', 'A absolute whole grain that boosts our morning. It\'s completely a natural without any preservatives, coloring whatsoever. It comes with excellent source of nutrients such as protein, fiber, magnesium, sinz, iron and many more. ', '9.90', 'Cereal', '013.jpg', 54, 46),
(14, 'Granolove Wholesome Apricot', 'Providing healthy, crunchy and tasty wholesome cereal. It contains protein, Vitamin E, Antioxidants and Fiber. ', '24.90', 'Cereal', '014.jpg', 75, 98),
(15, 'Organic Oat Bran', 'A perfect whole grain that removes two layer of whole grain seeds, removes germs and endosperm and just providing the bran. ', '11.90', 'Cereal', '015.jpg', 54, 74);

-- --------------------------------------------------------

--
-- Table structure for table `product_ordered`
--

CREATE TABLE `product_ordered` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_ordered`
--

INSERT INTO `product_ordered` (`OrderID`, `ProductID`, `Quantity`) VALUES
(60, 12, 1),
(60, 14, 2),
(63, 5, 3),
(63, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(11) NOT NULL,
  `CustID` int(11) NOT NULL,
  `ProID` int(11) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Comment` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingID`, `CustID`, `ProID`, `Rating`, `Comment`) VALUES
(1, 2, 1, 5, 'Yummy rics, smells nice and there is definitely a difference in quality compared to other rice.'),
(2, 8, 2, 5, 'Good product quality with super fast delivery. Definite will buy again!'),
(3, 5, 3, 5, 'Nice rice and keep the body healthy. The product reached earlier than I was expected as well. '),
(4, 9, 4, 5, 'Fast Delivery and with good condition. Will consider buying it again. '),
(5, 21, 5, 4, 'My son loves it so much and the rice is suitable for adult as well. '),
(6, 7, 6, 4, 'Good condition with fast delivery. The noodles taste good as well. '),
(7, 13, 7, 4, 'Will buy again in future and highly recommended. '),
(8, 17, 8, 4, 'Good Packaging and fast delivery. The noodle is suitable for my baby as well. '),
(9, 1, 9, 5, 'Fresh cashews and crunchy. I used it for creamy nut milk and it taste fabulously good. '),
(10, 22, 10, 4, 'Good textture and low fat. Will consider buy again'),
(11, 25, 11, 5, 'Taste better if without adding the salt. Anyway, good snacks, will recommend to friends and family.'),
(12, 6, 12, 4, 'I love bring snakcs wherever i go. This barry snacks has not became my favourite go-to snacks when I\'m out for running and hiking. '),
(13, 8, 13, 4, 'The greatest cereal I\'ve ever bought. It tasty yet providing so much nutrients. '),
(14, 3, 14, 5, 'Fast delivery and the cereal is good to try. Thanks a lot seller. '),
(15, 9, 15, 4, 'I\'m eating it every morning with hot fresh milk. Will buy in bulk for my family. '),
(16, 48, 2, 5, 'Nice packaging and reached in good condition. The rice is delicious yet healthy. Highly recommended to buy!'),
(17, 42, 12, 5, 'This berry flavor nut definitely brilliant, can\'t wait to buy it again and share it with my friends and families!'),
(25, 5, 5, 5, 'I love this rice so much! Will buy again next time!!'),
(26, 5, 9, 4, 'Quite good for me.'),
(27, 5, 8, 5, ''),
(28, 5, 9, 5, ''),
(30, 112, 6, 4, 'Quite nice, it is tasty and its price is reasonable.'),
(31, 112, 12, 5, ''),
(34, 112, 14, 5, 'I love this cereal!'),
(35, 113, 5, 5, ''),
(36, 113, 14, 5, 'Quite good!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `CustID` (`CustID`);

--
-- Indexes for table `adminacc`
--
ALTER TABLE `adminacc`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustID`);

--
-- Indexes for table `cust_order`
--
ALTER TABLE `cust_order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustID` (`CustID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProID`);

--
-- Indexes for table `product_ordered`
--
ALTER TABLE `product_ordered`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `CustID` (`CustID`),
  ADD KEY `ProID` (`ProID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `adminacc`
--
ALTER TABLE `adminacc`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `cust_order`
--
ALTER TABLE `cust_order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`);

--
-- Constraints for table `cust_order`
--
ALTER TABLE `cust_order`
  ADD CONSTRAINT `cust_order_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`);

--
-- Constraints for table `product_ordered`
--
ALTER TABLE `product_ordered`
  ADD CONSTRAINT `product_ordered_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `cust_order` (`OrderID`),
  ADD CONSTRAINT `product_ordered_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`ProID`) REFERENCES `product` (`ProID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
