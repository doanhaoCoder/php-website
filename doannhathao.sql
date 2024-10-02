-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2024 lúc 10:49 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blogs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `footer` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `content`, `footer`, `created_at`, `updated_at`) VALUES
(1, '<h4>About Doan Nhat Hao\'s Linux Blog</h4><br>Welcome to Doan Nhat Hao\'s Linux Blog, where passion meets expertise in the world of Linux operating systems. My name is Doan Nhat Hao, and I am thrilled to share my journey and insights into the diverse and dynamic Linux ecosystem with you.<br>What We Offer:<br>At Doan Nhat Hao\'s Linux Blog, our mission is to provide valuable resources, tutorials, and tips for both beginners and seasoned Linux users alike. Whether you\'re exploring Linux for the first time or looking to deepen your knowledge, you\'ll find practical guidance and in-depth analyses tailored to enhance your Linux experience.<br>Why Linux Matters:<br>Linux is more than just an operating system; it\'s a community-driven platform that empowers users with flexibility, security, and innovation. Through our blog, we aim to highlight the versatility of Linux, from system administration to development, and showcase its role in shaping the future of technology.<br>Join Our Community:<br>Engage with like-minded individuals, share your experiences, and stay updated on the latest Linux trends and developments. Together, we can harness the power of open-source technology and embrace the spirit of collaboration that defines the Linux community.<br>Thank you for visiting Doan Nhat Hao\'s Linux Blog. Let\'s explore, learn, and grow with Linux together!', 'Trường Cao đẳng Kinh tế Thành phố Hồ Chí Minh đã trải qua nhiều giai đoạn chuyển đổi lịch sử và có khởi nguyên từ 4 trường Trung học chuyên nghiệp. Trong suốt chặng đường hơn 30 năm hình thành và phát triển, Trường không ngừng nâng cao chất lượng về đào tạo, hợp tác phát triển và các dịch vụ khác.', '2024-04-28 10:05:52', '2024-05-06 09:09:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Linux Server Distros', 1, '2024-04-24 20:25:34', '2024-06-22 02:29:56'),
(8, 'Linux Arch Distros', 1, '2024-04-26 08:18:28', '2024-06-22 02:30:54'),
(9, 'KDE Linux Distros', 1, '2024-05-04 02:38:52', '2024-06-22 02:32:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `status`, `id_category`, `id_user`, `created_at`, `updated_at`) VALUES
(23, 'Ubuntu', '<p><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">Top on the list is </span><a href=\"https://www.ubuntu.com/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); font-family: \"DM Sans\", sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);\">Ubuntu</a><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">, an open-source </span><a title=\"Best Debian-based Linux Distributions\" href=\"https://www.tecmint.com/debian-based-linux-distributions/\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); font-family: \"DM Sans\", sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);\">Debian-based Linux operating system</a><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">, developed by </span><span style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">Canonical</span><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">. It is, without a doubt, the </span><a title=\"Most Popular Linux Distributions\" href=\"https://www.tecmint.com/top-most-popular-linux-distributions/\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); font-family: \"DM Sans\", sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);\">most popular Linux distribution</a><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> out there, and many other distributions have been derived from it. Ubuntu server is efficient for building top-performance, highly scalable, flexible, and secure enterprise data centers.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">It offers remarkable support for big data, visualization, and containers, IoT (Internet Of Things); you can use it from most if not all common public clouds. Ubuntu server can run on x86, ARM, and Power architectures.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">With the <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Ubuntu Advantage</span>, you can get commercial support and services such as a systems management tool for security audit, compliance, and the Canonical livepatch service, which helps you to apply kernel fixes and many more. This is coupled with support from a robust and growing community of developers and users.</p><p><br></p>', 'media_6675d5dbb2415.png', 1, 1, 6, '2024-06-22 02:34:51', '2024-06-22 02:37:23'),
(26, 'Rocky Linux', '<p data-inc=\"1\" style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">Hosted by the Rocky Enterprise Software Foundation, <a title=\"Rocky Linux\" href=\"https://rockylinux.org/\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255);\">Rocky Linux</a> is a relatively new, free, open-source, and community-driven enterprise operating system built as a trusted successor of the then-popular <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">CentOS Linux</span>. Rocky Linux is stable, secure, and 100% compatible with <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">RHEL</span>.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Rocky Linux</span> has <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">CentOS</span> roots. The founder of Rocky Linux <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Gregory Kurtzer</span> is also a co-founder of the <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">CentOS Linux</span> project. It is under intensive development by the community and is the fastest-growing enterprise Linux distro being adopted in enterprise and high-performance computing (HPC) environments to run mission-critical workloads.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">For new users, <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Rocky Linux</span> provides an easy-to-use migration script to <a title=\"Migrate from CentOS 8 to Rocky Linux 8\" href=\"https://www.tecmint.com/migrate-centos-8-to-rocky-linux/\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); background-color: rgb(255, 255, 255);\">migrate from other enterprise Linux distributions</a>, usable free of charge. Besides, it offers regular updates and a 10-year support lifecycle, also for free.<br></p>', 'media_6675d63ad2979.png', 1, 1, 6, '2024-06-22 02:36:26', '2024-06-22 02:37:39'),
(28, 'Debian', '<p><a href=\"https://www.debian.org/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); font-family: \"DM Sans\", sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);\">Debian</a><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> is a free, open-source, and stable Linux distribution maintained by its users. It ships in over </span><span style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">51000</span><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> packages and uses a powerful packaging system. It is being used by educational institutions, business companies, and non-profit and government organizations.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">It generally supports a larger number of computer architectures including 64-bit PC (amd64), 32-bit PC (i386), IBM System z, 64-bit ARM (Aarch64), POWER Processors, and many more.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">It has a bug-tracking system and you can get support for Debian by reading through its documentation and free web resources.</p><p><br></p>', 'media_6675d66dd6275.png', 1, 1, 6, '2024-06-22 02:37:17', '2024-06-22 02:37:46'),
(29, 'ArcoLinux', '<p><a href=\"https://arcolinux.info/\" target=\"_blank\" rel=\"noopener nofollow noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); font-family: \"DM Sans\", sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);\">ArcoLinux</a><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> (formerly </span><span style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">ArchMerge</span><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">) is an Arch Linux-based distro that enables users to run Linux in several ways using any of its 3 release branches:</span></p><ul style=\"box-sizing: inherit; margin-bottom: 1.5em; margin-left: 3em; border-style: initial; border-color: initial; border-image: initial; list-style-type: disc; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"><li style=\"box-sizing: inherit; margin: 0px 0px 0.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial;\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">ArcoLinux</span>: a full-featured OS with Xfce as its desktop manager.</li><li style=\"box-sizing: inherit; margin: 0px 0px 0.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial;\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">ArcoLinuxD</span>: a minimal OS that allows users to install any desktop environment and application with a built-in script.</li><li style=\"box-sizing: inherit; margin: 0px 0px 0.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial;\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">ArcoLinuxB</span>: a project that allows users to build and customize unique versions of the OS using pre-configured desktop environments, etc. This is what has birthed several community-driven derivatives.</li><li style=\"box-sizing: inherit; margin: 0px 0px 0.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial;\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">ArcoLinuxB Xtended</span>: a project that further extends the flexibility of ArcoLinuxB to enable users to experiment more with Tiling Window Managers and other software.</li></ul><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">ArcoLinux is free, open-source, and available to download from here: <a href=\"https://arcolinux.info/download/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255);\">Download ArcoLinux</a>.</p><p><br></p>', 'media_6675d6bad1cf5.png', 1, 8, 6, '2024-06-22 02:38:34', '2024-06-22 02:39:28'),
(30, 'Anarchy Linux', '<p><a href=\"https://anarchy-linux.org/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); font-family: \"DM Sans\", sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Anarchy Linux</span></a><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> is a free and open-source project that exists to enable interested Arch Linux users to enjoy all the best of the distro without the hassle that typically comes with it – especially during the installation phase. It does this by shipping with several automated scripts that facilitate its easy setup using Arch’s package base while featuring a custom repository with additional packages.</span></p><p data-inc=\"1\" style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Anarchy Linux</span> is distributed as an ISO that can run off a pen drive, uses <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Xfce 4</span> as its default desktop environment, and its users benefit from all the goodies of the AUR.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">The latest version of <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Anarchy Linux</span> ISO images are available on its official website here: <a href=\"https://anarchy-linux.org/download/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255);\">Download Anarchy Linux</a>.</p><p><br></p>', 'media_6675d6d499178.png', 1, 8, 6, '2024-06-22 02:39:00', '2024-06-22 02:39:33'),
(31, 'EndeavourOS', '<p><a title=\"EndeavourOS\" href=\"https://endeavouros.com/\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); font-family: \"DM Sans\", sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);\">EndeavourOS</a><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> is a terminal-centric Arch Linux-based distro powered by a vibrant and friendly community at its core. Its purpose is to reveal the flexibility inherent in the Arch-based core to users as they go on their Linux journey.</span><br></p>', 'media_6675d6ec3e8b2.jpeg', 1, 8, 6, '2024-06-22 02:39:24', '2024-06-22 02:39:38'),
(32, 'Manjaro', '<p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"><a href=\"https://manjaro.org/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255);\">Manjaro</a> today stands out as one of the main Arch-based distributions essentially because it has an active development team with a large user base and community with the added advantage of being one of the very first distros to go with an Arch – which of course means it has been around longer than the rest.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Manjaro</span> is yet another user-friendly Arch-Linux-based distro that completely revamps the whole idea of Arch – but most importantly lends an easier and more intuitive approach to Arch Linux for newcomers.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"><span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Manjaro</span> is available in the listed flavors below with the><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">Choose your preferred <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Manjaro</span> edition from the official website here: <a href=\"https://manjaro.org/download/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255);\">Download Manjaro Linux OS</a> and do a <a title=\"Installation of Manjaro 21.0 (KDE Edition) Desktop\" href=\"https://www.tecmint.com/installation-of-manjaro-linux/\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255);\">fresh Manjaro installation</a> on your system.</p>', 'media_6675e77f90d14.png', 1, 9, 6, '2024-06-22 02:40:53', '2024-06-22 03:50:07'),
(33, 'KDE Neon', '<p><a title=\"KDE Neon\" href=\"https://neon.kde.org/\" target=\"_blank\" rel=\"noopener nofollow noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255); font-family: \"DM Sans\", sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);\">KDE Neon</a><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> is a community-based operating system now rebased on </span><span style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">Ubuntu 20.04</span><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">. </span><span style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">KDE Neon</span><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> ships with the latest </span><span style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">Plasma</span><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> experience from the </span><span style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">KDE</span><span style=\"color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"> community combined with the stability and security of a Ubuntu LTS release. This makes it the ideal system to go for when trying out or testing the most recent Plasma releases.</span></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">To try out <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">KDE Neon</span>, the <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">User Edition</span> is what you would want to go and download. It comes with all the latest from the KDE community on a stable build, unlike the Testing edition which is buggy.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">With <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">KDE Neon</span>, rest assured that your <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">Plasma</span> environment, as well as <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">KDE</span> applications, will be continuously updated to provide a stable and secure system.</p><p><br></p>', 'media_6675d77cd0608.png', 1, 9, 6, '2024-06-22 02:41:48', '2024-06-22 02:41:58'),
(34, 'Manjaro KDE', '<p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\"><a title=\"Manjaro KDE Linux\" href=\"https://manjaro.org/downloads/official/kde/\" target=\"_blank\" rel=\"noopener nofollow noreferrer\" style=\"box-sizing: inherit; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: underline; color: rgb(0, 86, 255);\">Manjaro</a> is available for download in 3 Desktop editions: <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">GNOME</span>, <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">XFCE</span>, and <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">KDE Plasma</span>. But it’s the <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">KDE Plasma</span> edition that stands out from the rest with it’s downright elegant and flashy <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">KDE Plasma 5</span> environment. At the time of penning down this guide, the latest version is <span style=\"box-sizing: inherit; color: rgb(0, 0, 0);\">KDE 5.18.4</span>.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em; padding: 0px; border-style: initial; border-color: initial; border-image: initial; color: rgb(58, 58, 58); font-family: \"DM Sans\", sans-serif; font-size: 17px;\">It comes with a modern and chic look, with some really cool menus that you can style to match your taste/preference. There’s no denying about it’s truly stunning and user-friendly UI that simple to use. Everything works out of the box, and there are you spoilt for choice as to the enhancements you can apply to improve the look-and-feel.</p>', 'media_6675d7b2190e7.png', 1, 9, 6, '2024-06-22 02:42:42', '2024-06-22 02:42:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_parent_comment` int(11) NOT NULL,
  `comment` text NOT NULL,
  `id_blog` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `id_parent_comment`, `comment`, `id_blog`, `name`, `email`, `created_at`, `updated_at`) VALUES
(187, 0, 'Blog rất có ích', 23, 'Doan Nhat Hao', 'doannhathao2310@gmail.com', '2024-06-24 03:40:30', '2024-06-24 03:40:30'),
(189, 0, 'tải ở đâu đấy mọi người', 23, 'Mod', '22662028@kthcm.edu.vn', '2024-06-24 03:41:27', '2024-06-24 03:41:27'),
(190, 189, 'https://ubuntu.com link đây bạn nhé', 23, 'Admin', 'admin@gmail.com', '2024-06-24 03:42:21', '2024-06-24 03:42:21'),
(191, 0, 'Debian có khó dùng không mọi người', 28, 'Nguyễn Văn A', 'a@gmail.com', '2024-06-24 03:44:03', '2024-06-24 03:44:03'),
(192, 191, 'Tôi đang dùng nè oke nha', 28, 'Doan Nhat Hao', 'doannhathao2310@gmail.com', '2024-06-24 03:44:40', '2024-06-24 03:44:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Thank you for your interest in connecting with us! Whether you have questions, feedback, or simply want to say hello, we\'d love to hear from you. Please feel free to reach out via the methods below:', '2024-04-28 11:47:52', '2024-05-04 09:34:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `links`
--

INSERT INTO `links` (`id`, `title`, `url`, `created_at`, `updated_at`) VALUES
(2, 'Home', 'index.php', '2024-05-04 08:23:13', '2024-05-04 08:23:13'),
(3, 'About', 'about.php', '2024-05-04 08:23:25', '2024-05-04 08:23:25'),
(4, 'Terms', 'terms.php', '2024-05-04 08:23:40', '2024-05-04 08:23:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mailsettings`
--

CREATE TABLE `mailsettings` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mail_server` varchar(100) NOT NULL,
  `mail_username` varchar(100) NOT NULL,
  `mail_password` varchar(100) NOT NULL,
  `mail_port` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mailsettings`
--

INSERT INTO `mailsettings` (`id`, `email`, `mail_server`, `mail_username`, `mail_password`, `mail_port`, `created_at`, `updated_at`) VALUES
(1, 'support@gmail.com', 'sandbox.smtp.mailtrap.io', '8a679d4a24c373', 'cb9d284d1ac03f', '2525', '2024-04-28 10:00:25', '2024-04-29 11:03:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_favicon` varchar(100) NOT NULL,
  `site_map` text NOT NULL,
  `site_timezone` varchar(100) NOT NULL,
  `site_footer` varchar(100) NOT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `site_map`, `site_timezone`, `site_footer`, `contact_phone`, `contact_address`, `contact_email`, `created_at`, `updated_at`) VALUES
(1, 'Blogs Linux', 'media_6675d9c9d2ae2.jpg', 'media_6675d9c9d2d61.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6053207084333!2d106.67075587593251!3d10.764870089383194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10bef3c07%3A0xfd59127e8c2a3e0!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEtpbmggdOG6vyBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1719068670190!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Asia/Ho_Chi_Minh', 'copyright © 2024 | Doan Nhat Hao', '0967093770', '33 Vĩnh Viễn, Phường 2, Quận 10, TP.HCM', 'doannhathao2310@gmail.com', '2024-05-01 09:39:30', '2024-06-22 02:51:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Arch Linux', 'media_6675cde6a2262.jpg', '2024-06-22 02:00:54', '2024-06-22 02:00:54'),
(7, 'Debian Linux', 'media_6675cdf2cb89c.jpg', '2024-06-22 02:01:06', '2024-06-22 02:01:06'),
(8, 'Kali Linux', 'media_6675cdfc67d38.jpg', '2024-06-22 02:01:16', '2024-06-22 02:01:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `socials`
--

INSERT INTO `socials` (`id`, `title`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'Facebook', 'https://www.facebook.com', '<i class=\"fab fa-facebook\"></i>', '2024-05-03 09:48:38', '2024-06-22 02:09:15'),
(3, 'Youtube', 'https://www.youtube.com', '<i class=\"fab fa-youtube\"></i>', '2024-05-03 09:49:08', '2024-05-03 09:49:08'),
(4, 'Instagram', 'https://www.instagram.com', '<i class=\"fab fa-instagram\"></i>', '2024-05-03 09:49:45', '2024-06-22 02:10:00'),
(5, 'Twitter', 'https://www.twitter.com', '<i class=\"fab fa-twitter\"></i>', '2024-05-03 09:50:31', '2024-06-22 22:31:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified_token` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `verified_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'doannhathao2310@gmail.com', 'verified', 1, '2024-05-04 07:19:58', '2024-05-04 07:20:24'),
(8, '22662028@kthcm.edu.vn', 'verified', 1, '2024-06-22 06:46:29', '2024-06-22 06:46:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `terms`
--

INSERT INTO `terms` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h4>Terms and rules.</h4>The providers (\"we\", \"us\", \"our\") of the service provided by this web site (\"Service\") are not responsible for any user-generated content and accounts. Content submitted express the views of their author only.<br>This Service is only available to users who are at least 13 years old. If you are younger than this, please do not register for this Service. If you register for this Service, you represent that you are this age or older.<br>All content you submit, upload, or otherwise make available to the Service (\"Content\") may be reviewed by staff members. All Content you submit or upload may be sent to third-party verification services (including, but not limited to, spam prevention services). Do not submit any Content that you consider to be private or confidential.<br>You agree to not use the Service to submit or link to any Content which is defamatory, abusive, hateful, threatening, spam or spam-like, likely to offend, contains adult or objectionable content, contains personal information of others, risks copyright infringement, encourages unlawful activity, or otherwise violates any laws. You are entirely responsible for the content of, and any harm resulting from, that Content or your conduct.<br>We may remove or modify any Content submitted at any time, with or without cause, with or without notice. Requests for Content to be removed or modified will be undertaken only at our discretion. We may terminate your access to all or any part of the Service at any time, with or without cause, with or without notice.<br>You are granting us with a non-exclusive, permanent, irrevocable, unlimited license to use, publish, or re-publish your Content in connection with the Service. You retain copyright over the Content.\r\n<br>These terms may be changed at any time without notice.\r\n<br>If you do not agree with these terms, please do not register or use the Service. Use of the Service constitutes acceptance of these terms. If you wish to close your account, please contact us.', '2024-04-28 12:37:20', '2024-04-28 06:23:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `email_verified` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `image`, `phone`, `role`, `status`, `email_verified`, `created_at`, `updated_at`) VALUES
(6, 'Doan Nhat Hao', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doannhathao2310@gmail.com', 'media_6675c80c4ee5d.jpg', '0967093770', 2, 1, 'verified', '2024-06-22 01:35:56', '2024-06-22 01:35:56'),
(7, 'Mod', 'mod1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '22662028@kthcm.edu.vn', 'media_6675c8dc410f5.png', '0967093770', 1, 1, 'verified', '2024-06-22 01:39:24', '2024-06-22 01:39:24'),
(8, 'User', 'user1', '8cb2237d0679ca88db6464eac60da96345513964', 'doannhathaoasian@gmail.com', 'media_6675c8f2e9c85.jpg', '0967093770', 0, 1, 'verified', '2024-06-22 01:39:46', '2024-06-22 01:39:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mailsettings`
--
ALTER TABLE `mailsettings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `mailsettings`
--
ALTER TABLE `mailsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
