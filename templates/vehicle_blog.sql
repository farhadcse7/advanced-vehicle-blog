-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 12:05 AM
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
-- Database: `vehicle_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_site_setting', 'O:8:\"stdClass\":24:{s:2:\"id\";i:1;s:9:\"site_name\";s:15:\"My Awesome Site\";s:4:\"logo\";s:9:\"logo2.png\";s:8:\"fav_icon\";s:11:\"favicon.png\";s:5:\"phone\";s:15:\"+1-800-555-0199\";s:5:\"email\";s:22:\"info@myawesomesite.com\";s:7:\"address\";s:25:\"123 Main St, Anytown, USA\";s:9:\"copyright\";s:23:\"© 2023 My Awesome Site\";s:7:\"map_url\";s:210:\"https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d5940.228495781114!2d12.51036!3d41.8904!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDUzJzI1LjQiTiAxMsKwMzAnMzcuMyJF!5e0!3m2!1sen!2sus!4v1719637526343!5m2!1sen!2sus\";s:2:\"fb\";s:34:\"https://facebook.com/myawesomesite\";s:5:\"insta\";s:35:\"https://instagram.com/myawesomesite\";s:7:\"twitter\";s:33:\"https://twitter.com/myawesomesite\";s:7:\"youtube\";s:33:\"https://youtube.com/myawesomesite\";s:10:\"meta_title\";s:22:\"My Awesome Site - Home\";s:9:\"meta_desc\";s:65:\"Welcome to My Awesome Site, your go-to place for awesome content.\";s:13:\"meta_keywords\";s:22:\"awesome, site, content\";s:15:\"blog_meta_title\";s:15:\"blog_meta_title\";s:14:\"blog_meta_desc\";s:14:\"blog_meta_desc\";s:18:\"blog_meta_keywords\";s:18:\"blog_meta_keywords\";s:18:\"contact_meta_title\";s:18:\"contact_meta_title\";s:17:\"contact_meta_desc\";s:17:\"contact_meta_desc\";s:21:\"contact_meta_keywords\";s:21:\"contact_meta_keywords\";s:10:\"created_at\";s:19:\"2025-05-25 11:22:23\";s:10:\"updated_at\";s:19:\"2025-05-25 11:22:23\";}', 1748630383);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `meta_title`, `meta_desc`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Electric Vehicles', 'electric-vehicles', 'Electric Vehicles', 'Explore the latest in electric vehicle technology and trends.', 'EV, electric, Tesla, sustainability', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(2, 'Sports Cars', 'sports-cars', 'Sports Cars', 'High-performance vehicles built for speed and handling.', 'Ferrari, Lamborghini, performance cars', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(3, 'SUVs & Crossovers', 'suvs-crossovers', 'SUVs and Crossovers', 'Versatile and spacious vehicles for every adventure.', 'SUV, crossover, family cars', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(4, 'Sedans', 'sedans', 'Sedans', 'Popular mid-sized cars for daily driving and comfort.', 'sedan, Toyota, Honda, mid-size', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(5, 'Luxury Cars', 'luxury-cars', 'Luxury Cars', 'Premium cars offering top-tier features and comfort.', 'Mercedes, BMW, Audi, luxury', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(6, 'Pickup Trucks', 'pickup-trucks', 'Pickup Trucks', 'Powerful trucks built for work and recreation.', 'Ford F-150, trucks, towing, utility', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(7, 'Hybrid Cars', 'hybrid-cars', 'Hybrid Cars', 'Fuel-efficient cars that combine gas and electric power.', 'hybrid, Prius, eco-friendly', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(8, 'Car Maintenance Tips', 'car-maintenance-tips', 'Car Maintenance Tips', 'Guides and advice for keeping your car in top shape.', 'maintenance, oil change, car care', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(9, 'Future Car Concepts', 'future-car-concepts', 'Future Car Concepts', 'Explore futuristic designs and innovations in cars.', 'concept cars, innovation, autonomous', '2025-05-25 05:25:29', '2025-05-25 05:25:29'),
(10, 'Compact Cars', 'compact-cars', 'Compact Cars', 'Small cars ideal for city driving and fuel efficiency.', 'compact, hatchback, economy cars', '2025-05-25 05:25:29', '2025-05-25 05:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', 'Inquiry', 'I would like to know more about your services.', '2025-05-25 05:22:23', '2025-05-25 05:22:23'),
(2, 'Jane Smith', 'jane@example.com', 'Feedback', 'Great website! I really enjoyed browsing.', '2025-05-25 05:22:23', '2025-05-25 05:22:23'),
(3, 'Alice Johnson', 'alice@example.com', 'Support Needed', 'I am having issues with my account.', '2025-05-25 05:22:23', '2025-05-25 05:22:23'),
(4, 'Odysseus English', 'kugilo@mailinator.com', 'Pariatur Ipsum qui', 'Perspiciatis explic', '2025-05-28 13:31:16', '2025-05-28 13:31:16'),
(5, 'Odysseus English', 'kugilo@mailinator.com', 'Pariatur Ipsum qui', 'Perspiciatis explic', '2025-05-28 13:33:32', '2025-05-28 13:33:32'),
(6, 'Velma Fox', 'pywedut@mailinator.com', 'Quo omnis eaque vel', 'Occaecat veniam ut', '2025-05-28 13:34:20', '2025-05-28 13:34:20'),
(7, 'September Wooten', 'jafiqyfity@mailinator.com', 'Minima ut in et accu', 'Enim quis reprehende', '2025-05-28 14:01:18', '2025-05-28 14:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_24_103228_create_categories_table', 1),
(5, '2025_05_24_103455_create_contacts_table', 1),
(6, '2025_05_24_103853_create_settings_table', 1),
(7, '2025_05_24_104203_create_posts_table', 1),
(8, '2025_05_24_110222_create_privacies_table', 1),
(9, '2025_05_24_110259_create_terms_table', 1),
(10, '2025_05_26_061156_create_subscribers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `img`, `description`, `user_id`, `category_id`, `views`, `meta_title`, `meta_desc`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Top Electric Cars in 2025', 'top-electric-cars-2025', 'carg (5).png', 'Explore the most anticipated electric vehicles coming in 2025.', 1, 1, 120, 'Top Electric Cars 2025', 'A detailed look at upcoming electric cars in 2025.', 'electric cars, EV, 2025', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(2, 'Tesla Model S Review', 'tesla-model-s-review', 'car.jpg', 'Comprehensive review of the Tesla Model S performance and design.', 1, 1, 230, 'Tesla Model S Full Review', 'Everything you need to know about the Tesla Model S.', 'Tesla, Model S, EV review', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(3, 'Top 5 Affordable Sports Cars', 'affordable-sports-cars', 'carg (3).png', 'Budget-friendly sports cars that still deliver excitement.', 1, 2, 180, 'Affordable Sports Cars', 'Enjoy the thrill of driving without breaking the bank.', 'sports cars, budget, performance', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(4, 'Porsche 911 Turbo: Speed and Style', 'porsche-911-turbo', 'carg (7).png', 'A closer look at what makes the Porsche 911 Turbo legendary.', 1, 2, 300, 'Porsche 911 Turbo Review', 'Performance and elegance in one package.', 'Porsche, 911 Turbo, sports car', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(5, 'Best Family SUVs 2025', 'best-family-suvs-2025', 'carg (2).png', 'Top SUV choices for families based on safety and comfort.', 1, 3, 140, '2025 Family SUV Guide', 'Reliable and spacious SUVs for modern families.', 'SUV, family car, 2025', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(6, 'Toyota RAV4 vs Honda CR-V', 'rav4-vs-crv', 'carg (8).png', 'Comparing two of the most popular compact SUVs.', 1, 3, 160, 'Toyota RAV4 vs Honda CR-V', 'Which compact SUV offers more value?', 'SUV, RAV4, CR-V, comparison', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(7, 'Top 10 Sedans for Daily Driving', 'top-sedans-daily-driving', 'carg (10).png', 'Smooth, fuel-efficient sedans for your commute.', 1, 4, 100, 'Best Daily Driver Sedans', 'Comfort and reliability for your everyday journey.', 'sedan, daily driver, fuel efficient', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(8, 'Hyundai Sonata Review', 'hyundai-sonata-review', 'carg (12).png', 'The new Sonata combines tech, comfort, and performance.', 1, 4, 90, 'Hyundai Sonata 2025', 'Is the Sonata still a top choice?', 'Hyundai, Sonata, sedan review', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(9, 'Top Luxury Cars Under $70K', 'luxury-cars-under-70k', 'carg (6).png', 'Enjoy luxury features without a six-figure price.', 1, 5, 170, 'Affordable Luxury Cars', 'Premium feel on a reasonable budget.', 'luxury cars, affordable, premium', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(10, 'Mercedes-Benz S-Class Highlights', 'mercedes-s-class-2025', 'carg (1).png', 'What makes the 2025 S-Class a benchmark in luxury?', 1, 5, 250, 'Mercedes S-Class Review', 'Luxury and innovation in one sedan.', 'Mercedes, S-Class, luxury review', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(11, 'Top Pickup Trucks for Towing', 'top-trucks-for-towing', 'carg (11).png', 'Find the best trucks for towing heavy loads.', 1, 6, 130, 'Towing Truck Guide', 'Reliable pickups with serious towing power.', 'pickup, towing, Ford F-150', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(12, 'Ford F-150 vs Ram 1500', 'f150-vs-ram1500', 'carg (4).png', 'A head-to-head comparison of two popular pickups.', 1, 6, 145, 'F-150 vs Ram 1500', 'Which truck performs best under pressure?', 'truck comparison, Ford, Ram', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(13, 'Why Hybrids Are Great in 2025', 'hybrids-in-2025', 'carg (9).png', 'Hybrid cars blend efficiency and performance.', 1, 7, 110, 'Hybrid Cars in 2025', 'The rise of hybrid vehicles.', 'hybrid, EV, fuel economy', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(14, 'Toyota Prius 2025 Review', 'toyota-prius-2025-review', 'car.jpg', 'Is the Prius still the king of hybrids?', 1, 2, 95, 'Toyota Prius 2025', 'A smart choice for eco-conscious drivers.', 'Prius, hybrid, Toyota', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(15, '10 DIY Car Maintenance Tips', 'diy-car-maintenance', 'carg (2).png', 'Simple things you can do to keep your car running.', 1, 2, 170, 'DIY Maintenance Tips', 'Take care of your car at home.', 'DIY, car care, maintenance tips', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(16, 'Best Motor Oils for Your Engine', 'best-motor-oils', 'carg (6).png', 'Choosing the right oil for your vehicle.', 1, 8, 85, 'Top Motor Oils 2025', 'Protect your engine with quality oil.', 'motor oil, car engine, maintenance', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(17, 'Top Concept Cars Unveiled in 2025', 'concept-cars-2025', 'carg (12).png', 'Wild designs and future tech in new concept cars.', 1, 2, 210, 'Concept Cars 2025', 'The future of car design and innovation.', 'concept cars, future, auto shows', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(18, 'Autonomous Driving: What\'s Next?', 'autonomous-driving-future', 'carg (5).png', 'How close are we to full self-driving vehicles?', 1, 9, 190, 'Self-Driving Future', 'The road to autonomy.', 'autonomous, AI, future cars', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(19, 'Best Compact Cars for City Living', 'best-compact-cars-city', 'carg (8).png', 'Small cars that are perfect for tight city spaces.', 1, 10, 155, 'Compact Cars for the City', 'Efficient and easy to park.', 'compact cars, city driving', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(20, 'Honda Fit vs Toyota Yaris', 'honda-fit-vs-yaris', 'carg (1).png', 'Battle of the budget-friendly compact cars.', 1, 2, 100, 'Honda Fit vs Yaris', 'Which one fits your lifestyle best?', 'compact cars, Honda, Toyota', '2025-05-25 05:38:10', '2025-05-25 05:38:10'),
(21, 'Upcoming Electric SUVs in 2026', 'upcoming-electric-suvs-2026', 'carg (5).png', 'A sneak peek into electric SUVs set to launch in 2026.', 1, 1, 180, 'Electric SUVs 2026', 'Preview of upcoming electric SUVs.', 'EV, SUV, electric vehicles', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(22, 'BMW i8 vs Audi R8 Comparison', 'bmw-i8-vs-audi-r8', 'carg (2).png', 'Battle of the hybrids: German engineering at its finest.', 1, 2, 210, 'BMW i8 vs Audi R8', 'Comparing two iconic performance hybrids.', 'BMW, Audi, i8, R8, hybrid', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(23, 'Top 3-Row SUVs for Families', 'top-3row-suvs', 'carg (8).png', 'Spacious and safe options for large families.', 1, 3, 160, 'Family 3-Row SUVs', 'Top picks for family road trips.', 'SUV, family car, 3-row', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(24, 'Fuel-Efficient Sedans of 2025', 'fuel-efficient-sedans-2025', 'carg (3).png', 'Save money and the environment with these sedans.', 1, 4, 125, 'Efficient Sedans', 'Low-emission sedans to consider.', 'fuel economy, sedan, hybrid', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(25, 'Luxury EVs to Watch in 2025', 'luxury-evs-2025', 'carg (10).png', 'Electric meets elegance in these luxury models.', 1, 5, 275, 'Luxury Electric Cars', 'Luxury electric vehicles on the rise.', 'luxury EV, Tesla, Lucid, Mercedes EQ', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(26, 'Best Trucks for Camping Trips', 'best-trucks-camping', 'carg (6).png', 'Durable trucks that can haul gear and handle rough terrain.', 1, 6, 150, 'Camping Pickup Trucks', 'Trucks that are made for adventure.', 'pickup truck, camping, utility', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(27, 'Hybrid vs Diesel: Which Is Better?', 'hybrid-vs-diesel', 'car.jpg', 'A side-by-side comparison of hybrid and diesel vehicles.', 1, 7, 140, 'Hybrid vs Diesel', 'Which fuel type suits your needs?', 'diesel vs hybrid, car types', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(28, 'How to Change Your Brake Pads', 'change-brake-pads-guide', 'carg (12).png', 'A simple guide to replacing your brake pads at home.', 1, 8, 130, 'Brake Pad Replacement', 'DIY guide for brake maintenance.', 'car brakes, maintenance, DIY', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(29, 'Are Self-Driving Cars Safe?', 'are-self-driving-cars-safe', 'carg (9).png', 'What data shows about the safety of autonomous vehicles.', 1, 9, 195, 'Self-Driving Car Safety', 'Analyzing the risks of autonomous driving.', 'self-driving cars, safety, AI', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(30, 'Best Subcompact Cars of 2025', 'best-subcompact-cars-2025', 'carg (1).png', 'Small in size, big in value — top subcompacts reviewed.', 1, 10, 145, 'Top Subcompacts 2025', 'Best small cars for urban drivers.', 'subcompact, small car, city', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(31, 'Rivian R1T: Electric Truck Review', 'rivian-r1t-review', 'carg (7).png', 'Is Rivian’s electric pickup worth the hype?', 1, 1, 165, 'Rivian R1T Electric Truck', 'Deep dive into the R1T\'s performance.', 'Rivian, electric truck, R1T', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(32, 'Fastest Cars Under $50K', 'fastest-cars-under-50k', 'carg (3).png', 'Speed without breaking your wallet.', 1, 2, 220, 'Affordable Speedsters', 'Top fast cars under 50,000 USD.', 'sports cars, budget speed, under 50K', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(33, 'Top AWD SUVs for Snow Driving', 'top-awd-suvs-snow', 'carg (5).png', 'SUVs designed to perform in snowy conditions.', 1, 3, 180, 'AWD SUVs for Snow', 'Top choices for winter roads.', 'AWD SUV, snow, winter driving', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(34, 'Best Sedan Interiors in 2025', 'best-sedan-interiors-2025', 'carg (11).png', 'Comfort and tech come together inside these sedans.', 1, 4, 155, 'Sedan Interior Awards', 'Luxurious sedan interiors to admire.', 'sedan, interior, luxury', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(35, 'Top Luxury Coupes You Can Buy', 'top-luxury-coupes', 'carg (4).png', 'Two-door luxury cars that make a statement.', 1, 5, 230, 'Luxury Coupes', 'Elegant performance coupes for 2025.', 'luxury cars, coupe, premium', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(36, 'Ford Maverick vs Hyundai Santa Cruz', 'maverick-vs-santa-cruz', 'carg (6).png', 'Two compact pickups battle for urban utility.', 1, 6, 140, 'Compact Truck Comparison', 'Urban trucks face off.', 'Maverick, Santa Cruz, compact pickup', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(37, 'Should You Buy a Used Hybrid?', 'buy-used-hybrid-car', 'carg (10).png', 'Things to know before purchasing a pre-owned hybrid.', 1, 7, 125, 'Used Hybrid Guide', 'Tips for buying second-hand hybrids.', 'used hybrid, car buying', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(38, 'How to Check Your Engine Oil', 'how-to-check-engine-oil', 'carg (2).png', 'Step-by-step guide to checking and topping off oil.', 1, 8, 90, 'Check Engine Oil', 'Don\'t wait for a warning light.', 'car oil, maintenance, DIY', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(39, 'How Close Are Flying Taxis?', 'flying-taxis-future', 'carg (12).png', 'Could air taxis become a daily commute solution?', 1, 9, 205, 'Flying Cars Future', 'Where flying vehicles are heading.', 'flying taxis, eVTOL, future transport', '2025-05-25 05:55:16', '2025-05-25 05:55:16'),
(40, 'City-Friendly Cars with Great MPG', 'city-cars-good-mpg', 'carg (8).png', 'Fuel-efficient cars ideal for city dwellers.', 1, 10, 160, 'Fuel Efficient City Cars', 'Save money with every mile.', 'fuel economy, MPG, compact', '2025-05-25 05:55:16', '2025-05-25 05:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `privacies`
--

CREATE TABLE `privacies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacies`
--

INSERT INTO `privacies` (`id`, `name`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'This is the privacy policy of our website. We value your privacy and want to be transparent about how we collect and use your information.', 'Privacy Policy - Our Website', 'Read our privacy policy to understand how we handle your personal data.', 'privacy, data protection, personal information', '2025-05-25 05:22:23', '2025-05-25 05:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YsK3Ky9y1Ccs9S3Lg10Jbw8umNYJlcNKo67lXFRc', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicWFVdG5taWZ0OTEza1JWVUY2dWdEbnFGWEJ0dVRqYzJpY3F1MUZQMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ibG9nL3Nob3cvNiI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0ODYyNDQyMjt9fQ==', 1748642082);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `fav_icon` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `copyright` text DEFAULT NULL,
  `map_url` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `insta` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `blog_meta_title` varchar(255) DEFAULT NULL,
  `blog_meta_desc` text DEFAULT NULL,
  `blog_meta_keywords` text DEFAULT NULL,
  `contact_meta_title` varchar(255) DEFAULT NULL,
  `contact_meta_desc` text DEFAULT NULL,
  `contact_meta_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `logo`, `fav_icon`, `phone`, `email`, `address`, `copyright`, `map_url`, `fb`, `insta`, `twitter`, `youtube`, `meta_title`, `meta_desc`, `meta_keywords`, `blog_meta_title`, `blog_meta_desc`, `blog_meta_keywords`, `contact_meta_title`, `contact_meta_desc`, `contact_meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'My Awesome Site', 'logo2.png', 'favicon.png', '+1-800-555-0199', 'info@myawesomesite.com', '123 Main St, Anytown, USA', '© 2023 My Awesome Site', 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d5940.228495781114!2d12.51036!3d41.8904!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDUzJzI1LjQiTiAxMsKwMzAnMzcuMyJF!5e0!3m2!1sen!2sus!4v1719637526343!5m2!1sen!2sus', 'https://facebook.com/myawesomesite', 'https://instagram.com/myawesomesite', 'https://twitter.com/myawesomesite', 'https://youtube.com/myawesomesite', 'My Awesome Site - Home', 'Welcome to My Awesome Site, your go-to place for awesome content.', 'awesome, site, content', 'blog_meta_title', 'blog_meta_desc', 'blog_meta_keywords', 'contact_meta_title', 'contact_meta_desc', 'contact_meta_keywords', '2025-05-25 05:22:23', '2025-05-25 05:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'fmfarhad23@gmail.com', '2025-05-26 00:44:46', '2025-05-26 00:44:46'),
(2, 'abc@gmail.com', '2025-05-26 00:47:06', '2025-05-26 00:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Terms of Service', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Terms of Service - Our Website', 'Understand the terms under which you can use our website.', 'terms, service, agreement', '2025-05-25 05:22:23', '2025-05-25 05:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$NRXKvR2TT9TzbsK0AzusuuS5Cj0ewP91f8KUWUex/6.NG5a/IWfHa', NULL, '2025-05-29 13:59:46', '2025-05-29 13:59:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `privacies`
--
ALTER TABLE `privacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `privacies`
--
ALTER TABLE `privacies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
