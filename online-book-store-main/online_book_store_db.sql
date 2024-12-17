-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 10:24 AM
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
-- Database: `online_book_store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Elias', 'eliasfsdev@gmail.com', '$2y$10$Rrda1tLnj9xg/OmK/sO1Q.ONNThZiIzJNEpvyzEMzcznA4UPCEMnS');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Jane Austen'),
(2, 'George Orwell'),
(3, 'Agatha Christie'),
(4, 'Shiraishi Jougi'),
(5, 'Satsuki Hiryuu'),
(6, 'Nana Nanana'),
(7, 'Geul Jengi S'),
(8, 'Daisuke Aizawa'),
(9, 'Kabochamasuku'),
(10, 'Lee Kyung Min'),
(11, 'Eunmilhi');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `description`, `category_id`, `price`, `type_id`, `cover`, `file`) VALUES
(1, 'Pride and Prejudice', 1, 'Sparks fly when spirited Elizabeth Bennet meets single, rich, and proud Mr. Darcy. But Mr. Darcy reluctantly finds himself falling in love with a woman beneath his class. Can each overcome their own pride and prejudice?', 8, 35000, 4, 'prideandprejustice.jpeg', 'PrideAndPrejudice.pdf'),
(2, '1984', 2, 'In 1984, civilisation has been ravaged by world war, civil conflict, and revolution. Airstrip One (formerly known as Great Britain) is a province of Oceania, one of the three totalitarian super-states that rule the world. It is ruled by \"The Party\" under the ideology of \"Ingsoc\" (a Newspeak shortening of \"English Socialism\") and the mysterious leader Big Brother, who has an intense cult of personality. The Party brutally purges out anyone who does not fully conform to their regime, using the Thought Police and constant surveillance through telescreens (two-way televisions), cameras, and hidden microphones. Those who fall out of favour with the Party become \"unpersons\", disappearing with all evidence of their existence destroyed.\r\nIn London, Winston Smith is a member of the Outer Party, working at the Ministry of Truth, where he rewrites historical records to conform to the state\'s ever-changing version of history. Winston revises past editions of The Times, while the original documents are destroyed after being dropped into ducts known as memory holes, which lead to an immense furnace. He secretly opposes the Party\'s rule and dreams of rebellion, despite knowing that he is already a \"thought-criminal\" and is likely to be caught one day.\r\n“Doublethink means the power of holding two contradictory beliefs in one\'s mind simultaneously, and accepting both of them.”', 8, 20000, 4, '1984.jpg', '1984.pdf'),
(3, 'The Murder of Roger Ackroyd', 3, '\"The Murder of Roger Ackroyd” tells the story of the murder of Roger Ackroyd, a wealthy man in a small community. Detective Hercule Poirot is called in to solve the case, which becomes complicated as secrets and deceptions within Ackroyd’s circle are revealed. As Poirot investigates, he uncovers surprising twists and exposes the true murderer.', 3, 50000, 5, 'the-murder-of-roger-ackroyd.jpg', 'The-Murder-of-Roger-Ackroyd-Agatha-Christie.pdf'),
(4, 'The Journey Of Elaina Volume 3', 7, 'Since childhood, Elaina has always been fascinated by the stories written within her favorite book, especially those about Nike, a renowned witch who had numerous great travels across the world. Wanting to experience the awe of adventure herself, Elaina strives to become a witch, and despite the numerous trials that come her way, she eventually succeeds.  Now a full-fledged witch, Elaina finally embarks on her long-awaited journey, in which she meets many people along the way, learning their various stories. Through all of this, she explores the world at its fullest—experiencing both its bright and dark sides—starting her legendary tale', 3, 30000, 1, '675005007d2f50.28007394.png', '675005007d8195.35786717.pdf'),
(5, 'Takou Koori No Hime Volume 1', 8, ' Seorang gadis cantik dari sekolah lain berada di kereta yang dinaiki Minori Souta, seorang siswa SMA biasa. [Ratu Es] Shinonome Nagi, yang memiliki sikap dingin dan menjauhkan orang lain. Itulah namanya. Suatu hari, Souta menyaksikan dia dianiaya dan mengerahkan keberanian untuk membantunya. Keesokan harinya, dia muncul di hadapannya lagi... “Aku ingin kamu tetap di sisiku saat aku di kereta.', 7, 40000, 1, '675ac9259c66d4.53237542.jpg', '675ac9259ca083.77630437.pdf'),
(6, 'Danjo Yuujou Wa Seiritsu Volume 1', 9, 'Novel komedi romantis berfokus pada hubungan antara Himari Inuzuka dan penyuka bunga Yuu Natsume, yang bersumpah untuk menjadi teman selamanya selama sekolah menengah. Mereka menghabiskan waktu bersama dengan bahagia bahkan sampai SMA. Namun ketika cinta pertama Yuu muncul kembali dalam hidupnya, hubungan mereka berangsur-angsur menjadi lebih kacau, dan hubungan Himari dan Yuu perlahan berubah menjadi sesuatu yang lebih.', 7, 45000, 1, '675acc424a9d13.43582130.jpg', '675acc424adc84.37124862.pdf'),
(7, 'The Demon Prince Goes To The Academy Chapter 1 - 429', 10, '[The Demon King is Dead] adalah cerita di mana Raja iblis langsung terbunuh di Prolog. Dan aku menjadi \'Pangeran iblis\' dari novel tersebut. …Tolong aku.', 3, 120000, 1, '675b2a2db62687.86546375.jpeg', '675b2a2db6fa57.21779415.pdf'),
(8, 'Kage No Jitsuryokusha Volume 4', 11, 'For as long as he can remember, Minoru Kagenou has been fixated on becoming as strong as possible, which has led him to undertake all kinds of rigorous training. This wish, however, does not stem from a desire to be recognized by others; rather, Minoru does everything he can to blend in with the crowd. So, while pretending to be a completely average student during the day, he arms himself with a crowbar and ruthlessly thrashes local biker gangs at night. Yet when Minoru finds himself in a truck accident, his ambitions seemingly come to a sudden end. In his final moments, he laments his powerlessness—no matter how much he trained, there was nothing he could do to overcome his human limitations.  But instead of dying, Minoru reawakens as Cid, the second child of the noble Kagenou family, in another world—one where magic is commonplace. With the power he so desired finally within his grasp, he dons the moniker ', 3, 30000, 1, '675c2ec2c0d5a1.97447128.png', '675c2ec2c166a5.36637336.pdf'),
(9, 'The Journey Of Elaina Volume 4', 7, 'Since childhood, Elaina has always been fascinated by the stories written within her favorite book, especially those about Nike, a renowned witch who had numerous great travels across the world. Wanting to experience the awe of adventure herself, Elaina strives to become a witch, and despite the numerous trials that come her way, she eventually succeeds.  Now a full-fledged witch, Elaina finally embarks on her long-awaited journey, in which she meets many people along the way, learning their various stories. Through all of this, she explores the world at its fullest—experiencing both its bright and dark sides—starting her legendary tale', 3, 30000, 1, '675c33ee97b7c4.64528034.png', '675c331fb69945.47947327.pdf'),
(10, 'The Demon Prince Goes To The Academy Arc 1', 10, '[The Demon King is Dead] adalah cerita di mana Raja iblis langsung terbunuh di Prolog. Dan aku menjadi \'Pangeran iblis\' dari novel tersebut. …Tolong aku.', 3, 20000, 3, '675c35433f48c8.85730842.jpeg', '675dcb05335821.80335502.pdf'),
(11, 'Rojiura de Hirotta Onna Volume 1', 12, ' \"Bisakah kamu... mengizinkanku menginap di rumahmu?\" \"Hey, jika kamu tetap di sini, kamu akan terkena flu.\" Ash Leben, yang terlahir kembali ke dalam dunia game otome dan kini bersekolah di kelas bangsawan rendah di Royal Magic Academy. Suatu hari, dia bertemu dengan Fine Stoudt, heroine utama dari game tersebut, yang sedang duduk di sudut jalan sambil terjebak dalam hujan. Dari Fine, Ash mendengar bahwa dia telah dihina sebagai \"wanita jahat\" oleh empat kesatria akademi dan temannya, Elise, dan bahkan terancam dikeluarkan dari sekolah. Ash menantang mereka untuk berduel dan berusaha menyelamatkan Fine dari keterpurukan. Setelah itu, Fine meminta untuk tinggal bersamanya sebagai pengelola di rumah Ash, dan mereka pun mulai hidup bersama... Sebuah komedi romantis di sekolah yang menyelamatkan heroine setelah bad end.', 7, 50000, 1, '675c7810995cf6.41575637.jpg', '675c781099aab9.59195557.pdf'),
(12, 'Webtoon Characters Na Kang Lim Arc 1: Yoo Da Hee', 13, 'Na Kang-Lim, seorang siswa SMA yang biasanya menikmati webtoon. Suatu hari, ia mengalami hal yang aneh, seorang tokoh utama wanita dari webtoon yang biasa dibacanya muncul di hadapannya. Kejadian-kejadian dalam webtoon tersebut membuatnya mengalami krisis, tapi masalahnya adalah tidak ada tokoh protagonis yang bisa menyelamatkannya dari kejadian-kejadian tersebut! Dia kemudian menjadi protagonis dan melintasi waktu untuk menyelamatkannya.', 7, 30000, 3, '675dca8893d313.32132877.jpg', '675dca8893f692.53759743.pdf'),
(13, 'Webtoon Characters Na Kang Lim Arc 2 Part 1: Cha Sirin', 13, 'Na Kang-Lim, seorang siswa SMA yang biasanya menikmati webtoon. Suatu hari, ia mengalami hal yang aneh, seorang tokoh utama wanita dari webtoon yang biasa dibacanya muncul di hadapannya. Kejadian-kejadian dalam webtoon tersebut membuatnya mengalami krisis, tapi masalahnya adalah tidak ada tokoh protagonis yang bisa menyelamatkannya dari kejadian-kejadian tersebut! Dia kemudian menjadi protagonis dan melintasi waktu untuk menyelamatkannya.', 7, 30000, 3, '675ddc572fe322.91591209.jpeg', '675ddc57301481.77425867.pdf'),
(14, 'Webtoon Characters Na Kang Lim Arc 2 Part 2: Cha Sirin', 13, 'Na Kang-Lim, seorang siswa SMA yang biasanya menikmati webtoon. Suatu hari, ia mengalami hal yang aneh, seorang tokoh utama wanita dari webtoon yang biasa dibacanya muncul di hadapannya. Kejadian-kejadian dalam webtoon tersebut membuatnya mengalami krisis, tapi masalahnya adalah tidak ada tokoh protagonis yang bisa menyelamatkannya dari kejadian-kejadian tersebut! Dia kemudian menjadi protagonis dan melintasi waktu untuk menyelamatkannya.', 7, 30000, 3, '675ddd332d80c1.11688997.jpeg', '675ddd332de5b9.44559121.pdf'),
(15, 'Webtoon Characters Na Kang Lim Arc 3 Part 1: Joo Ra Mi', 13, 'Na Kang-Lim, seorang siswa SMA yang biasanya menikmati webtoon. Suatu hari, ia mengalami hal yang aneh, seorang tokoh utama wanita dari webtoon yang biasa dibacanya muncul di hadapannya. Kejadian-kejadian dalam webtoon tersebut membuatnya mengalami krisis, tapi masalahnya adalah tidak ada tokoh protagonis yang bisa menyelamatkannya dari kejadian-kejadian tersebut! Dia kemudian menjadi protagonis dan melintasi waktu untuk menyelamatkannya.', 7, 30000, 3, '675dddf61170a9.82785922.jpeg', '675dddf611ac75.27749511.pdf'),
(16, 'Webtoon Characters Na Kang Lim Arc 3 Part 2: Joo Ra Mi (Yoo Na Ri Debut)', 13, 'Na Kang-Lim, seorang siswa SMA yang biasanya menikmati webtoon. Suatu hari, ia mengalami hal yang aneh, seorang tokoh utama wanita dari webtoon yang biasa dibacanya muncul di hadapannya. Kejadian-kejadian dalam webtoon tersebut membuatnya mengalami krisis, tapi masalahnya adalah tidak ada tokoh protagonis yang bisa menyelamatkannya dari kejadian-kejadian tersebut! Dia kemudian menjadi protagonis dan melintasi waktu untuk menyelamatkannya.', 7, 30000, 3, '675dde99521225.38267675.jpeg', '675dde99523dd9.49199680.pdf'),
(17, 'Magic Academy’s Genius Blinker Chapter 1 - 10', 14, 'Karakter dengan tingkat kesulitan ekstrim dan performa terburuk, Baek Yu-Seol dianggap sebagai tr*sh di dalam game karena dia tidak bisa menggunakan sihir di dunia fantasi yang semua orang bisa. Namun…[Karena akhir yang salah, 90% Dunia Aether telah hancur.] [Tolong raih ‘Akhir yang sebenarnya.’] Tiba-tiba, kata-kata itu terngiang di benakku sebelum aku dipindahkan ke Dunia Aether.[Kamu bisa menggunakan skill ‘Blink’.] “Kenapa aku bisa menjadi karakter ini?” Blink adalah satu-satunya kemampuan sihir yang diberikan padaku. Bertahan hidup di Akademi Stella di mana ada banyak penyihir jenius merajalela, aku menjadi Penyihir Blink yang terkenal', 3, 40000, 3, '675de39409cbb5.52476421.jpeg', '675de39409f423.40156114.pdf'),
(18, 'Magic Academy’s Genius Blinker Chapter 11 - 20', 14, 'Karakter dengan tingkat kesulitan ekstrim dan performa terburuk, Baek Yu-Seol dianggap sebagai tr*sh di dalam game karena dia tidak bisa menggunakan sihir di dunia fantasi yang semua orang bisa. Namun…[Karena akhir yang salah, 90% Dunia Aether telah hancur.] [Tolong raih ‘Akhir yang sebenarnya.’] Tiba-tiba, kata-kata itu terngiang di benakku sebelum aku dipindahkan ke Dunia Aether.[Kamu bisa menggunakan skill ‘Blink’.] “Kenapa aku bisa menjadi karakter ini?” Blink adalah satu-satunya kemampuan sihir yang diberikan padaku. Bertahan hidup di Akademi Stella di mana ada banyak penyihir jenius merajalela, aku menjadi Penyihir Blink yang terkenal', 3, 40000, 3, '675de4333b06f9.60935896.jpeg', '675de4333b2cb3.33337414.pdf'),
(19, 'Magic Academy’s Genius Blinker Chapter 21 - 30', 14, 'Karakter dengan tingkat kesulitan ekstrim dan performa terburuk, Baek Yu-Seol dianggap sebagai tr*sh di dalam game karena dia tidak bisa menggunakan sihir di dunia fantasi yang semua orang bisa. Namun…[Karena akhir yang salah, 90% Dunia Aether telah hancur.] [Tolong raih ‘Akhir yang sebenarnya.’] Tiba-tiba, kata-kata itu terngiang di benakku sebelum aku dipindahkan ke Dunia Aether.[Kamu bisa menggunakan skill ‘Blink’.] “Kenapa aku bisa menjadi karakter ini?” Blink adalah satu-satunya kemampuan sihir yang diberikan padaku. Bertahan hidup di Akademi Stella di mana ada banyak penyihir jenius merajalela, aku menjadi Penyihir Blink yang terkenal', 3, 40000, 3, '675de45761c699.20630705.jpeg', '675de457620054.48256838.pdf'),
(20, 'Magic Academy’s Genius Blinker Chapter 31 - 40', 14, 'Karakter dengan tingkat kesulitan ekstrim dan performa terburuk, Baek Yu-Seol dianggap sebagai tr*sh di dalam game karena dia tidak bisa menggunakan sihir di dunia fantasi yang semua orang bisa. Namun…[Karena akhir yang salah, 90% Dunia Aether telah hancur.] [Tolong raih ‘Akhir yang sebenarnya.’] Tiba-tiba, kata-kata itu terngiang di benakku sebelum aku dipindahkan ke Dunia Aether.[Kamu bisa menggunakan skill ‘Blink’.] “Kenapa aku bisa menjadi karakter ini?” Blink adalah satu-satunya kemampuan sihir yang diberikan padaku. Bertahan hidup di Akademi Stella di mana ada banyak penyihir jenius merajalela, aku menjadi Penyihir Blink yang terkenal', 3, 40000, 3, '675de478b59489.44760742.jpeg', '675de478b5d426.66854025.pdf'),
(21, 'ELEPHANT CAN REMEMBER ', 3, 'Hercule Poirot berdiri di pinggir tebing, memandang bebatuan di bawah sana dan air laut yang memecah di antaranya. Di tempat dia berdiri, pernah ditemukan mayat sepasang suami-istri. Di sini, tiga minggu sebelumnya, seorang wanita berjalan dalam tidurnya, jatuh, dan tewas. Mengapa semua ini bisa terjadi? Hercule Poirot bersama sahabatnya, Mrs. Ariadne Oliver, penulis novel detektif kondang, harus melangkah mundur, menelusuri tragedi yang terjadi belasan tahun lalu demi kebahagiaan seorang gadis yang tidak bersalah.', 3, 56999, 5, 'elephant\'s can remember.jpg', 'gajah selalu ingat.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `buybook`
--

CREATE TABLE `buybook` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buybook`
--

INSERT INTO `buybook` (`id`, `tanggal`, `user_id`, `book_id`) VALUES
(1, '2024-12-15', 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Fantasy'),
(4, 'History'),
(5, 'Horror'),
(7, 'Romance'),
(8, 'Classics');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Light Novel'),
(2, 'Manga'),
(3, 'Manhwa'),
(4, 'Normal'),
(5, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`) VALUES
(1, 'bdstwn@gmail.com', '$2y$10$DNatemfUfLz9KjhTweX6deFYrWQrcb8qA.OMMDo35GLDTmATYgomO', 'Budi Setiawan'),
(2, 'JoshKeren@gmail.com', '$2y$10$kfGa6uXtoto9rqzoUacZhe1./do82s9lg83w28/dm0sB.M93FFea2', 'Joshua Chandra'),
(3, 'rymn@gmai.com', '$2y$10$lu8jUQ18XfX4ipWcbJwETOuU/QsE7yfmTaQ7eV1/6y8o1u7M/Cxzy', 'Raymond Chin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buybook`
--
ALTER TABLE `buybook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `buybook`
--
ALTER TABLE `buybook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
