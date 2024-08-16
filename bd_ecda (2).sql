-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 nov. 2023 à 13:13
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_ecda`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_03_105549_create_tab__t_m_a_s_table', 1),
(6, '2023_10_03_110816_create_tab__dossiers_table', 1),
(7, '2023_10_10_195007_create_tab__type_t_m_a_s_table', 1),
(8, '2023_10_10_195648_create_tab__type_dossiers_table', 1),
(9, '2023_10_10_195843_create_tab__type_documents_table', 1),
(10, '2023_10_18_220220_add_last_login_to_users_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tab__dossiers`
--

DROP TABLE IF EXISTS `tab__dossiers`;
CREATE TABLE IF NOT EXISTS `tab__dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_saisie` date NOT NULL,
  `code_tma` int(11) NOT NULL,
  `type_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_dossier_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_document_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `email_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tab__dossiers_uuid_unique` (`uuid`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tab__dossiers`
--

INSERT INTO `tab__dossiers` (`id`, `uuid`, `date_saisie`, `code_tma`, `type_tma`, `type_dossier_tma`, `type_document_tma`, `document_tma`, `updated_at`, `created_at`, `email_user`) VALUES
(1, 'be22f9e5-ab79-460a-a7fd-632af898cd74', '2023-10-12', 100, 'Permis de Recherche', 'Octroi', 'Demande', '100_SONDO FOAGA 17-093.pdf', '2023-10-12', '2023-10-12', 'fabrice.zoma@yahoo.fr'),
(2, 'f597531e-3b9d-41da-9924-d6f1acfc5655', '2023-10-12', 100, 'Permis de Recherche', 'Octroi', 'Arrete', '100_Capture d’écran.png', '2023-10-12', '2023-10-12', 'fabrice.zoma@yahoo.fr'),
(3, 'd01c0bd8-dc01-40ee-9076-aa3724b9cd1d', '2023-10-12', 101, 'Permis de Recherche', 'Octroi', 'Demande', '101_android-profile-icon-2.jpg', '2023-10-12', '2023-10-12', 'fabrice.zoma@yahoo.fr'),
(4, '4f5a057b-045e-43ac-b7c4-ae7e5abd5189', '2023-10-12', 102, 'Autorisation de Prospection', 'Premier Renouvellement', 'Demande', '102_Capture d’écran.png', '2023-10-12', '2023-10-12', 'fabrice.zoma@yahoo.fr'),
(5, '77e5a6cc-d689-4117-83a8-15b63a871ad3', '2023-10-13', 100, 'Permis de Recherche', 'Octroi', 'Arrete', '100_Capture d’écran.png', '2023-10-13', '2023-10-13', 'fabrice.zoma@yahoo.fr'),
(6, '1bc3b5b8-8ea8-4798-8c9a-5a279bbc3b7e', '2023-10-14', 100, 'Permis de Recherche', 'Deuxieme Renouvellement', 'Arrete', '100_WhatsApp Image 2023-10-13 à 11.12.01_223e2c41.jpg', '2023-10-14', '2023-10-14', 'fabrice.zoma@yahoo.fr'),
(7, '543cbcf6-d565-40ad-85a1-65840399050e', '2023-10-14', 200, 'Autorisation de Prospection', 'Octroi', 'Demande', '200Octroi_SONDO FOAGA 17-093.pdf', '2023-10-14', '2023-10-14', 'fabrice.zoma@yahoo.fr'),
(8, '490feb22-1bfd-46c5-8f1f-a2bd709d1155', '2023-10-14', 200, 'Autorisation de Prospection', 'Octroi', 'Arrete', '200Octroi_Capture d’écran.png', '2023-10-14', '2023-10-14', 'fabrice.zoma@yahoo.fr'),
(9, '38cc1dc1-0de7-49a6-8e8b-c20838415a4b', '2023-10-14', 200, 'Autorisation de Prospection', 'Premier Renouvellement', 'Demande', '200Premier Renouvellement_SONDO FOAGA 17-093.pdf', '2023-10-14', '2023-10-14', 'fabrice.zoma@yahoo.fr'),
(10, 'c281dccd-cf06-4b15-afbe-8368bb98bded', '2023-10-14', 200, 'Autorisation de Prospection', 'Deuxieme Renouvellement', 'Arrete', '200_Deuxieme Renouvellement_SONDO FOAGA 17-093.pdf', '2023-10-14', '2023-10-14', 'fabrice.zoma@yahoo.fr'),
(11, 'f2f19e2f-2fa9-42a5-ba57-aaa478cb2539', '2023-10-16', 400, 'Autorisation de Prospection', 'Octroi', 'Demande', '400_Octroi_android-profile-icon-2.jpg', '2023-10-16', '2023-10-16', 'fabrice.zoma@yahoo.fr'),
(12, '9a27781d-bb94-4666-8206-82ea6932db24', '2023-10-16', 400, 'Autorisation de Prospection', 'Octroi', 'Arrete', '400_Octroi_android-profile-icon-2.jpg', '2023-10-16', '2023-10-16', 'fabrice.zoma@yahoo.fr'),
(13, '79ad45a9-1f62-4ae1-8963-27ff057657d8', '2023-10-17', 200, 'Autorisation de Prospection', 'Premier Renouvellement', 'Arrete', '200_Premier Renouvellement_WhatsApp Image 2023-10-13 à 11.12.01_223e2c41.jpg', '2023-10-17', '2023-10-17', 'fabrice.zoma@yahoo.fr'),
(14, '4db0ed3d-2c43-4708-a98c-62541a9b27d9', '2023-10-17', 200, 'Autorisation de Prospection', 'Premier Renouvellement', 'Demande', '200_Premier Renouvellement_SONDO FOAGA 17-093.pdf', '2023-10-17', '2023-10-17', 'fabrice.zoma@yahoo.fr'),
(15, '315b5e66-9c34-48e0-990a-b4a462be3923', '2023-10-17', 400, 'Autorisation de Prospection', 'Octroi', 'Arrete', '400_Octroi_Capture d’écran.png', '2023-10-17', '2023-10-17', 'fabrice.zoma@yahoo.fr'),
(16, 'eb30b69f-b4f7-48b7-9a16-205beca6990f', '2023-10-18', 100, 'Permis de Recherche', 'Octroi', 'Arrete', '100_Octroi_SONDO FOAGA 17-093.pdf', '2023-10-17', '2023-10-17', 'fabrice.zoma@yahoo.fr'),
(17, '0c3ee4b0-ddaf-4072-b020-9a795341647b', '2023-10-18', 27, 'Autorisation de Prospection', 'Octroi', 'Arrete', '27_Octroi_SONDO FOAGA 17-093.pdf', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(18, '5ea8956a-7cd9-4e96-93a3-3531c5b680db', '2023-10-18', 600, 'Autorisation de Prospection', 'Octroi', 'Arrete', '600_Octroi_SONDO FOAGA 17-093.pdf', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(19, 'c1a50c8b-122a-4f5e-a912-4b061fa2bc1b', '2023-10-18', 600, 'Autorisation de Prospection', 'Octroi', 'Demande', '600_Octroi_android-profile-icon-2.jpg', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(20, '1c5a61ea-80cd-49f9-82d3-b0f7da3cb83e', '2023-10-18', 800, 'Autorisation de Prospection', 'Octroi', 'Arrete', '800_Octroi_SONDO FOAGA 17-093.pdf', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(21, 'eb9b2ae2-9f4c-4668-b518-b039fc6ea1c1', '2023-10-18', 800, 'Autorisation de Prospection', 'Octroi', 'Demande', '800_Octroi_android-profile-icon-2.jpg', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(22, 'ea209dfb-545b-4e4e-86cf-a3cbffde36b5', '2023-10-18', 900, 'Permis de Recherche', 'Premier Renouvellement', 'Arrete', '900_Premier Renouvellement_Capture d’écran.png', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(23, 'baf94f45-b744-43c7-81e5-cf10f2611049', '2023-10-18', 900, 'Permis de Recherche', 'Premier Renouvellement', 'Demande', '900_Premier Renouvellement_SONDO FOAGA 17-093.pdf', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(24, 'ed2e9d66-0275-41ac-971e-4c49677038c2', '2023-10-18', 60, 'Autorisation de Prospection', 'Premier Renouvellement', 'Arrete', '60_Premier Renouvellement_SONDO FOAGA 17-093.pdf', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(25, '2e733222-c140-4017-bfa4-9272da4dbc76', '2023-10-18', 61, 'Permis de Recherche', 'Deuxieme Renouvellement', 'Demande', '61_Deuxieme Renouvellement_android-profile-icon-2.jpg', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(26, '811e1500-cc03-42c7-9dc7-0ca4780cc0f1', '2023-10-18', 50, 'Autorisation de Prospection', 'Octroi', 'Arrete', '50_Octroi_Capture d’écran.png', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(27, '03a0423c-088b-4394-8c2a-0c0fef75a45a', '2023-10-18', 1000, 'Autorisation de Prospection', 'Octroi', 'Demande', '1000_Octroi_SONDO FOAGA 17-093.pdf', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(32, '923dea95-73ae-41b7-926f-b4fcbc2b8b18', '2023-10-19', 4000, 'AEA', 'Octroi', 'Arrete', '4000_Octroi_SONDO FOAGA 17-093.pdf', '2023-10-19', '2023-10-19', 'fabrice.zoma@yahoo.fr'),
(29, 'bf21e066-d782-4e0e-b187-ae8b838d8f1a', '2023-10-18', 2000, 'Permis de Recherche', 'Premier Renouvellement', 'Arrete', '2000_Premier Renouvellement_SONDO FOAGA 17-093.pdf', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(31, '28ec49f6-cf6b-4349-95cb-6f116f096d67', '2023-10-18', 3000, 'Permis de Recherche', 'Octroi', 'Demande', '3000_Octroi_android-profile-icon-2.jpg', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(33, 'f25fc734-2df2-4d0d-9563-49fddce0e777', '2023-10-19', 4000, 'AEA', 'Octroi', 'Demande', '4000_Octroi_android-profile-icon-2.jpg', '2023-10-19', '2023-10-19', 'fabrice.zoma@yahoo.fr'),
(34, 'a9a65b19-fb47-43f4-a03a-570cd2e1f81f', '2023-10-19', 2000, 'Permis de Recherche', 'Premier Renouvellement', 'Arrete', '2000_Premier Renouvellement_Capture d’écran.png', '2023-10-19', '2023-10-19', 'fabrice.zoma@yahoo.fr'),
(35, 'b694b803-7575-4f42-bf5b-8ed061cbcc31', '2023-10-19', 200, 'Autorisation de Prospection', 'Octroi', 'Arrete', '200_Octroi_SONDO FOAGA 17-093.pdf', '2023-10-19', '2023-10-19', 'fabrice.zoma@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `tab__type_documents`
--

DROP TABLE IF EXISTS `tab__type_documents`;
CREATE TABLE IF NOT EXISTS `tab__type_documents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_saisie` date NOT NULL,
  `type_document_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tab__type_documents_uuid_unique` (`uuid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tab__type_documents`
--

INSERT INTO `tab__type_documents` (`id`, `uuid`, `date_saisie`, `type_document_tma`, `email_user`, `updated_at`, `created_at`) VALUES
(1, '85b1c4fb-dc31-4c12-ab22-2d0fd4e1ebcb', '2023-10-12', 'Demande', 'fabrice.zoma@yahoo.fr', '2023-10-12', '2023-10-12'),
(2, '5af4c06e-09e4-451c-8e8f-5592f9dc8928', '2023-10-12', 'Arrete', 'fabrice.zoma@yahoo.fr', '2023-10-12', '2023-10-12');

-- --------------------------------------------------------

--
-- Structure de la table `tab__type_dossiers`
--

DROP TABLE IF EXISTS `tab__type_dossiers`;
CREATE TABLE IF NOT EXISTS `tab__type_dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_saisie` date NOT NULL,
  `type_dossier_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tab__type_dossiers_uuid_unique` (`uuid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tab__type_dossiers`
--

INSERT INTO `tab__type_dossiers` (`id`, `uuid`, `date_saisie`, `type_dossier_tma`, `email_user`, `updated_at`, `created_at`) VALUES
(1, '117ee98f-cd6e-494c-b00a-e7af505299e8', '2023-10-12', 'Octroi', 'fabrice.zoma@yahoo.fr', '2023-10-12', '2023-10-12'),
(2, 'c490e3d1-0004-4695-9c8d-9c39ca1397d2', '2023-10-12', 'Premier Renouvellement', 'fabrice.zoma@yahoo.fr', '2023-10-12', '2023-10-12'),
(3, '5b9b78e1-9781-4cca-9083-bfccec6cad0a', '2023-10-12', 'Deuxieme Renouvellement', 'fabrice.zoma@yahoo.fr', '2023-10-12', '2023-10-12');

-- --------------------------------------------------------

--
-- Structure de la table `tab__type_t_m_a_s`
--

DROP TABLE IF EXISTS `tab__type_t_m_a_s`;
CREATE TABLE IF NOT EXISTS `tab__type_t_m_a_s` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_saisie` date NOT NULL,
  `type_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tab__type_t_m_a_s_uuid_unique` (`uuid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tab__type_t_m_a_s`
--

INSERT INTO `tab__type_t_m_a_s` (`id`, `uuid`, `date_saisie`, `type_tma`, `email_user`, `updated_at`, `created_at`) VALUES
(1, '53bcd08f-2861-4717-bd35-25b13a0a16b5', '2023-10-12', 'Permis de Recherche', 'fabrice.zoma@yahoo.fr', '2023-10-12', '2023-10-12'),
(2, '4a1157cb-c850-47bf-aa82-7b0a90bc4333', '2023-10-12', 'Autorisation de Prospection', 'fabrice.zoma@yahoo.fr', '2023-10-12', '2023-10-12'),
(3, '46f5b29a-8189-4322-be0f-f003a030052b', '2023-10-19', 'AEA', 'fabrice.zoma@yahoo.fr', '2023-10-19', '2023-10-19');

-- --------------------------------------------------------

--
-- Structure de la table `tab__t_m_a_s`
--

DROP TABLE IF EXISTS `tab__t_m_a_s`;
CREATE TABLE IF NOT EXISTS `tab__t_m_a_s` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_saisie` date NOT NULL,
  `code_tma` int(11) NOT NULL,
  `nom_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_dossier_tma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `email_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tab__t_m_a_s_code_tma_type_dossier_tma_unique` (`code_tma`,`type_dossier_tma`),
  UNIQUE KEY `tab__t_m_a_s_uuid_unique` (`uuid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tab__t_m_a_s`
--

INSERT INTO `tab__t_m_a_s` (`id`, `uuid`, `date_saisie`, `code_tma`, `nom_tma`, `type_tma`, `type_dossier_tma`, `updated_at`, `created_at`, `email_user`) VALUES
(3, '97ada758-3541-49ca-ab67-64451fccb18a', '2023-10-12', 102, 'TRAORE SOULEYMANE', 'Autorisation de Prospection', 'Premier Renouvellement', '2023-10-13', '2023-10-12', 'fabrice.zoma@yahoo.fr'),
(31, '621c1900-04cc-4977-9175-77aa81e46e77', '2023-10-19', 4000, 'ZOMA', 'AEA', 'Octroi', '2023-10-19', '2023-10-19', 'fabrice.zoma@yahoo.fr'),
(5, 'dd69da86-da30-4887-9686-ef891c044fde', '2023-10-14', 100, 'ZOMA', 'Permis de Recherche', 'Deuxieme Renouvellement', '2023-10-14', '2023-10-14', 'fabrice.zoma@yahoo.fr'),
(8, '0aa3b320-b1d0-42b0-948b-daab69a9701c', '2023-10-14', 200, 'TRAORE', 'Autorisation de Prospection', 'Deuxieme Renouvellement', '2023-10-14', '2023-10-14', 'fabrice.zoma@yahoo.fr'),
(29, '8cf8d2ca-5f67-42ca-9765-49bb2d586b3f', '2023-10-18', 2000, 'ZOMA', 'Permis de Recherche', 'Premier Renouvellement', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(32, '533dd7ca-57d2-4c0c-aeae-51e4fbd54931', '2023-10-19', 200, 'TRAORE', 'Autorisation de Prospection', 'Octroi', '2023-10-19', '2023-10-19', 'fabrice.zoma@yahoo.fr'),
(25, 'ca32d3c2-634b-4dad-a3a3-3b1cb4244fb9', '2023-10-18', 60, 'ZONGO', 'Autorisation de Prospection', 'Octroi', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr'),
(24, 'e207b23e-9f62-4cda-bc34-979f719cec69', '2023-10-18', 900, 'ZOMA FABRICE', 'Permis de Recherche', 'Premier Renouvellement', '2023-10-18', '2023-10-18', 'fabrice.zoma@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prename`, `email`, `profil`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'ZOMA', 'Fabrice', 'fabrice.zoma@yahoo.fr', 'Administrateur', NULL, '$2y$10$j3M8ps0Eijt9IO53WIQWae0DU9qdHJqT3aFF27N5/NotnjiyPTUBW', NULL, '2023-10-02 15:01:36', '2023-11-03 13:04:30', '2023-11-03 13:04:30'),
(2, 'TRAORE', 'Souleymane', 'traore69@gmail.com', 'Agent', NULL, '$2y$10$aqowCFHLLoze.9lHZXeQXeJhEn39ZxAQsih4h5jOYWwmIpl9NhIsO', NULL, '2023-10-03 08:03:43', '2023-10-19 08:06:09', '2023-10-19 08:06:09'),
(3, 'OUEDRAOGO', 'Oumarou', 'oued@gmail.com', 'Consultant', NULL, '$2y$10$kR9oq0yQKzMi.HteBdFTIe3bgw9cufHzxFN207QWDALBWuFyv2i52', NULL, '2023-10-03 08:04:23', '2023-10-19 08:05:08', '2023-10-19 08:05:08'),
(4, 'NANA', 'Arsene', 'nana@gmail.com', 'Consultant', NULL, '$2y$10$g70dMOHTQrVXbJiJxJoMrezq8Uifnp6aoKTXvuqOCMOksdjD.bUzG', NULL, '2023-10-18 21:22:31', '2023-10-19 08:04:11', '2023-10-19 08:04:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
