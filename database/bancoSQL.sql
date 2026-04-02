-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para bancopweb
CREATE DATABASE IF NOT EXISTS `bancopweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bancopweb`;

-- Copiando estrutura para tabela bancopweb.autores
CREATE TABLE IF NOT EXISTS `autores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.autores: ~4 rows (aproximadamente)
INSERT IGNORE INTO `autores` (`id`, `nome`, `nacionalidade`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Prof. Geo Bahringer', 'Sierra Leone', 'autores/default.png', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(2, 'Nestor Dickinson', 'New Caledonia', 'autores/default.png', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(3, 'Camron Schulist PhD', 'Netherlands', 'autores/default.png', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(4, 'Fae Monahan', 'Vietnam', 'autores/default.png', '2026-03-20 22:52:30', '2026-03-20 22:52:30');

-- Copiando estrutura para tabela bancopweb.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.categorias: ~5 rows (aproximadamente)
INSERT IGNORE INTO `categorias` (`id`, `nome`, `descricao`, `created_at`, `updated_at`) VALUES
	(1, 'quisquam', 'Enim amet qui sit excepturi blanditiis.', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(2, 'et', 'Blanditiis earum est molestias natus voluptatum quia voluptas consectetur.', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(3, 'numquam', 'Vel qui commodi distinctio dolores voluptas earum illum.', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(4, 'in', 'Repellat earum earum enim dolor dolore.', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(5, 'et', 'Unde tempore tempora perspiciatis atque dolores velit molestias.', '2026-03-20 22:52:30', '2026-03-20 22:52:30');

-- Copiando estrutura para tabela bancopweb.editoras
CREATE TABLE IF NOT EXISTS `editoras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano_fundacao` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.editoras: ~5 rows (aproximadamente)
INSERT IGNORE INTO `editoras` (`id`, `nome`, `cidade`, `ano_fundacao`, `created_at`, `updated_at`) VALUES
	(1, 'Herzog, Gibson and Beier', 'Hilpertport', 1928, '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(2, 'Kulas PLC', 'Jordonfurt', 1973, '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(3, 'Ankunding PLC', 'Kesslershire', 1947, '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(5, 'Bartoletti, Stracke and Armstrong', 'East Rodrigoside', 2013, '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(8, 'Editora de livros', 'Cidade de livros', 12982, '2026-03-27 21:45:57', '2026-03-27 21:45:57');

-- Copiando estrutura para tabela bancopweb.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bancopweb.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` int NOT NULL,
  `autor_id` bigint unsigned NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `editora_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `livros_autor_id_foreign` (`autor_id`),
  KEY `livros_categoria_id_foreign` (`categoria_id`),
  KEY `livros_editora_id_foreign` (`editora_id`),
  CONSTRAINT `livros_autor_id_foreign` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`id`),
  CONSTRAINT `livros_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `livros_editora_id_foreign` FOREIGN KEY (`editora_id`) REFERENCES `editoras` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.livros: ~5 rows (aproximadamente)
INSERT IGNORE INTO `livros` (`id`, `titulo`, `ano`, `autor_id`, `categoria_id`, `editora_id`, `created_at`, `updated_at`) VALUES
	(2, 'Quia vel enim et.', 1930, 4, 3, 2, '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(3, 'Nihil a et aspernatur.', 1998, 3, 1, 5, '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(4, 'Ea aut nihil sed.', 1967, 4, 3, 5, '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(5, 'Exercitationem et beatae.', 1900, 3, 3, 2, '2026-03-20 22:52:30', '2026-03-20 22:52:30');

-- Copiando estrutura para tabela bancopweb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.migrations: ~0 rows (aproximadamente)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2026_03_11_000235_create_editoras_table', 1),
	(6, '2026_03_11_003150_create_autors_table', 1),
	(7, '2026_03_11_003225_create_categorias_table', 1),
	(8, '2026_03_11_003235_create_livros_table', 1);

-- Copiando estrutura para tabela bancopweb.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bancopweb.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela bancopweb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela bancopweb.users: ~5 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Travis Orn', 'ullrich.marietta@example.com', '2026-03-20 22:52:30', '$2y$12$P66xDlLFvlYUq0fMtZQU1urJaYiLh7ye6Vwvy/fm8g3x.ZrRGIH5S', 'IPfs0HrGeu', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(2, 'Brock Tillman', 'lesly.hudson@example.net', '2026-03-20 22:52:30', '$2y$12$P66xDlLFvlYUq0fMtZQU1urJaYiLh7ye6Vwvy/fm8g3x.ZrRGIH5S', 'E4XrMWDXWI', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(3, 'Rita Heathcote V', 'noemi.beer@example.org', '2026-03-20 22:52:30', '$2y$12$P66xDlLFvlYUq0fMtZQU1urJaYiLh7ye6Vwvy/fm8g3x.ZrRGIH5S', 'q9cMSXgJqw', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(4, 'Mr. Nels Blanda Jr.', 'gwyman@example.org', '2026-03-20 22:52:30', '$2y$12$P66xDlLFvlYUq0fMtZQU1urJaYiLh7ye6Vwvy/fm8g3x.ZrRGIH5S', 'MRGrsaxMqZ', '2026-03-20 22:52:30', '2026-03-20 22:52:30'),
	(5, 'Tyler Considine', 'cremin.april@example.net', '2026-03-20 22:52:30', '$2y$12$P66xDlLFvlYUq0fMtZQU1urJaYiLh7ye6Vwvy/fm8g3x.ZrRGIH5S', '6mxpODGUe5', '2026-03-20 22:52:30', '2026-03-20 22:52:30');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
