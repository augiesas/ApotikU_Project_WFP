-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 02:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteku`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Analgesik Narkotik', ''),
(2, 'Analgesik Non Narkotik', ''),
(3, 'Antipirai', ''),
(4, 'Nyeri Neuropatik', ''),
(5, 'Anestetik Lokal', ''),
(6, 'Anestetik Umum dan Oksigenl', ''),
(7, 'Obat Untuk Prosedur pre-Operatif', ''),
(8, 'Antialergi dan obat untuk anafilaksis', NULL),
(9, 'Antiepilepsi - antikonvulsi', NULL),
(10, 'Antelmintik Intestinal', ''),
(34, 'jk', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `price` double(8,2) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transactions`
--

INSERT INTO `detail_transactions` (`price`, `quantity`, `subtotal`, `transaction_id`, `medicine_id`) VALUES
(15000.00, 1.00, 15000.00, 1, 5),
(12000.00, 1.00, 12000.00, 1, 6),
(15000.00, 1.00, 15000.00, 8, 1),
(9000.00, 1.00, 9000.00, 8, 4),
(8000.00, 1.00, 8000.00, 17, 8),
(21000.00, 1.00, 21000.00, 17, 9),
(15000.00, 1.00, 15000.00, 17, 1),
(12000.00, 1.00, 12000.00, 21, 13),
(29000.00, 2.00, 58000.00, 21, 22),
(10500.00, 1.00, 10500.00, 23, 2),
(8000.00, 1.00, 8000.00, 23, 8),
(9000.00, 1.00, 9000.00, 23, 4),
(5000.00, 1.00, 5000.00, 24, 7),
(14000.00, 1.00, 14000.00, 24, 11),
(11000.00, 3.00, 33000.00, 25, 3),
(12000.00, 1.00, 12000.00, 25, 6),
(21000.00, 1.00, 21000.00, 25, 9),
(9000.00, 2.00, 18000.00, 25, 4),
(10500.00, 1.00, 10500.00, 26, 2),
(18000.00, 1.00, 18000.00, 26, 25),
(14000.00, 2.00, 28000.00, 26, 29),
(14000.00, 1.00, 14000.00, 27, 11),
(20000.00, 1.00, 20000.00, 27, 18),
(17000.00, 1.00, 17000.00, 28, 15),
(16000.00, 1.00, 16000.00, 29, 10),
(73200.00, 1.00, 73200.00, 29, 32);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generic_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restriction_formula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faskes1` tinyint(1) NOT NULL,
  `faskes2` tinyint(1) NOT NULL,
  `faskes3` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `generic_name`, `form`, `restriction_formula`, `price`, `description`, `faskes1`, `faskes2`, `faskes3`, `image`, `category_id`) VALUES
(1, 'Fentanil', 'inj 0,05 mg/mL (i.m./i.v.)', '5 amp/kasus.', 15000.00, 'ini: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.', 0, 1, 1, 'fentanil 0.05mg.jpg', 1),
(2, 'Fentanil', 'patch 12,5 mcg/jam', '10 patch/bulan', 10500.00, 'patch:- Untuk nyeri kronik pada pasien kanker yang tidak terkendali. - Tidak untuk nyeri akut.', 0, 1, 1, 'Fentanyl_12,5mcg-hour_patch.jpg', 1),
(3, 'Fentanil', 'patch 25 mcg/jam', '10 patch/bulan', 11000.00, 'patch:- Untuk nyeri kronik pada pasien kanker yang tidak terkendali. - Tidak untuk nyeri akut.', 0, 1, 1, 'fentanyl_patch_25mcg.jpg', 1),
(4, 'Ibuprofen', 'tab 200 mg', '30 tab/bulan', 9000.00, ' ', 1, 1, 1, 'ibuprofen_tab_200mg.jpg', 2),
(5, 'Ibuprofen', 'susp 100 mg/5 mL', '1 btl/kasus', 15000.00, ' ', 1, 1, 1, 'ibuprofen_susp_100mg_5mL.png', 2),
(6, 'Asam Mefenamat', 'kaps 250 mg', '30 kaps/bulan', 12000.00, ' ', 1, 1, 1, 'asam_mefenamat_kaps250mg.jpg', 2),
(7, 'alopurinol', 'tab 100 mg', '30 tab/bulan', 5000.00, 'Tidak diberikan pada saat nyeri akut', 1, 1, 1, 'Allopurinol_Tablet_100_mg.jpg', 3),
(8, 'alopurinol', 'tab 300 mg', '30 tab/bulan', 8000.00, 'Tidak diberikan pada saat nyeri akut', 1, 1, 1, 'alopurinol_tab300mg.jpeg', 3),
(9, 'kolkisin', 'tab 500 mcg', '30 tab/bulan', 21000.00, ' ', 1, 1, 1, 'kolkisin_tab500mcg.png', 3),
(10, 'gabapentin', 'kaps 100 mg', '60 kaps/bulan', 16000.00, 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum', 0, 1, 1, 'gabapentin_kaps_100mg.jpg', 4),
(11, 'gabapentin', 'kaps 300 mg', '30 kaps/bulan', 14000.00, 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum', 0, 1, 1, 'gabapentin_kaps_300mg.jpg', 4),
(12, 'amitriptilin', 'tab 25 mg', '30 kaps/bulan', 13000.00, ' ', 1, 1, 1, 'Amitriptyline-25mg.jpg', 4),
(13, 'bupivakain', 'inj 0,5%', ' ', 12000.00, ' ', 0, 1, 1, 'bupivakin_inj.jpg', 5),
(14, 'bupivakain heavy', 'inj 0,5% + glukosa 8%', ' ', 12500.00, 'Khusus untuk analgesia spinal', 0, 1, 1, 'bupivakainheavy_inj.jpg', 5),
(15, 'etil klorida', 'spray 100 mL', ' ', 17000.00, ' ', 1, 1, 1, 'etil klorida_spray_100ml.jpg', 5),
(16, 'deksmedetomidin', 'inj 100 mcg/mL', ' ', 18000.00, 'Untuk sedasi pada pasien di ICU, kraniotomi, bedah jantung dan operasi yang memerlukan waktu pembedahan yang lama.', 0, 1, 1, 'deksametason_inj5mg.jpg', 6),
(17, 'desfluran', 'ih', ' ', 25000.00, ' ', 0, 1, 1, 'desfluran_ih.jpg', 6),
(18, 'halotan', 'ih', ' ', 20000.00, 'Tidak boleh digunakan berulang. Tidak untuk pasien dengan gangguan fungsi hati.', 0, 1, 1, 'halothane-bp.jpg', 6),
(19, 'atropin', 'inj 0,25 mg/mL (i.v./s.k.)', ' ', 23000.00, ' ', 1, 1, 1, 'atropin_inj 0,25 mg.jpg', 7),
(20, 'midazolam', 'inj 1 mg/mL (i.v.)', 'Dosis rumatan: 1 mg/jam (24 mg/hari). Dosis premedikasi: 8 vial/kasus.', 21000.00, 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum', 0, 1, 1, 'midazolam_inj 1 mg.jpg', 7),
(21, 'midazolam', 'inj 5 mg/mL (i.v.)', 'Dosis rumatan: 1 mg/jam (24 mg/hari). Dosis premedikasi: 8 vial/kasus.', 26000.00, 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum. Dapat digunakan untuk sedasi pada pasien ICU dan HCU.', 0, 1, 1, 'midazolam_inj 5 mg.jpg', 7),
(22, 'deksametason', 'inj 5 mg/mL', '20 mg/hari', 29000.00, ' ', 1, 1, 1, 'deksametason_inj5mg.jpg', 8),
(23, 'difenhidramin', 'inj 10 mg/mL (i.v./i.m.)', '30 mg/hari', 15500.00, ' ', 1, 1, 1, 'difenhidramin_inj.png', 8),
(24, 'epinefrin (adrenalin)', 'inj 1 mg/mL', ' ', 17000.00, ' ', 1, 1, 1, 'epinefrin_inj 1 mg.jpg', 8),
(25, 'diazepam', 'inj 5 mg/mL', '10 amp/kasus, kecuali untuk kasus di ICU.', 18000.00, 'Tidak untuk i.m.', 1, 1, 1, 'diazepam_inj5.jpg', 9),
(26, 'diazepam', 'enema 5 mg/2,5 mL', '2 tube/hari, bila kejang.', 19000.00, ' ', 1, 1, 1, 'diazepam_enema 5.jpg', 9),
(27, 'diazepam', 'enema 10 mg/2,5 mL', '2 tube/hari, bila kejang.', 15000.00, ' ', 1, 1, 1, 'diazepam_enema10mg.jpg', 9),
(28, 'albendazol', 'tab 400 mg', ' ', 8000.00, ' ', 1, 1, 1, 'Albendazole_tab400mg.jpg', 10),
(29, 'albendazol', 'susp 200 mg/5 mL', ' ', 14000.00, ' ', 1, 1, 1, 'albendazol_susp 200 mg.png', 10),
(30, 'mebendazol', 'tab 100 mg', ' ', 9000.00, ' ', 1, 1, 1, 'Mebendazole-100mg.jpg', 10),
(32, 'OBH Combi Batuk Berdahak Menthol Sirup 100 ml', 'Tiap 5 mL sirup mengandung Succus liquiritiae extract 167 mg, ammonium Chloride 50 mg, anise oil 0.99 mg, ammon liqduid 7 microliter, menthol crystal 4.44 mg, peppermint oil 3.16 mg, alcohol 2% Dosis', '3 kali sehari 3 sendok takar (@15 ml)', 73200.00, 'obat batuk', 1, 0, 0, '1655790324_obh.jpg', 34);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_06_16_132202_create_medicines_table', 1),
(5, '2022_06_16_132320_create_categories_table', 1),
(6, '2022_06_16_132352_create_transactions_table', 1),
(7, '2022_06_16_142458_create_detail_transactions_table', 1),
(8, '2022_06_16_144903_add_categoryid_column', 1),
(9, '2022_06_16_150126_add_transactionid_column', 1),
(10, '2022_06_16_150207_add_medicineid_column', 1),
(11, '2022_06_16_161544_add_userid_column', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_date` datetime NOT NULL,
  `total` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_date`, `total`, `user_id`) VALUES
(1, '2022-06-21 04:10:33', 27000.00, 2),
(8, '2022-06-21 07:35:49', 24000.00, 3),
(17, '2022-06-21 07:48:12', 44000.00, 6),
(21, '2022-06-21 07:52:02', 70000.00, 2),
(23, '2022-06-21 07:55:07', 27500.00, 5),
(24, '2022-06-21 07:55:35', 19000.00, 4),
(25, '2022-06-22 08:11:35', 84000.00, 4),
(26, '2022-06-23 08:48:40', 56500.00, 8),
(27, '2022-06-23 11:28:56', 34000.00, 5),
(28, '2022-06-23 11:29:20', 17000.00, 4),
(29, '2022-06-23 11:30:39', 89200.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$70LR9DNv8jr3kBhoFLIQCu//MOA72Sy7eVCcHPVsUCY59C4hJbjTK', 'admin', NULL, '2022-06-20 19:09:16', '2022-06-20 22:55:24'),
(2, 'Nur Fitriana', 'fitri@gmail.com', '$2y$10$hkXBKilXX60QQaYVdPefaORpR6wPS9g.TzStVY8T9NG52hshB0EAG', 'buyer', NULL, '2022-06-20 19:10:21', '2022-06-20 19:10:21'),
(3, 'Golden Wijaya', 'golden@gmail.com', '$2y$10$8IFAZTYfFx3UsILZAMkCHeZgLqADYL5KCtzuSYUu6bVRHCiyPurcm', 'buyer', NULL, '2022-06-20 19:11:29', '2022-06-20 19:11:29'),
(4, 'Dhikananda Vinita', 'dhika@gmail.com', '$2y$10$GdkRF72T483mhBiiOyerDO5nq2gVn2dcFd8gzNBAxYbgG2XYUmmKC', 'buyer', NULL, '2022-06-20 19:13:39', '2022-06-20 19:13:39'),
(5, 'Eduard Williams', 'willy@gmail.com', '$2y$10$1/4MvEi3522ZI7vj7BfXX.Uqgq.Nhkm0k8evklMOSartrfYHCbAfK', 'buyer', NULL, '2022-06-20 19:17:57', '2022-06-20 19:17:57'),
(6, 'Augie Salvatory', 'augie@gmail.com', '$2y$10$APra/1bE.7RqBVs3GJkFhOyzCoWBiYAVF.cwyJ7Pk.RtWjN3h81qe', 'buyer', NULL, '2022-06-20 19:19:51', '2022-06-20 19:19:51'),
(7, 'test123', 'test@gmail.com', '$2y$10$kXW1OYD887bLVyzxFN3sVORKe8.TqA98Ui9/lBVl4DyBWtYnlzEbO', 'buyer', NULL, '2022-06-20 19:24:23', '2022-06-23 04:22:47'),
(8, 'ogeng', 'ogik@gmail.com', '$2y$10$iJZzSo7epXNoh7.O2.4l1e8vKw0fzvVoc0Fy0zzL9rn13xiOPZxd6', 'buyer', NULL, '2022-06-23 01:45:47', '2022-06-23 01:47:05'),
(9, 'Ani', 'ani@gmail.com', '$2y$10$boDK2scYT8xTvcrolyDRC.3NjBY8I7PfK4ex4VhrPCkg2HHRuC7Be', 'buyer', NULL, '2022-06-23 04:25:14', '2022-06-23 04:25:14'),
(10, 'Ana', 'ana@gmail.com', '$2y$10$X.MrCl/w/Kod/5Q5tTvnVOX3bUO/t1/PEF9FfT9F3Da2quUhZA7qG', 'buyer', NULL, '2022-06-23 04:25:59', '2022-06-23 04:25:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD KEY `detail_transactions_transaction_id_foreign` (`transaction_id`),
  ADD KEY `detail_transactions_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `detail_transactions_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`),
  ADD CONSTRAINT `detail_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
